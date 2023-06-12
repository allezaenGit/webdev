<?php
namespace ybs\general;

class APIName{
	
	const INITIAL_MAINTENANCE 		= "mntc_";
	const INITIAL_GOOGLE_DRIVE 		= "gdrive_";
	const INITIAL_API_DOC_DOWNLOAD 	= "api_doc_download_";
	const INITIAL_API_DOC_ACTIVATE  =  "api_doc_activate_";
	
	
	const API_FILE = "Public_Access";
	const API_PATH = APPPATH.'/controllers/api/Public_Access.php';
	
	
	/*
	*	Get function name Google Drive Response From Public_Access.php
	*/
	static function RESPONSE_GOOGLE_DRIVE(){
		return self::getName(self::INITIAL_GOOGLE_DRIVE);
	}
	
	
	/*
	*	Get function name Download API Doc Response From Public_Access.php
	*/
	static function RESPONSE_API_DOC_DOWNLOAD(){
		return self::getName(self::INITIAL_API_DOC_DOWNLOAD);
	}
	
	
	/*
	*	Get function name API Doc Activate URL Response From Public_Access.php
	*/
	static function RESPONSE_API_DOC_ACTIVATE(){
		return self::getName(self::INITIAL_API_DOC_ACTIVATE);
	}
	
	
	
	
	/*
	*	Get function name Maintenance Response From Public_Access.php
	*/
	static function RESPONSE_MAINTENANCE(){
		return self::getName(self::INITIAL_MAINTENANCE);
	}
	
	
	
	
	
	private static function getName($initial){
		
		$CI = &get_instance();
		
		if(!class_exists(APIName::API_FILE)) $CI->load->file(APIName::API_PATH);
		
		$ar = get_class_methods(APIName::API_FILE);	
		$output = "";
		foreach($ar as $val){
			
			$isfunction = strpos($val,$initial);
			if($isfunction !== false){
				$output =  $val ;
				break;
			}
				
		}
		return $output;
	}
	
	
	
	
	
}