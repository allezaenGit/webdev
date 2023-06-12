<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use ybs\general\Load;
use ybs\general\Storage;
use ybs\general\Separator;
use Mike42\Escpos\EscposImage;

use Mike42\Escpos\CapabilityProfile;

use ybs\printThermal\YbsPrinter;
use ybs\printThermal\PrintConnectors\YbsPrintConnector;
use ybs\printThermal\PrintConnectors\WindowsPrintConnectorDirect;

class Public_Access extends CI_Controller {
    
	public function __construct() {
        parent::__construct();
		
    }
	
	
/*##############################################################*/
/*	  						WARNING !! 				  		  	*/
/*	Class ini dapat diakses langsung tanpa melalui 			  	*/	
/*  proses filter / verifikasi request,,tanpa melalui Login	  	*/
/*																*/	
/*				JANGAN MELAKUKAN HAL DI BAWAH INI	:		  	*/
/*	1. Membuat Function Upload,Update,Delete File				*/
/*	2. Membuat Function Insert,Update,Delete DataBase			*/
/*	3. Membuat Function untuk mengambil informasi penting		*/
/*	4. Membuat Function untuk mengambil data dalam jumlah besar	*/
/*							WARNING !! 							*/
/*##############################################################*/
public function get_logo_login($img=null){
				$path	= "./images/logo/".$this->_appinfo['login_logo'];
				$this->download($path,$img);
}
	
public function get_logo_template($img=null){
				$path	= "./images/logo/".$this->_appinfo['template_logo'];
				$this->download($path,$img);
}

public function get_logo_title_bar($img=null){
				$path	= "./images/logo/".$this->_appinfo['logo_title_bar'];
				$this->download($path,$img);
}





/* getFile
* Fungsi ini di pakai untuk mendapatkan akses file yang di upload
*/
public function getFile($img=""){
	
	//note jangan mengganti angka ini 
	$data = explode(Separator::ACCESS_FILE_UPLOAD,$img);
	$time = $data[0];
	$name = @$data[1];
	$time= str_replace("file.","",$time);
	$a = Storage::getFiles($time);
	
	if(@$a[0]->external_url){
		$this->download($a[0]->path,$name);
	}else{
		response()->goto(site_url());
	}
	
	
}

private function download($path,$name){
		
	$ext 	= pathinfo($path, PATHINFO_EXTENSION);
	// Quick check to verify that the file exists
				
	if( !file_exists($path) ) die("File not found");
	
		$this->load->helper('download');
		$f= file_get_contents($path);
		if(!$name){
			$name = time().".".$ext;
		}
		force_download($name ,$f,TRUE);
}




/* WARNING!! JANGAN MERUBAH NAMA FUNCTION INI
* Fungsi ini di akses oleh google drive api
*/
public function gdrive_aXmqpMdcdDaoPfsdzUiadCdBczzcBqorGdjKKluroo($data=null){
	$google = @$_SERVER['HTTP_REFERER']  ;
	$code = $this->input->get('code',true);


	
	if($google !=="https://accounts.google.com/") response()->goto(site_url());
	if(!$code)response()->goto(site_url());
	
	require APPPATH . '/vendor/autoload.php';
	
	$this->load->model("sys/gdrive/GDriveCredentialModel");
	$tdrive = new GDriveCredentialModel();
	$credit = $tdrive->get_active();
	
	$tokenPath =  './file_sec/'.$credit->token_name;
	

	
	
	$client = new Google_Client();
    $client->setApplicationName('Google Drive API YBS Sistem');
    $client->setScopes('https://www.googleapis.com/auth/drive'); 
	$client->setAuthConfig( $credit->path_credential);
	$client->setAccessType('offline');
    $client->setPrompt('select_account consent');
	
	$accessToken  = $client->fetchAccessTokenWithAuthCode($code);
	$client->setAccessToken($accessToken);

	// Save the token to a file.
	if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
	}
	file_put_contents($tokenPath, json_encode($client->getAccessToken()));
	
	echo "Token Created..go back to <a href='". site_url() ."' >Home Page</a>";
	
}

