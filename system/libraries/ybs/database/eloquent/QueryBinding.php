<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class QueryBinding extends CI_Model{
	


/*
 * ------------------------------------------------------
 *  select
 * ------------------------------------------------------
 *  @var 		mixed 		$q  array or string
 *	@return 	Object		
 */
static function select($q){
	$mod = static::getMod();
	$mod->db->select($q);
	return $mod;
}	

/*
 * ------------------------------------------------------
 *  where
 * ------------------------------------------------------
 *  @var 		mixed 		$q  array or string
 *	@return 	Object		
 */
static function where($q){
	$mod = static::getMod();
	$mod->db->where($q);
	return $mod;
}

/*
 * ------------------------------------------------------
 *  get
 * ------------------------------------------------------
 *	@return 	Object		
 */
static function get(){
	$mod = static::getMod();
	return $mod->db->get($mod->table())->result();

}



/*
 * ------------------------------------------------------
 *  join
 * ------------------------------------------------------
 *  @var 	String 		$tbl  		table name
 *	@var	String		$foreign	field foreign 
 *	@var	String		$prim		field primary
 *	@var	String		$type		LEFT || RIGHT || INNER
 */
static function join($tbl,$foreign,$prim=null,$type="LEFT"){
	$mod = static::getMod();
	
	$tblPrimary  = $mod->table();
	
	$primary = "id";
	if($prim){
		$primary = $prim;
	}else{
		if(isset($mod->primary))
			$primary = $mod->primary;
		
	}
	
	
	$q = $tbl . ".$foreign=" . $tblPrimary . "." . $primary;
	
	$mod->db->join($tbl,$q,$type);
	return $mod;
}	
	
/*
 * ------------------------------------------------------
 *  limit
 * ------------------------------------------------------
 *  @var 	Integer		$q 	 		Limit data
 */
static function limit($q){
	$mod = static::getMod();
	$mod->db->limit($q);
	return $mod;
}	

/*
 * ------------------------------------------------------
 *  max
 * ------------------------------------------------------
 *  @var 	String		$q 	 		Field db
 */
static function max($q){
	$mod = static::getMod();
	$mod->db->select_max($q);
	return $mod;
}

/*
 * ------------------------------------------------------
 *  min
 * ------------------------------------------------------
 *  @var 	String		$q 	 		Field db
 */
static function min($q){
	$mod = static::getMod();
	$mod->db->select_min($q);
	return $mod;
}			

/*
 * ------------------------------------------------------
 *  sum
 * ------------------------------------------------------
 *  @var 	String		$q 	 		Field db
 */
static function sum($q){
	$mod = static::getMod();
	$mod->db->select_sum($q);
	return $mod;
}









protected static function getMod(){
			$c  = get_called_class();
			$ci  = new $c;
			
			//set table name
			if(!isset($ci->table)){
				$ci->table = static::class;
			}
			
			//$ci->tables = array();
			return $ci;
}

	
	
}	