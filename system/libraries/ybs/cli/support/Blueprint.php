<?php
namespace ybs\cli\support;
use ybs\cli\model;
use ybs\cli\support\ColumnDefenition;


if (!defined('cli'))
    exit('No direct script access allowed');

include "ColumnDefenition.php";



class Blueprint extends ColumnDefenition{
	
	
public 
$char 				= array(),
$bigIncrement 		= array(),
$bigInteger 		= array(),
$binary 			= array(),
$date 				= array(),
$dateTime 			= array(),
$decimal 			= array(),
$double 			= array(),
$float 				= array(),
$increment 			= array(),
$integer 			= array(),
$mediumInteger 		= array(),
$mediumText 		= array(),
$multiLineString 	= array(), 
$longText 			= array(),
$smallIncrement 	= array(),
$smallInteger 		= array(),
$string 			= array(),
$text 				= array(),
$timestamp 			= array();
        

private $table_name;
private $column_name;
private $con;		
		public function __construct(){
			$this->con= new model();
		}
		public function table_name($name){
			$this->table_name = $name;
		}
		
		public function run(){
			
			$tbl_exist = $this->con->db->table_exists($this->table_name);
			
		
			if($tbl_exist){
				echo "skip table : $this->table_name..Already Exist\n";
				return;
			}
			
			
			$this->con->dbforge->add_field($this->column_pattern);
			
			if(!empty($this->key_pattern)){
				$this->con->dbforge->add_key($this->key_pattern[0],$this->key_pattern[1]);
			}
			
			
			echo "create table : " .$this->table_name ;
			$this->con->dbforge->create_table($this->table_name);
			$done = date("H:i:s",time());
			echo "		finish(" . $done.")\n";
			
			
			if(!empty($this->index_pattern)){

					//$ip adalah nama column
					foreach($this->index_pattern as $ip => $val){
						$this->createIndexTable($this->table_name,$ip,$val);
					}
					
			}
			
			
	
		}
		
		public function update(){
			$column = $this->column_pattern;
			
			//drop column table 
			foreach($column as $i => $v){
				$drop = @$column[$i]['drop'];
				
				if($drop){
					$exist =  $this->con->db->field_exists($i,$this->table_name);	
					if($exist){
						$this->con->dbforge->drop_column($this->table_name, $i);
						
						unset($column[$i]);
					}	
				}
			}	

			//drop index
			$indexDrop = $this->indexDrop_pattern;
			
			foreach($indexDrop as $i => $v){
				
					$this->dropIndexTable($this->table_name,$i);
			}
			
			

			foreach($column as $i => $v){
				//mengecek jika column sudah ada
				$exist =  $this->con->db->field_exists($i,$this->table_name);	
				
				if($exist){
				
					//mengecek apakah field yang di ubah adalah primary key
					$isPrimary =  @$column[$i]['auto_increment'];
					
					if($isPrimary){
						//create new col data
						$nColumn = [$i => $column[$i] ];
						
						//remove autoincrement from array
						unset($nColumn[$i]['auto_increment']);
						
						$this->con->dbforge->modify_column($this->table_name,  $nColumn);
						
						//remove old  name index 
						$this->dropIndexTable($this->table_name,$i);
						
						//create autoincreament
						$newname  = @$nColumn[$i]['name'];
						if($newname){
							$sql = "ALTER TABLE  $this->table_name  MODIFY $newname INT NOT NULL AUTO_INCREMENT";
							$this->con->db->query($sql);
							
							//set new colpartn
							$this->column_pattern[$newname] = $$nColumn[$i];
							//unset old colpart
							unset($this->column_pattern[$i]);
							
							
							
							//mengecek jika ada perintah baru membuat index
							$i  = @$this->index_pattern[$i];
							
							//jika ada perintah maka ganti namanya
							if($i){
								//set new index partn
								$this->index_pattern[$newname] = $newname;
								//remove old index
								unset($this->index_pattern[$i]);

							}
							
														
						}
						
						
					}else{	
						$nColumn = [$i => $column[$i] ];
						$this->con->dbforge->modify_column($this->table_name,  $nColumn);
						
						$newname  = @$nColumn[$i]['name'];
						if($newname){
							//set new colpartn
							$this->column_pattern[$newname] = $nColumn[$i];
							//unset old colpart
							unset($this->column_pattern[$i]);
							
							//remove old  name index 
							$this->dropIndexTable($this->table_name,$i);
							
							//mengecek jika ada perintah baru membuat index
							$i  = @$this->index_pattern[$i];
							
							//jika ada perintah maka ganti namanya
							if($i){
								//set new index partn
								$this->index_pattern[$newname] = $newname;
								//remove old index
								unset($this->index_pattern[$i]);

							}
							
						}
					}
					
					
					
					
					
					
					
				}else{
					//menambah column  baru
					$nColumn = [$i => $column[$i] ];
					$this->con->dbforge->add_column($this->table_name, $nColumn);
				}
				
				
				
			}
			//echo json_encode($this->index_pattern);
			//echo "\n\n";
			// echo json_encode($this->column_pattern);
			//exit();
			if(!empty($this->index_pattern)){

					//$ip adalah nama column
					foreach($this->index_pattern as $ip => $val){
						$this->createIndexTable($this->table_name,$ip,$val);
				
					}
					
			}
		}
		
		
		private function dropIndexTable($table_name,$index_name){
			$sql = "SELECT COUNT(1) key_name FROM INFORMATION_SCHEMA.STATISTICS WHERE table_schema=DATABASE() AND table_name='$table_name' AND index_name='$index_name';";
			$result = $this->con->db->query($sql);
			
			$data = $result->row(); 
			
			if($data->key_name){
				$sql = "ALTER TABLE $table_name DROP INDEX $index_name;";
				$this->con->db->query($sql);
			}
		}
		
