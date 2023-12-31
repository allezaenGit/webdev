<?php
require APPPATH. '/controllers/sistem/User_Log_config.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_Log extends CI_Controller {
   private $log_key,$log_temp,$title;
   function __construct(){
        parent::__construct();
		$this->load->model('sys/User_Log_model','tmodel');
		$this->log_key ='log_User_Log';
		$this->title = new User_Log_config();
   }


	public function index(){
		
		$breadcrumb = array();
		$breadcrumb['sistem'] 		= site_url() . "sistem/Pengaturan";
		$breadcrumb['User Log'] 	= site_url() . "sistem/User_Log";
		$breadcrumb['List Data'] 	= "";
		
		$data = array(
			'breadcrumb'			=> $breadcrumb,
			'title_page_big'		=> 'User Log',
			'title'					=> $this->title,
			'link_refresh_table'	=> site_url().'sistem/User_Log/refresh_table/'.$this->_token,
			'link_create'			=> site_url().'sistem/User_Log/create',
			'link_update'			=> site_url().'sistem/User_Log/update',
			'link_delete'			=> site_url().'sistem/User_Log/delete_multiple',
			'link_detail'			=> site_url().'sistem/User_Log/detail/',
			'link_empty'			=> url("emptyTable/".$this->_token),
		);
		
		$this->template->load('sistem/keamanan/User_Log_list',$data);
	}

	public function refresh_table($token){
		if($token==$this->_token){
			$row = $this->tmodel->json();
			
			//encode id 
			$tm = time();
			$this->session->set_userdata($this->log_key,$tm);
			$x = 0;
			
			
			
			foreach($row['data'] as $val){
				
				$total_access_url = $this->tmodel->get_total_access_url($val['id']);
				$row['data'][$x]['total_access'] =$total_access_url;
				
				$idgenerate = _encode_id($val['id'],$tm);
				$row['data'][$x]['id'] = $idgenerate;
			
				$img_name= $this->_token. $this->_separator_a .$row['data'][$x]['picture'] ;
				$nmuser=$row['data'][$x]['nmuser'];
				$row['data'][$x]['nmuser'] = '<div class="user-block text-center"><img class="img-circle  " src="'.site_url().'/YbsService/get_picture/'.$img_name.'"> </img></div>'.$nmuser;
				
				if($row['data'][$x]['os']=='Unknown Platform'){
					$row['data'][$x]['os']='<span class="label label-red" style="font-size:10px">Unknown Platform !</span>';
				}
				
				
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
	
	public function detail($id){
		$id 				= $this->security->xss_clean($id);
		$id_generate		= $id;
		
		/** proses decode id 
		* important !! tempdata digunakan sbagai antisipasi
		* perubahan session saat membuka tab baru secara bersamaan
		**/
		$this->log_temp	= $this->session->userdata($this->log_key);
	
		
		//mengembalikan id asli
		$id = _decode_id($id,$this->log_temp);
		$this->load->model('sys/User_Log_detail_model','tdetail');
		
		
		$row = $this->tdetail->get_by_idlogin($id);
		
		$x=0;
		foreach($row as $val){
			if($val->os_access=="Unknown Platform"){
				$row[$x]->os_access = '<span class="tag tag-red" style="font-size:10px">Unknown Platform !</span>';
			}
			$x++;
		} 
		
		
		$breadcrumb = array();
		$breadcrumb['sistem'] 		= site_url() . "sistem/Pengaturan";
		$breadcrumb['User Log'] 	= site_url() . "sistem/User_Log";
		$breadcrumb['Detail Aktifitas'] 	= "";
		
		$d = array();
		$d['breadcrumb']		= $breadcrumb;
		$d['title_page_big'] 	= "Detail Aktifitas";
		$d['row']				= $row;
		
		$this->template->load('sistem/keamanan/User_Log_detail',$d);
		
		
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
	
	public function emptyTable($token){
		if($token==$this->_token){
			
			$this->load->model("sys/YbsService_Model","tservice");
			$this->tservice->emptyTable('sys_user_log_login');
			$this->tservice->emptyTable('sys_user_log_accessuri');
			
			response()->json("ok");	
		}
	}




};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2019-11-06 22:33:12 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

