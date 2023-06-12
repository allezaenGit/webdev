<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

include_once  APPPATH .  "helpers/ybs_generate_helper.php";
include_once "QueryBinding.php";

class Model extends QueryBinding {
	
	protected $attributes;
	

	static function table(){
		$mod = self::getMod();
		
		if(!isset($mod->table))
			return self::class;
		
		return $mod->table;
	}
	
	static function rules(){
		$mod = self::getMod();
		
		if(!isset($mod->rules))
			return self::class;
		
		return $mod->rules;
	}
	

	static function fillable(){
		$mod = self::getMod();
		return $mod->fillable;
	}
	
	static function hidden(){
		$mod = self::getMod();
		return $mod->hidden;
	}
	
	static function foreign(){
		$mod = self::getMod();
		return $mod->foreign;
	}
	



	static function all(){
		$mod = self::getMod();
		
		$q= $mod->db->get($mod->table)->result();
		
		
		$d = array();
		
		foreach($q as $v){
			$modx = self::getMod();
			$modx->attributes = $v;
			$d[] = $modx;
		}

		return $d;
	}
	
	static function findBy($data){
		
		$mod = self::getMod();
		unset($mod->tables);
		
		$q = $mod->db->get_where($mod->table, $data)->result();
		
		
		$d = array();
		foreach($q as $v){
			$modx = self::getMod();
			unset($mod->tables);
			$modx->attributes = $v;
			$d[] = $modx;
		}
		
		
		return $d;
	}
	


	static function find($id){
		$mod = self::getMod();
		unset($mod->tables);
		
		$primary="id";
		if(isset($mod->primary)){
			$primary = $mod->primary;
		}
	
		$mod->db->where($primary,$id);
		$q = $mod->db->get($mod->table)->row(); 
		$mod->attributes = $q;
		return $mod;
		
		
	}
	

	
	
	static function with($relation){
		$rels = explode(".",$relation);
		
		$all= self::all();	
		
		$x=0;
		foreach($all as $row){
			$data = self::injectRelation($row,$rels);
			$all[$x] = $data;
			$x++;
		}
		

		return $all;
	}
	
	
	private static function injectRelation($obj,$relation=array()){
		
		$x=0;
	
		foreach($relation as $rel){
			if($x ==0){
				$obj->attributes->$rel = $obj->$rel; 
			}else{
				$rels = $relation;
				$old =  $rels[$x-1];
				$all = $obj->attributes->$old;
				
				unset($rels[$x-1]);
				//$nRelation = array_values($nRelation);
				
				$y=0;
				foreach($all as $row){
					$data = self::injectRelation($row,$rels);
					$all[$y] = $data;
					$y++;
				}
				$obj->attributes->$old =$all;
			}
		$x++;
		}
	
		return $obj;
		
	}
	
	

	
	public function hasMany($modelJoin,$foreign){
		$primary = "id";
		
		if(isset($this->primaryKey)){
			$primary = $this->primaryKey;
		}

		$nModel 	= new $modelJoin();
		
		
		if(isset($this->attributes->$primary)){
			$id  	= $this->attributes->$primary;
			$q 		= $nModel->findBy([$foreign => $id]);	
			
			return $q;
		}else{
			return NULL;
		}
		
		
	}
	
	public function hasOne($tableJoin,$foreign){
		$primary = "id";
		if(isset($this->primaryKey)){
			$primary = $this->primaryKey;
		}
		
		if(isset($this->attributes->$primary)){
			$id  	= $this->attributes->$primary;
			$table 	= $this->table();
			
			$this->db->where($foreign,$id);	
			$q = $this->db->get($tableJoin)->row();
			return $q;
		}else{
			return NULL;
		}
		
		
	}


	

	
	public function __get($name)
    {
		
		if(!isset(get_instance()->$name)){
			
			$class = get_class($this);
			$func  = $name;
			$a = new $class();
			
			//mengecek jika fungsi exist
			$exist = method_exists($a,$func);
		
			if($exist){
				//memanggil kembali fungsi n menginject var attributes jika ada
				//agar dapat di gunakan kembali
				$att = get_object_vars($this);
				if(isset($att['attributes'])){
					$a->attributes = $att['attributes'];
				}
				return call_user_func([$a,$func]);
			}else{
				//jika fungsi tidak ada, cek variable
				$att = get_object_vars($this);
				
				//jika attributes di set
				//fungsi untuk mereturn langsung variable saat di panggil
				if(isset($att['attributes']->$name)){
					return $att['attributes']->$name;
				}
				
				return get_instance()->$name;
			}
			
		}else{
			return get_instance()->$name;
		}		
		
		
    }

	
	
	
	