public function google_login(){
	$this->load->library("GoogleLogin","","glogin");
	$this->glogin->login();
}


/* WARNING!! JANGAN MERUBAH NAMA FUNCTION INI
* Fungsi ini di akses oleh google api
*/
public function glogin_aXmqpMdcdDaoPfsdzUiadCdBczzcBqorGdjKKluroo($data=null){
	$google = @$_SERVER['HTTP_REFERER']  ;
	$code = $this->input->get('code',true);

	// dd($code);
	
	//if($google !=="https://accounts.google.com/" && $google !== site_url() ) response()->goto(site_url());
	if(!$code)response()->goto(site_url());
	
	require APPPATH . '/vendor/autoload.php';
	
	$this->load->model("sys/gdrive/GDriveCredentialModel");
	$tdrive = new GDriveCredentialModel();
	$credit = $tdrive->get_active();
	
	$client = new Google_Client();
    $client->setApplicationName('Google Login YBS Sistem');
    $client->addScope('email');
	$client->addScope('profile');
	$client->setAuthConfig( $credit->path_credential);

	
	$accessToken  = $client->fetchAccessTokenWithAuthCode($code);
	$client->setAccessToken($accessToken);

	$google_service = new Google_Service_Oauth2($client);
	

	$info_user = $google_service->userinfo->get();
	// dd($info_user);
	if(!$info_user['verifiedEmail'])  response()->goto(site_url());
	
	$this->load->model('sys/Authorization', 'model');
	$data_user = $this->model->getAllUser($info_user['email']);

	// dd($data_user);
	// dd($data_user[0]['passuser']);

	// $element_value['nmuser']= $info_user['email'];
	// $element_value['passuser']= @$data_user[0]['passuser'];

	$element_value['nmuser'] = $info_user['email'];
	$element_value['passuser'] = _generate($info_user['email']);

	if(@$data_user[0]['passuser']) $element_value['passuser'] = $data_user[0]['passuser'];


	// $element_value['passuser']= _generate($info_user['email']);
	// $element_value['passuser']= _generate(date('dmy'));
	// $element_value['nmuser']= $dataRegister->user_name;
	// $element_value['passuser']= $dataRegister->passuser;

	// Insert Value to sys_user
	// $val 	= request();
	$user['nmuser']				= $element_value['nmuser'];
	$user['passuser']			= $element_value['passuser'];
	$user['opt_level']			= 17;
	$user['opt_status']			= 1;
	$user['picture']			= '_profile3.png';
	$user['skin']				= 'skin-green';
	$user['create_at']			= _indonesia_date(time());
	$user['registration_date']	= _indonesia_date(time());

	//Lakukan pengecekan username atau email ganda
	$field=array();
	$field['nmuser'] =$element_value['nmuser'];

	$this->load->model('sys/Authorization', 'model');
	$exist = $this->model->if_exist('',$field);
	if($exist){
		// response()->goto("Home");
		$this->load->model('sys/Authorization', 'model');
		$data_token = $this->model->get_token($element_value);
		
		// dd($element_value);
		
		if(!$data_token)response()->goto(site_url());

		$this->session->set_userdata('token', $data_token['token']);
		$this->session->set_userdata('logtime', $data_token['time']);
							
		//menghapus log_logx sebagai penanda sukses login
		//log_lox ini di baca juga pada core controller
		$this->session->unset_userdata('log_logx');
		$this->session->unset_userdata('login_loop');
							
		//create log login
		$this->load->model('sys/Sys_user_log_model','log_login');
							
		$log_data = array();
		$log_data['id_user'] 		=   $data_token['iduser'];
		$log_data['login_time'] 	=	$data_token['time'];
		$log_data['ip'] 			=	$this->input->ip_address();
		$log_data['browser'] 		=	$this->get_browser_client();
		$log_data['os']				=   $this->agent->platform(); 
							
		$this->log_login->create_log_login($log_data);
							
		$this->session->set_userdata('idlogin',$this->log_login->id);
		response()->goto("Home");		

	}else{
		//Fungsi insert Username Baru
		$this->db->insert("sys_user",$user);

		// response()->goto("Home");
		$this->load->model('sys/Authorization', 'model');
		$data_token = $this->model->get_token($element_value);
		
		//dd($data_token);
		
		if(!$data_token)response()->goto(site_url());

		$this->session->set_userdata('token', $data_token['token']);
		$this->session->set_userdata('logtime', $data_token['time']);
							
		//menghapus log_logx sebagai penanda sukses login
		//log_lox ini di baca juga pada core controller
		$this->session->unset_userdata('log_logx');
		$this->session->unset_userdata('login_loop');
							
		//create log login
		$this->load->model('sys/Sys_user_log_model','log_login');
							
		$log_data = array();
		$log_data['id_user'] 		=   $data_token['iduser'];
		$log_data['login_time'] 	=	$data_token['time'];
		$log_data['ip'] 			=	$this->input->ip_address();
		$log_data['browser'] 		=	$this->get_browser_client();
		$log_data['os']				=   $this->agent->platform(); 
							
		$this->log_login->create_log_login($log_data);

		$data= [
			'user_name' 	=> $user['nmuser'],
			'password' 		=> $user['passuser'],
			// 'password' 		=> date('dmy'),
		];
		$email_template = $this->load->view("template_email/register_psb",$data,true);

		$this->load->library("MailServer");
			$mail = new MailServer();
			$mail->receipt($field['nmuser']);
			$mail->subject("PSB - Pondok Pesantren Al-Falah");
			$mail->message($email_template);
			$success = $mail->send();
							
		$this->session->set_userdata('idlogin',$this->log_login->id);
		response()->goto("Home");
	}

	
}

