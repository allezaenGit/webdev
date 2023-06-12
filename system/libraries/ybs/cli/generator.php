<?php
namespace ybs\cli;
use ybs\cli\err_handle;

require_once APPPATH . "generate/cli/controller.php";
require_once APPPATH . "generate/cli/model.php";
require_once APPPATH . "generate/cli/view.php";
require_once APPPATH . "generate/cli/seed.php";
require_once APPPATH . "generate/cli/migration.php";
require_once APPPATH . "generate/cli/migration_all.php";

require_once "template/support/BluePrint.php";
require_once "template/support/Schema.php";
require_once "migrate.php";


if (!defined('cli'))
    exit('No direct script access allowed');

require_once  "err_handle.php";



class generator extends err_handle{
	
public function __construct(){
	$this->migrate = new migrate();
	$this->seeder = new seeder();
}	
	
public function create_controller($path,$ltv,$ltm){
	$path = $this->path_filter($path);
	$this->create_separator("c");
	$this->data_process("c",$path,$ltv,$ltm);
		
}

public function create_model($path){
	$path = $this->path_filter($path);
	$this->create_separator("m");
	$this->data_process("m",$path,false,false);
}


public function create_view($path){
	$path = $this->path_filter($path);
	$this->create_separator("v");
	$this->data_process("v",$path,false,false);
}

public function create_migration_empty($name){
	$path = "migrate";
	$cname = $this->path_filter($name);
	
	$t = date("Y_d_m_His");
	$file_name = $t."_".$cname;
	
	$this->create_separator("mig");
	
	$c 			= new \user\generate\cli\migration;
	$blueprint 	= new \ybs\cli\template\support\BluePrint;

	$blueprint->setPath($path);
	$blueprint->setClassName($cname);
	
	$c->up($blueprint);

	$string = $blueprint->output . $this->getFooterNote();
	

	
	$success =  $this->_createFile($string,"application/".$path,$file_name .".php" );
	if($success){
		echo "path       : ./application/migrate/$file_name.php \n" ;
		echo "success..\n" ;
	}else{
		echo $this->getErrorMessage(). "\n";
	}	
	
}



public function create_migration($name,$arg){
	$arg = strtolower($arg);
	$arg = trim($arg,"--");
	$args = explode("--",$arg);
	

	$schema_all="";
	$schema_drop="";

	if($args[0]=='all'){	
		$table_name = $this->migrate->get_table_schema();
		foreach($table_name as $v){
			$tn = $v['table_name'];
			
			
			
			
			$info  = $this->migrate->get_blueprint_info($tn);
			
			if(strtolower($tn)!=="migrations"){
				$schema_all .= "
			Schema::create(\"$tn\",function(Blueprint \$table){
			$info
			}); \n\n\n";
			
			$schema_drop .= "
			Schema::dropIfExists(\"$tn\");";
				
				
			}
			
		}
	}else{
			$tn = @$args[1];
			if($args[0] !=='c' || !$tn) {
				$this->show_error_command();
				exit();
			}
		
			$info  = $this->migrate->get_blueprint_info($tn);
			
			if(strtolower($tn)!=="migrations"){
				$schema_all .= "
			Schema::create(\"$tn\",function(Blueprint \$table){
			$info
			}); \n\n\n";
			
			$schema_drop .= "
			Schema::dropIfExists(\"$tn\");";
				
				
			}
		
		
	} 

	
	
	$c 			= new \user\generate\cli\migration_all;
	$blueprint 	= new \ybs\cli\template\support\BluePrint;

	$path = "migrate";
	$cname = $this->path_filter($name);
	
	$t = date("Y_d_m_His");
	$file_name = $t."_".$cname;
	
	$this->create_separator("mig");
	
	$blueprint->setPath($path);
	$blueprint->setClassName($cname);
	$blueprint->schema_all = $schema_all;
	$blueprint->schema_drop = $schema_drop;
	
	$c->up($blueprint);

	$string = $blueprint->output . $this->getFooterNote();
	

	
	$success =  $this->_createFile($string,"application/".$path,$file_name .".php" );
	if($success){
		echo "path       : ./application/migrate/$file_name.php \n" ;
		echo "success..\n" ;
	}else{
		echo $this->getErrorMessage(). "\n";
	}	
}	
	
	
public function create_seed($name,$arg){
		if(!$arg) $arg = "--all";
		
		if($arg=='--all'){
			$table_name = $this->migrate->get_table_schema();
			foreach($table_name as $val){
				$path = "seeder";
				$cname = $this->path_filter($name);
				sleep(2);
				$t = date("Y_d_m_His");
				$file_name = $t."_".$cname."_" . $val['table_name'];
				
				$this->create_separator("seed");
			
				$c 			= new \user\generate\cli\seed;
				$blueprint 	= new \ybs\cli\template\support\BluePrint;

				$blueprint->setPath($path);
				$blueprint->setClassName($cname ."_". $val['table_name']);
				$blueprint->table_name = $val['table_name'];
				
				
				$strDataTable = $this->seeder->getStrDataTable($blueprint->table_name);
				
				$blueprint->dataTable = $strDataTable;
				
				$c->up($blueprint);

				$string = $blueprint->output . $this->getFooterNote();

				
				$success =  $this->_createFile($string,"application/".$path,$file_name .".php" );
				if($success){
					$t =  date("H:i:s");
					echo "path       : ./application/seeder/$file_name.php \n" ;
					echo "finish     :  $t  ";
					echo "success..\n" ;
				}else{
					echo $this->getErrorMessage(). "\n";
				}
				
				
			}
		
		}else{
			
			$path = "seeder";
			$cname = $this->path_filter($name);
			
			$t = date("Y_d_m_His");
			$file_name = $t."_".$cname;
			
			$this->create_separator("seed");
			
			$c 			= new \user\generate\cli\seed;
			$blueprint 	= new \ybs\cli\template\support\BluePrint;

			$blueprint->setPath($path);
			$blueprint->setClassName($cname);
			$blueprint->table_name = str_replace("--","",$arg);
			
			
			$strDataTable = $this->seeder->getStrDataTable($blueprint->table_name);
			
			$blueprint->dataTable = $strDataTable;
			
			$c->up($blueprint);

			$string = $blueprint->output . $this->getFooterNote();

			
			$success =  $this->_createFile($string,"application/".$path,$file_name .".php" );
			if($success){
				echo "path       : ./application/seeder/$file_name.php \n" ;
				echo "success..\n" ;
			}else{
				echo $this->getErrorMessage(). "\n";
			}
			
		}

}	
/**
* berfungsi filter path
* @param String
* @return String
*/
private function path_filter($path){
	$filter = str_replace(" ","_",$path);
	$filter = str_replace(".","_",$filter);
	$filter = str_replace(",","_",$filter);
	return $filter;	
} 



/**
* berfungsi membuat keterangan pada cli
* @param String
*
*/	
private function create_separator($type){
	switch($type){
		case "c":
			echo "--------------------\n";
			echo "create controller...\n";
		break;
		case "m":
			echo "--------------------\n";
			echo "create model...\n";
		break;
		case "v":
			echo "--------------------\n";
			echo "create view...\n";
		break;
		case "mig":
			echo "--------------------\n";
			echo "create migration...\n";
			break;
		case "seed":
			echo "--------------------\n";
			echo "create seed...\n";	
	}
}

	


private function data_process($type,$path,$ltv,$ltm){
	$path = strtolower($path);
	$dp = explode("/",$path);
	$cdp = count($dp);
	switch($cdp){
		case 1:
			$success = false;
			$folder="";
			if($type=="c"){
				$success = $this->single_c(ucfirst($dp[0]),"",$ltv,$ltm);
				$folder="controllers";
			}elseif($type=="m"){
				$success = $this->single_m(ucfirst($dp[0])."Model","application/models");
				$folder="models";
			}elseif($type=="v"){
				$success = $this->single_v(ucfirst($dp[0])."View","application/views");
				$folder="views";
			}
			
			if($success){
				echo "path       : ./application/$folder/$dp[0].php \n" ;
				echo "success..\n" ;
			}else{
				echo $this->getErrorMessage(). "\n";
			}
			
		break;
		
		case 2:
			$success = false;
			$folder="";
			if($type=="c"){
				$success = $this->single_c(ucfirst($dp[1]),"$dp[0]/",$ltv,$ltm);
				$folder="controllers";
			}elseif($type=="m"){
				$success = $this->single_m(ucfirst($dp[1])."Model","application/models/$dp[0]");
				$folder="models";
			}elseif($type=="v"){
				$success = $this->single_v(ucfirst($dp[1])."View","application/views/$dp[0]");
				$folder="views";
			}
			
			if($success){
				echo "path       : ./application/$folder/$dp[0]/$dp[1].php \n" ;
				echo "success..\n" ;
			}else{
				echo $this->getErrorMessage(). "\n";
			}
		
		break;
		
		default:
			echo "failed..! not valid..!\n". $path;
			echo "--------------------\n";
		break;
		
	}	
	
	
}



private function single_c($cname,$path,$ltv=false,$ltm=false){
	
$c 			= new \user\generate\cli\controller;
$blueprint 	= new \ybs\cli\template\support\BluePrint;

$blueprint->setPath($path);
$blueprint->setClassName($cname);
					
$dmodel = $c->loadModel($blueprint);
$dcontentindex = $c->loadIndexContent($blueprint);


if($ltm){
	$blueprint->setLoadModel($dmodel);	
}

if($ltv){
	$blueprint->setLoadIndexContent($dcontentindex);
}					
$c->up($blueprint);

$string = $blueprint->output . $this->getFooterNote();

return $this->_createFile($string,"application/controllers/".$path,$cname .".php" );	

}



private function single_m($cname,$path){
	
$c 			= new \user\generate\cli\model;
$blueprint 	= new \ybs\cli\template\support\BluePrint;

$blueprint->setPath($path);
$blueprint->setClassName($cname);

$c->up($blueprint);

$string = $blueprint->output . $this->getFooterNote();	
return  $this->_createFile($string,$path,$cname .".php" );	
}	


private function single_v($cname,$path){
$v 			= new \user\generate\cli\view;
$blueprint 	= new \ybs\cli\template\support\BluePrint;

$blueprint->setPath($path);
$blueprint->setClassName($cname);
$v->up($blueprint);

$string = $blueprint->output;


return  $this->_createFile($string,$path,$cname .".php" );	
}







function _createFile($string, $path_file,$file_name){
	
	$this->open_error_trap();
	
	$path_file = trim($path_file, '/');
	
	

	try{
		
		$system = array(
					'application/controllers/sistem',
					'application/models/sys',
					'application/views/sistem',
					);
		$file_system = array(
					'application/controllers/auth.php',
					'application/controllers/home.php',
					'application/controllers/service_storage.php',
					'application/controllers/service_upload.php',
					'application/controllers/ybsservice.php',
					'application/controllers/api/public_access.php',
					);			
		
		$pass=false;
		
		
			
		foreach($system as $val){
			if(strpos(strtolower($path_file),$val) !== false){
				$pass=true;
			}
			
		}				
		
		if($pass==true){
			$this->setErrorMessage("ERROR..can't use path :" . $path_file ."\nFailed ! (path system) ");
			
			return false;
		}
		
		
		
		
		$pass=false;	
		$pfile = strtolower($path_file .'/'.$file_name);

		foreach($file_system as $val){
			if(strpos($pfile,$val) !== false){
				$pass=true;
			}
			
		}				
		
		if($pass==true){
			$this->setErrorMessage("ERROR..can't use path :" . $pfile ."\nFailed ! (file system) ");
			
			return false;
		}
			
			
			
			
		

		
		if (!file_exists($path_file)){
            mkdir($path_file, 0777, true);
		}
	
	
		if(file_exists($path_file .'/'.$file_name)){
			echo "file already exist..! , Overwrite file?(y/n)";
			$handle = fopen("php://stdin","r");
			$in = trim(fgets($handle));	
			if(strtolower($in)=="y"){
					$create = fopen($path_file .'/'.$file_name, "w") or die("Change your permision folder for application  to 777");
					fwrite($create, $string);
					fclose($create);
					return true;
			}else{
				$this->setErrorMessage('failed create file');
				return false;
			}

		}else{
			$create = fopen($path_file .'/'.$file_name, "w") or die("Change your permision folder for application  to 777");
			fwrite($create, $string);
			fclose($create);
		}
	
		
	
	}catch(Exception $e){
			$this->setErrorMessage('your command not valid..!'.$e);
			return false;
	}
   
   $this->open_error_trap();
    
    return true;
}
	
	
	
	

private function getFooterNote(){
return "/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CLI ".date('Y-m-d H:i:s')." */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/
	
";
}

	
	
}