		private function createIndexTable($table_name,$index_name,$val){
			//drop index if exist
			$this->dropIndexTable($table_name,$index_name);
			
			
			$sql ="";
			if(is_array($val)){
				$fl = "";
				foreach($val as $i){
					$fl .= "`$i`,";
				}
							
				$fl = rtrim($fl,",");
							
				$sql = "CREATE INDEX $index_name ON $table_name($fl)";
							
			}else{
				$sql = "CREATE INDEX $index_name ON $table_name(`$val`)";
						
			}
						
			$this->con->db->query($sql);
		}
		
		public function dropTable($table){
				$exist = $this->con->db->table_exists($table);
				if($exist){
					
				}
		}
		
				public function tinyInteger($name,$l=NULL){
						return $this->add_column($name,"TINYINT",$l);
				}
				
				public function smallInteger($name,$l=NULL) {
					return $this->add_column($name,"SMALLINT",$l);
                }
            
				
                public function mediumInteger($name,$l=NULL) {
					return $this->add_column($name,"MEDIUMINT",$l);
					
                }
				
				public function int($name,$l=NULL) {
					return $this->add_column($name,"INT",$l);
					
                }
				
				public function integer($name,$l=NULL) {
					return $this->add_column($name,"INTEGER",$l);
					
                }
				
				public function bigInteger($name="id",$l=NULL) {
					return $this->add_column($name,"BIGINT",$l);
                }
			
				public function double($name,$l=8,$d=2) {
					return $this->add_column($name,"DOUBLE",$l,$d);
                }
			
				public function float($name,$l=8,$d=2) {
					return $this->add_column($name,"FLOAT",$l,$d);
					
                }
				
				
				public function decimal($name,$l=8,$d=2) {
					return $this->add_column($name,"DECIMAL",$l,$d);
                }
				
                public function char($name,$l=20) {
					return $this->add_column($name,"CHAR",$l);
                }
				
				public function string($name,$l=100) {
					return $this->add_column($name,"VARCHAR",$l);
                }
				public function varchar($name,$l=100) {
					return $this->add_column($name,"VARCHAR",$l);
                }
				
				public function date($name="created_at",$l=NULL) {              
					return $this->add_column($name,"DATE",$l);
                }
				
				public function time($name="created_at",$l=NULL) {              
					return $this->add_column($name,"TIME",$l);
                }
				
				public function year($name="created_at",$l=NULL) {              
					return $this->add_column($name,"YEAR",$l);
                }
				
				public function timestamp($name="create_at",$l=NULL) {
					return $this->add_column($name,"TIMESTAMP",$l);
					
                }
				
				public function dateTime($name="created_at",$l=NULL) {
					return $this->add_column($name,"DATETIME",$l);
                }
				
				
				public function bit($name,$l=NULL) {
					return $this->add_column($name,"BIT",$l);
                }
				
				public function real($name,$l=NULL) {
					return $this->add_column($name,"REAL",$l);
                }
				
				public function numeric($name,$l=NULL) {
					return $this->add_column($name,"NUMERIC",$l);
                }
				
