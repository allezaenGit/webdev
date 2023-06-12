<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class GDriveCredentialModel extends CI_Model {
   public $id;	
   const table = "sys_gdrive";
   const rules = [
    "account" 			=> "required",
	"descriptions" 		=> "required",
	"path_credential" 	=> "required",
	"status" 			=> "required",  
  ];
   
   
   
   function __construct(){
        parent::__construct();
   }	
	
	public function json( $apiPost=null){
		if($apiPost)
			$this->datatables->injectPost($apiPost);
		
		$this->datatables->select('
			sys_gdrive.id as id,
			sys_gdrive.descriptions as descriptions,
			sys_gdrive.account as account,
			sys_gdrive.path_credential as path_credential,
			sys_gdrive.status as status,
			sys_gdrive.id as token_ready,
			sys_gdrive.token_name as token_name,
			tstatus.id as tstatus_id,
			tstatus.status as tstatus_status,
		');

		if ($this->db->field_exists('delete_at', 'sys_gdrive')){
			$this->datatables->where('sys_gdrive.delete_at',null);
			
			$this->datatables->where_post();
			$this->datatables->or_where('sys_gdrive.delete_at','0000-00-00 00:00:00');
		}
		
		$this->datatables->from('sys_gdrive');
	
		$this->datatables->join('sys_status tstatus','tstatus.id=sys_gdrive.status','LEFT'); 

		
		
		//mengembalikan dalam bentuk array
		$q =  json_decode($this->datatables->generate(),true);
		return $q;
	}
	

   public function get_all(){
		$afield = [
			'sys_gdrive.id as id',
			'sys_gdrive.descriptions as descriptions',
			'sys_gdrive.account as account',
			'sys_gdrive.path_credential as path_credential',
			'sys_gdrive.status as status',
			'tstatus.id as tstatus_id',
			'tstatus.status as tstatus_status',
		
		];
		
		if ($this->db->field_exists('delete_at', 'sys_gdrive')){
			$this->db->where('sys_gdrive.delete_at',null);
			
			$this->db->or_where('sys_gdrive.delete_at','0000-00-00 00:00:00');
		}
		
		
		$this->db->select($afield);
		$this->db->join('sys_status tstatus','tstatus.id=sys_gdrive.status','LEFT'); 

		$this->db->order_by('sys_gdrive.id', 'ASC');
		return $this->db->get('sys_gdrive')->result_array();
   }
   
   
   public function get_active(){
		$afield = [
			'sys_gdrive.id as id',
			'sys_gdrive.descriptions as descriptions',
			'sys_gdrive.account as account',
			'sys_gdrive.path_credential as path_credential',
			'sys_gdrive.token_name',
			'sys_gdrive.status as status',
			'tstatus.id as tstatus_id',
			'tstatus.status as tstatus_status',
		
		];
		
		$this->db->select($afield);
		$this->db->join('sys_status tstatus','tstatus.id=sys_gdrive.status','LEFT'); 

		$this->db->where('sys_gdrive.status', '1');
		$this->db->order_by('sys_gdrive.id', 'ASC');
		return $this->db->get('sys_gdrive')->row();
   }


	public function get_by_id($id){
		$afield = [
			'sys_gdrive.id as id',
			'sys_gdrive.descriptions as descriptions',
			'sys_gdrive.account as account',
			'sys_gdrive.token_name as token_name',
			'sys_gdrive.path_credential as path_credential',
			'sys_gdrive.status as status',
			'tstatus.id as tstatus_id',
			'tstatus.status as tstatus_status',
		
		];
		
		
		
		$this->db->select($afield);
		$this->db->join('sys_status tstatus','tstatus.id=sys_gdrive.status','LEFT'); 

		$this->db->where('sys_gdrive.id', $id);
		$this->db->order_by('sys_gdrive.id', 'ASC');
		return $this->db->get('sys_gdrive')->row();
   }


	/* Memastikan data yg dibuat tidak kembar/sama,
	   fungsi ini sebagai pengganti fungsi primary key dr db,
	   krn primary key sudah di gunakan untuk column id.
	   -create : id di kosongkan.
	   -update : id di isi dengan id data yg di proses.	
	*/	
	function if_exist($id,$data){
		$this->db->where('sys_gdrive.id <>',$id);
		
		if ($this->db->field_exists('delete_at', 'sys_gdrive')){
			$this->db->where('sys_gdrive.delete_at',null);
			$this->db->or_where('sys_gdrive.delete_at','0000-00-00 00:00:00');
			$this->db->where('sys_gdrive.id <>',$id);
		}
		

		$q = $this->db->get_where('sys_gdrive', $data)->result_array();
		
		
		if(count($q)>0){
			return true;
		}else{
			return false;
		}		

	

	}


	function insert($data){
	
	    /* transaction rollback */
		$this->db->trans_start();
		
		if($data['status']==1) $this->db->update('sys_gdrive', ['status'=>2]);
		
		$this->db->insert('sys_gdrive', $data);		
		/* id primary yg baru saja di input*/
		$this->id = $this->db->insert_id(); 
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false
	}

	function update($id,$data){

		/* transaction rollback */
		$this->db->trans_start();
		
		if($data['status']==1) $this->db->update('sys_gdrive', ['status'=>2]);

		$this->db->where('sys_gdrive.id', $id);
		$this->db->update('sys_gdrive', $data);
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
	}

	function delete_multiple($data,$permanent=true){
		/* transaction rollback */
		$this->db->trans_start();
		
		if(!empty($data)){
			if($permanent){
				$this->db->where_in('sys_gdrive.id',$data);	
		
				$this->db->delete('sys_gdrive');
			}else{
				$tm = Date('Y-m-d H:i:s',time());
				$this->db->where_in('sys_gdrive.id',$data);
				$this->db->update('sys_gdrive',['delete_at'=>$tm]);
			}	
		}
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
		
	}


};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2021-07-04 12:04:25 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/
