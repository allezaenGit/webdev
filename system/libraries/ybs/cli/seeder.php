<?php 
namespace ybs\cli;

class seeder{
	
	private $longVersion = 17;
	private $longName = 18;
	
	public function install($filename = null){
		
		$d_map;
		
		if($filename){
			$d_map = [$filename .".php" ];
		}else{
			$d_map = directory_map(APPPATH.'/seeder/',1);
		
			if(empty($d_map)){
				echo "\nFailed|File Seeder not found..!";
				exit();
			}
			
			
		}
		
		
		
		
		
		
		
		
		$xready =  0;
		foreach($d_map as $val){
			
			$version 		= substr($val,0,$this->longVersion);
			$name 			= substr($val,$this->longName);
			

			$file_name = str_replace(".php","",$val);
		
	
			echo "\nSeeder : " .$val . "\n";
			include APPPATH ."seeder/" . $val;
			$className 		= substr($name,0,strlen($name)-4);

			$c = new $className();
			$c->run();
				
			
			
		
		
		}
		
		
		
		
		
		
	}

	public function getStrDataTable($table_name){
		$con = new model();
		$row  = $con->db->get($table_name)->result();
		
		if(!$row) return false;
		
		$str ="\$data = [ 
		";
		
		
		foreach($row as $i1 => $v1){
			$str.="	
				$i1 => [ 
			";
			
			foreach($v1 as $i2=>$v2 ){
				$v2 = str_replace("'","\'",$v2);
				$str.="		
						'$i2' => '$v2' ,";
			}
			
			$str.="
					],";
		}
		
		$str.="
			]; 
			
			\$this->db->insert_batch('$table_name', \$data);
			
			";
			
		return $str;	
	}	
	
	
	
}