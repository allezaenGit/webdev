<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
   * Output view di gunakan untuk output pada ajax request
   * yang menggunakan ybsRequest template
   * pesan output memiliki 3 kriteria yaitu : "true","false","redirect"
   *
   *  MENAMPILKAN PESAN SUKSES :
   *
   *  $o = new Outputview(); 
   *  
   *  $o->success 	= "true";
   *  $o->message 	= "isi pesan disini";
   *  $o->elementid	= "#idelement";
   *  echo $o->result();
   *  return;
   *
   *  akan mengembalikan pesan dengan alert success,dengan auto focus ke elementid
   *
   *  MENAMPILKAN PESAN GAGAL :
   *
   *  $o->success 	= "false";
   *  $o->message 	= "isi pesan disini";
   *  $o->elementid	= "#idelement";
   *  echo $o->result();
   *  return;
   *
   *  akan mengembalikan pesan dengan alert error,dengan auto focus ke elementid
   *
   *  REDIRECT
   *  $o->success 	= "redirect";
   *  $o->message 	= "url redirect";
   *  echo $o->result();
   *  return;
   *
   *  akan melakukan redirect.
   *
   *
   **/
class Outputview {
   public $success,$message,$elementid, $redirect ,$serverside;
   private $CI;
   

   public function __construct() {
           $this->success='';
           $this->message='';
           $this->elementid='';
		   $this->redirect='';
		   $this->serverside = '';
		   $this->CI = &get_instance();
   }
   
    private function reset_variable(){
		   $this->success='';
           $this->message='';
           $this->elementid='';
		   $this->redirect='';
		   $this->serverside = '';
	}
   
   public function not_empty($value,$elementid=""){
	   if($this->message==''){
		    $this->message = 'Tidak boleh kosong !';
	   }
	  
	
	   if($value=='' || $value=='null' || $value==null){
		    $this->success 		= 'false';
			$this->elementid	= $elementid;
			return false;
	   }else{
		    $this->reset_variable();
			return true;
	   }
   }
   
   public function not_exist($exist,$elementid=""){
	   if($this->message==''){
			$this->message = 'Opps..data sudah digunakan !!';
	   }
	   if($exist){
		    $this->success 		= 'false';
			$this->elementid	= $elementid;
			return false;
	   }else{
		    $this->reset_variable();
		     return true;
	   }
	   
   }
   
	/**
     * Mengembalikan nilai success,message,elementid dalam bentuk json_encode
     * @return json_encode, mengembalikan nilai dalam bentuk json encode
     **/
    public function result(){
	
		$dd = $this->elementid;
		$d = str_replace("[","\\[",$dd);
		$d = str_replace("]","\\]",$d);
		$this->elementid = $d;
	
		
		$this->sec_val			=  $this->CI->security->get_csrf_token_name()."=".$this->CI->security->get_csrf_hash()."&"; //new
	
		if($this->serverside=='true' || $this->serverside==TRUE){
			$d = $this->message;
			$this->draw  			=  $d['draw'];//new
			$this->recordsTotal		=  $d['recordsTotal'];//new
			$this->recordsFiltered	=  $d['recordsFiltered'];//new
			$this->message   		=  $d['data'];//new
		}
			
		
		
		
		$r = json_encode($this);
		$this->reset_variable();
       return  $r;
   }
   
   
   
   public function auto_result($success,$elementid=""){
	   if($success){
		  
		   $this->success ='true';
		   	if($this->message==''){
				$this->message = 'Data berhasil di proses';
			}
	   }else{
		   $this->success ='false';
		   if($this->message==''){
				$this->message = 'Opps..gagal memproses data !';
			}
	   }
	   
	   
	    $this->elementid 		=  $elementid;
		$this->sec_val			=  $this->CI->security->get_csrf_token_name()."=".$this->CI->security->get_csrf_hash()."&";
	    
		$r = json_encode($this);
	 
	   $this->reset_variable();
	    
       return  $r;
	   
   }
   
    static function autoResult($success,$elementid=""){
	   $o =new Outputview();
	   return $o->auto_result($success,$elementid);
   }
   
   
   
}
