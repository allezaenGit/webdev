<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class IDCoder {
   
   
	protected static $capsule=array();
	protected static $className ;
  
	static function run($c){
		$class 		= get_class($c);
		$logName 	= "log_".$class;
		
		$objLog = new Capsule();
		$objLog->logName= $logName;	
		
		self::$className = $logName;
		
		//populate class 
		self::$capsule[$logName] = $objLog; 
		
	}
  

  
	static function createKey(){
		//get Class
		$objLog = self::$capsule[self::$className];
		
		$ci = &get_instance();
		$objLog->key = time();
		
		$ci->session->set_userdata($objLog->logName,$objLog->key);
		return $objLog->key;
	}
	
	static function getKey(){
		$ci = &get_instance();
		return $ci->session->userdata(self::$className);
	}
	
	static function createTempKey($id,$timing=900){
		$ci			 	= &get_instance();
		$logTemp 		= $ci->session->userdata(self::$className);
		$ci->session->set_tempdata($id,$logTemp,$timing);
		return $logTemp;
	}
	
	
	
	static function getTempKey($id){
		$ci			 	= &get_instance();
		return $ci->session->tempdata($id);
	}
	
	
	
	static function encode($id,$key){
	
		// $objLog = self::$capsule[self::$className];
		// $key  = $objLog->key;
		
		$data = _encode_id($id,$key);
		return $data;
	}
	

	/**
	 * Decode
	 *
	 * Simple Decode for id
	 *
	 * @param	string	$id
	 * @param	mix	$key
	 * @return	string
	 */
	static function decode($id,$key){
		$data;
		if(isset($key)){
			$data =_decode_id($id,$key);
		}	
		return $data;
	}
	
	
	
	


  
}

Class Capsule{
	public $logName,$key,$logTemp;
}


