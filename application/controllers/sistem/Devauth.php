<?php
require APPPATH. '/controllers/sistem/Devauth_config.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use ybs\general\Load;
use ybs\general\Validation;
use ybs\general\Storage;
use ybs\general\APIName;

use ybs\http\Request;
use ybs\http\Response;



//untuk menggunakan model Eloquent laravel aktifkan code di bawah ini//
//use model\Sistemx\DevauthModel;


class Devauth extends CI_Controller {
	
	private $tmodel;
    public function __construct(){
        parent::__construct();
		
		 //use this for load all model in folder
		 Load::model("sys/api");
		 
		 $this->tmodel =  new \DevauthModel();
		 
		 IDCoder::run($this);
    }


	public function index(){
		
		
		$breadcrumb = [
			'sistem'			=> 	site_url() ."sistem/Pengaturan",
			'Dev Authorize' 	=>   url(),
			'List Data' 		=>  '',
		];
		
		$data = [
			'breadcrumb'			=> $breadcrumb,
			'title_page_big'		=> 'Daftar Otorisasi',
			'title'					=> new Devauth_config(),
			'link_refresh_table'	=> url("refresh_table/" . $this->_token ),
			'link_update'			=> url("update"),
			'link_send_email'		=> url("sendMail/"),
		];
		
		response()->view('sistem/api/Devauth_list',$data);

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
				
				$otorisasi = $row['data'][$x]['jumlah_otorisasi'];

				if($otorisasi==null){
					$row['data'][$x]['jumlah_otorisasi'] =  '<span ><label class="label label-sm label-danger "  style="font-size:11px"> 0 </label></span>';
				}else{
					$row['data'][$x]['jumlah_otorisasi'] =  '<span ><label class="label label-sm label-success "  style="font-size:11px">'.$otorisasi.' </label></span>';
				}
				
				
				switch($val['send_documentation']){
					case 0:
						$row['data'][$x]['send_documentation'] = '<span id="label_send_'.$idgenerate.'" ><label class="label label-sm label-warning "  style="font-size:11px">Belum Dikirim</label></span>'; 
					break;
					
					case 1:
						$row['data'][$x]['send_documentation'] = '<span id="label_send_'.$idgenerate.'"><label class="label label-sm label-success "  style="font-size:11px">Dikirim</label></span>'; 
					break;
					
					case 2:
						$row['data'][$x]['send_documentation'] = '<span id="label_send_'.$idgenerate.'"><label class="label label-sm label-danger " style="font-size:11px">Gagal</label></span>'; 
					break;
				}
				
				
						
				$x++;
			}
			
