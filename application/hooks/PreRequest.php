<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PreRequest {
   
	
	/**
	 * data container indetification 
	 */
    public function pre(){
	    
		$CI = & get_instance();
		$method = $_SERVER['REQUEST_METHOD'];
		$defContainer = $CI->input->post("ybsArray");
		if ($method == 'POST'){
			$defContainer = $CI->input->post("ybsArray");
		} elseif ($method == 'GET'){
			$defContainer = $CI->input->get("ybsArray");
		} elseif ($method == 'PUT'){
			$defContainer = $CI->input->put("ybsArray");
		} elseif ($method == 'DELETE'){
			$defContainer = $CI->input->delete("ybsArray");
		} else {
			// Method unknown
		}
	
		$CI->ybsArray = $defContainer; 
		
	}
	

  
}

if(!function_exists("request")){
	/**
	 * @param	mixed	$index		Index for item to be fetched from $_GET,$_POST,$_PUT,$_DELETE
	 * @param	bool	$xss_clean	Whether to apply XSS filtering
	 * @return	bool	$obj 		TRUE for object ,FALSE for array 
	 */
	function request ($index=null,$xss_clean=true,$obj=false){
		$CI = & get_instance();
		$req =  @$CI->session->flashdata('request');
		
		if($req) return $req;
		
			return ybs\http\Request::all($index,$xss_clean,$obj);
		
		
		
	}
	
	
}



function view($view ,$data=null){
	$CI = & get_instance();
	return $CI->template->load($view ,$data);
}



function response(){
	$response = new ybs\http\Response();
	return $response;
}
