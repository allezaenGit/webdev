<?php
require APPPATH . 'controllers/sistem/General_title.php';
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MailServer_config {
	


   function __construct(){
	   /* title */
	    $this->general		= new General_title();
		$this->sys_mail_server_id	= 'ID';
		$this->sys_mail_server_host	= 'HOST';
		$this->sys_mail_server_user_name	= 'USER_NAME';
		$this->sys_mail_server_password	= 'PASSWORD';
		$this->sys_mail_server_smtp_auth	= 'SMTP_AUTH';
		$this->sys_mail_server_smtp_secure	= 'SMTP_SECURE';
		$this->sys_mail_server_port	= 'PORT';
	
		$this->sys_mail_server_email_sender	= 'EMAIL_SENDER';
		$this->sys_mail_server_email_name	= 'EMAIL_NAME';
		$this->sys_mail_server_status	= 'STATUS';
		$this->sys_mail_server_debug	= 'DEBUG';
		$this->tstatus_id	= 'TSTATUS_ID';
		$this->tstatus_status	= 'STATUS';
		$this->tdebug_id	= 'TDEBUG_ID';
		$this->tdebug_status	= 'DEBUG';

		
		
		
		/*field_alias_database db*/
		$this->f_id	= 'id';
		$this->f_host	= 'host';
		$this->f_user_name	= 'user_name';
		$this->f_password	= 'password';
		$this->f_smtp_auth	= 'smtp_auth';
		$this->f_smtp_secure	= 'smtp_secure';
		$this->f_port	= 'port';
		
		$this->f_email_sender	= 'email_sender';
		$this->f_email_name	= 'email_name';
		$this->f_status	= 'status';
		$this->f_debug	= 'debug';
		$this->f_tstatus_id	= 'tstatus_id';
		$this->f_tstatus_status	= 'tstatus_status';
		$this->f_tdebug_id	= 'tdebug_id';
		$this->f_tdebug_status	= 'tdebug_status';

		
		
		
		/* CONFIG FORM LIST */
		/* field_alias_database => $title */	
		$this->table_column =array(
		//	$this->f_id	=> $this->sys_mail_server_id,
			$this->f_host	=> $this->sys_mail_server_host,
			$this->f_user_name	=> $this->sys_mail_server_user_name,
			//$this->f_password	=> $this->sys_mail_server_password,
			$this->f_smtp_auth	=> $this->sys_mail_server_smtp_auth,
			$this->f_smtp_secure	=> $this->sys_mail_server_smtp_secure,
			$this->f_port	=> $this->sys_mail_server_port,
		
			$this->f_email_sender	=> $this->sys_mail_server_email_sender,
			$this->f_email_name	=> $this->sys_mail_server_email_name,
		//	$this->f_status	=> $this->sys_mail_server_status,
		//	$this->f_debug	=> $this->sys_mail_server_debug,
		//	$this->f_tstatus_id	=> $this->tstatus_id,
			$this->f_tstatus_status	=> $this->tstatus_status,
		//	$this->f_tdebug_id	=> $this->tdebug_id,
			$this->f_tdebug_status	=> $this->tdebug_status,
		);

	}

};









/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-08-27 17:00:49 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

