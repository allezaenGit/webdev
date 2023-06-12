<?php
namespace user\generate\cli;
use \ybs\cli\template\support\BluePrint;
use \ybs\cli\template\support\Schema;

class controller {

	
public function up(BluePrint $bp){

Schema::create($bp,function(BluePrint $data){
$data->output ="<?php

if (!defined('BASEPATH'))
		exit('No direct script access allowed');
	
use ybs\general\Load;
use ybs\general\Validation;
use ybs\general\Storage;


use ybs\http\Request;
use ybs\http\Response;
	

class $data->className extends CI_Controller {
				
		function __construct(){
			parent::__construct();
			$data->loadModel
		}
			   
		function index(){
		    $data->loadIndexContent
		}
		
		
		

}


		
";


});
	 
}


public function loadModel(BluePrint $data){
	return "\$this->load->model('$data->path$data->className"."Model"."','tmodel');";
}

public function loadIndexContent(BluePrint $data){
	return "
			\$breadcrumb = [
				'$data->className' 	=>   url(),
			 ];
	
			\$data = [
				'breadcrumb'			=> \$breadcrumb,
				'title_page_big'		=> 'New Page',
				'link_create'			=> url('..YOUR FUNCTION..'),
				'link_update'			=> url('..YOUR FUNCTION..'),
				'link_delete'			=> url('..YOUR FUNCTION..'),
			];
			
			
			
			response()->view('$data->path$data->className"."View"."',\$data);
			";	
}

	
}




		
		

		
		



	

	
		

