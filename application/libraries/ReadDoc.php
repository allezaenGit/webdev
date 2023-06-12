<?php


/**
* @Author Dhiya As sayyaf
* membaca documentation class dan method
*/
class ReadDoc{
	
	static $reflec;
	
	public function __construct(){
		
	}
	
	static function file($file){
		self::$reflec = new ReflectionClass($file);
	}
	
	static function param($param){
		
		$comment_string = self::$reflec->getMethod($param)->getDocComment();
		$pattern = "#(@[a-zA-Z]+\s*[a-zA-Z0-9, ()_].*)#";

		//perform the regular expression on the string provided
		preg_match_all($pattern, $comment_string, $matches, PREG_PATTERN_ORDER);
		
		$pf = array();
		foreach($matches[0] as $val){
			$d = trim($val);
			
			//remove duplicate whitespace
			$d = preg_replace('!\s+!', ' ', $d);
			
			$dexp = explode(" ", $d );
			
			$type = strtolower($dexp[0]);
			
			$type_value;$param;$desc;
			
			switch($type){
				case "@param":
					$type_value = "";
					$param = @$dexp[1];//@$dexp[2];
					
					$d1 = str_replace(@$dexp[0]." ","",$d);
					$desc = str_replace(@$dexp[1]." ","",$d1);
					
			
				break;
				case "@return":
					$type_value = @$dexp[1];
					$param = @$dexp[1];
					$d1 = str_replace(@$dexp[0]." ","",$d);
					$desc = str_replace(@$dexp[1]." ","",$d1);
				break;
				
				
				default :
					$type_value = "";
					$param = "";
					$desc = str_replace(@$dexp[0]." ","",$d);
					
					
			}
			
			
			
			$aparam = [
				"type"			=>$type,
				"type_value"	=>$type_value,
				"param"			=>$param,
				"desc"			=> $desc,
			] ;
			
			$pf[] = $aparam;
			
		}
		
		return $pf;
		
					
	}
	
	
}