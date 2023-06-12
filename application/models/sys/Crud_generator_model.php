<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Authorization
 *
 * @author Dhiya
 */
class Crud_generator_model extends CI_Model {

	function __construct(){
        parent::__construct();
		$this->load->dbforge();
		
    }

	function get_table_list(){
		$table = $this->db->list_tables();
		$table_list = array();
		$x=0;
		foreach($table as $val){
			$ex = explode('_',$val);
			if($ex[0] <> 'sysx' ){
				$table_list[$x] = $val;
				$x++;
			}
		}
		return $table_list;
	}

	
	/*
		$all true  get all field
			 false get field without field update_at,delete_at
	*/
	function get_field_info($table_name,$all=true){
		$list = $this->db->field_data($table_name);
		
	
		if(!$all) {
			$x=0;
			foreach($list as $f){
				$nm = strtolower($f->name);
				if($nm == "update_at" || $nm=="delete_at"){
						unset($list[$x]);
				}
				 $x++;
			}
		
		}
		array_splice($list , 0, 0);
		
		
		return $list;
	}
	
	function create_field_user_input($table_name){
		
		if (!$this->db->field_exists('user_input', $table_name)){
				$fields = array( 'user_input' => array('type' => 'INT'));
				$this->dbforge->add_column($table_name, $fields);
		}
		
	}
	
	function create_field_update_at($table_name){
		
		if (!$this->db->field_exists('update_at', $table_name)){
				$fields = array( 'update_at' => array('type' => 'TIMESTAMP'));
				$this->dbforge->add_column($table_name, $fields);
		}
		
	}
	
	function create_field_delete_at($table_name){
		
		if (!$this->db->field_exists('delete_at', $table_name)){
				$fields = array( 'delete_at' => array(	
														'type' => 'DATETIME',
														'null' => FALSE
													 ));
				$this->dbforge->add_column($table_name, $fields);		
		}
		
	}
	
	function get_count($table_name){
      return$this->db->count_all($table_name);
	}

	
}	