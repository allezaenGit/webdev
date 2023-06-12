<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Authorization
 *
 * @author Dhiya
 */
class Sys_service_storage_model extends CI_Model {
  

	public $file_moved_name;
	public $file_moved_path;

	
	function __construct(){
        parent::__construct();
		
    }
	

	public function get_file_private_byid($user_id,$id){
		$afield  = array(
			'file_path',
			'name',
			'orig_name',
			'external_access'
		);
		
		$this->db->select($afield);
		$this->db->where('sys_user_upload.id_user',$user_id);
		$this->db->where('sys_user_upload.id',$id);
		return $this->db->get('sys_user_upload')->row();
	}
	
	public function get_file_bytime($user_id,$time,$private=TRUE){
		$afield  = array(
			'file_path',
			'name',
			'orig_name',
			'size',
			'external_access',
			'ext',
		);
		
		$this->db->select($afield);
		
		if($private){
			$this->db->where('sys_user_upload.id_user',$user_id);
		}
	
		
		$this->db->where('sys_user_upload.time',$time);
		return $this->db->get('sys_user_upload')->row();
	}
	
	public function get_all_file_bytime($user_id,$atime,$private=TRUE){
		
		$afield  = array(
			'file_path',
			'name',
			'orig_name',
			'time',
			'size',
			'external_access',
			'ext',
		);
		
		$this->db->select($afield);
		if($private){
			$this->db->where('sys_user_upload.id_user',$user_id);
		}
		$this->db->where_in('sys_user_upload.time',$atime);
		return $this->db->get('sys_user_upload')->result();
	}
	
	
	public function get_all_file_byfolder($user_id,$folder,$rekusif=false,$private=TRUE){
		$afield  = array(
			'file_path',
			'name',
			'orig_name',
			'time',
			'size',
			'external_access',
			'ext',
		);
		
		$this->db->select($afield);
		if($private){
			$this->db->where('sys_user_upload.id_user',$user_id);
		}
		
		$folder  =  trim($folder, '/');
		
		$path 	= './upload_files/' . $folder . '/';
		
		if($rekusif){
			$this->db->like('sys_user_upload.file_path',$path,'after');
		}else{
			$this->db->where_in('sys_user_upload.file_path',$path);
		}
		
		
		
		return $this->db->get('sys_user_upload')->result();
		
	}
	
	public function get_all_file_temp_bytime($user_id,$atime,$private=TRUE){
		$afield  = array(
			'file_path',
			'name',
			'orig_name',
			'time',
			'size',
			'external_access',
			'ext',
		);
		
		$this->db->select($afield);
		if($private){
			$this->db->where('sys_user_upload_temp.id_user',$user_id);
		}
		$this->db->where_in('sys_user_upload_temp.time',$atime);
		return $this->db->get('sys_user_upload_temp')->result();
	}
	
	public function get_file_temp_bytime($user_id,$time,$private=TRUE){
		$afield  = array(
			'file_path',
			'name',
			'orig_name',
			'size',
			'external_access',
			'ext',
		);
		
		$this->db->select($afield);
		
		if($private){
			$this->db->where('sys_user_upload_temp.id_user',$user_id);
		}
	
		
		$this->db->where('sys_user_upload_temp.time',$time);
		return $this->db->get('sys_user_upload_temp')->row();
	}
	
	
	
	
	
	
	
	
	public function get_all_file_temp($user_id){
		$afield = array(
			'name',
			'time',
			'size',
		);
		$this->db->select($afield);
		$this->db->where('sys_user_upload_temp.id_user',$user_id);
		return $this->db->get('sys_user_upload_temp')->result_array();
	}
	
	public function get_file_temp($user_id,$time){
		$afield = array(
			'name',
			'time',
			'size',
		);
		$this->db->select($afield);
		$this->db->where('sys_user_upload_temp.id_user',$user_id);
		$this->db->where('sys_user_upload_temp.time',$user_id);
		return $this->db->get('sys_user_upload_temp')->result_array();
	}
	
	public function move_temp($user_id,$time){
		
		
		$this->db->where('sys_user_upload_temp.id_user',$user_id);
		$this->db->where('sys_user_upload_temp.time',$time);
		$dt = $this->db->get('sys_user_upload_temp')->row();
		
		if($dt){
			$this->db->trans_start(); 
				
				$this->file_moved_name	= $dt->name;
				$this->file_moved_path	= $dt->file_path;
				
				unset($dt->id);
				$this->db->insert('sys_user_upload',$dt);
				
				$this->delete_all_temp_bytime($user_id,$time);
			
			$this->db->trans_complete();
			return $this->db->trans_status();	
		}else{
			return false;
		}
		
	}
	
	public function delete_all_temp_bytime($user_id,$atime){
		$this->db->where_in('sys_user_upload_temp.time',$atime);
		$this->db->where('sys_user_upload_temp.id_user',$user_id);
		$this->db->delete('sys_user_upload_temp');
	}
	
	public function delete_file_bytime($user_id,$time,$private=TRUE){
		
		if($private){
			$this->db->where('sys_user_upload.id_user',$user_id);
		}
		
		$this->db->where('sys_user_upload.time',$time);
		$this->db->delete('sys_user_upload');
	}
	
	
	public function delete_file_relation($data){
		$fil = explode("," ,$data['field']);
		$x=0;
		foreach($fil as $v ){
			$f1 = trim($v);
			$w = "or_where";
			
			if($x=0) $w = "where";
				
			$this->db->$w( $data['relation'] .'.' .$f1 ,$data['upload_id']);
			
			$x++;
		}
		
		
		$this->db->delete($data['relation']);
	}

	public function update_file_relation($data){
		$fil = explode("," ,$data['field']);
		$d;
		
		foreach($fil as $v ){
			$f1 = trim($v);
			
			$this->db->where( $data['relation'] .'.' .$f1 ,$data['upload_id']);
			$exist = $this->db->get($data['relation'] )->row();
			
			if($exist) {
				$this->db->where( $data['relation'] .'.' .$f1 ,$data['upload_id']);
				$d[$f1]="";
				$this->db->update($data['relation'],$d);
			}
		}
		
		
		
		
	}
	
	public function setEnableExternalURL($external_access,$time){
		
		
		$this->db->where('time',$time);
		$this->db->update('sys_user_upload',$external_access);
		
	}
	

       
}