				public function point($name,$l=NULL) {
					return $this->add_column($name,"POINT",$l);
                }
				public function multiPoint($name,$l=NULL) {
					return $this->add_column($name,"MULTIPOINT",$l);
                }
				public function linestring($name,$l=NULL) {
					return $this->add_column($name,"LINESTRING",$l);
                }
				
				public function polygon($name,$l=NULL) {
					return $this->add_column($name,"POLYGON",$l);
                }
				public function multiPolygon($name,$l=NULL) {
					return $this->add_column($name,"MULTIPOLYGON",$l);
                }
				public function geometry($name,$l=NULL) {
					return $this->add_column($name,"GEOMETRY",$l);
                }
				public function geometryCollection($name,$l=NULL) {
					return $this->add_column($name,"GEOMETRYCOLLECTION",$l);
                }
				
				
				
				
				
				
				
				

              

               

                public function binary($name, $l=20) {
					return $this->add_column($name,"BINARY ",$l);
                }

                
				public function tinyIncrement($name="id",$l=NULL) {
					$this->add_column($name,"TINYINT",$l)->autoIncrement();
					return $this; 
                }
				
                public function smallIncrement($name="id",$l=NULL) {
					$this->add_column($name,"INT",$l)->autoIncrement();
					return $this; 
                }

                public function increment($name="id",$l=NULL) {
					$this->add_column($name,"INT",$l)->autoIncrement();
					return $this; 
                }

				
				public function mediumIncrement($name,$l=NULL) {
					$this->add_column($name,"MEDIUMINT",$l)->autoIncrement();
					return  $this;
					
                }
				
				public function bigIncrement($name="id",$l=NULL) {
					$this->add_column($name,"BIGINT",$l)->autoIncrement();
					return $this;
				
                }

				public function tinyText($name,$l=NULL) {
					return $this->add_column($name,"TINYTEXT",$l);
                }
                public function text($name,$l=NULL) {
					return $this->add_column($name,"TEXT",$l);
                }

                public function mediumText($name,$l=NULL) {
					return $this->add_column($name,"MEDIUMTEXT",$l);
					
                }
				
				public function longText($name,$l=NULL) {;
					return $this->add_column($name,"LONGTEXT",$l);
				
                }

                public function multiLineString($name,$l=NULL) {
					return $this->add_column($name,"MULTILINESTRING",$l);
                }

				public function tinyBlob($name,$l=NULL) {
					return $this->add_column($name,"TINYBLOB",$l);
                }
				public function blob($name,$l=NULL) {
					return $this->add_column($name,"BLOB",$l);
                }
				public function mediumBlob($name,$l=NULL) {
					return $this->add_column($name,"MEDIUMBLOB",$l);
                }
				public function longBlob($name,$l=NULL) {
					return $this->add_column($name,"LONGBLOB",$l);
                }
               

               

                public function rename($nName=""){
					if(!$this->column_name){
						echo "wrong command..!";
						exit();
					}
					
					$column  = $this->column_name;
					if($nName) $this->column_pattern[$column]['name'] = $nName;
					return $this;
				}
				
				public function after($col=""){
					if(!$this->column_name){
						echo "wrong command..!";
						exit();
					}
					
					$column  = $this->column_name;
					if($col) $this->column_pattern[$column]['after'] = $col;
					return $this;
				}
				
				public function drop($col=""){
					if(!$col) $col =  $this->column_name; 
					$this->column_pattern[$col]['drop'] = true;
					return $this;
				}
				
				public function dropIndex($col=""){
					if(!$col) $col =  $this->column_name; 
					$this->indexDrop_pattern[$col] = true;
					return $this;
				}

               


               

	private function add_column($column,$type,$l=NULL,$d=NULL,$newname=NULL){
		//set global column name
		$this->column_name = $column;
		
		$a = array();
		
		if($l!== NULL && $d==NULL){
			
				$this->column_pattern[$column] = array("type"=>$type,"constraint"=>$l);
		}
		
		if($l !== NULL && $d!==NULL && $d > 0){
			$l = $l . "," . $d;
			$this->column_pattern[$column] = array("type"=>$type,"constraint"=>$l);
				
		}
		
		if($l == NULL && $d==NULL){
			
			if($type =="TIMESTAMP"){
				$this->column_pattern[]= "$column timestamp default current_timestamp on update current_timestamp";
			}else{
				
				$this->column_pattern[$column] = array("type"=>$type);
				
			}
			
			

			
		}
		

		return $this;
	}
	
	
	
	
	
}