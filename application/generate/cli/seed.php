<?php
namespace user\generate\cli;
use \ybs\cli\template\support\BluePrint;
use \ybs\cli\template\support\Schema;

class seed {

	
public function up(BluePrint $bp){



Schema::create($bp,function(BluePrint $data){
$data->output ="<?php

if (!defined('BASEPATH'))
		exit('No direct script access allowed');
	
use ybs\cli\model;
	

class $data->className extends model {
				
		public function run(){
			\$this->db->empty_table('$data->table_name');
			
			
			$data->dataTable

		}

}


		
";


});
	 
}






	
}
//end class



		
		

		
		



	

	
		

