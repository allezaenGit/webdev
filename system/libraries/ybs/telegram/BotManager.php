<?php
namespace ybs\telegram;


if (!defined('Connector'))
    exit('No direct script access allowed');




include_once "Model.php";
include_once "FileGenerate.php";
include_once "KeyboardInline.php";
include_once "KeyboardDefault.php";

use ybs\telegram\Model;
use ybs\telegram\FileGenerate;



class BotManager extends Model{
	
	private $URL_BOT  				= "https://api.telegram.org/bot";
	private $URL_DOWNLOAD			= "https://api.telegram.org/file/bot";
	
	private $MTD_GET_ME 			= "/getMe"; 
	private $MTD_GET_UPDATES 		= "/getUpdates";
	private $MTD_INFO_WEBHOOK		= "/getWebHookInfo";
	private $MTD_DELETE_WEBHOOK		= "/deleteWebHook";
	private $MTD_SET_WEBHOOK		= "/setWebHook?url=";
	private $MTD_SEND_MESSAGE		= "/sendMessage?chat_id=";
	private $MTD_SEND_STICKER		= "/sendSticker?chat_id=";
	private $MTD_SEND_PHOTO			= "/sendPhoto?chat_id=";
	private $MTD_SEND_DOCUMENT		= "/sendDocument?chat_id="; 
	private $MTD_GET_FILE			= "/getFile?file_id=";
	private $MTD_EDIT_MESSAGE		= "/editMessageText?chat_id=";
	public  $EMO	;
	public 	$STICKER;
	
	
	
	private $TOKEN					= "";
	private $CHAT_ID				= "";
	private $ERROR_MESSAGE			= "";
	
	
	public $request;	
	public $service;
	
	public function __construct(){
		parent::__construct();
		$this->prepareEmo();
		$this->prepareSticker();
		
		$req =  file_get_contents("php://input");
		$origData = $req;
		$req =  json_decode($req,TRUE);
		
		$this->request = array();
		$this->request["first_name"] 	= @$req['message']['chat']['first_name'];
		$this->request["last_name"] 	= @$req['message']['chat']['last_name'];
		$this->request["chat_id"] 		= @$req['message']['chat']['id'];
		$this->request["message"] 		= @$req['message']['text'];
		$this->request['photo']			= @$req["message"]["photo"];
		$this->request['document']		= @$req["message"]["document"];
		$this->request['document_type']	= @$req["message"]["document"]["mime_type"];
		$this->request['caption']		= @$req["message"]["caption"];
		$this->request["all"]			= @$req;
		
		
		
	
		if(!$this->request["chat_id"]){
			$this->request["chat_id"] 		=  @$req["callback_query"]["from"]["id"];
			$this->request["first_name"] 	=  @$req["callback_query"]["from"]["first_name"];
			$this->request["last_name"] 	=  @$req["callback_query"]["from"]["last_name"];
			$this->request["message_id"] 	=  @$req["callback_query"]["message"]['message_id'];
			$this->request["message"] 		=  @$req["callback_query"]["data"];
		}
			
	
	}
	

