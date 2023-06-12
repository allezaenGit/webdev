<?php
require APPPATH. '/controllers/sistem/GDriveCredential_config.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use ybs\general\Load;
use ybs\general\Validation;
use ybs\general\Storage;

use ybs\http\Request;
use ybs\http\Response;



//untuk menggunakan model Eloquent laravel aktifkan code di bawah ini//
//use model\sys\gdrive\GDriveCredentialModel;


class GDriveCredential extends CI_Controller {
	
	private $tmodel;
    public function __construct(){
        parent::__construct();
		
		 //use this for load all model in folder
		 Load::model("sys/gdrive");
		 
		 $this->tmodel =  new \GDriveCredentialModel();
		 
		 IDCoder::run($this);
    }


	public function index(){
		$breadcrumb = [
			'sistem'			=> site_url("sistem/Pengaturan"),
			'GDriveCredential' 	=>   url(),
			'List Data' 		=>  '',
		];
		
		$data = [
			'breadcrumb'			=> $breadcrumb,
			'title_page_big'		=> 'Daftar GDriveCredential',
			'title'					=> new GDriveCredential_config(),
			'link_refresh_table'	=> url("refresh_table/" . $this->_token ),
			'link_create'			=> url("create"),
			'link_update'			=> url("update"),
			'link_delete'			=> url("delete_multiple"),
			'link_refreshToken'		=> url("refreshToken"),
		];
		
		response()->view('sistem/gdrive/GDriveCredential_list',$data);

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
				
				$row['data'][$x]['token_ready'] = "<span class='text-center badge bg-red'> NOT READY</span>";
				
				if(file_exists("./file_sec/".$val['token_name']))
					$row['data'][$x]['token_ready'] = "<span class='text-center badge bg-green'> READY</span>";
						
				$x++;
			}
			
			response()->dataTables($row);
			

		}else{
			response()->goto('Auth');
		}
	}

	public function create(){
		$breadcrumb =[
			'sistem'			=> site_url("sistem/Pengaturan"),
			'GDriveCredential' 	=>   url(),
			'Create' 		=>  '',
		];
		
		$data =[
			'breadcrumb'			=> $breadcrumb,
			'title_page_big'		=> 'Add Data',
			'title'					=> new GDriveCredential_config(),
			'link_save'				=> url('create_action'),
			'link_back'				=> $this->agent->referrer(),
		];
					

		response()->view('sistem/gdrive//GDriveCredential_form',$data);

	}


	public function create_action(){
		
		$val 	= request();
		
		//use validation MVC
		$valid = Validation::run($val,\GDriveCredentialModel::class);
		
		
		if(!$valid) response()->json(Validation::error());
		
		

		//remove id before insert
		unset($val['id']);
		 
		$token = _generate(time());
		$val['token_name'] = $token;
		
		$success = $this->tmodel->insert($val);
		
		//menyimpan file permanent, 
		//fungsi ini akan bekerja ketika ada file yang di upload	
		FileUpload::save($success);

		response()->json($success);

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
				'sistem'			=> site_url("sistem/Pengaturan"),
				'GDriveCredential' 	=>   url(),
				'Update Data' 		=>  '',
			];
			
			
			$data = array(
				'breadcrumb'			=> $breadcrumb,
				'title_page_big'		=> 'Update Data',
				'title'					=> new GDriveCredential_config(),
				'link_save'				=> url('update_action'),
				'link_back'				=> $this->agent->referrer(),
				'data'					=> $row,
				'id'					=> $id_generate,
			);
			
			response()->view('sistem/gdrive//GDriveCredential_form',$data);
		}else{
			response()->goto($this->agent->referrer());
		}
	}

	public function update_action(){
		
		
		$val 		= request();
		
		$key		= IDCoder::getTempKey($val["id"]);
		
		$val['id']	= IDCoder::decode($val["id"],$key);
		

		$valid = Validation::run($val,\GDriveCredentialModel::class);
		
		if(!$valid) response()->json(Validation::error());
			
		


		$success = $this->tmodel->update($val['id'],$val);
		
		//update file, 
		//fungsi ini akan bekerja ketika ada file yang di upload	
		FileUpload::update($success);
		
		response()->json($success);

	}


	public function refreshToken($id){
		$key = IDCoder::getKey();
		$id =  IDCoder::decode($id,$key);
		
		$row = $this->tmodel->get_by_id($id);
		
		if(!$row) response()->goto("home");
		
		$tokenName  = $row->token_name;
		
		@unlink("./file_sec/$tokenName");
		
		$newToken = _generate(time());
		
		
		$this->tmodel->update($id,['token_name'=>$newToken]);
		
		
		$this->load->library("GoogleDrive",null,"gdrive");
		
	}

	public function delete_multiple(){
		
		$val=request();
		
		$data = explode(',',$val['data_delete']);

		$key = IDCoder::getKey();
		
		$xx=0;
		foreach($data as $value){
			$id =  IDCoder::decode($value,$key);
			
			//delete file permanent, 
			//fungsi ini akan bekerja ketika ada file yang di upload	
			Storage::deleteByID($id,\GDriveCredentialModel::table,[]);
			
			
			
			//menganti ke id asli
			$data[$xx] = $id;
			$xx++;	
		}
		
		//add param 3 false for softdelete
		//ex delete_multiple($data,$this->_user_id,false);
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
		
		
		response()->json($o->result());
	
	}



};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2021-07-04 12:04:25 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

