<?php
require APPPATH. '/controllers/sistem/Developer_config.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use ybs\general\Load;
use ybs\general\Validation;
use ybs\general\Storage;
use ybs\general\APIName;

use ybs\http\Request;
use ybs\http\Response;



//untuk menggunakan model Eloquent laravel aktifkan code di bawah ini//
//use model\sys\api\DeveloperModel;


class Developer extends CI_Controller {
	
	private $tmodel;
    public function __construct(){
        parent::__construct();
		
		 //use this for load all model in folder
		 Load::model("sys/api");
		 
		 $this->tmodel =  new \DeveloperModel();
		 
		 IDCoder::run($this);
    }


	public function index(){
		
		
		$breadcrumb = [
			'sistem'			=> 	site_url() ."sistem/Pengaturan",
			'Developer' 		=>  url(),
			'List Data' 		=>  '',
		];
		
		$data = [
			'breadcrumb'			=> $breadcrumb,
			'title_page_big'		=> 'Daftar Developer',
			'title'					=> new Developer_config(),
			'link_refresh_table'	=> url("refresh_table/" . $this->_token ),
			'link_create'			=> url("create"),
			'link_update'			=> url("update"),
			'link_delete'			=> url("delete_multiple"),
			'link_sendmail'			=> url("sendMail/"),
		];
		
		response()->view('sistem/api/Developer_list',$data);

	}

	public function refresh_table($token){
		if($token==$this->_token){
			
			$row = $this->tmodel->json();
			
			//create key n put in session for encode id
			$key  = IDCoder::createKey();
			
			$x = 0;
			foreach($row['data'] as $val){
				
				$idgenerate = IDCoder::encode($val['id'],$key);
				
				//generate ID		
				$row['data'][$x]['id'] = $idgenerate;
				
				$id_dev = $val['id_dev'];
				$row['data'][$x]['id_dev'] = '<label class="label label-lg label-success " style="font-size:12px">'.$id_dev.'</label>'; 
				
				switch($val['send_activate']){
					case 0:
						if($val['status']==1){
								$row['data'][$x]['send_activate'] = '<span id="label_send_'.$idgenerate.'"><label class="label label-sm label-success "  style="font-size:11px">Dikirim</label></span>'; 
					
						}else{
								$row['data'][$x]['send_activate'] = '<span id="label_send_'.$idgenerate.'" ><label class="label label-sm label-warning "  style="font-size:11px">Belum Dikirim</label></span>'; 
						}
					break;
					
					case 1:
						$row['data'][$x]['send_activate'] = '<span id="label_send_'.$idgenerate.'"><label class="label label-sm label-success "  style="font-size:11px">Dikirim</label></span>'; 
					break;
					
					case 2:
						$row['data'][$x]['send_activate'] = '<span id="label_send_'.$idgenerate.'"><label class="label label-sm label-danger " style="font-size:11px">Gagal</label></span>'; 
					break;
				}
				
				if($val['status']==1){
					$row['data'][$x]['status'] =  '<span ><label class="label label-sm label-success "  style="font-size:11px">Aktif</label></span>';
				}else{
					$row['data'][$x]['status'] =  '<span ><label class="label label-sm label-danger "  style="font-size:11px">Non Aktif</label></span>';
				}
				
						
				$x++;
			}
			
			response()->dataTables($row,TRUE);
			

		}else{
			redirect('Auth');
		}
	}

	public function create(){
		

		$breadcrumb =[
			'sistem'			=> 	site_url() ."sistem/Pengaturan",
			'Developer' 		=>   url(),
			'Create' 			=>  '',
		];
		
		$data =[
			'breadcrumb'			=> $breadcrumb,
			'title_page_big'		=> 'Add Data',
			'title'					=> new Developer_config(),
			'link_save'				=> url('create_action'),
			'link_back'				=> $this->agent->referrer(),
		];
					
		
		response()->view('sistem/api/Developer_form',$data);

	}
	
	
	public function sendMail($id){
		
		
		$key 	= IDCoder::getKey();
		$idGen  =  IDCoder::decode($id,$key);   
		$row = $this->tmodel->get_by_id($idGen);
		
		if($row){
		
			$data= [
				'email' 		=> $row->email,
				'user_name' 	=> $row->name,
				'id_dev'		=> $row->id_dev,
				'logo'			=> $this->_appinfo['template_email_logo'],
				'key'			=> $row->key,
				'expayer'		=> $row->expayer,
				'activate'		=> site_url() . "api/Public_Access/". APIName::RESPONSE_API_DOC_ACTIVATE() ."/" . $row->token_activate ,
			];
			
			$email_template = $this->load->view("template_email/regdev_activate",$data,true);
			
			$this->load->library("MailServer");
			$mail = new MailServer();
			
			$mail->receipt($row->email);
			$mail->subject("Developer Register");
			$mail->message($email_template);
			$success = $mail->send();
		
			$o  = new Outputview();
		
			if($success){
					$update['send_activate'] = 1;
					$this->tmodel->update($idGen,$update);
					$o->success 	= true;
					$o->message		= "Email berhasil di kirim";
			}else{
					$update['send_activate'] = 2;
					$this->tmodel->update($idGen,$update);
					$o->success 	= false;
					$o->message		= "Gagal mengirim email";
			}
			
			response()->json($o);
		
		}else{
			redirect($this->agent->referrer());
		}
		
	}



