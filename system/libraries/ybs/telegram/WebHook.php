<?php
namespace ybs\telegram;
use ybs\telegram\BotManager;

include_once "BotManager.php";

if (!defined('Connector'))
    exit('No direct script access allowed');

class WebHook extends BotManager{


	


	
	public function __construct(){
		parent::__construct();
		
	    
		
		$a = get_class($this);
		$this->getService($a);
		
		if(@$this->_TEST_CODE==true){
				$this->test();
		}else{
				$this->run();
		}
		
	}
	
	
	public function run(){
		
		$this->recordEmo();
		
		$this->trackingUser(	@$this->request['chat_id'],
								@$this->request['message'],
								@$this->request["first_name"],
								@$this->request["last_name"]);
		
		
		$sticker = $this->recordSticker();
								
		if($sticker) return;	
		
		if(!$this->service['command']) return;
	
		$validCommand=false;
		
		foreach($this->service['command'] as $cmd ){
			$command = "/".$cmd['name'];
		
			if($command==$this->request['message']){
				
				$isRegister = $this->registerOTP( $command,"",
							$this->service['bot']['token'],
							$this->request['chat_id']
						  );
				
				if($isRegister) {
					$validCommand = true;				
					break;	
				}
				
				//mengirimkan pesan ke bot yang terdaftar walaupun di akses oleh berbeda device
				//karena menggunakan $this->request['chat_id']
				$this->action(	$command,$cmd['message'],
								$this->service['bot']['token'],
								$this->request['chat_id']
								);
				$validCommand = true;				
				break;	
			}
		}
		
		if($validCommand)
			return;
		
		
		
		//kondisi command tidak ada yang sama
		//terlebih dahulu check sys_bot_telegram_cache,apakah merupakan lanjutan dari command sebelum nya
		$isCache = $this->hasCache($this->request['chat_id']);
		if($isCache){
			
			$isRegister = $this->registerOTP( $isCache->command,$this->request['message'],
								$this->service['bot']['token'],
								$this->request['chat_id'],
								$isCache
						  );
			
			if($isRegister) return;
			
			$this->action($isCache->command,$this->request['message'],
						  $this->service['bot']['token'],
						  $this->request['chat_id'],
						  $isCache
			);
		}
		
	}
	
	public function createCache($chat_id,$command,$tag,$tagBack=null){
		$data=[
			"chat_id"		=>$chat_id,
			"command"		=>$command,
			"tag"	 		=> $tag,	
			"tag_back"		=> $tagBack,
			"create_date" => date("Y-m-d",time()),
			"create_time" => date("H:i:s",time()),
					
		];
		
		$this->db->where("chat_id", $chat_id);
		$oldData = $this->db->get("sys_bot_telegram_cache")->row();
		
		if($oldData){
			$this->db->where("chat_id",$chat_id);
			$this->db->where("lock",0);
			$this->db->update("sys_bot_telegram_cache",$data);
		}else{
			$this->db->insert("sys_bot_telegram_cache",$data);
		}
		
	}
	
	public function clearCache($chat_id){
		$this->db->where("chat_id",$chat_id);
		$this->db->delete("sys_bot_telegram_cache");
	}
	
