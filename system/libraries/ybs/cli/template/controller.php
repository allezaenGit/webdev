<?php
namespace ybs\cli\template;
use ybs\cli\template\support\BluePrint;
use ybs\cli\template\support\Schema;

class controller {

	
public function up(BluePrint $bp){

Schema::create($bp,function(BluePrint $data){
$data->output ="<?php

if (!defined('BASEPATH'))
		exit('No direct script access allowed');

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
	return "\$this->load->model('$data->path$data->className"."_model"."','tmodel');";
}

public function loadIndexContent(BluePrint $data){
	return "\$d = array();
			\$d['title_page_big'] = 'New Page Blank';
			\$this->template->load('$data->path$data->className"."_view"."',\$d);
			";	
}

	
}




		
		

		
		



	

	
		

