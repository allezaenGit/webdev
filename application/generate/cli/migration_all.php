<?php
namespace user\generate\cli;
use \ybs\cli\template\support\BluePrint;
use \ybs\cli\template\support\Schema;

class migration_all {

	
public function up(BluePrint $bp){

Schema::create($bp,function(BluePrint $data){
$data->output ="<?php

use ybs\cli\support\Schema;
use ybs\cli\support\Blueprint;

class $data->className  {
				
	public function up(){
		$data->schema_all
	}
	
	public function down(){
		$data->schema_drop
	}
		
		
		

}


		
";


});
	 
}
}