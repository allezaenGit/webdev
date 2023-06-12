<?php 
namespace ybs\cli;
use ybs\cli\support;

defined('BASEPATH') OR exit('No direct script access allowed');
defined('cli') OR exit('No direct script access allowed');




class migrate {
	
	private $longVersion = 17;
	private $longName = 18;

	private $con;
	public function __construct(){
		$this->con = new model();
	}

	
	public function install($file=null){
		$d_map;
		if($file){
			$d_map[] = $file .".php";
		}else{
			$d_map = directory_map(APPPATH.'/migrate/',1);
		}
		
		
		$this->create_migrate_table();
		
		if(empty($d_map)){
			echo "\nFailed|File Migration not found..!";
			exit();
		}
		
		//get migration batch
		$mod = new model;
		$mod->db->select_max('batch');
		$bc = $mod->db->get('migrations')->row();
		$batch_number =  $bc->batch + 1;
		

	
		
		$xready =  0;
		foreach($d_map as $val){
			
			$version 		= substr($val,0,$this->longVersion);
			$name 			= substr($val,$this->longName);
			
			
			//check if already install
			$file_name = str_replace(".php","",$val);
			$mod->db->where("migration",$file_name);
			$already = $mod->db->get('migrations')->row();
			
			if($already ==  NULL){
				echo "\nMigrated : " .$val . "\n";
				
				include APPPATH ."migrate/" . $val;
				$className 		= substr($name,0,strlen($name)-4);
				
				
				$c = new $className();
				$c->up();
				
				
				//insert batch
				$field = array("migration"=>$file_name,"batch"=>$batch_number);
				$mod->db->insert("migrations",$field);
				$xready++;
			}
			
		
		
		}
		
		if($xready > 0){
			echo "Done! \n\n";
		}else{
			echo "\nNothing to migrate! \n\n";
		}
		
		
	} 
	
	
	
	public function rollback($roll="all"){
		//check db for get file_name
		$mod = new model;
	
	
		
		if($roll=="all"){
				$mod->db->select(array("migration"));
				$file_name = $mod->db->get("migrations")->result_array();
				if(empty($file_name)) echo "first pointer, cant rollback";
				$this->drop($file_name);
				
		}else{
			
			$arg = explode("=",$roll);
			if(count($arg) !== 2 ) echo "your command not valid !";
			
			if(strtolower($arg[0]) !== "--step") {
				echo "your command not valid !";
				return;
			} 
			
			$rollCount = $arg[1];
			$mod->db->select_max('batch');
			$bc = $mod->db->get('migrations')->row();
			
			
			if($bc->batch ==null) return;
			
			while($rollCount > 0){
				
				$mod->db->select(array("migration"));
				$mod->db->where("batch",$bc->batch);
				$file_name = $mod->db->get("migrations")->result_array();
				
				$this->drop($file_name);
				
				
				if($bc->batch ==1){
					return;
				}
				$bc->batch--;
				$rollCount--;
			}
			

			
		}
	
	}
	

	
	private function drop($file_name){
		$mod = new model;
		foreach ($file_name as $val){
					$className =substr($val['migration'],$this->longName);
					
					echo "\nRollback : " .$val['migration'] . "\n";
					
					$file_name = $val['migration']. ".php";
					include APPPATH ."migrate/" . $file_name;
				
					
					
					$c = new $className();
					$c->down();
					
					$mod->db->where('migrations.migration',$val['migration']);	
					$mod->db->delete("migrations");
					
		}
	}
	
	
	public function get_table_schema(){
		
		$afield = array("table_name");
		$this->con->db->select($afield);
		$this->con->db->where("tables.table_schema",$this->con->config->database);
		$data= $this->con->db->get("information_schema.tables")->result_array();
		return $data;
	}
	

