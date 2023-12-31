<?php
require APPPATH. '/controllers/sistem/Bot_Telegram_Service_CMD_config.php';
use ybs\general\Storage;
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bot_Telegram_Service_CMD extends CI_Controller {
   private $log_key,$log_temp,$title;

   function __construct(){
        parent::__construct();
		$this->load->model('sys/Bot_Telegram_Service_CMD_model','tmodel');
		$this->log_key ='log_Bot_Telegram_Service_CMD';
		$this->title = new Bot_Telegram_Service_CMD_config();
   }


	public function index(){
		$breadcrumb	=array();
		$breadcrumb['sistem'] 		= site_url().'sistem/Pengaturan';
		$breadcrumb['Bot Telegram'] = site_url().'sistem/Bot_Telegram';
		$breadcrumb['Command Bot']  = site_url().'sistem/Bot_Telegram_Service_CMD';
		
		$menu = $this->load->view('sistem/bot_manager/Telegram_menu',['selected'=> 'command_bot'],true);
		
		$data = array(
			'breadcrumb'			=> $breadcrumb,				
			'title_page_big'		=> 'Command Bot',
			'title'					=> $this->title,
			'link_refresh_table'	=> site_url().'sistem/Bot_Telegram_Service_CMD/refresh_table/'.$this->_token,
			'link_create'			=> site_url().'sistem/Bot_Telegram_Service_CMD/create',
			'link_update'			=> site_url().'sistem/Bot_Telegram_Service_CMD/update',
			'link_delete'			=> site_url().'sistem/Bot_Telegram_Service_CMD/delete_multiple',
			
			'menu'					=> $menu
		);
		
		$this->template->load('sistem/bot_manager/Telegram_Service_CMD_list',$data);
	}

	public function refresh_table($token){
		
		
		
		if($token==$this->_token){
			
			$row = $this->tmodel->json();
			
			//encode id 
			$tm = time();
			$this->session->set_userdata($this->log_key,$tm);
			$x = 0;
			foreach($row['data'] as $val){
				$idgenerate = _encode_id($val['id'],$tm);
				$row['data'][$x]['id'] = $idgenerate;
				
				if($val['tservice_name']=="" ||$val['tservice_name']==null){
					$row['data'][$x]['tservice_name'] = '<span class="tag tag-red" style="font-size:10px">has been remove !</span>';
				}
				
				$row['data'][$x]['message']=htmlspecialchars($val['message']);
				
				$x++;
			}
			
			$o = new Outputview();
			$o->success	= 'true';
			$o->serverside	= 'true';
			$o->message	= $row;
			
			echo $o->result();
			

		}else{
			redirect('Auth');
		}
	}
	
	
	

	public function create(){
		$breadcrumb	=array();
		$breadcrumb['sistem'] 		= site_url().'sistem/Pengaturan';
		$breadcrumb['Bot Telegram'] = site_url().'sistem/Bot_Telegram';
		$breadcrumb['Command Bot']  = site_url().'sistem/Bot_Telegram_Service_CMD';
		$breadcrumb['Add Data']  	= '';
		
		
		//get emoji
		$emo = $this->db->get("sys_emoji")->result();
		
		$data = array(
			'breadcrumb'			=> $breadcrumb,		
			'title_page_big'		=> 'Tambah Data',
			'title'					=> $this->title,
			'link_save'				=> site_url().'sistem/Bot_Telegram_Service_CMD/create_action',
			'link_back'				=> $this->agent->referrer(),
			'link_test'				=> site_url().'sistem/Bot_Telegram_Service_CMD/test_output',
			'emo'					=> $emo,		
		);
		
		$this->template->load('sistem/bot_manager/Telegram_Service_CMD_form',$data);

	}

	public function create_action(){
		$data 	= $this->input->post('data_ajax',true);
		$message   = $this->input->post('message',false);
		$val	= json_decode($data,true);
		$o		= new Outputview(); 
		
		
		$val["message"]= $message;
		
		
		/* 
		*	untuk mengganti message output
		* tambahkan perintah : $o->message = 'isi pesan'; 
 		* sebelum perintah validasi.
		* ex.
		* 	$o->message = 'halo ini pesan baru';
		* 	if(!$o->not_empty($val['descriptions'],'#descriptions')){
		*		echo $o->result();	
		*		return;
		*  	}
		*
		*/	
		
		
		//mencegah data kosong
		
		if(!$o->not_empty($val['id_service'],'#id_service')){
			$o->message="Service belum di pilih !";
			echo $o->result();	
			return;
		}
		
		//mencegah data kosong
		$desc = $val['name'] ;
		$val['name'] = str_replace("-","",$desc );
		if(!$o->not_empty($val['name'],'#name')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('name'=>$val['name'],"id_service"=>$val['id_service']);
		$exist = $this->tmodel->if_exist('',$field);
		if(!$o->not_exist($exist,'#name')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		$desc = $val['descriptions'] ;
		$val['descriptions'] = str_replace("-","",$desc );
		if(!$o->not_empty($val['descriptions'],'#descriptions')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['message'],'#message')){
			echo $o->result();	
			return;
		}

	

		unset($val['id']);
		
		//set to lowercase
		$cmd = $val['name'];
		$cmd = strtolower($cmd);
		$cmd = preg_replace('/[^a-z0-9_]/', "", $cmd);
		$val['name']  = $cmd;
		$success = $this->tmodel->insert($val);
		echo $o->auto_result($success);

	}

	public function update($id){
		$id 				= $this->security->xss_clean($id);
		$id_generate		= $id;
		
		/** proses decode id 
		* important !! tempdata digunakan sbagai antisipasi
		* perubahan session saat membuka tab baru secara bersamaan
		**/
		$this->log_temp	= $this->session->userdata($this->log_key);
		$this->session->set_tempdata($id,$this->log_temp,300);
		
		//mengembalikan id asli
		$id = _decode_id($id,$this->log_temp);
		
		$row = $this->tmodel->get_by_id($id);
		
		if($row){
			$breadcrumb	=array();
			$breadcrumb['sistem'] 		= site_url().'sistem/Pengaturan';
			$breadcrumb['Bot Telegram'] = site_url().'sistem/Bot_Telegram';
			$breadcrumb['Command Bot']  = site_url().'sistem/Bot_Telegram_Service_CMD';
			$breadcrumb['Add Data']  	= '';
			
			//get emoji
			$emo = $this->db->get("sys_emoji")->result();
			
			$data = array(
			'breadcrumb'			=> $breadcrumb,	
				'title_page_big'		=> 'Update Data',
				'title'					=> $this->title,
				'link_save'				=> site_url().'sistem/Bot_Telegram_Service_CMD/update_action',
				'link_back'				=> $this->agent->referrer(),
				'data'					=> $row,
				'id'					=> $id_generate,
				'link_test'				=> site_url().'sistem/Bot_Telegram_Service_CMD/test_output',	
				'emo'					=> $emo,	
			);
			
			$this->template->load('sistem/bot_manager/Telegram_Service_CMD_form',$data);
		}else{
			redirect($this->agent->referrer());
		}
	}
	
	
	public function test_output(){
		$data 	= $this->input->post('data_ajax',true);
		$message   = $this->input->post('message',false);
		$val	= json_decode($data,true);
		
		$val["message"]= $message;
		
		$o		= new Outputview(); 
		if($val['id_bot']=="" || $val['id_bot']=="null"){
			$o->success = "false";
			$o->message = "Pilih Bot Testing Terlebih dahulu";
			echo $o->result();
			return;
		}
		
		
		
		$this->load->model("sys/Bot_Telegram_Register","botReg");
		$bot_data =  $this->botReg->get_by_id($val['id_bot']);
		
		$bot = $this->YbsTelegram;
	
		$success = $bot->sendMessage($val['message'],$bot_data->token, $bot_data->chat_id);

		if($success){
			$o->success = "true";
			$o->message = "data di kirim ke bot " . $bot_data->name;
		}else{
			$o->success = "false";
			$o->message = "data di kirim ke bot " . $bot->getErrorMessage();
		}	
		
		echo $o->result();
		
			
	}

	public function update_action(){
		$data 	= $this->input->post('data_ajax',true);
		$message   = $this->input->post('message',false);
		$val	= json_decode($data,true);
		$val["message"]= $message;
		
		
		
		
		$this->log_temp			= $this->session->tempdata($val['id']);
		$val['id']				= _decode_id($val['id'],$this->log_temp);
		
		$o		= new Outputview(); 
			
		/* 
		*	untuk mengganti message output
		* tambahkan perintah : $o->message = 'isi pesan'; 
 		* sebelum perintah validasi.
		* ex.
		* 	$o->message = 'halo ini pesan baru';
		* 	if(!$o->not_empty($val['descriptions'],'#descriptions')){
		*		echo $o->result();	
		*		return;
		*  	}
		*
		*/			

		//mencegah data kosong
		$desc = $val['name'] ;
		$val['name'] = str_replace("-","",$desc );
		if(!$o->not_empty($val['name'],'#name')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		// $field=array('name'=>$val['name'],"id_service"=>$val['id_service']);
		// $exist = $this->tmodel->if_exist($val['id'],$field);
		// if(!$o->not_exist($exist,'#name')){
			// echo $o->result();	
			// return;
		// }

		//mencegah data kosong
		$desc = $val['descriptions'] ;
		$val['descriptions'] = str_replace("-","",$desc );
		if(!$o->not_empty($val['descriptions'],'#descriptions')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['message'],'#message')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['id_service'],'#id_service')){
			$o->message="Service belum di pilih !";
			echo $o->result();	
			return;
		}

		//set to lowercase
		$cmd = $val['name'];
		$cmd = strtolower($cmd);
		$cmd = preg_replace('/[^a-z0-9_]/', "", $cmd);
		$val['name']  = $cmd;		
		
		$success = $this->tmodel->update($val['id'],$val);
		echo $o->auto_result($success);

	}

	public function delete_multiple(){
		$data=$this->input->get('data_ajax',true);
		$val=json_decode($data,true);
		$data = explode(',',$val['data_delete']);

		//get key generate
		$log_id = $this->session->userdata($this->log_key);
		$xx=0;
		foreach($data as $value){
			$value =  _decode_id($value,$log_id);
			//menganti ke id asli
			$data[$xx] = $value;
			$xx++;	
		}
		
		$success = $this->tmodel->delete_multiple($data);
		
		$o = new Outputview();
		
		//create message
		if($success){
			$o->success 	= 'true';
			$o->message	= 'Data berhasil di hapus !';
		}else{
			$o->success 	= 'false';
			$o->message	= 'Opps..Gagal menghapus data !!';
		}
		
		
		echo $o->result();
	
	}



};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2019-12-18 05:31:34 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