	public function create_action(){
		
		$val 	= request();
		$timeCreate  = time();
		
			
		$val['id_dev']  		= random_string();
		$val['key']				= random_string("alnum",10);
		$val['create_at']		= date("Y-m-d",$timeCreate);
		$val['token_activate']	= _generate(time());
		
		$expayer = strtotime($val['create_at'] . " +2 day" ) ;
		$val['expayer']			=  date("Y-m-d",$expayer);	
		
		//use validation MVC
		$valid = Validation::run($val,\DeveloperModel::class);
		
		
		if(!$valid)
			response()->json(Validation::error());
		
		

		//remove id before insert
		unset($val['id']);
		 
		$success = $this->tmodel->insert($val);
		
	
		$o  = new Outputview();
		
		if($success){
			$o->success 	= true;
			$o->message		= 'Data berhasil di simpan ! & YOUR ID = " '. $val['id_dev'] .' " ';
		}else{
			$o->success 	= false;
			$o->message		= 'Opps..menyimpan data !!';
		}
		
		
		
		response()->json($o);

	}


	public function update($id){
	
		$id_generate		= $id;
		
		//create Temp Key for protect session if you open another tab in the same time 
		//Temp Key == First Key 
		$key  = IDCoder::createTempKey($id);
		
		$id  =  IDCoder::decode($id,$key);   
		
		$row = $this->tmodel->get_by_id($id);
		
		if($row){
			$breadcrumb =[
				'sistem'			=> 	site_url() ."sistem/Pengaturan",
				'Developer' 	=>   url(),
				'Update Data' 		=>  '',
			];
			
			
			$data = array(
				'breadcrumb'			=> $breadcrumb,
				'title_page_big'		=> 'Update Data',
				'title'					=> new Developer_config(),
				'link_save'				=> url('update_action'),
				'link_back'				=> $this->agent->referrer(),
				'data'					=> $row,
				'id'					=> $id_generate,
			);
			
			response()->view('sistem/api/Developer_form',$data);
		}else{
			redirect($this->agent->referrer());
		}
	}

	public function update_action(){
		
		
		$val 		= request();
		
		$key		= IDCoder::getTempKey($val["id"]);
		
		$val['id']	= IDCoder::decode($val["id"],$key);
		

		$valid = Validation::run($val,\DeveloperModel::class);
		
		if(!$valid)
			response()->json(Validation::error());
			
		


		$success = $this->tmodel->update($val['id'],$val);
		
		//update file, 
		//fungsi ini akan bekerja ketika ada file yang di upload	
		FileUpload::update($success);
		
		$result  = Outputview::autoResult($success);
		
		response()->json($result);

	}

	public function delete_multiple(){
		
		$val=request();
		
		$data = explode(',',$val['data_delete']);

		$key = IDCoder::getKey();
		
		$xx=0;
		foreach($data as $value){
			$value =  IDCoder::decode($value,$key);
			
			//menganti ke id asli
			$data[$xx] = $value;
			$xx++;	
		}
		
		$key = $this->tmodel->getIDDev($data);
		$fkey = array();
		
		$root = str_replace("system\\","",BASEPATH);
		foreach($key as $i){
			$fkey[] = $i->key;
			
			
			$p = $root ."upload_files/api-doc/".  $i->key. ".zip";
			if(file_exists ($p))unlink($p);
		}
		
		$success = $this->tmodel->delete_multiple($data,$fkey);
		
		$o = new Outputview();
		
		//create message
		if($success){
			$o->success 	= true;
			$o->message	= 'Data berhasil di hapus !';
		}else{
			$o->success 	= false;
			$o->message	= 'Opps..Gagal menghapus data !!';
		}
		
		
		response()->json($o);
	
	}



};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-08-25 13:35:46 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