	public function get_blueprint_info($table_name){
		$col_name;
		$col_type;
		$data_type;
		$col_default;
		$is_nullable;
		$extra;
		$length_type;
		
		if(!$this->con->db->table_exists($table_name)){
				echo "Error..!!\nTable : " .$table_name . " not exist !";
				exit();
		}
		
		//$con = new model();
		$afield = array("COLUMN_NAME","COLUMN_TYPE","DATA_TYPE","COLUMN_KEY","COLUMN_DEFAULT","IS_NULLABLE","EXTRA");
		$this->con->db->select($afield);
		$this->con->db->where("columns.table_schema",$this->con->config->database);
		$this->con->db->where("columns.table_name",$table_name);
		$data= $this->con->db->get("information_schema.columns")->result_array();
		
		
		$idx = $this->con->db->query("SHOW INDEX FROM $table_name")->result_array();
		
		
		
		//convert key_name to index
		//menghilangkan duplicate key
		$keys = array();
		foreach($idx as $val){
			$key = $val['Key_name']; 
			$keys[$key] = null; 
		}
		
		//mendapatkan column name berdasarkan index
	    $final_index  = array();
		foreach($keys as $i => $val){
				
				$col = array();
				
				foreach($idx as $v){
					if($v['Key_name']==$i){
						$col[] = $v['Column_name'];
					}
				}
				
				$final_index[$i]  =$col;
				
		}
		
		unset($final_index['PRIMARY']);
	
		
		
		$output = "\n";
	
		$x=0;
		foreach($data as $val){
			$col_name 		= strtolower($val['COLUMN_NAME']);
			$col_type 		= strtolower($val['COLUMN_TYPE']);
			$data_type 		= strtolower($val['DATA_TYPE']);
			$col_default	= strtolower($val['COLUMN_DEFAULT']);
			$is_nullable 	= strtolower($val['IS_NULLABLE']);
			$extra			= strtolower($val['EXTRA']);
			$col_key		= strtolower($val['COLUMN_KEY']);
		
			$length = str_replace($data_type,"",$col_type);
		    $length = str_replace("(","",$length);
			$length = str_replace(")","",$length);
			
			$dl = "";
			if(trim($length)!==""){
				$dl=",$length";
			}
			
			$primary = "";
			if($col_key=="pri"){
				if($data_type !=="tinyint" && $data_type !=="smallint" && 
					$data_type !=="int" && $data_type !=="integer"  &&
					$data_type !=="bigint" )
				$primary = "->primary()";
			}
			
			
			$autoInc = "";
			if($extra=="auto_increment"){
				$autoInc = "->autoIncrement()";
			}
			
			$isnull = "";
			if($is_nullable=="yes"){
				$isnull = "->nullable()";
			}
			
			$default ="";
			if($col_default !==null && $col_default !=='null' && $col_default !==''){
				$cd = "$col_default";
				$cd =str_replace("'","",$cd);
				$cd =str_replace("\"","",$cd);
				$default ="->default('$cd')";
			}
			
			
			//######CREATE INDEX IN LINE #######
			//$idxCode 		= $x."__";
			$index 			= "";
			$index_single	= "";
			
		
			$ival = @$final_index[$col_name];
			if($ival){
				if(count($ival) > 1 ){
					
					$fname = "";
					foreach($ival as $v1){
						$fname .="\"$v1\"". ",";
					}
					$fname = rtrim($fname,",");
					$index_single = "					\$table->index(\"$col_name\",[$fname]);\n";
					
				}else{
					$index = "->index()";
				}
				unset($final_index[$col_name]);
				
			}
			
			
			
			
			
			//######END CREATE INDEX IN LINE #######	
		
		
		
		
		
			//char,decimal,double,float,string
			//change int & varchar to integer,string
			if($data_type=="tinyint") $data_type =  str_replace("tinyint","tinyInteger",$data_type);
			if($data_type=="smallint") $data_type =  str_replace("smallint","smallInteger",$data_type);
			if($data_type=="int") $data_type =  str_replace("int","integer",$data_type);
			if($data_type=="bigint") $data_type =  str_replace("bigint","bigInteger",$data_type);
			if($data_type=="varchar" ) $data_type =  str_replace("varchar","string",$data_type);
			
			if(	$data_type =="char" || $data_type =="decimal" || 
				$data_type =="double" || $data_type =="float" || 
				$data_type =="string"){
			}else{
				$dl="";
			}
	
			
			$output .= "					\$table->$data_type"."('$col_name'$dl)$primary".""."$autoInc".""."$isnull".""."$default".""."$index ;\n";
		
			$output .= $index_single;
		
		
		  $x++;	
		 }
		
		//create sisa index yang tidak sama name nya dengan field table
		  foreach($final_index as $iname => $ival){
				$fname = "";
				foreach($ival as $v1){
					$fname .="\"$v1\"". ",";
				}
				$fname = rtrim($fname,",");
				$index_single = "					\$table->index(\"$iname\",[$fname]);\n";
				$output .= $index_single;	
		  }	
		
		
		
		return $output;
		
	}
	
	
	

	
	
	private function create_migrate_table(){
		$a = new model();
		$exist = $a->db->table_exists("migrations");
		if(!$exist){
			$f = array(
				"id" =>array(
					"type" 				=> "INT",
					"auto_increment"	=> TRUE,
				),
				"migration" =>array(
					"type" 				=> "VARCHAR",
					"constraint"		=> 191,
				),
				"batch" =>array(
					"type" 				=> "INT",
				),
			
			);
			$a->dbforge->add_field($f);
			$a->dbforge->add_key("id",TRUE);
			$a->dbforge->create_table("migrations");
			
		}
	}
	

	
	
	
	
}