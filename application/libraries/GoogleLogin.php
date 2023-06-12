<?php
if(!defined('cli')) define('cli','runscript');

include_once BASEPATH . "libraries/ybs/cli/dbloader.php";

use ybs\cli\dbloader;
use ybs\http\Response;

class GoogleLogin   {
	
	public $applicationName = "Google Login YBS Sistem";
	
	
	
	public function __construct(){
		$this->prepareClient();
	}
	
	
	public function login(){
		$authUrl = $this->client->createAuthUrl();
		header("Location:".$authUrl);
		die;
	}
	
	
	
	
	private function prepareClient(){
		
		$credit =  $this->getActiveCredential();
		$this->client = new Google_Client();
		$this->client->setApplicationName($this->applicationName);
		$this->client->setAuthConfig( $credit->credential );
		$this->client->setAccessType('online');
		$this->client->addScope('email');
		$this->client->addScope('profile');
	}
	
	
	
	private function getActiveCredential(){
		$model = new dbloader();
		$model->db->select("path_credential as credential,token_name");
		$model->db->where('sys_gdrive.status', '1');
		$credit = $model->db->get("sys_gdrive")->row();
		if(!$credit){
			echo "Opps Credential Google Drive Not Found..";
			die;
		}	
		return $credit;
	}
	
	


	

	
}