	public function hasCache($chat_id){
		$this->db->where("chat_id",$chat_id);
		$data = $this->db->get("sys_bot_telegram_cache")->row();
		if($data){
			return $data;
		}else{
			return false;
		}
		
	}
	public function lockCache($chat_id){
		$this->db->where("chat_id",$chat_id);
		$this->db->update("sys_bot_telegram_cache",["lock"=>1]);
	}
	public function unlockCache($chat_id){
		$this->db->where("chat_id",$chat_id);
		$this->db->update("sys_bot_telegram_cache",["lock"=>0]);
	}
	

	
	private function recordEmo(){
		
		
		$setting = $this->db->get('sys_bot_telegram_setting')->row(); 
		
		if(!$setting->record_emo)
			return;
		
		$line = explode("\n",$this->request['message']);
		$success = false;
		foreach($line as $list){
			$msg1 = explode("{{m}}",$list);
		
			if(count($msg1)>1){
				
				
				$e  = json_encode($msg1[1]);
				$e  = str_replace('"',"",$e);
				$er = explode(":",$e);
				
				$emojiName = "{{emo:" . $er[1] . "}}";
				$ins = [
					"emo"=>$er[0],
					"desc"=> $emojiName,
				];
				
				$this->db->where('desc',$emojiName);
				$exist = $this->db->get("sys_emoji")->row();
				
				if($exist){
					$this->db->where('desc',$emojiName);
				$success=$this->db->update("sys_emoji",$ins);
				}else{
				$success=	$this->db->insert("sys_emoji",$ins);
				}
					
				
				
			}
		}
		
		if($success){
				$this->action(	null,"save emo..done!",
											$this->service['bot']['token'],
											$this->request['chat_id']
										  );
	
		}
			
		
	}
	
	
	private function recordSticker(){
		$setting = $this->db->get('sys_bot_telegram_setting')->row(); 
		
		if(!$setting->record_emo)
			return;
		
		
		
		$message = $this->request['message'];
		
		if($message=="{{sr}}"){
				$this->createCache($this->request['chat_id'],'/rec_sticker','record_sticker');
				$this->sendMessage("Record Sticker Aktif...kirim sticker sekarang",$this->service['bot']['token'],$this->request['chat_id']);
			
		}elseif($message=="{{st}}") {
				$this->clearCache($this->request['chat_id']);
				$this->sendMessage("Record Sticker Non Aktif",$this->service['bot']['token'],$this->request['chat_id']);
		}
			
		$cache = $this->hasCache($this->request['chat_id']);
		
		if($cache){
			
			if($cache->tag=="record_sticker"){
				
				$sticker = $this->request['all']['message']['sticker'];
				if($sticker){
					$name = "{{sticker:".$sticker['set_name']."}}";
					$file = $sticker['file_id'];
					$file_unique_id = $sticker['file_unique_id'];		
					
					$this->db->where('name',$name);
					$this->db->where('file_unique_id',$file_unique_id);
					$this->db->where('file_id',$file);
					$exist = $this->db->get("sys_sticker")->row();
					//$this->sendMessage("exist" . json_encode($this->request) ,$this->service['bot']['token'],$this->request['chat_id']);
					if(!$exist){
						
						$this->db->where('name',$name);
						$this->db->order_by('no','DESC');
						$existName = $this->db->get("sys_sticker")->row();
						
						if($existName){
							$no = $existName->no  + 1;
							$this->db->insert("sys_sticker",['name'=>$name,'no'=> $no,'file_id'=>$file,'file_unique_id'=>$file_unique_id]);
						}else{
							$this->db->insert("sys_sticker",['name'=>$name,'no'=> 1,'file_id'=>$file,'file_unique_id'=>$file_unique_id]);
						}
					}
					
					$this->sendMessage("sticker saved\nname : $name\ndone ! " ,$this->service['bot']['token'],$this->request['chat_id']);
					return true;
				}
				
				
			}
			
			
			
		}
		
		return false;
		
		
		
		
	}
	
	
	
	
	
