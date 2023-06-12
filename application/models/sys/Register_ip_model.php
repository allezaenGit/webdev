<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register_ip_model extends CI_Model {
	
   function __construct(){
        parent::__construct();
   }	
	
	public function json(){
		$this->datatables->select('
			sys_maintenance_ip.id as id,
			sys_maintenance_ip.ip_address as ip_address,
		');
		
		$this->datatables->from('sys_maintenance_ip');

		
		
		//mengembalikan dalam bentuk array
		$q =  json_decode($this->datatables->generate(),true);
		return $q;
	}
	

   public function get_all(){
		$afield = array(
			'sys_maintenance_ip.id as id',
			'sys_maintenance_ip.ip_address as ip_address',
		
		);
		$this->db->select($afield);

		$this->db->order_by('sys_maintenance_ip.id', 'ASC');
		return $this->db->get('sys_maintenance_ip')->result_array();
   }


	public function get_by_id($id){
		$afield = array(
			'sys_maintenance_ip.id as id',
			'sys_maintenance_ip.ip_address as ip_address',
		
		);
		$this->db->select($afield);

		$this->db->where('sys_maintenance_ip.id', $id);
		$this->db->order_by('sys_maintenance_ip.id', 'ASC');
		return $this->db->get('sys_maintenance_ip')->row();
   }


	/* Memastikan data yg dibuat tidak kembar/sama,
	   fungsi ini sebagai pengganti fungsi primary key dr db,
	   krn primary key sudah di gunakan untuk column id.
	   -create : id di kosongkan.
	   -update : id di isi dengan id data yg di proses.	
	*/	
	function if_exist($id,$data){
		$this->db->where('sys_maintenance_ip.id <>',$id);

		$q = $this->db->get_where('sys_maintenance_ip', $data)->result_array();
		
		if(count($q)>0){
			return true;
		}else{
			return false;
		}		

	

	}


	function insert($data){
	
	    /* transaction rollback */
		$this->db->trans_start();
		
		$this->db->insert('sys_maintenance_ip', $data);		
		/* id primary yg baru saja di input*/
		//$id = $this->db->insert_id(); 
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false
	}

	function update($id,$data){

		/* transaction rollback */
		$this->db->trans_start();

		$this->db->where('sys_maintenance_ip.id', $id);
		$this->db->update('sys_maintenance_ip', $data);
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
	}

	function delete_multiple($data){
		/* transaction rollback */
		$this->db->trans_start();
		
		if(!empty($data)){
			$this->db->where_in('sys_maintenance_ip.id',$data);	
	
			$this->db->delete('sys_maintenance_ip');
		}
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
		
	}


};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2019-08-14 19:54:50 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/