			response()->dataTables($row,TRUE);
			

		}else{
			redirect('Auth');
		}
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
				'Dev Authorize' 	=>   url(),
				'Update Data' 		=>  '',
			];
			
			
			
			$listUrl  = $this->getListUrl($row);
			
			
			$data = array(
				'breadcrumb'			=> $breadcrumb,
				'title_page_big'		=> 'Update Data',
				'title'					=> new Devauth_config(),
				'link_save'				=> url('update_action'),
				'link_back'				=> $this->agent->referrer(),
				'data'					=> $row,
				'id'					=> $id_generate,
				'listUrl'				=> 	json_encode($listUrl),
			);
			
			response()->view('sistem/api/Devauth_form',$data);
		}else{
			redirect($this->agent->referrer());
		}
	}
	
	
	

	public function update_action(){
		
		
		$val 		= request();
		
		$key		= IDCoder::getTempKey($val["id"]);
		
		$val['id']	= IDCoder::decode($val["id"],$key);
		
		$row = $this->tmodel->get_by_id($val['id']);


		if($row){
			
			unset($val['id']);
		
			$id_dev = $row[0]->id_dev;
			
			
			$fdata = array();
			foreach ($val as $i=>$v){
				
				foreach($v as $url){
					$lurl = [
					"key"			=> $id_dev ,
					"all_access"	=> 1,
					"controller"	=> $url
					];
					$fdata[] = $lurl;
				}
				
				
				
			}
			
			$success = $this->tmodel->update($id_dev,$fdata);
			$result  = Outputview::autoResult($success);
		}

		response()->json($result);

	}

	
	private function getListUrl($dataDev){
			$this->load->helper('directory');
			$d_map = directory_map(APPPATH.'/controllers/api/',1);
			
			
			
			
			//$folder_controller = array();
			$file_controller = array();
			$y=0;
			
			foreach($d_map as $key=>$val){
			
				//mendapatkan file controller
				if( $val !=='Public_Access.php' &&					
					substr($val,-1)!==DIRECTORY_SEPARATOR){
					
					$name = str_replace('.php',"",$val);	
					$file_controller[$y]  = $name;
					$y++;
				
				}
			}
		
		
		//looping file		
		$finalData = array();
		foreach($file_controller as $val){
			
			
			$ar = array();
			$this->load->file(APPPATH.'/controllers/api/'.$val.'.php');
			$ar = get_class_methods($val);	
			$filter = [
				"__construct","get_instance","__destruct",
				"_remap","response","set_response",
				"get","options","head","post","put","delete",
				"patch","query","validation_errors"
			];	
			
			$func = array_diff($ar,$filter);
			
			$lurl = array();
			
			
			foreach($func as $v){	
				$url =  "api/" . $val . "/" . $v;
				
				$m = explode("_",$v);
				if(strtolower($m[0])== "index"){
					$lurl["url"] = site_url() . "api/" . $val;
				}else{
					$r = "_" . end($m);
					$furl = str_replace($r,"",$url);
					$lurl["url"] = site_url() . $furl;
				}
				
				$lurl["no"]  = count($finalData)+1;
				$lurl["checked"] = " ";
				$lurl["origUrl"] = $url;
				
				$lurl["file"]= $val;	
				$lurl["method"] = strtoupper(end($m));
				
				
				foreach($dataDev as $dv){
					if($dv->controller== $url )
						$lurl["checked"] = " checked ";
				}
				
				
				$finalData[] = $lurl;
			}
			
			
			
		}	
		
		return $finalData;
		
		
	}
	
	
	public function sendMail($id){
		$key 	= IDCoder::getKey();
		$idGen  =  IDCoder::decode($id,$key);   
		$row = $this->tmodel->get_by_id($idGen);
		
	
		if($row){
		
			$docs = $this->getDocumentation($row);
			//response()->json($docs);
			
			
			if($docs==false){
				$result  = Outputview::autoResult(FALSE);
				response()->json($result);
			}
			
		
			$email = $row[0]->email;	
			$dataEmail = [
				"user_name" 			=> $row[0]->name,
				"logo"  				=> $this->_appinfo['template_email_logo'],
				"appname"				=> $this->_appinfo['appname'],
				"develop_by"			=> $this->_appinfo['develop_by'],
				"develop_contact"		=> $this->_appinfo['develop_contact'],
				"develop_email"			=> $this->_appinfo['develop_email'],
				"link_download_doc"		=> site_url()."api/Public_Access/" . APIName::RESPONSE_API_DOC_DOWNLOAD() . "/".$row[0]->id_dev,
			];
			
			$email_template  = $this->load->view("template_email/notify_send_documentation",$dataEmail,true);
			
			
			//create zip file
			$this->load->library('zip');
			
			$name = 'notify.html';
			$this->zip->add_data($name, $email_template);
			
			$dcontent = [
				"data"					=> $docs,
				"logo"  				=> $this->_appinfo['template_email_logo'],
				"id_dev"				=> $row[0]->id_dev,
				"secret_key"			=> $row[0]->key,
				
			];
			
			$zip_content = $this->load->view("template_email/api_documentation",$dcontent,true);
			
			
			$name = 'api_documentation.html';
			$this->zip->add_data($name, $zip_content);
			
			
			$root = str_replace("system","",BASEPATH);
			$folder = $root ."upload_files/api-doc/";
			
			_createFolder($folder);
			
			$p = $folder. $row[0]->id_dev . ".zip";
			
			
			
			$this->zip->archive($p);
			
			sleep(2);

			$this->load->library("MailServer");
			
			$mail = new MailServer();
			$mail->receipt($email);
			$mail->subject("API Documentation");
			$mail->message($email_template);
			
			
			//$mail->attatch(APPPATH."views/template_email/Api_Documentation.zip","Api_Documentation.zip");
			
			$success = $mail->send();
			
			$o  = new Outputview();
			if($success){
					$update['send_documentation'] = 1;
					$update['send_doc_at']	= date("Y-m-d H:i:s");
					$this->tmodel->updateSendEmail($idGen,$update);
					$o->success 	= true;
					$o->message		= "Email berhasil di kirim";
			}else{
					$update['send_documentation'] = 2;
					$update['send_doc_at']	= date("Y-m-d H:i:s");
					$this->tmodel->updateSendEmail($idGen,$update);
					$o->success 	= false;
					$o->message		= "Gagal mengirim email";
			}
			
			response()->json($o);
			
		}else{
			redirect($this->agent->referrer());
		}	
	}
	
	
	
	

	private function getDocumentation($row){
		//create endpoint list
		$this->load->library('ReadDoc');
		
		$listPoint  = array();
	
		foreach($row as $val){
			if($val->controller==null)
					return false;
			
			$points = explode("/",$val->controller);
			$funcs = end($points);
			
			$controller = str_replace("/".$funcs,"",$val->controller);
			$url = "";
			$ifuncs = explode("_",$funcs);
			
			$method = end($ifuncs);
			$func_name = str_replace("_".$method,"",$funcs);
			
			if(strtolower($ifuncs[0])=="index"){
				$url 	= site_url() . $controller ;  	
			}else{
				$url 	= site_url() . $controller . "/" . $func_name ;  
			}
			
			
			$ic = explode("/",$controller);
			$controller_name = end($ic);
			
			if(!class_exists($controller_name))
				$this->load->file(APPPATH.'/controllers/'.$controller.'.php');
			
			
			ReadDoc::file($controller_name);
			$paramDoc  = ReadDoc::param($funcs);
			
			$old = @$listPoint[$url];
			
			if($old==null){
				$lpoints =[
					//"url" => $url,
					"method"=>$method,
					"doc"	=> $paramDoc,
				];
				$fdataPoint = array();
				$fdataPoint[] = $lpoints;
				$listPoint[$url] = $fdataPoint;
				
			}else{
				$lpoints =[
				//	"url" => $url,
					"method"=>$method,
					"doc"	=> $paramDoc,
				];
				$old[]  = $lpoints;
				$listPoint[$url] = $old;
			}
			

			
		}
		
		return $listPoint;
	}

};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-08-30 13:11:50 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

