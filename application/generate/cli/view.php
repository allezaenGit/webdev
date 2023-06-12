<?php
namespace user\generate\cli;
use \ybs\cli\template\support\BluePrint;
use \ybs\cli\template\support\Schema;

class view{
	
public function up(BluePrint $bp){

Schema::create($bp,function(BluePrint $data){
$data->output ="

<div class='col-lg-12'>
<button type='button' class='btn btn-small btn-danger bt-block form-control' >Hai..ini Page baru !</button>
</div>


		
";


});
	 
}

	
}
