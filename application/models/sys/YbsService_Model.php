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
class YbsService_Model extends CI_Model {
  

	
	function __construct(){
        parent::__construct();
    }
	

	
    public function get_data_combobox($table_name,$field_show,$where,$value_where,$wstring="",$hasOne="",$primary="id"){
		if(!$primary) $primary = "id";
		$afs = explode(",",$field_show);
		
		$con='CONCAT('.$afs[0];
		$str = "";
		 $x =0;
		foreach($afs as $val){
			if($x>0){
				$str .=  ', " - " ,'. $val ;
			}
			
			$x++;
		}
		
		
		$final  = $con . $str . ") as text";
		
		
		//$field_show = $field_show . ' as text';
		$afield = array(
			$table_name . ".$primary as value",
			//$field_show,
			$final,
		);	
	
		$this->db->select($afield);
		
		if($where !=="") $this->db->where($where,$value_where);
		if($wstring!=="")$this->db->where($wstring);
		
		if($hasOne !=="") {
			
			$d = explode(",",$hasOne);
			
			foreach($d as $v){
				$t = explode(":",$v);
				$this->db->join($t[0],$t[1],"LEFT");
			}
			
			
		}
	 
		$query=$this->db->get($table_name);
		return $query->result_array();
    }
	
	
	public function emptyTable($table){
		 $this->db->empty_table($table);
		 $this->db->query("ALTER TABLE $table AUTO_INCREMENT = 1");	
	}
	
	
	

       
}
