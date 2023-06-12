<?php
namespace ybs\api;

use ybs\general\Load;
use ybs\http\Response;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class HeaderFilter {
	
	
	static function check(){
			$ci = & get_instance();
		

			$request_signature 	= $ci->input->get_request_header('YBS-Signature', TRUE);
			$request_time 		= $ci->input->get_request_header('YBS-Timestamp', TRUE);
			$request_id_dev		= $ci->input->get_request_header('ID-DEV',TRUE);
			
			Load::model("sys/api");
			$tmodel = new \DeveloperModel();
			$data = $tmodel->get_by_IDDev($request_id_dev);
			
			
			
			
			if($data){
				
				$defaultTimezone 	= date_default_timezone_get();
				
				$oSignature 		= $request_id_dev . $request_time;

				$secretkey 			= $data->key;

				$gSignature 		= hash_hmac('sha256', $oSignature, $secretkey , true);

				$server_signature 			= base64_encode($gSignature);

				
				
				if($server_signature == $request_signature){
				
					date_default_timezone_set('UTC');
					
					$server_time = time();
					
					$rangeTime   = $server_time - $request_time;
					
					date_default_timezone_set($defaultTimezone);
					
					if($rangeTime >=abs(7200)) Response::json(['status'=>false,'code'=>406,'message'=>'Request Expayer !'],406 );
					
					
				}else{
					Response::json(['status'=>false,'code'=>406,'message'=>'Illegal Request..'],406 );
				}
				

					
			}else{
				show_error("Illegal Request..",406);
			}
			
		
		
   
	}
   
   
   
}
