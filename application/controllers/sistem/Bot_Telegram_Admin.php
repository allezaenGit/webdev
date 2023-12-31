<?php
require APPPATH. '/controllers/sistem/Bot_Telegram_Admin_config.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bot_Telegram_Admin extends CI_Controller {
   private $log_key,$log_temp,$title;
   function __construct(){
        parent::__construct();
		$this->load->model('sys/Bot_Telegram_Admin_model','tmodel');
		$this->log_key ='log_Bot_Telegram_Admin';
		$this->title = new Bot_Telegram_Admin_config();
   }


	public function index(){
		$breadcrumb =array();
		$breadcrumb['sistem']			= site_url(). 'sistem/Pengaturan';
		$breadcrumb['Bot Telegram']		= site_url(). 'sistem/Bot_Telegram';
		$breadcrumb['Bot Admin']		= site_url(). 'sistem/Bot_Telegram_Admin';
		
		$menu = $this->load->view('sistem/bot_manager/Telegram_menu',['selected'=> 'set_bot_admin'],true);
		
		$data = array(
			'breadcrumb'			=> $breadcrumb,
			'title_page_big'		=> 'Set Bot Admin',
			'title'					=> $this->title,
			'link_refresh_table'	=> site_url().'sistem/Bot_Telegram_Admin/refresh_table/'.$this->_token,
			'link_delete'			=> site_url().'sistem/Bot_Telegram_Admin',
			'link_update'			=> site_url().'sistem/Bot_Telegram_Admin/update',
			'menu'					=> $menu,
		);
		
		$this->template->load('sistem/bot_manager/Telegram_Admin_list',$data);
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

	// public function create(){
		// $data = array(
			// 'title_page_big'		=> 'Buat Baru',
			// 'title'					=> $this->title,
			// 'link_save'				=> site_url().'sistem/Bot_Telegram_Admin/create_action',
			// 'link_back'				=> $this->agent->referrer(),			
		// );
		
		// $this->template->load('sistem/bot_manager/Telegram_Admin_form',$data);

	// }

	// public function create_action(){
		// $data 	= $this->input->post('data_ajax',true);
		// $val	= json_decode($data,true);
		// $o		= new Outputview(); 

		// /* 
		// *	untuk mengganti message output
		// * tambahkan perintah : $o->message = 'isi pesan'; 
 		// * sebelum perintah validasi.
		// * ex.
		// * 	$o->message = 'halo ini pesan baru';
		// * 	if(!$o->not_empty($val['descriptions'],'#descriptions')){
		// *		echo $o->result();	
		// *		return;
		// *  	}
		// *
		// */	

		////mencegah data kosong
		// if(!$o->not_empty($val['id_bot'],'#id_bot')){
			// echo $o->result();	
			// return;
		// }

		////mencegah data kosong
		// if(!$o->not_empty($val['name'],'#name')){
			// echo $o->result();	
			// return;
		// }

		////mencegah data double
		// $field=array('name'=>$val['name']);
		// $exist = $this->tmodel->if_exist('',$field);
		// if(!$o->not_exist($exist,'#name')){
			// echo $o->result();	
			// return;
		// }

		// unset($val['id']);
		// $success = $this->tmodel->insert($val);
		// echo $o->auto_result($success);

	// }

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
			$breadcrumb =array();
			$breadcrumb['sistem']			= site_url(). 'sistem/Pengaturan';
			$breadcrumb['Bot Telegram']		= site_url(). 'sistem/Bot_Telegram';
			$breadcrumb['Bot Admin']		= site_url(). 'sistem/Bot_Telegram_Admin';
			$breadcrumb['Update Data']		= '';
			
			$data = array(
				'breadcrumb'			=> $breadcrumb,
				'title_page_big'		=> 'Update Bot Admin',
				'title'					=> $this->title,
				'link_save'				=> site_url().'sistem/Bot_Telegram_Admin/update_action',
				'link_back'				=> $this->agent->referrer(),
				'data'					=> $row,
				'id'					=> $id_generate,
			);
			
			$this->template->load('sistem/bot_manager/Telegram_Admin_form',$data);
		}else{
			redirect($this->agent->referrer());
		}
	}

	public function update_action(){
		$data 	= $this->input->post('data_ajax',true);
		$val	= json_decode($data,true);
		$this->log_temp		= $this->session->tempdata($val['id']);
		$val['id']				= _decode_id($val['id'],$this->log_temp);
		
		$o		= new Outputview(); 
			
		
	
		
		$data = $val['id_bot'];
		$field=array('id_bot'=>$data);

		$success = $this->tmodel->update($val['id'],$field);
		echo $o->auto_result($success);

	}

	



};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-01-16 14:35:43 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

