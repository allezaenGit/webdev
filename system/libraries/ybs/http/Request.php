<?php
namespace ybs\http;


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Request{
	
	
	static function get($index=null,$xss_clean=true,$obj=true){
		return self::getRequest($index,$xss_clean,"get",$obj);
	}
	
	static function post($index=null,$xss_clean=true,$obj=true){
		return self::getRequest($index,$xss_clean,"post",$obj);
	}
	
	static function put($index=null,$xss_clean=true,$obj=true){
		return self::getRequest($index,$xss_clean,"put",$obj);
	}
	
	static function delete($index=null,$xss_clean=true,$obj=true){
		return self::getRequest($index,$xss_clean,"delete",$obj);
	}
	
	static function all($index=null,$xss_clean=true,$obj=true){
		return self::getRequest($index,$xss_clean,null,$obj);
	}
	
	static function ybsapi($url,$header,$method,$param=null){
		if($param) $param = http_build_query($param);
		$ch = curl_init();
		switch(strtolower($method)){
			case "get" :
				$url .= "?" . $param;
				
			break;
			case "post" :
				curl_setopt($ch,CURLOPT_POSTFIELDS,$param);
			case "put" :
			case "delete" :
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
				curl_setopt($ch,CURLOPT_POSTFIELDS,$param);
			break;
			
		}
		
		$header::Generate();
		
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header::getSignature(true));
		
		
		
		$output = curl_exec($ch);
		curl_close($ch);
		
		return $output;
	}
	
	
	protected static function getRequest($index,$xss_clean,$method,$obj){
		$CI = & get_instance();
		
		if($method==null || $method==""){
			//for all methode
			$method = $_SERVER['REQUEST_METHOD'];
			$method = strtolower($method);
		}else{
			$method = strtolower($method);
		}
		
		$cnt = $CI->ybsArray;
		
		$data;
		$df;
		if($cnt !==null && $cnt !==""){
			$df = $CI->input->$method($cnt,$xss_clean);
		}else{
			$df = $CI->input->$method();
			
		}
		
		
		
		
		if(!isset($index)){
			$data = $df;
		}else{
			$data = @$df[$index];
		}
		
		//convert to Object
		if($obj){
			if(is_array($data)){
				$data = json_encode($data);
				$data = urldecode($data);
				$data = json_decode($data);
			}			
		}
		
		return $data;
	}
	
	
}