	//$table=null,$data,$fillable
	static function create(){
		
		//initial
		$mod = self::getMod();
		
		$table;
		$data;
		$fillable;
		$carg = func_num_args();
		switch($carg){
				case 1:
				//hanya value
				$table = $mod->table;
				$data  = func_get_arg(0);
				
				if(isset($mod->fillable))
					$data  = fillable($data,$mod->fillable);
				
				break;
				case 2:
				//table name & value
				$table = func_get_arg(0);
				$data  = func_get_arg(1);
				
				
				break;
				case 3:
				//table name & value & fillable
				$table = func_get_arg(0);
				$data  = func_get_arg(1);
				$fillable = func_get_arg(2);
				$data  = fillable($data,$fillable);
				break;
		}
		
		
		$status = $mod->db->insert($table,$data);
		
		
		//return insert id to class
        $id = $mod->db->insert_id();
	
	
		
		$o=new \stdClass;
		$o->success = $status;
		$o->insert_id = $id;
		
		return $o;	
	}
	
	
	
	
	static function exist($data,$id=""){
		//initial
		$mod = self::getMod();
		$primary="id";
		if(isset($mod->primary)){
			$primary = $mod->primary;
		}

		
		$mod->db->where( $mod->table .".$primary <>",$id);
		$q = $mod->db->get_where($mod->table, $data)->result_array();
		
		if(count($q)>0){
			return true;
		}else{
			return false;
		}		
		
		
	}
	
	
	static function empty(){
		//initial
		$mod = self::getMod();
		$mod->db->empty_table($mod->table);
		return $mod->db->query("ALTER TABLE ".$mod->table." AUTO_INCREMENT = 1");
		
		
		
	}
	
	
	static function destroy($data){
		//initial
		$mod = self::getMod();
		
		//run  transaction
		$mod->db->trans_start();
		
		$primary="id";
		if(isset($mod->primary)){
			$primary = $mod->primary;
		}
		
		if(!empty($data)){
			$mod->db->where_in($mod->table . ".$primary" ,$data);	
			$mod->db->delete($mod->table);
		}
		
		
		//end transaction
		$mod->db->trans_complete();
		$status = $mod->db->trans_status();

		
		return $status;
	}
	
	
	
	/* Funtion Query*/
	
	static function insert($data){
		//initial
		$mod = self::getMod();
		
		$mod->data = $data; 
		$table= $mod->table;
		
		if(isset($mod->fillable))
			$data  = fillable($mod->data,$mod->fillable);

		$d = array(
			"table" => $table,
			"action"=> "insert",
			"data"  => $data,
		
		
		); 
		$mod->tables[] =  $d;
	
		return $mod;
	}
	
	
	
	static function update($data){
		//initial
		$mod = self::getMod();
		$mod->data = $data; 
			
		$table= $mod->table;
		
		if(isset($mod->fillable))
			$data  = fillable($mod->data,$mod->fillable);

		$d = array(
			"table" => $table,
			"action"=> "update",
			"data"  => $data,
		
		
		); 
		$mod->tables[] =  $d;
	
		return $mod;	
	}
	
	
	
	public function save($transaction=false){
		$status=false;
		//run  transaction
		if($transaction)
			$this->db->trans_start();
		
		//filter when fillable isset
		//var_dump($this->tables);
		foreach($this->tables as $table){
		
		
			if(isset($table['whereId']))
				$this->db->where($table['table'] .".id", $table['whereId']);
			
			
			if(isset($table['where']))
				$this->db->where($table['where']);
			
			
			$action = $table['action'];
			switch($action){
				case "insert" :
					$status = $this->db->insert($table['table'],$table['data']);
					break;
				case "update" :
					$status = $this->db->update($table['table'],$table['data']);
					break;
				case "delete" :
					$primary="id";
					if(isset($this->primary)){
						$primary = $this->primary;
					}
					$this->db->where_in($table['table'] . ".$primary" ,$table['data']);	
					$status = $this->db->delete($table['table']);
					break;
			}
			

		}
		
		//end transaction
		if($transaction){
			$this->db->trans_complete();
			$status = $this->db->trans_status();
		}
		$o=new \stdClass;
		$o->success = $status;
		
		
		return $o;	
	}
	
	
	
	
	/**/
	static function transaction(){
		//func_get_arg (0)
		//func_get_args()
		//func_num_args();
		
		$mod = self::getMod();
		
		
		$arg = func_get_args();
		$end = count($arg) -1;
		unset($arg[$end]);
		
		$mod->param = $arg;
		
		
	
		$mod->db->trans_start();
		
	
		$funcArg = func_get_args();
		$func = end($funcArg);
		$func($mod);
		
		
		
		
		
		
		$mod->db->trans_complete();
		
		$status = $mod->db->trans_status();
		$o=new \stdClass;
		$o->success = $status;
		
		
		return $o;	
		
	}
	
	
	
	

	
	
	// static function select($q){
		// echo "select Model";
		// $mod = self::getMod();
		// return $mod;
	// }
	
	
	
	
}






