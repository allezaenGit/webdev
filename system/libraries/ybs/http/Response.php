<?php
namespace ybs\http;


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Response{
	
	private $data;
	
	static function view($view,$data=null){
		$CI = & get_instance();
		return $CI->template->load($view,$data);
	}
	
	static function json($data,$status=200){
		header('Content-Type: application/json');
		http_response_code($status);
		
		if($data===TRUE || $data===FALSE){
			echo \Outputview::autoResult($data);
			die;
		}
		
		$a = $data instanceof \Outputview;
		
		if($a){
			$data = $data->result();
		}	
		if(isset($data->elementid)){
			$df = $data->elementid;
			$df = str_replace("[","\\[",$df);
			$df = str_replace("]","\\]",$df);
			$data->elementid = $df;
		}
		
		$isJson = @json_decode($data);
		if($isJson){
			echo $data ;
		}else{
			echo $data = json_encode($data);	
		}
		
		die;
	}
	
	static function dataTables($data,$serverside=TRUE){
			$o = new \Outputview();
			$o->success	= true;
			$o->serverside	= $serverside;
			$o->message	= $data;
			echo $o->result();
			die();
	}
	
	
	
	static function goto($url,$message=null,$type="success",$dataRequest=null){
		$CI = & get_instance();
		$msgType;
		switch(strtolower($type)){
				case "success" : 
					$msgType = "redirect_success";
					break;
				case "warning" : 
					$msgType = "redirect_warning";
					break;
				case "danger" :
				case "failed" :
				case "error"  :
				 $msgType = "redirect_failed";
					break;
				default :
					$msgType = "success";
		}
		
		if($message) $CI->session->set_flashdata($msgType,$message);
		if($dataRequest) $CI->session->set_flashdata('request',$dataRequest);
		
		if($CI->input->is_ajax_request()){
			$o = new \Outputview();
			$o->success	= 'redirect';
			$o->message	= $url;

			
			echo $o->result();
		}else{

			redirect($url);
		}
		exit();
	}
	

	
	
		
	
}

