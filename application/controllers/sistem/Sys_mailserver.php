<?php
require APPPATH. '/controllers/sistem/Sys_mailserver_config.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use ybs\general\Load;
use ybs\general\Validation;
use ybs\general\Storage;

use ybs\http\Request;
use ybs\http\Response;



//untuk menggunakan model Eloquent laravel aktifkan code di bawah ini//
//use model\sys\mail\MailServerModel;


class Sys_mailserver extends CI_Controller {
	
	private $tmodel;
    public function __construct(){
        parent::__construct();
		
		 //use this for load all model in folder
		 Load::model("sys/mail/");
		 
		 $this->tmodel =  new \MailServerModel();
		 
		 IDCoder::run($this);
    }


	public function index(){
		$breadcrumb = [
			'sistem' 			=>   site_url()."sistem/Pengaturan",
			'MailServer' 		=>   url(),
			'List Data' 		=>  '',
		];
		
		$data = [
			'breadcrumb'			=> $breadcrumb,
			'title_page_big'		=> 'Daftar MailServer',
			'title'					=> new MailServer_config(),
			'link_refresh_table'	=> url("refresh_table/" . $this->_token ),
			'link_create'			=> url("create"),
			'link_update'			=> url("update"),
			'link_delete'			=> url("delete_multiple"),
		];
		
		response()->view('sistem/mail/MailServer_list',$data);

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
				
				if($val['smtp_auth']==1){
					$row['data'][$x]['smtp_auth'] = "AKTIF";
				}else{
					$row['data'][$x]['smtp_auth'] = "NON AKTIF";
				}
						
				$row['data'][$x]['smtp_secure']		= strtoupper($val['smtp_secure']);
						
						
				$x++;
			}
			
			response()->dataTables($row,TRUE);
			

		}else{
			redirect('Auth');
		}
	}

	public function create(){
		$breadcrumb =[
			'sistem' 			=>   site_url()."sistem/Pengaturan",
			'MailServer' 	=>   url(),
			'Create' 		=>  '',
		];
		
		$data =[
			'breadcrumb'			=> $breadcrumb,
			'title_page_big'		=> 'Add Data',
			'title'					=> new MailServer_config(),
			'link_save'				=> url('create_action'),
			'link_back'				=> $this->agent->referrer(),
		];
					

		response()->view('sistem/mail/MailServer_form',$data);

	}


	public function create_action(){
		
		$val 	= request();
		
		//use validation MVC
		$valid = Validation::run($val,\MailServerModel::class);
		
		
		if(!$valid)
			response()->json(Validation::result());
		
		

		//remove id before insert
		unset($val['id']);
		 
		$pass =  _encrypt($val['password']);	
		$val['password'] = $pass;	
		
		$success = $this->tmodel->insert($val);
		
		//menyimpan file permanent, 
		//fungsi ini akan bekerja ketika ada file yang di upload	
		FileUpload::save($success);

		$result = Outputview::autoResult($success);
		
		response()->json($result);

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
				'sistem' 			=>   site_url()."sistem/Pengaturan",
				'MailServer' 	=>   url(),
				'Update Data' 		=>  '',
			];
			
			$pass = _decrypt($row->password);	
			$row->password = $pass;
			
			$data = array(
				'breadcrumb'			=> $breadcrumb,
				'title_page_big'		=> 'Update Data',
				'title'					=> new MailServer_config(),
				'link_save'				=> url('update_action'),
				'link_back'				=> $this->agent->referrer(),
				'data'					=> $row,
				'id'					=> $id_generate,
			);
			
			response()->view('sistem/mail/MailServer_form',$data);
		}else{
			redirect($this->agent->referrer());
		}
	}

	public function update_action(){
		
		
		$val 		= request();
		
		$key		= IDCoder::getTempKey($val["id"]);
		
		$val['id']	= IDCoder::decode($val["id"],$key);
		

		$valid = Validation::run($val,\MailServerModel::class);
		
		if(!$valid)
			response()->json(Validation::result());
			
		$pass = _encrypt($val['password']);	
		$val['password'] = $pass;

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
			
			//delete file permanent, 
			//fungsi ini akan bekerja ketika ada file yang di upload	
			Storage::deleteByID($value,\MailServerModel::table,[]);
			
			
			
			//menganti ke id asli
			$data[$xx] = $value;
			$xx++;	
		}
		
		$success = $this->tmodel->delete_multiple($data);
		
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
/* Generated by YBS CRUD Generator 2020-08-27 17:00:49 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

