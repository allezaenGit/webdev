<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MailServerModel extends CI_Model {
   public $id;	
   const table = "sys_mail_server";
   const rules = [
	"host" => "required",
	"user_name" => "required",
	"password" => "required",
	"smtp_auth" => "required",
	"smtp_secure" => "required",
	"port" => "number||required",
	"email_sender" => "email||required",
	"email_name" => "required",
	"status" => "required",
	"debug" => "required",  
  ];
   
   
   
   function __construct(){
        parent::__construct();
   }	
	
	public function json(){
		$this->datatables->select('
			sys_mail_server.id as id,
			sys_mail_server.host as host,
			sys_mail_server.user_name as user_name,
			
			sys_mail_server.smtp_auth as smtp_auth,
			sys_mail_server.smtp_secure as smtp_secure,
			sys_mail_server.port as port,
			sys_mail_server.email_sender as email_sender,
			sys_mail_server.email_name as email_name,
			sys_mail_server.status as status,
			sys_mail_server.debug as debug,
			tstatus.id as tstatus_id,
			tstatus.status as tstatus_status,
			tdebug.id as tdebug_id,
			tdebug.status as tdebug_status,
		');
		
		$this->datatables->from('sys_mail_server');
	
		$this->datatables->join('sys_status tstatus','tstatus.id=sys_mail_server.status','LEFT'); 
	
		$this->datatables->join('sys_status tdebug','tdebug.id=sys_mail_server.debug','LEFT'); 

		
		
		//mengembalikan dalam bentuk array
		$q =  json_decode($this->datatables->generate(),true);
		return $q;
	}
	

   public function get_all(){
		$afield = array(
			'sys_mail_server.id as id',
			'sys_mail_server.host as host',
			'sys_mail_server.user_name as user_name',
			'sys_mail_server.password as password',
			'sys_mail_server.smtp_auth as smtp_auth',
			'sys_mail_server.smtp_secure as smtp_secure',
			'sys_mail_server.port as port',
			'sys_mail_server.email_sender as email_sender',
			'sys_mail_server.email_name as email_name',
			'sys_mail_server.status as status',
			'sys_mail_server.debug as debug',
			'tstatus.id as tstatus_id',
			'tstatus.status as tstatus_status',
			'tdebug.id as tdebug_id',
			'tdebug.status as tdebug_status',
		
		);
		$this->db->select($afield);
		$this->db->join('sys_status tstatus','tstatus.id=sys_mail_server.status','LEFT'); 
		$this->db->join('sys_status tdebug','tdebug.id=sys_mail_server.debug','LEFT'); 

		$this->db->order_by('sys_mail_server.id', 'ASC');
		return $this->db->get('sys_mail_server')->result();
   }
   
    public function get_active(){
		$afield = array(
			'sys_mail_server.id as id',
			'sys_mail_server.host as host',
			'sys_mail_server.user_name as user_name',
			'sys_mail_server.password as password',
			'sys_mail_server.smtp_auth as smtp_auth',
			'sys_mail_server.smtp_secure as smtp_secure',
			'sys_mail_server.port as port',
			'sys_mail_server.email_sender as email_sender',
			'sys_mail_server.email_name as email_name',
			'sys_mail_server.status as status',
			'sys_mail_server.debug as debug',
			'tstatus.id as tstatus_id',
			'tstatus.status as tstatus_status',
			'tdebug.id as tdebug_id',
			'tdebug.status as tdebug_status',
		
		);
		$this->db->select($afield);
		$this->db->join('sys_status tstatus','tstatus.id=sys_mail_server.status','LEFT'); 
		$this->db->join('sys_status tdebug','tdebug.id=sys_mail_server.debug','LEFT'); 
		$this->db->where('sys_mail_server.status', '1');
		$this->db->order_by('sys_mail_server.id', 'ASC');
		return $this->db->get('sys_mail_server')->row();
   }


	public function get_by_id($id){
		$afield = array(
			'sys_mail_server.id as id',
			'sys_mail_server.host as host',
			'sys_mail_server.user_name as user_name',
			'sys_mail_server.password as password',
			'sys_mail_server.smtp_auth as smtp_auth',
			'sys_mail_server.smtp_secure as smtp_secure',
			'sys_mail_server.port as port',
			'sys_mail_server.email_sender as email_sender',
			'sys_mail_server.email_name as email_name',
			'sys_mail_server.status as status',
			'sys_mail_server.debug as debug',
			'tstatus.id as tstatus_id',
			'tstatus.status as tstatus_status',
			'tdebug.id as tdebug_id',
			'tdebug.status as tdebug_status',
		
		);
		$this->db->select($afield);
		$this->db->join('sys_status tstatus','tstatus.id=sys_mail_server.status','LEFT'); 
		$this->db->join('sys_status tdebug','tdebug.id=sys_mail_server.debug','LEFT'); 

		$this->db->where('sys_mail_server.id', $id);
		$this->db->order_by('sys_mail_server.id', 'ASC');
		return $this->db->get('sys_mail_server')->row();
   }


	/* Memastikan data yg dibuat tidak kembar/sama,
	   fungsi ini sebagai pengganti fungsi primary key dr db,
	   krn primary key sudah di gunakan untuk column id.
	   -create : id di kosongkan.
	   -update : id di isi dengan id data yg di proses.	
	*/	
	function if_exist($id,$data){
		$this->db->where('sys_mail_server.id <>',$id);

		$q = $this->db->get_where('sys_mail_server', $data)->result_array();
		
		if(count($q)>0){
			return true;
		}else{
			return false;
		}		

	

	}


	function insert($data){
	
	    /* transaction rollback */
		$this->db->trans_start();
		
		if($data['status']==1) $this->db->update('sys_mail_server', ['status'=>2]);
		
		$this->db->insert('sys_mail_server', $data);
		
		/* id primary yg baru saja di input*/
		$this->id = $this->db->insert_id(); 
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false
	}

	function update($id,$data){

		/* transaction rollback */
		$this->db->trans_start();
		
		if($data['status']==1) $this->db->update('sys_mail_server', ['status'=>2]);

		$this->db->where('sys_mail_server.id', $id);
		$this->db->update('sys_mail_server', $data);
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
	}

	function delete_multiple($data){
		/* transaction rollback */
		$this->db->trans_start();
		
		if(!empty($data)){
			$this->db->where_in('sys_mail_server.id',$data);	
	
			$this->db->delete('sys_mail_server');
		}
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
		
	}


};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-08-27 17:00:49 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/
