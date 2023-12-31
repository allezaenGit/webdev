<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_authorized_frontend_model extends CI_Model {
   public $id;	
   function __construct(){
        parent::__construct();
   }	
	
	public function json(){
		$this->datatables->select('
			user_authorized_frontend.id as id,
			user_authorized_frontend.link as link,
		');
		
		$this->datatables->from('user_authorized_frontend');

		
		
		//mengembalikan dalam bentuk array
		$q =  json_decode($this->datatables->generate(),true);
		return $q;
	}
	

   public function get_all(){
		$afield = array(
			'user_authorized_frontend.id as id',
			'user_authorized_frontend.link as link',
		
		);
		$this->db->select($afield);

		$this->db->order_by('user_authorized_frontend.id', 'ASC');
		return $this->db->get('user_authorized_frontend')->result_array();
   }


	public function get_by_id($id){
		$afield = array(
			'user_authorized_frontend.id as id',
			'user_authorized_frontend.link as link',
		
		);
		$this->db->select($afield);

		$this->db->where('user_authorized_frontend.id', $id);
		$this->db->order_by('user_authorized_frontend.id', 'ASC');
		return $this->db->get('user_authorized_frontend')->row();
   }


	/* Memastikan data yg dibuat tidak kembar/sama,
	   fungsi ini sebagai pengganti fungsi primary key dr db,
	   krn primary key sudah di gunakan untuk column id.
	   -create : id di kosongkan.
	   -update : id di isi dengan id data yg di proses.	
	*/	
	function if_exist($id,$data){
		$this->db->where('user_authorized_frontend.id <>',$id);

		$q = $this->db->get_where('user_authorized_frontend', $data)->result_array();
		
		if(count($q)>0){
			return true;
		}else{
			return false;
		}		

	

	}


	function insert($data){
	
	    /* transaction rollback */
		$this->db->trans_start();
		
		$this->db->insert('user_authorized_frontend', $data);		
		/* id primary yg baru saja di input*/
		$this->id = $this->db->insert_id(); 
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false
	}

	function update($id,$data){

		/* transaction rollback */
		$this->db->trans_start();

		$this->db->where('user_authorized_frontend.id', $id);
		$this->db->update('user_authorized_frontend', $data);
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
	}

	function delete_multiple($data){
		/* transaction rollback */
		$this->db->trans_start();
		
		if(!empty($data)){
			$this->db->where_in('user_authorized_frontend.id',$data);	
	
			$this->db->delete('user_authorized_frontend');
		}
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
		
	}


};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-03-10 08:48:28 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/
