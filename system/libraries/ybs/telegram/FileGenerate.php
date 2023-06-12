<?php
namespace ybs\telegram;

class FileGenerate{
	
	
	static function createFile($content, $path_file,$file_name){
		if (!file_exists($path_file)){
            mkdir($path_file, 0777, true);
		}

		
		$create = fopen($path_file .'/'.$file_name, "w") or die("Change your permision folder for application  to 777");
		fwrite($create, $content);
		fclose($create);
		
		return $path_file;
	}
	
	static function createFolder ($path_file){
		if (!file_exists($path_file)){
            mkdir($path_file, 0777, true);
		}
	}
	
}