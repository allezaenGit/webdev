<?php
namespace ybs\cli\support;
use ybs\cli\support\Blueprint;
use ybs\cli\model;

require_once "Blueprint.php";








class Schema  {
	
	
	public function __construct(){
	
		
	}
	
	public static function create($table,$f){
		$a = new Blueprint();
		$f($a);
		$a->table_name($table);
		$a->run();
	}
	
	public static function table($table,$f){
		$a = new Blueprint();
		$f($a);
		$a->table_name($table);
		$a->update();
	}

	public static function update($table,$f){
		$a = new Blueprint();
		$f($a);
		$a->table_name($table);
		$a->update();
	}	
		
	
	public static function dropIfExists($table){
		$a = new model();
		$a->dbforge->drop_table($table,TRUE);
	}

	
	
	
}
