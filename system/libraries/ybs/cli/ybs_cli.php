<?php
namespace ybs\cli;
use ybs\cli\base;

if (!defined('cli'))
    exit('No direct script access allowed');
require_once  "base.php";



class ybs_cli extends base {



public function run(){
	
	$cli  = $this->listener->getConsole();
	$cliCount   = count($cli);
	$cmd = "";
	
	if(isset($cli[1])) $cmd = $cli[1];
	$lcmd = explode(":",$cmd);
	
	if($lcmd[0]=="make"){
		
		switch($cliCount){
			case 1:
				$this->show_command();
			break;
			case 2:
				if(count($lcmd)==1){
					$this->show_command_make();
				}else{
					$this->define_command_parent_make($lcmd[1]);
				}
			break;
			case 3:
				if(count($lcmd)==1){
					$this->show_command_make();
				}else{
					$argument = $cli[2];
					$this->define_command_make($lcmd[1],$argument);
				}
			break;
			case 4:
					$arg = $cli[2];
					$arg2 = $cli[3];
					
					$this->define_command_make($lcmd[1],$arg,$arg2);
				
			break;
			case 5:
			
			break;
		}
		exit();	
	}

	
	if($lcmd[0]=="migrate"){
		
		switch($cliCount){
			case 1:
				$this->show_command();
			break;
			case 2:
				if(count($lcmd)==1){
						echo "migrate...";
						$this->migrate->install();
				}else{
						$this->define_command_migrate($lcmd[1]);
				}	
			break;
			case 3:
				if(count($lcmd)==1){
						//$this->show_error_command();
						$this->migrate->install($cli[2]);
						
				}else{
						//command with name..only names
						if(isset($cli[2]))$arg = $cli[2];
						$this->define_command_migrate($lcmd[1],$arg);
				}	
			break;
			case 4:
			break;
			case 5:
			break;
		}
		exit();	
		
	}
	
	if($lcmd[0]=="seed"){
		switch($cliCount){
			case 1:
				$this->show_command_seed();
			break;
			case 2:
				$cmd = @$lcmd[1];
				if(strtolower($cmd)=="help"){
						$this->show_command_seed();
				}else{
					$this->seeder->install($cmd);
				}
				
					
			break;
			case 3:
				
			break;
			case 4:
			break;
			case 5:
			break;
		}
		exit();	
	}		
	
	
}



//ex.  "php ybs make:controller"
//diatas adalah defenisi command tanpa detail
//masih membutuhkan parameter nama file
private function define_command_parent_make($cmd){
	
		$cmd = strtolower($cmd);
		
		
		if($cmd==""){
			$this->show_error_command();
			return;
		}
	
		if($cmd=="help"){
				$this->show_command_make();
				return;
		}
					
		if($cmd=="-v"||$cmd=="view" || $cmd=="-m"||$cmd=="model" || $cmd=="-c"||$cmd=="controller"){	
			$this->listener->on();
			echo "enter name :";
			$pre = $this->listener->get();
			
			
			if($cmd=="-v"||$cmd=="view"){
				$this->generator->create_view($pre);
				return;
			}
						
			if($cmd=="-m"||$cmd=="model"){
				$this->generator->create_model($pre);
				return;
			}
											
			if($cmd=="-c"||$cmd=="controller"){
				$this->generator->create_controller($pre,FALSE,FALSE);
				return;
			}
			
		}else{
			if($cmd =="migration" || $cmd =="seed"){
				$this->show_error_command();
				return;
			}
			$this->listener->on();
			echo "enter name :";
			$pre = $this->listener->get();
			
			$lcmd = explode("-",$cmd);
			$code = array_merge(array_diff($lcmd,array("")));
			
			
			$ltv = false;
			if(in_array("v",$code) || in_array("view",$code)){
				
				$this->generator->create_view($pre);
				$ltv = true;
			}
			
			$ltm = false;
			if(in_array("m",$code) || in_array("model",$code)){
				
				$this->generator->create_model($pre);
				$ltm = true;
			}
			
			if(in_array("c",$code) || in_array("controller",$code)){
				$this->generator->create_controller($pre,$ltv,$ltm);
			}
			
			
			
		}											
	
}




private function define_command_make($cmd,$str,$str2=NULL){
	$cmd = strtolower($cmd);
	$str = strtolower($str);
	
	//command for create migration
	if($cmd=="migration"){
		$name = $str;
		if($str2 == NULL){
		
			$this->generator->create_migration_empty($name);
			return;
		}else{
			
			$this->generator->create_migration($name,$str2);
			return;
		}
		
		return;
	}
	
	//command for create seed
	if($cmd=="seed"){
		$name = $str;
		$this->generator->create_seed($name,$str2);
		return;
	}
	
	
	// command for mcv
	$str = str_replace("\\","/",$str);
	
	$lcmd = explode("-",$cmd);
	$code = array_merge(array_diff($lcmd,array("")));
	
	$ltv = false;
	
	$pre = array_merge(array_diff($code,array("c","m","v","controller","model","view","")));
	

	if(count($pre)>=1){
		$this->show_error_command();
		return;
	}

	if(in_array("v",$code) || in_array("view",$code)){
		$this->generator->create_view($str);
		$ltv = true;
	}
			
	$ltm = false;
	if(in_array("m",$code) || in_array("model",$code)){
	
		$this->generator->create_model($str);
		$ltm = true;
	}
			
	if(in_array("c",$code) || in_array("controller",$code)){
		
		$this->generator->create_controller($str,$ltv,$ltm);
	}
			
	
}








public function define_command_migrate($cmd,$arg=null){
	$cmd = strtolower($cmd);
	

		if($cmd==""){
			$this->show_error_command();
			return;
		}
		
		if($cmd=="help"){
				$this->show_command_migrate();
				return;
		}
		
		
		if($cmd=="rollback"){
				if($arg==null){
					//rollback all
					$this->migrate->rollback();
				}else{
					//roll back step
					$this->migrate->rollback($arg);
				}
				return;
		}
		
		
		
}




	


	
}

