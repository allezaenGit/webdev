<?php
namespace model\Sistemx;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as CI_Model;
//use Illuminate\Database\Capsule\Manager as DB;

class MailServerModel extends CI_Model {
	
	protected $table="sys_mail_server";
	protected $fillable = [ "host" , "user_name" , "password" , "smtp_auth" , "smtp_secure" , "port" , "is_html" , "email_sender" , "email_name" , "status" , "debug" , "tstatus_id" , "tstatus_status" , "tdebug_id" , "tdebug_status" ,	];
	const validation = [];

};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-08-27 17:00:49 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/
