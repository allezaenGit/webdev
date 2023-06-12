<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use ybs\general\Load;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



class MailServer{
	private $mail;
	private $config;
	
	public function __construct(){
		Load::model("sys/mail");
		$tmodel  = new \MailServerModel();
		
		$this->config = $tmodel->get_active();
		
		
		
		$this->mail = new PHPMailer(true);
		$this->prepare();
		
		
	}	
	
	
	private function prepare(){
		//Server settings
	
		if($this->config->smtp_auth==1){
			$this->config->smtp_auth=true;
		}else{
			$this->config->smtp_auth=false;
		}
	
		
		if($this->config->debug==1){
			$this->mail->SMTPDebug 	= SMTP::DEBUG_SERVER;					// Enable verbose debug output
		}
		
		
				
		$this->mail->isSMTP();                                              // Send using SMTP
		$this->mail->Host       	= $this->config->host;					// Set the SMTP server to send through
		$this->mail->SMTPAuth   	= $this->config->smtp_auth;				// Enable SMTP authentication
		$this->mail->Username   	= $this->config->user_name;				// SMTP username
		$this->mail->Password   	= _decrypt($this->config->password);	// SMTP password
		$this->mail->SMTPSecure 	= $this->config->smtp_secure;			// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$this->mail->Port       	= $this->config->port;				    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		//Recipients
		$this->mail->setFrom($this->config->email_sender, $this->config->email_name);
		
		$this->mail->isHTML(true); 
		
	}
	
	
	public function receipt($email,$name=null){
	
		$this->mail->addAddress($email, $name);     // Add a recipient
	}
	
	public function replyTo($email,$name=null){
		$this->mail->addReplyTo($email, $name);     // Add a recipient
	}
	
	public function ccTo($email,$name=null){
		$this->mail->addCC($email, $name);     // Add a recipients
	}
	
	public function bccTo($email,$name=null){
		$this->mail->addBCC($email, $name);     // Add a recipients
	}
	
	public function attatch($file,$opt_name=null){
		$this->mail->addAttachment($file, $opt_name); 
	}
	
	public function subject($d){
		
		$this->mail->Subject= $d;
	}
	
	public function message($d){
		$this->mail->Body= $d; 
	}
	
	public function altBody($d){
		$this->mail->AltBody= $d; 
	}
	
	public function send(){
		
		$success;
		try {
			$this->mail->send();
			$success= true;
		} catch (Exception $e) {
			$success = $this->mail->ErrorInfo;
		}	
		return $success;
	}
	
	
	
	
	
	
	
	
}