/* WARNING!! JANGAN MERUBAH NAMA FUNCTION INI
* Fungsi ini di pakai untuk mendaftarkan IP Address pengguna
* Agar dapat mengakses WebApp dalam kondisi Maintenance	
*/
public function mntc_aXmqpMdcWaoPffGNmzUiadCdBcbdcBqorAuroo($data=null){
		
		$data = str_replace([".com",".id",".co.id"],"",$data);
		
		$key = $this->security->xss_clean($data);
	
		$this->load->model('sys/Sys_maintenance_model','maintenance');
		
		$m = $this->maintenance->get_time_maintenance();
		
		if($key==$m->key){
			
				$this->session->unset_userdata('maintenance_ipreg');
				
				$this->load->model('sys/Register_ip_model','register');

				$dip = array('ip_address'=> $_SERVER['REMOTE_ADDR'] );
				
				$exist = $this->register->if_exist(null,$dip);
				
				if(!$exist) $this->register->insert($dip);
				
				response()->goto(site_url());	
		
		}else{
			$count = $this->session->userdata('maintenance_ipreg');
			$count ++;
			
			
			if($count <= 3)$this->session->set_userdata('maintenance_ipreg',$count );
					
			if($count > 3) {
				sleep(20);
				$this->session->unset_userdata('maintenance_ipreg');
			}	
		
			response()->goto(site_url());
			
		}
		
		
}


/* WARNING!! JANGAN MERUBAH NAMA FUNCTION INI
* Fungsi ini di pakai untuk mendownload API DOC
*/
public function api_doc_download_aXmdkjiIuyyhsnkkoss49saa6jasbdbjasbd68B4Au5o6o($data=null){
	$val = $this->security->xss_clean($data);
	$this->load->model('sys/api/DeveloperModel','devmodel');
	
	$row = $this->devmodel->get_by_IDDev($val);
	
	if($row){
		$path	= "./upload_files/api-doc/$val" . ".zip";
		$this->download($path,"Api_Documentation.zip");
	}else{
		response()->goto(site_url());
	}
	
}



