<?php
namespace user\generate\cli;
use \ybs\cli\template\support\BluePrint;
use \ybs\cli\template\support\Schema;

class migration {

	
public function up(BluePrint $bp){

Schema::create($bp,function(BluePrint $data){
$data->output ="<?php

use ybs\cli\support\Schema;
use ybs\cli\support\Blueprint;

class $data->className  {
				
	public function up(){
		Schema::create(\"..your table name..\",function(Blueprint \$table){
			
		});

	}
	
	public function down(){
		Schema::dropIfExists(\"..your table name..\");
	}
		
		
		

}


		
";


});
	 
}
}