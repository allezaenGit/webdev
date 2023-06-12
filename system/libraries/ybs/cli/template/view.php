<?php
namespace ybs\cli\template;

use ybs\cli\template\support\BluePrint;
use ybs\cli\template\support\Schema;

class view{
	
public function up(BluePrint $bp){

Schema::create($bp,function(BluePrint $data){
$data->output ="

<button class='btn btn-small btn-danger'>Haloww</button>
Hai...Ini Page Blank Baru !





		
";


});
	 
}

	
}
