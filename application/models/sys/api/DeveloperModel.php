<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DeveloperModel extends CI_Model {
   public $id;	
   const table = "sys_developer";
   const rules = [
	"name" => "required",
	"email" => "email||required||unique",
	"host" => "required||unique",
	"id_dev" => "required||unique",
	"app_name" => "required",  
  ];
   
   
   
   function __construct(){
        parent::__construct();
   }	
	
	public function json(){
		$this->datatables->select('
			sys_developer.id as id,
			sys_developer.name as name,
			sys_developer.email as email,
			sys_developer.host as host,
			sys_developer.id_dev as id_dev,
			sys_developer.key as key,
			sys_developer.app_name as app_name,
			sys_developer.create_at as create_at,
			sys_developer.token_activate as token_activate,
			sys_developer.status as status,
			sys_developer.send_activate as send_activate,
		');
		
		$this->datatables->from('sys_developer');

		
		
		//mengembalikan dalam bentuk array
		$q =  json_decode($this->datatables->generate(),true);
		return $q;
	}
	

   public function get_all(){
		$afield = array(
			'sys_developer.id as id',
			'sys_developer.name as name',
			'sys_developer.email as email',
			'sys_developer.host as host',
			'sys_developer.id_dev as id_dev',
			'sys_developer.app_name as app_name',
			'sys_developer.key as key',
			'sys_developer.create_at as create_at',
			'sys_developer.token_activate as token_activate',
			'sys_developer.status as status',
		
		);
		$this->db->select($afield);

		$this->db->order_by('sys_developer.id', 'ASC');
		return $this->db->get('sys_developer')->result_array();
   }


	public function get_by_id($id){
		$afield = array(
			'sys_developer.id as id',
			'sys_developer.name as name',
			'sys_developer.email as email',
			'sys_developer.host as host',
			'sys_developer.id_dev as id_dev',
			'sys_developer.key as key',
			'sys_developer.app_name as app_name',
			'sys_developer.create_at as create_at',
			'sys_developer.token_activate as token_activate',
			'sys_developer.status as status',
			'sys_developer.expayer as expayer',
		
		);
		$this->db->select($afield);

		$this->db->where('sys_developer.id', $id);
		$this->db->order_by('sys_developer.id', 'ASC');
		return $this->db->get('sys_developer')->row();
   }
   
   public function get_by_IDDev($id_dev,$active = true){
		$afield = array(
			'sys_developer.id as id',
			'sys_developer.name as name',
			'sys_developer.email as email',
			'sys_developer.host as host',
			'sys_developer.id_dev as id_dev',
			'sys_developer.key as key',
			'sys_developer.app_name as app_name',
			'sys_developer.create_at as create_at',
			'sys_developer.token_activate as token_activate',
			'sys_developer.status as status',
			'sys_developer.expayer as expayer',
		
		);
		$this->db->select($afield);

		$this->db->where('sys_developer.id_dev', $id_dev);
		
		if($active) $this->db->where('sys_developer.status', 1);
		
		return $this->db->get('sys_developer')->row();
   }
   
   
   public function getIDDev($id){
	   $afield = array(
			'sys_developer.id_dev as key',
		);
		$this->db->select($afield);
		$this->db->where_in('sys_developer.id', $id);
		return $this->db->get('sys_developer')->result();
   }
   
   public function get_id_dev($id){
		$afield = array(
			'sys_developer.id as id',
			'sys_developer.name as name',
			'sys_developer.email as email',
			'sys_developer.host as host',
			'sys_developer.id_dev as id_dev',
			'sys_developer.key as key',
			'sys_developer.app_name as app_name',
			'sys_developer.create_at as create_at',
			'sys_developer.token_activate as token_activate',
			'sys_developer.status as status',
			'sys_developer.expayer as expayer',
		
		);
		$this->db->select($afield);

		$this->db->where('sys_developer.id_dev', $id);
		$this->db->order_by('sys_developer.id', 'ASC');
		return $this->db->get('sys_developer')->row();
   }
   
   public function isValidToken($token,$date){
	   $this->db->where('sys_developer.token_activate', $token);
	   $this->db->where('sys_developer.expayer >=', $date);
	   $this->db->where('sys_developer.status ', '0');
	   $result =  $this->db->get('sys_developer')->row();
	   
	   if(empty($result)){
			 $result =  false;
	   }
	   return $result;
   }


	/* Memastikan data yg dibuat tidak kembar/sama,
	   fungsi ini sebagai pengganti fungsi primary key dr db,
	   krn primary key sudah di gunakan untuk column id.
	   -create : id di kosongkan.
	   -update : id di isi dengan id data yg di proses.	
	*/	
	function if_exist($id,$data){
		$this->db->where('sys_developer.id <>',$id);

		$q = $this->db->get_where('sys_developer', $data)->result_array();
		
		if(count($q)>0){
			return true;
		}else{
			return false;
		}		

	

	}


	function insert($data){
	
	    /* transaction rollback */
		$this->db->trans_start();
		
		$this->db->insert('sys_developer', $data);		
		/* id primary yg baru saja di input*/
		$this->id = $this->db->insert_id(); 
		
		$apikey = [
			"user_id"	=> $this->id,
			"key"		=> $data["id_dev"],	
		];
		
		$this->db->insert('sys_api_keys', $apikey);	
		
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false
	}

	function update($id,$data){

		/* transaction rollback */
		$this->db->trans_start();

		$this->db->where('sys_developer.id', $id);
		$this->db->update('sys_developer', $data);
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
	}

	function delete_multiple($data,$key){
		/* transaction rollback */
		$this->db->trans_start();
		
		if(!empty($data)){
			$this->db->where_in('sys_developer.id',$data);	
			$this->db->delete('sys_developer');
		}
	
		if(!empty($key)){
			$this->db->where_in('sys_api_access.key',$key);	
			$this->db->delete('sys_api_access');
			
			$this->db->where_in('sys_api_keys.key',$key);	
			$this->db->delete('sys_api_keys');
		}
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
		
	}


};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-08-25 13:35:46 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/
