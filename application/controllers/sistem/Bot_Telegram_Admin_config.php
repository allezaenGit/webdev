<?php
require APPPATH . 'controllers/sistem/General_title.php';
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bot_Telegram_Admin_config {
	


   function __construct(){
	   /* title */
	    $this->general		= new General_title();
		$this->sys_bot_telegram_admin_system_id	= 'ID';
		$this->sys_bot_telegram_admin_system_id_bot	= 'BOT';
		$this->sys_bot_telegram_admin_system_name	= 'NAME ADMIN BOT';
		$this->tbot_id	= 'TBOT_ID';
		$this->tbot_name	= 'BOT';
		$this->tbot_token	= 'TOKEN';
		$this->tbot_chat_id	= 'CHAT_ID';

		
		
		
		/*field_alias_database db*/
		$this->f_id	= 'id';
		$this->f_id_bot	= 'id_bot';
		$this->f_name	= 'name';
		$this->f_tbot_id	= 'tbot_id';
		$this->f_tbot_name	= 'tbot_name';
		$this->f_token	= 'token';
		$this->f_chat_id	= 'chat_id';

		
		
		
		/* CONFIG FORM LIST */
		/* field_alias_database => $title */	
		$this->table_column =array(
			//$this->f_id	=> $this->sys_bot_telegram_admin_system_id,
			//$this->f_id_bot	=> $this->sys_bot_telegram_admin_system_id_bot,
			$this->f_name	=> $this->sys_bot_telegram_admin_system_name,
			//$this->f_tbot_id	=> $this->tbot_id,
			$this->f_tbot_name	=> $this->tbot_name,
			//$this->f_token	=> $this->tbot_token,
			//$this->f_chat_id	=> $this->tbot_chat_id,
		);

	}

};









/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-01-16 14:35:43 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

