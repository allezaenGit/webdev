<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bot_Telegram_TrackingModel extends CI_Model {
   public $id;	
   const table = "sys_bot_telegram_tracking_access";
   const rules = [  
  ];
   
   
   
   function __construct(){
        parent::__construct();
   }	
	
	public function json($apiPost=null){
		if($apiPost)
			$this->datatables->injectPost($apiPost);
		
		$this->datatables->select('
			sys_bot_telegram_tracking_access.id as id,
			sys_bot_telegram_tracking_access.chat_id as chat_id,
			sys_bot_telegram_tracking_access.first_name as first_name,
			sys_bot_telegram_tracking_access.last_name as last_name,
			sys_bot_telegram_tracking_access.message as message,
			sys_bot_telegram_tracking_access.date as date,
			sys_bot_telegram_tracking_access.bot_name,
			sys_bot_telegram_tracking_access.time as time,
		');

		if ($this->db->field_exists('delete_at', 'sys_bot_telegram_tracking_access')){
			$this->datatables->where('sys_bot_telegram_tracking_access.delete_at',null);
			$this->datatables->where_post();
			$this->datatables->or_where('sys_bot_telegram_tracking_access.delete_at','0000-00-00 00:00:00');
		}
		
		$this->datatables->from('sys_bot_telegram_tracking_access');

		
		
		//mengembalikan dalam bentuk array
		$q =  json_decode($this->datatables->generate(),true);
		return $q;
	}
	

   public function get_all(){
		$afield = [
			'sys_bot_telegram_tracking_access.id as id',
			'sys_bot_telegram_tracking_access.chat_id as chat_id',
			'sys_bot_telegram_tracking_access.first_name as first_name',
			'sys_bot_telegram_tracking_access.last_name as last_name',
			'sys_bot_telegram_tracking_access.message as message',
			'sys_bot_telegram_tracking_access.date as date',
			'sys_bot_telegram_tracking_access.bot_name',
			
			'sys_bot_telegram_tracking_access.time as time',
		
		];
		
		if ($this->db->field_exists('delete_at', 'sys_bot_telegram_tracking_access')){
			$this->db->where('sys_bot_telegram_tracking_access.delete_at',null);
			$this->db->or_where('sys_bot_telegram_tracking_access.delete_at','0000-00-00 00:00:00');
		}
		
		
		$this->db->select($afield);

		$this->db->order_by('sys_bot_telegram_tracking_access.id', 'ASC');
		return $this->db->get('sys_bot_telegram_tracking_access')->result_array();
   }


	public function get_by_id($id){
		$afield = [
			'sys_bot_telegram_tracking_access.id as id',
			'sys_bot_telegram_tracking_access.chat_id as chat_id',
			'sys_bot_telegram_tracking_access.first_name as first_name',
			'sys_bot_telegram_tracking_access.last_name as last_name',
			'sys_bot_telegram_tracking_access.message as message',
			'sys_bot_telegram_tracking_access.date as date',
			'sys_bot_telegram_tracking_access.bot_name',
			'sys_bot_telegram_tracking_access.time as time',
		
		];
		
		
		
		$this->db->select($afield);

		$this->db->where('sys_bot_telegram_tracking_access.id', $id);
		$this->db->order_by('sys_bot_telegram_tracking_access.id', 'ASC');
		return $this->db->get('sys_bot_telegram_tracking_access')->row();
   }


	/* Memastikan data yg dibuat tidak kembar/sama,
	   fungsi ini sebagai pengganti fungsi primary key dr db,
	   krn primary key sudah di gunakan untuk column id.
	   -create : id di kosongkan.
	   -update : id di isi dengan id data yg di proses.	
	*/	
	function if_exist($id,$data){
		$this->db->where('sys_bot_telegram_tracking_access.id <>',$id);
		
		if ($this->db->field_exists('delete_at', 'sys_bot_telegram_tracking_access')){
			$this->db->where('sys_bot_telegram_tracking_access.delete_at',null);
			$this->db->or_where('sys_bot_telegram_tracking_access.delete_at','0000-00-00 00:00:00');
			$this->db->where('sys_bot_telegram_tracking_access.id <>',$id);
		}
		

		$q = $this->db->get_where('sys_bot_telegram_tracking_access', $data)->result_array();
		
		
		if(count($q)>0){
			return true;
		}else{
			return false;
		}		

	

	}


	function insert($data){
	
	    /* transaction rollback */
		$this->db->trans_start();
		
		$this->db->insert('sys_bot_telegram_tracking_access', $data);		
		/* id primary yg baru saja di input*/
		$this->id = $this->db->insert_id(); 
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false
	}

	function update($id,$data){

		/* transaction rollback */
		$this->db->trans_start();

		$this->db->where('sys_bot_telegram_tracking_access.id', $id);
		$this->db->update('sys_bot_telegram_tracking_access', $data);
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
	}

	function delete_multiple($data,$permanent=true){
		/* transaction rollback */
		$this->db->trans_start();
		
		if(!empty($data)){
			if($permanent){
				$this->db->where_in('sys_bot_telegram_tracking_access.id',$data);	
		
				$this->db->delete('sys_bot_telegram_tracking_access');
			}else{
				$tm = Date('Y-m-d H:i:s',time());
				$this->db->where_in('sys_bot_telegram_tracking_access.id',$data);
				$this->db->update('sys_bot_telegram_tracking_access',['delete_at'=>$tm]);
			}	
		}
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
		
	}


};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2021-04-18 09:27:47 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/
