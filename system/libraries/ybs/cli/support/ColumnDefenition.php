<?php
namespace ybs\cli\support;
if (!defined('cli'))
    exit('No direct script access allowed');


class ColumnDefenition{


public $column_pattern = array();
public $index_pattern = array();
public $indexDrop_pattern = array();
public $key_pattern="";


public function __construct(){
	
}	




	
public function index($name=NULL,$col=NULL){
	$this->_inject_index($name,$col);
	return $this;
}

public function unique(){
	
}	

	
	
public function autoIncrement(){
	$this->_inject_type("auto_increment",TRUE);
	return $this;	
}


public function primary(){
	$this->_inject_type("primary",NULL);	
	return $this;
}



public function charset($utf = 'utf8'){
	
}
	
	
public function collation($utf='utf8_unicode_ci'){
	
}	

public function comment($comment = 'my comment'){
	
}

public function default($value = NULL){
	$this->_inject_type("default",$value);
	return $this;
}

public function first(){
	
}
	
public function nullable($value = TRUE)	{
	$this->_inject_type("null",TRUE);
	return $this;
}

public function unsigned($value = TRUE){
	$this->_inject_type("unsigned",TRUE);
	return $this;
}


private function _inject_index($index_name,$index_value){
	//mendapatkan key pada array column pattern
	//key tersebut merupakan nama field db
	$columns 	= array_keys($this->column_pattern);
	
	
	$iname = $index_name;
	$ival  = $index_value;
	
	if(!$iname) 			$iname = end($columns);
	if(!is_array($ival)) 	$ival  = end($columns);
	
	$this->index_pattern [$iname] = $ival;
	
}





private function _inject_type($index_name,$index_value){
	
	//mendapatkan key pada array column pattern
	//key tersebut merupakan nama field db
	$columns 	= array_keys($this->column_pattern);
	
	
	//mendapatkan nama column terakhir pada column pattern
	$col   = end($columns);
	$coI2   = end($columns);
	
	if($index_name=="auto_increment"){
		$this->key_pattern = array($col,TRUE);
	}
	
	if($index_name=="primary"){
		$this->key_pattern = array($col,TRUE);
		return;
	}
	
	
	//deprecate
	// if($index_name=="index"){
		// if(is_array($index_value)) $col = $index_value;
		// $this->index_pattern [$coI2] = $col;
		// return;
	// }
	
		
	
	
	
	$type = $this->column_pattern[$col];

	if(!is_array($type))  return; //menghindari error dari current_timestamp,krn bukan berupa array yang di set dari class Blueprint->add_column
	
	$type[$index_name] = $index_value;
	$this->column_pattern[$col] = $type;
	
	
	
}
	
	
}