	private function trackingUser($chat_id,$message,$first_name,$last_name){
		$setting = $this->db->get('sys_bot_telegram_setting')->row(); 
		
		if(!$setting->tracking)
			return;
		
		$data = [
			'chat_id'	=> $chat_id,
			'bot_name'	=> $this->service['bot']['name'],
			'message'	=> $message,
			'first_name'	=> $first_name,
			'last_name'	=> $last_name,
			'date'		=> Date('Y-m-d',time()),
			'time'		=> Date('H:i:s',time()),
			
		];
		
		$this->db->insert('sys_bot_telegram_tracking_access',$data);
		
	}
	
	
	private function registerOTP($command,$message,$token,$req_chat_id,$cache=false){
		$setting = $this->db->get('sys_bot_telegram_setting')->row(); 
		
		if(!$setting->register_otp)
			return;
		
		
		
		if($command=='/otp_register'){
				if(!$cache){
					
				   $msg  = "<b><u>Registrasi OTP</u></b>\nketik : username#password";
				   $this->sendMessage($msg,$token,$req_chat_id);
				   $this->createCache($req_chat_id,$command,"start_register");
				 
				}else{
					
					if($cache->tag!=="start_register") return;
					
							//mencegah looping
							if($message=="" || $message=="/otp_register") return;
							
							$m = explode("#",$message);
							
							$u = $m[0];
							$p = @$m[1];
							
							if(!$u || !$p){
								$msg = "<b><u>Registrasi OTP</u></b>\n<b>Format Tidak Valid</b>\nketik dengan format: username#password";
								$this->sendMessage($msg,$token,$req_chat_id);
								return;
							}
							
							//mengecek database
							$this->db->where('nmuser',$u);
							$this->db->where('passuser',_generate($p));
							$this->db->where('opt_status',1);
							$row = $this->db->get('sys_user')->row();
							
							
							if($row){
								$time = time();
								
								$d = [
									'id_user' 		=> $row->id,
									'chat_id'		=> $req_chat_id,
									'register_date'	=> date('Y-m-d',$time),
									'register_time'	=> date('H:i:s',$time),
									'status'		=> 1,
								];
								
								$result = $this->insertRegister($d);
								
								$msg = "<b><u>Registrasi OTP</u></b>\n<b>Proses Aktivasi Selesai..</b>\n\nclear chat untuk keamanan ";
								
								if(!$result)
									$msg = "<b><u>Registrasi OTP</u></b>\n<b>Aktivasi Gagal</b>\nTelegram anda telah digunakan..\nhubungi administrator anda ";
								

								$this->sendMessage($msg,$token,$req_chat_id);
								$this->clearCache($req_chat_id);
								
							}else{
								$msg = "<b><u>Registrasi OTP</u></b>\nMaaf akun anda tidak valid / tidak aktif..\nhubungi administrator anda..";
								$this->sendMessage($msg,$token,$req_chat_id);
								$this->clearCache($req_chat_id);
							}
							
							
				}
				
			  return true;
		}
	}
	
	 private function insertRegister($data){
	   //mengecek jika data sdh di register,,
	   $this->db->where('chat_id',$data['chat_id']);
	   $row = $this->db->get('sys_bot_telegram_client')->row();
	   
	   if($row) return false;
	   
	   return $this->db->insert('sys_bot_telegram_client',$data);  
   }
 
	
	
	
	
	
	private function getService($token){
			
			$this->db->where("sys_bot_telegram_service.key",$token);
			$data  = $this->db->get("sys_bot_telegram_service")->result_array();
			
			if($data){
					 $id 		= $data[0]['id'];
					 $name 		= $data[0]['name'];
					 $bot	   	= $this->getBot($id);
					
					 $command 	= $this->getCommand($id);
					 
					 $this->service = array();
					 $this->service["name"] = $name;
					 $this->service["bot"]	  = $bot;
					 $this->service["command"] = $command;
					
					
					 
			}
		
			
			return $this;
	}
	
	
	private function getCommand($id_service){
			$this->db->select(array(
									"sys_bot_telegram_service_cmd.name",
									"sys_bot_telegram_service_cmd.descriptions",
									"sys_bot_telegram_service_cmd.message"
									));
									
			$this->db->where("sys_bot_telegram_service_cmd.id_service",$id_service);
			$data  = $this->db->get("sys_bot_telegram_service_cmd")->result_array();			
			return $data;
	}
	
	
	
	private function getBot($id_service){
			$this->db->select(array(
									"sys_bot_telegram_register.name",
									"sys_bot_telegram_register.token",
									"sys_bot_telegram_register.chat_id"
									));							
			$this->db->join("sys_bot_telegram_register", "sys_bot_telegram_register.id=sys_bot_telegram_webhook.id_bot","LEFT");	
			$this->db->where("sys_bot_telegram_webhook.id_service",$id_service);								
			$data  = $this->db->get("sys_bot_telegram_webhook")->result_array();

			if($data){
				return $data[0]; 
			}								
			return NULL;
	}
	

	
	
	
	
	
	
	
	
	
	
}