/* WARNING!! JANGAN MERUBAH NAMA FUNCTION INI
* Fungsi ini di pakai untuk validasi Link Registrsi Developer
* dalam penggunaan API
*
*/
public function api_doc_activate_aX3qpMdcWdjy8ujkd9860ksbssjda8769aoPf508dCdBcbdcBqo45uro8($data=null){
	$val = $this->security->xss_clean($data);
	
	
	$this->config->load('rest');
	
	Load::model("sys/api");

	$tmodel = new DeveloperModel();
	
	$dateActivate = date("Y-m-d",time());
	
	//check token & expayer date
	$row = $tmodel->isValidToken($val,$dateActivate);

	if($row==false){
		$this->load->view("errors/html/error404");
	}else{
		$dateActivate = date("Y-m-d H:m:s",time());
		$status = [
			'status'=>1,
			'activate_at'=>$dateActivate
		];
		$tmodel->update($row->id,$status);
		
		$data= [
				'email' 		=> $row->email,
				'user_name' 	=> $row->name,
				'id_dev_name'	=> $this->config->item("rest_key_name"),
				'id_dev'		=> $row->id_dev,
				'key'			=> $row->key,
				'logo'			=> $this->_appinfo['template_email_logo'],
			];
		
			$email_template = $this->load->view("template_email/regdev_complite",$data,true);
			
			$this->load->library("MailServer");
			$mail = new MailServer();
			
			$mail->receipt($row->email);
			$mail->subject("Developer Register");
			$mail->message($email_template);
			$success = $mail->send();
		
		
			
			echo "Registration complite..check your email for detail information..!..";
		
		
		
	}

	
}


/* WARNING!! JANGAN MERUBAH NAMA FUNCTION INI
* Fungsi ini di pakai untuk validasi Link Registrsi User
* dalam penggunaan API
*
*/
public function api_user_reg_mdxsJkjiYHksbssjda8769aoPf508dCdBcbdcBqo45uro8($data=null){
	$val = $this->security->xss_clean($data);
	
	
	Load::model("masterdata");
	

	$tmodel = new Registrasi_pelaporModel();
	
	$dateActivate = date("Y-m-d H:i:s",time());

	//check token & expayer date
	$row = $tmodel->isValidToken($val,$dateActivate);
	
	if($row==false){
		$this->load->view("errors/html/error404");
	}else{
	
		
		$tmodel->update_status($row);

			
		$dx['fparent'] = "";
		
		$datab = array();
		$datab['content_body'] = $this->load->view("front-end/register/Registrasi_pelapor_active",$dx,true);
		$this->load->view("front-end/register/Style2",$datab);
		
		
		
	}

	
}



// public function fb9863324djy8ujkd986029sjHysggMkjujkd9860ksbssjda8769aoP($name){
	
	// if (isset($_GET['hub_verify_token'])) { 
		// if ($_GET['hub_verify_token'] === 'kdjusj8388474jmnjLKkheennji339765') {
			// echo $_GET['hub_challenge'];
			
			// file_put_contents(
			  // 'log.txt',
			  // "\n" . file_get_contents('php://input'),
			  // FILE_APPEND
			// );
			
			// return;
		// } else {
			// echo 'Invalid Verify Token';
			// return;
		// }
	// }
// }


/* getTokenOTP
* Fungsi ini di pakai untuk mengirimkan 
* token OTP ke telegram dalam penggunaan Login OTP 
*
*/
public function getTokenOTP($data=null){
	
		if(!$data) response()->goto(site_url());
	
		$df  = explode("_",$data);
		
		$tfrm = $this->session->tempdata('tokenFormLogin');
		
		if($df[0]!==$tfrm || $tfrm ==null){
			$o = new stdclass();
			$o->message =  'refresh your page !' ;
			$o->success = false;
			response()->json($o);
		}
	
		//mengecek username terdaftar untuk mendapatkan token
		$this->load->model('sys/Authorization','tauth');

		$user = @$df[1];
		$dataChat = $this->tauth->getTokenOTP($user);
	
		if(!$dataChat) {
			$o = new stdclass();
			$o->message = "username tidak valid / belum aktivasi !";
			$o->success = false;
			response()->json($o);
		}
		
		
		//membuat code OTP
		$otp = date('s'). random_string('numeric',3);
		
		//mengirim code OTP ke telegram user
		$message = 
		"<b><u>REQUEST OTP (RAHASIA)</u></b>\n<u><b>PERMINTAAN AKSES LOGIN</b></u>\nKe " . site_url() . "\n<b><u>User Akun : $user</u></b>\n\n<b><u>JANGAN BERIKAN CODE INI KEPADA ORANG LAIN</u></b>\n<b>CODE : $otp </b>\n\n<b><u>Diminta Oleh :\n</u></b><code>IP     : " . $this->input->ip_address() ."</code>\n<code>OS     : " . $this->agent->platform() . "</code>";
		
		$ready = $this->ybstelegram->has_setBotAdmin("ADMIN 1");

		if(!$ready){
			$o = new stdclass();
			$o->message = "OTP NOT READY..CALL YOUR ADMIN";
			$o->success = false;
			response()->json($o);
		} 
		
		$this->ybstelegram->sendMessageToClient($message,$dataChat->chat_id,'ADMIN 1');
		
		//menyimpan sementara tokenOTP
		$this->session->set_tempdata('tokenOTP', $dataChat->token, 60);
		$this->session->set_tempdata('codeOTP', $otp, 60);
		$this->session->set_tempdata('userOTP',$dataChat->user_id, 60);
		
		
		
		$o = new stdclass();
		$o->success = true;
		$o->url 	= url('validationOTP/') .  $dataChat->token . "_";
		response()->json($o);
	
	
	
}