	/**
	* sendMessage
	* Mengirim pesan ke telegram 	
	*
	* @param string $message isi pesan yang akan di kirim  
	* @param string $token token bot yang terdaftar
	* @param string $chat_id chat_id telegram yang terdaftar
	* @param string $replay_markup true or false 
	* @return false on error
	*/	
	public function sendMessage($message,$token=null,$chat_id=null,$replay_markup=null){
		$this->open_error_trap();
		$c;
		try{
		
			if($token !==null) 
				$this->TOKEN = $token;
			
			if($chat_id !==null) 
				$this->CHAT_ID = $chat_id;
			
			$data = $this->injectCode($message);	
			$data = urlencode($data);            
			$data = htmlentities($data);
			
			
			
			
			$mark="";
			if($replay_markup){
					
					
					$mark="&reply_markup=" . $replay_markup;
			}
			
			
			
			
			
			
			$url  = $this->URL_BOT . $this->TOKEN . $this->MTD_SEND_MESSAGE . $this->CHAT_ID . "&text=" .$data ."&parse_mode=HTML".$mark ;
			
			$c 	  = file_get_contents($url);
			
		
			
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		$this->close_error_trap();
		return $c;
	}
	
	
	/**
	* sendSticker
	* Mengirim pesan ke telegram 	
	*
	* @param string $sticker file id stricker
	* @param string $token token bot yang terdaftar
	* @param string $chat_id chat_id telegram yang terdaftar
	* @param string $replay_markup true or false 
	* @return false on error
	*/	
	public function sendSticker($sticker,$token=null,$chat_id=null,$replay_markup=null){
		$this->open_error_trap();
		$c;
		try{
		
			if($token !==null) 
				$this->TOKEN = $token;
			
			if($chat_id !==null) 
				$this->CHAT_ID = $chat_id;
			
			
			
			
			
			
			$mark="";
			if($replay_markup){
					
					
					$mark="&reply_markup=" . $replay_markup;
			}
			
			
			
			$url  = $this->URL_BOT . $this->TOKEN . $this->MTD_SEND_STICKER . $this->CHAT_ID . "&sticker=" .$sticker ."&parse_mode=HTML".$mark ;
			
			$c 	  = file_get_contents($url);
			
		
			
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		$this->close_error_trap();
		return $c;
	}
	
	
	/**
	* sendDocument
	* Mengirim Dokument ke telegram 	
	*
	* @param string $url url file
	* @param string $token token bot yang terdaftar
	* @param string $chat_id chat_id telegram yang terdaftar
	* @param string $replay_markup true or false 
	* @return false on error
	*/	
	public function sendDocument($file,$token=null,$chat_id=null){
		$this->open_error_trap();
		$c;
		try{
		
			if($token !==null) 
				$this->TOKEN = $token;
			
			if($chat_id !==null) 
				$this->CHAT_ID = $chat_id;
			
			$urlFile = $file;
			$caption = "";
			if(is_array($file)){
				$urlFile = @$file['url'];
				$cap = @$file['caption'];
				if($cap) $caption = "&caption=$cap";
			}
			
			$url  = $this->URL_BOT . $this->TOKEN . $this->MTD_SEND_DOCUMENT . $this->CHAT_ID . "&document=" .$urlFile . $caption ;
			
			$c 	  = file_get_contents($url);
			
		
			
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		$this->close_error_trap();
		return $c;
	}
	
	
	
	/**
	* sendPhoto
	* Mengirim Photo ke telegram 	
	*
	* @param string $url url file
	* @param string $token token bot yang terdaftar
	* @param string $chat_id chat_id telegram yang terdaftar
	* @param string $replay_markup true or false 
	* @return false on error
	*/	
	public function sendPhoto($file,$token=null,$chat_id=null){
		$this->open_error_trap();
		$c;
		try{
		
			if($token !==null) 
				$this->TOKEN = $token;
			
			if($chat_id !==null) 
				$this->CHAT_ID = $chat_id;
			
			$urlFile = $file;
			$caption = "";
			if(is_array($file)){
				$urlFile = @$file['url'];
				$cap = @$file['caption'];
				if($cap) $caption = "&caption=$cap";
			}
			
			$url  = $this->URL_BOT . $this->TOKEN . $this->MTD_SEND_PHOTO . $this->CHAT_ID . "&photo=" .$urlFile . $caption ;
			
			$c 	  = file_get_contents($url);
			
		
			
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		$this->close_error_trap();
		return $c;
	}
	
	
	/**
	* editMessageInline
	* Mengedit/update pesan sebelum nya 
	*	
	* @param string $message isi pesan yang akan di kirim  
	* @param string $token token bot yang terdaftar
	* @param string $chat_id chat_id telegram yang terdaftar
	* @param string $message_id message_id dari pesan sebelum nya
	* @param string $replay_markup true or false 
	* @return false on error
	*/
	public function editMessageInline($message,$token=null,$chat_id=null,$message_id,$replay_markup=null){
		$this->open_error_trap();
		$c;
		try{
		
			if($token !==null) 
				$this->TOKEN = $token;
			
			if($chat_id !==null) 
				$this->CHAT_ID = $chat_id;
			
			$data = $this->injectCode($message);	
			$data = urlencode($data);            
			$data = htmlentities($data);
			
			$mark="";
			if($replay_markup){
					
					$mark="&reply_markup=" . $replay_markup;
			}
			
		
			
			$url  = $this->URL_BOT . $this->TOKEN . $this->MTD_EDIT_MESSAGE . $this->CHAT_ID . "&text=" .$data . "&message_id=" .$message_id . "&parse_mode=HTML".$mark;
			
			$c 	  = file_get_contents($url);
			
			
			
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		$this->close_error_trap();
		return $c;
	}
	
	
	/**
	* getFileInfo
	* Mendapatkan Informasi File yang di Upload	
	*
	* @param string $file_id  ,file_id dari file yang di upload
	* @param string $token ,token bot yang terdaftar
	* @param string $chat_id ,chat_id telegram yang terdaftar
	* @return array
	*/
	public function getFileInfo($file_id,$token=null,$chat_id=null){
		$this->open_error_trap();
		$c;
		try{
		
			if($token !==null) 
				$this->TOKEN = $token;
			
			if($chat_id !==null) 
				$this->CHAT_ID = $chat_id;
			
			
			$data = urlencode($file_id);            
			$data = htmlentities($file_id);
			
			
			$url  = $this->URL_BOT . $this->TOKEN . $this->MTD_GET_FILE . $data;
			
			$c 	  = file_get_contents($url);
			
			return json_decode($c);
			
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		$this->close_error_trap();
		return $c;
	}
	
	
	/**
	* getFileUpload
	* Mendapatkan Content/isi dari File yang di Upload	
	*
	* @param string $file_path  ,file_path dari file yang di upload
	* @param string $token ,token bot yang terdaftar
	* @return 
	*/
	public function getFileUpload($file_path,$token=null){
		$this->open_error_trap();
		$c;
		try{
		
			if($token !==null) 
				$this->TOKEN = $token;
			
			$url  = $this->URL_DOWNLOAD . $this->TOKEN . "/". $file_path;
			$c 	  = file_get_contents($url);
			
				
			return $c;
			
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		$this->close_error_trap();
		return $c;
	}
	
	
	/**
	* putFileToServer
	* Menyimpan File Upload ke Server	
	*
	* @param string $fileInfo  ,fileInfo dari file yang di upload
	* @param string $path_telegram , path_telegram dari file yang di upload
	* @param string $token ,token bot yang terdaftar
	* @return 
	*/
	public function putFileToServer($fileInfo,$path_telegram,$token=null){
		
		$content = $this->getFileUpload($path_telegram,$token);
			
		if($content){
			$filePath = FCPATH . $fileInfo['file_path'];
			FileGenerate::createFile($content,$filePath,$fileInfo['name']);
			
			$fileInfo['time'] = time();
			$this->db->insert("sys_user_upload",$fileInfo);
			return $fileInfo['time'];
		}else{
			return false;
		}
		
	}
	
	
	/**
	* saveFileToServer
	* Menyimpan File Upload ke Server dan mengupdate table sys_upload	
	*
	* @param array $config  ,[id_user,path,file_id]
	* @param string $token ,token bot yang terdaftar
	* @param string $chat_id ,chat_id user
	* @return timestamp
	*/
	public function saveFileToServer($config,$token,$chat_id){
		 $fileInfo = $this->getFileInfo($config['file_id'],$token,$chat_id);
		
		 $fileName = str_replace("/","_",$fileInfo->result->file_path);
	    
		 $ext = "." . pathinfo($fileName, PATHINFO_EXTENSION);
         $t= time();
	  
		 $info=[
			"id_user"	=> $config['id_user'],
			"file_path"	=> "./upload_files/".$config['path']."/",
			
			"orig_name"	=> $t . $ext,
			"name"		=> $t . $ext,
			"ext"		=> $ext,
			"time"		=> "",
			"size"		=> $fileInfo->result->file_size,
			"external_access" =>1,
	   
	    ];
	   
	   //mendownload file dan menyimpan file ke folder upload
	   $fileTime  = $this->putFileToServer($info,$fileInfo->result->file_path,$token); 
	   return $fileTime;
	}
	
	
	
	
	
	
	/**
	* sendMessageToAdmin
	* Mengirim Pesan Ke Bot Admin
	*
	* @param string $message 
	* @param mix $admin_bot_name Admin Bot name
	* @return boolean
	*/
	public function sendMessageToAdmin($message,$admin_bot_name,$keyboard=null){
		
		$admin = $this->getBotAdminInfo($admin_bot_name);
		$message = $this->injectCode($message);
		foreach($admin as $v){
			
			$success = $this->sendMessage($message,$v["token"],$v["chat_id"],$keyboard) ;
			if(!$success){
				return false;
				break;
			}
		
		}
		return true;
		
	}
	
	/**
	* sendDocumentToAdmin
	* Mengirim Dokument Ke Bot Admin
	*
	* @param string $message 
	* @param mix $admin_bot_name Admin Bot name
	* @return boolean
	*/
	public function sendDocumentToAdmin($urlFile,$admin_bot_name){
		$admin = $this->getBotAdminInfo($admin_bot_name);
		
		foreach($admin as $v){
			
			$success = $this->sendDocument($urlFile,$v["token"],$v["chat_id"]) ;
			if(!$success){
				return false;
				break;
			}
		
		}
	
	}
	
	
	/**
	* sendPhotoToAdmin
	* Mengirim Dokument Ke Bot Admin
	*
	* @param mix $urlFile 
	* @param mix $admin_bot_name Admin Bot name
	* @return boolean
	*/
	public function sendPhotoToAdmin($urlFile,$admin_bot_name){
		$admin = $this->getBotAdminInfo($admin_bot_name);
		
		foreach($admin as $v){
			
			$success = $this->sendPhoto($urlFile,$v["token"],$v["chat_id"]) ;
			if(!$success){
				return false;
				break;
			}
		
		}
	
	}
	
	
	
	/**
	* sendMessageToClient
	* Mengirim Pesan Ke Client
	*
	* @param string $message 
	* @param string $chat_id client
	* @param mix $admin_bot_name Admin Bot name
	* @return boolean
	*/
	public function sendMessageToClient($message,$chat_id,$admin_bot_name){
		$admin = $this->getBotAdminInfo($admin_bot_name);
		$message = $this->injectCode($message);
		foreach($admin as $v){
			
			$success = $this->sendMessage($message,$v["token"],$chat_id) ;
			if(!$success){
				return false;
				break;
			}
		
		}
		return true;
	}
	
	public function has_setBotAdmin($admin_bot_name){
		return $this->has_setBot($admin_bot_name);
	}
	
	
	
	public function getMe(){
		$c;
		
		//membuat throw untuk menangkap error dari file_get_contents
		$this->open_error_trap();
		
		try{
		
		$c = file_get_contents($this->URL_BOT . $this->TOKEN . $this->MTD_GET_ME);
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		//restore throw
		$this->close_error_trap();
		
		if($c==false){
			return false;
		}else{
			$cc = json_decode($c,TRUE);
			return $cc;
		}
	}
	
	public function getUpdates(){
		$c;
		
		//membuat throw untuk menangkap error dari file_get_contents
		$this->open_error_trap();
		
		try{
			$c = file_get_contents($this->URL_BOT . $this->TOKEN . $this->MTD_GET_UPDATES);
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		
		//restore throw
		$this->close_error_trap();
		
		
		
		if($c==false){
			$c=false;
			return false;
		}else{
			$cc = json_decode($c,TRUE);
			return $cc;
		}
	}
	

	
	
	
	
	public function getChat_id(){
		//membuat throw untuk menangkap error dari file_get_contents
		$this->open_error_trap();
		$c;
		try{
			$hook = file_get_contents($this->URL_BOT . $this->TOKEN . $this->MTD_INFO_WEBHOOK);
			$hook = json_decode($hook,TRUE);
			$url = $hook['result']['url'];
			
			if($url==""){
				$c = file_get_contents($this->URL_BOT . $this->TOKEN . $this->MTD_GET_UPDATES);
			}else{
				$d = file_get_contents($this->URL_BOT . $this->TOKEN . $this->MTD_DELETE_WEBHOOK);
				return 'null';
			}
			
			
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		
		//restore throw
		$this->close_error_trap();
		
		if($c==false){
			return false;
		}else{
			$cc = json_decode($c,TRUE);
			if(!empty($cc)){
				$result = $cc['result'];
				if(empty($result)){
					return 'null';
				}else{
					$id = $result[0]['message']['chat']['id'];
					$this->CHAT_ID = $id;
					return $id;
				}
				
				
				
			}else{
				return false;
			}
			
		}
	
	}
	
	
	public function setWebHook($url=""){
		$this->open_error_trap();
		$c;
		try{

			$c = file_get_contents($this->URL_BOT . $this->TOKEN . $this->MTD_SET_WEBHOOK . $url);
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		$this->close_error_trap();
		return $c;
	}
	
	public function getWebHookInfo(){
		$this->open_error_trap();
		$c;
		try{

			$hook 	= file_get_contents($this->URL_BOT . $this->TOKEN . $this->MTD_INFO_WEBHOOK);
			$hook 	= json_decode($hook,TRUE);
			$url 	= $hook['result'];
			$c 		= $url;
			
		}catch(\Exception $e){
			$c=false;
			$this->ERROR_MESSAGE = $e->getMessage();
		}
		
		$this->close_error_trap();
		return $c;
	}
	
	

	private function open_error_trap(){
		set_error_handler(
			function($s,$m,$f,$l){
				throw new \ErrorException($m,$s,$s,$f,$l);
			}
		);
	}
	
	private function close_error_trap(){
		restore_error_handler();
	}
	
	public function getErrorMessage(){
		$message = "";
		switch($this->ERROR_MESSAGE){
			case "file_get_contents(): php_network_getaddresses: getaddrinfo failed: No such host is known. " :
				$message ="no connection !..check your connection or your host!";
			break;

			
			default :
			$message =$this->ERROR_MESSAGE;
		}
		
		
		return $message;
	}
	
	
	public function setToken($token,$chat_id=""){
		$this->TOKEN = $token;
		$this->CHAT_ID = $chat_id;
	}
	
	
	
	public function getToken(){
		return $this->TOKEN;
	}
	
	
	private function injectCode($message){
		//name client chat
		$a = str_replace("{{first_name}}",$this->request["first_name"],$message);
		$a = str_replace("{{last_name}}",$this->request["last_name"],$a);
		
		//time now
		$time = date("H:i:s",time());
		$a = str_replace("{{time}}",$time,$a);
		
		$date = date("d M Y",time());
		$a = str_replace("{{date}}",$date,$a);
		
		$dateTime = date("d M Y  H:i:s",time());
		$a = str_replace("{{date_time}}",$dateTime,$a);
		
		
		$emo  = $this->db->get("sys_emoji")->result();
		
		foreach($emo as $v){
			$emoji = $this->strtoemoji($v->emo);
			$a = str_replace($v->desc,$emoji,$a);
			
		}
		
		
		//image format {{img:http://your_image_path}}
		$regex="/{{img:([\w:\/_.-]+)+}}/";
		$img =  "<a href='$1'>_</a>";
		$a = preg_replace($regex,$img,$a);
		
		return $a ;
	}
	
	
	
	public function strtoemoji($text){
		$result = preg_replace_callback('/\\\\u(d[89ab][0-9a-f]{2})\\\\u(d[c-f][0-9a-f]{2})/i', function ($matches) {
			$first = $matches[1];
			$second = $matches[2];
			$value = ((eval("return 0x$first;") & 0x3ff) << 10) | (eval("return 0x$second;") & 0x3ff);
			$value += 0x10000;
			return "&#$value;";
		  }, $text);

		return $result;
	}
	
	
	private function prepareEmo(){
		$emo =  $this->db->get('sys_emoji')->result();
	
		foreach($emo as $v){
			$this->EMO[$v->desc] = $v->emo;
		}
	}
	
	private function prepareSticker(){
		$sticker =  $this->db->get('sys_sticker')->result();
	
		foreach($sticker as $v){
			$desc = str_replace(["{{sticker:","}}"],"",$v->name);
			
			$descSticker = "{{sticker:".$desc."#".$v->no."}}";	
			
			$this->STICKER[$descSticker] = $v->file_id;
		}
	}
	
	public function getEmo($desc){
		
		$desc = str_replace(["{{emo:","}}"],"",$desc);
		
		$descEmo = "{{emo:".$desc."}}";	
		
		return @$this->EMO[$descEmo] ;
		
	}
	
	public function getSticker($desc){
		$desc = str_replace(["{{sticker:","}}"],"",$desc);
		
		$descSticker = "{{sticker:".$desc."}}";	
		
		return @$this->STICKER[$descSticker] ;
	}

	
	
}