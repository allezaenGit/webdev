<?php
namespace model\Sistemx;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as CI_Model;
//use Illuminate\Database\Capsule\Manager as DB;

class DevauthModel extends CI_Model {
	
	protected $table="sys_api_access";
	protected $fillable = [ "key" , "all_access" , "controller" , "date_created" , "date_modified" ,	];
	const validation = [];

};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-08-30 13:11:50 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/
