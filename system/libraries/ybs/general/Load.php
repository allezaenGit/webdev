<?php
namespace ybs\general;

include_once  BASEPATH . "helpers/directory_helper.php";
include_once  BASEPATH . "helpers/string_helper.php";

class Load {
	
	
	
	static function model(){
		$mod_sys = "sys".DIRECTORY_SEPARATOR;
		$cpath = func_num_args();
		$model = "models/";
		if($cpath==0){
			$path = APPPATH .$model;
			$map = directory_map($path, FALSE, TRUE);
		
			if($map){
				foreach($map as $i => $v){
							
						if(is_array($v)){
							if($i !==$mod_sys){
								self::detail($i,$v);
							}
						}else{
							if(strtolower($v) !== "index.html")
							include_once $path. $v;
						}
				}
			}
			
			
		}else{
			
			$arg = func_get_args();
		
			foreach($arg as $i1 => $v1){
			
				if($v1 !== "sys"){
					$model = "models/$v1/";
					$path = APPPATH .$model;
					$map = directory_map($path, FALSE, TRUE);
					
					if($map){
						
						
						foreach($map as $i2 => $v2){
						
								if(is_array($v2)){
									if($i2 !==$mod_sys){
										self::detail($i2,$v2);
									}
								
									
								}else{
									if(strtolower($v2) !== "index.html")
									include_once $path. $v2;
								}
								
						}
					}	
				
				}
			
			}
			
		}
		
		
		
		
	
		
		
		
	}
	

	
	private static function detail($folder,$data){

		foreach($data as $i => $v){
			if(is_array($v)){
				$folder .= $i;
				self::detail($folder,$v);			
			}else{
				if(strtolower($v) !== "index.html")
				include_once APPPATH . "models/". $folder. $v;
				
			}
		}
		
		
	}
	
	
	
}