/* validationOTP
* Fungsi ini di pakai untuk memvalidasi token OTP  
*
*/
public function validationOTP($data=null){
	$df  = explode("_",$data);
	$o = new stdclass();
	if(count($df)==2){
		//mengecek token terdaftar	
		$token 		= $this->session->tempdata('tokenOTP');
		$codeOTP 	= $this->session->tempdata('codeOTP');
		$userOTP	= $this->session->tempdata('userOTP');
		
		if($df[0]==$token ){
			
			if($df[1]==$codeOTP){
				$this->load->model('sys/Authorization','tauth');
				
				$data_token = $this->tauth->updateTableUserLogin($userOTP);
				
				$this->session->set_userdata('token', $data_token['token']);
				$this->session->set_userdata('logtime', $data_token['time']);
				
				//create log login
				$this->load->model('sys/Sys_user_log_model','log_login');
						
				$log_data = array();
				$log_data['id_user'] 		=   $data_token['iduser'];
				$log_data['login_time'] 	=	$data_token['time'];
				$log_data['ip'] 			=	$this->input->ip_address();
				$log_data['browser'] 		=	$this->get_browser_client();
				$log_data['os']				=   $this->agent->platform(); 
						
				$this->log_login->create_log_login($log_data);
						
				$this->session->set_userdata('idlogin',$this->log_login->id);
				
				
				$o->message = "ok token sama";
				$o->success = true;
				
			}else{
				$o->message = "code not valid ! refresh your page";
				$o->success = false;
			}	
			
		
		}else{
			$o->message = "session not valid ! refresh your page";
			$o->success = false;
		}
		
		$this->session->unset_tempdata('tokenOTP');
		$this->session->unset_tempdata('tokenFormLogin');
		$this->session->unset_tempdata('userOTP');
		$this->session->unset_tempdata('codeOTP');
		
		response()->json($o);
	}else{
		$o->message = "session not valid ! refresh your page";
		$o->success = false;
		response()->json($o);
	}
	
}



/* printDirect
* Fungsi ini di pakai untuk menghandle proses Direct Print Thermal 
*
*/
public function printDirect(){
	$this->load->library("YBSPrintPos");
	
	$data	= request('data');
	$device = request('device');
	$token =  request('token');
	$server = @$_SERVER['HTTP_REFERER']  ;
	if(!$data || !$device) response()->json( "param not complite", 404 );
	
	
	
	
	$device  = base64_decode($device);
	$dataDecode = base64_decode ($data);
	
	//get image before proses print
	$connector = new YbsPrintConnector(null);
	$printer = new YbsPrinter($connector);
	
	$dataBitImage = $this->bitImageProcess($dataDecode,$printer,$connector);
	$dataFinal = $this->bitImageColumProcess($dataBitImage,$printer,$connector);
	$printer->close(false);
	//==============
	
	//print with windowsConnector
	$connector  = new WindowsPrintConnectorDirect('smb:'.$device,$dataFinal);
	$printer = new YbsPrinter($connector);
	$printer->close();
	//==========================
	
	
	//file_put_contents($device, $dataFinal);
	
	echo			'<!DOCTYPE html>
				<html>
					<head>
					<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
					</head>
					<body>
					<script type="text/javascript">
					$(function(){
						window.close();
					});
					</script>
					
					</body>
				</html>';
}


/* bitImageProcess
* Fungsi ini di pakai dalam proses Direct Print Thermal 
*
*/
private function bitImageProcess($data,$printer,$connector){
	$regex = "/" . YbsPrinter::SEPARATOR_BITIMAGE . "[\w:\/\/._]+". YbsPrinter::SEPARATOR_BITIMAGE ."/";
	
	$hasil;
	
	preg_match_all($regex,$data,$hasil);
	
	
	$output = $data;
	
	foreach($hasil[0] as $d){
		
		$img  = str_replace(YbsPrinter::SEPARATOR_BITIMAGE,"",$d);
		$imgs = explode(YbsPrinter::SEPARATOR_ALIGMENT,$img); 
		$aligment  = $imgs[0];
		$pathImage = $imgs[1];
		
		
		
		$image = EscposImage::load($pathImage, false);
		
		$aligment = (int) $aligment;
		$printer -> setJustification($aligment);
		$printer->bitImageDirect($image);
		
		$dtf = $connector->getData();
		
		$output = str_replace($d,$dtf,$output);
		
	}
	
	return $output;

}


/* bitImageColumProcess
* Fungsi ini di pakai dalam proses Direct Print Thermal 
*
*/
private function bitImageColumProcess($data,$printer,$connector){
	$regex = "/" . YbsPrinter::SEPARATOR_BITIMAGECOL .  "[\w:\/\/._]+". YbsPrinter::SEPARATOR_BITIMAGECOL ."/";
	$hasil;

	preg_match_all($regex,$data,$hasil);
	
	
	$output = $data;
	
	foreach($hasil[0] as $d){
		
		$img = str_replace(YbsPrinter::SEPARATOR_BITIMAGECOL,"",$d);
		$imgs = explode(YbsPrinter::SEPARATOR_ALIGMENT,$img); 
		$aligment  = $imgs[0];
		$pathImage = $imgs[1];
		
		$image = EscposImage::load($pathImage, false);
		
		$aligment = (int) $aligment;
		$printer -> setJustification($aligment);
		$printer->bitImageColumnFormatDirect($image);
		
		$dtf = $connector->getData();

		$output = str_replace($d,$dtf,$output);
		
	}
	
	return $output;

}




public function jqr($time){
		$path	= "./assets/js/jquery-3.3.1.min.js";
		if( !file_exists($path) ) die("File not found");
		$this->load->helper('download');
		$f= file_get_contents($path);
		$name= _generate('jquery-3.3.1.min.js'.time());
		force_download($name.'.js' ,$f,TRUE);
}

public function font($time){
		$path	= "./assets/fonts/font-awesome/css/font-awesome.min.css";
		if( !file_exists($path) ) die("File not found");
		$this->load->helper('download');
		$f= file_get_contents($path);
		$name= _generate('font-awesome.min.css'.time());
		force_download($name.'.css' ,$f,TRUE);
}

public function bot($time){
		$path	= "./assets/front-end/css/bootstrap.min.css";
		if( !file_exists($path) ) die("File not found");
		$this->load->helper('download');
		$f= file_get_contents($path);
		$name= _generate('bootstrap.min.css'.time());
		force_download($name.'.css' ,$f,TRUE);
}

private function get_browser_client(){
		if ($this->agent->is_browser())
		{
				$agent = $this->agent->browser().' '.$this->agent->version();
		}
		elseif ($this->agent->is_robot())
		{
				$agent = $this->agent->robot();
		}
		elseif ($this->agent->is_mobile())
		{
				$agent = $this->agent->mobile();
		}
		else
		{
				$agent = $_SERVER['HTTP_USER_AGENT'];
		}

		return $agent;
	}


	
}	