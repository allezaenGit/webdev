<?php
namespace ybs\general;



class Validation {
	

	static $MSG_REQUIRED 	 	= "tidak boleh kosong ! ";
	static $MSG_MISSING_PARAM	= "parameter tidak di temukan ! periksa parameter anda / Element Name : ";
	static $MSG_UNIQUE			= "tidak di izinkan ! data sudah di gunakan ";
	static $MSG_MAX_LENGTH		= "tidak di izinkan ! max karakter ";		
	static $MSG_MIN_LENGTH		= "tidak di izinkan ! min karakter ";
	static $MSG_EMAIL			= "tidak di izinkan ! email format tidak valid";
	static $MSG_ALPHA			= "tidak di izinkan ! format alpa tidak valid";
	static $MSG_NUMBER			= "tidak di izinkan ! harus angka ";
	
	
	private static $TYPE_REQUIRED 		= "required";
	private static $TYPE_UNIQUE 		= "unique";
	private static $TYPE_MAX 			= "max";
	private static $TYPE_MIN 			= "min";
	private static $TYPE_EMAIL	 		= "email";
	private static $TYPE_ALPHA 			= "alpha";
	private static $TYPE_NUMBER 		= "number";
	private static $TYPE_ALPHA_NUMBER 	= "alpha_number";
	
	
	
	
	
	private static $classValidater;
	private static $isORM = false;
	private static $SUCCESS = false;
	private static $errors = array();

	
	static function run($data ,$validator,$primaryKey = null){
		self::$SUCCESS = false;
		self::$errors = array();
		
		$dvalider;
		if(!is_array($validator)){
			
			self::$classValidater = new $validator();
			$dvalider = self::$classValidater::rules;
			
			$names  = explode("\\",$validator);
			
			if(count($names)>1) self::$isORM = TRUE;
			
			
			
		}else{
			$dvalider = $validator;
		}
		
		if(is_array($data)){
			self::validatorSelection($data ,$dvalider,$primaryKey);
		}else{
				//not ready
		}
		
		
		if(count(self::$errors) > 0 ){
			self::$SUCCESS = FALSE;
		}else{
			self::$SUCCESS = TRUE;
		}
		
		
		return self::$SUCCESS;
	}
	
	
	
	// static function error($index=null){
		// if($index)
			// return @self::$errors[$index];
		// return self::$errors;
	// }
	
	static function error($show=null){
		$CI = &get_instance();
		
		if(strtolower($show)=='all'){
			$qf =  new \stdClass();
			$qf->sec_val = $CI->security->get_csrf_token_name()."=".$CI->security->get_csrf_hash()."&"; //new
			foreach(self::$errors as $i => $v){
				$q = new \stdClass();
				$q->success 	= self::$SUCCESS;
				$q->elementid 	= "#" . $i;
				$q->element 	= $i;
				$q->message 	= $v['message'];
				$q->type		= $v['type'];
				$qf->$i = $q;
				
			}
			return $qf;
		}
		
		
		$element =  array_key_first(self::$errors);
		$message =  array_values(self::$errors)[0]["message"];
		$type 	 =  array_values(self::$errors)[0]["type"];
		
		$q = new \stdClass();
		$q->success 	= self::$SUCCESS;
		$q->elementid 	= "#" . $element;
		$q->element 	= $element;
		$q->message 	= $message;
		$q->type		= $type;
		$q->sec_val		= $CI->security->get_csrf_token_name()."=".$CI->security->get_csrf_hash()."&"; //new
		return  $q;
	}
	

	// static function result(){
		// $o = new \Outputview;
		// $o->success 	= self::$SUCCESS;
		// $o->elementid 	= self::firstError()->elementid;
		// $o->element		= self::firstError()->element;
		// $o->type		= self::firstError()->type;
		// $o->message		= self::firstError()->message;
		
		// return $o->result();
			
	// }

	
	
	private static function validatorSelection($data,$dvalider,$primaryKey){
		
		foreach ($dvalider as $i =>$key){
			if(isset($data[$i])){
				$validateKey = explode("|",$key);
				self::checkingKey($i,$data,$validateKey,$primaryKey);
			}else{
			self::$errors[$i]['message']	=  self::$MSG_MISSING_PARAM . "\"$i\""  ;
				self::$errors[$i]["type"] 	 	=  NULL;
			}
				
		}
	}
	
	
	private static function checkingKey($field,$data,$keys,$primaryKey){
	
		foreach($keys as $key){
			
			$splitKey = explode(":",$key);
			
			//detect when key is max n min
			if(count($splitKey) > 1){
				self::checkingMaxMin($field,$data,$splitKey);
			}else{
				
				switch(strtolower($key)){
					case self::$TYPE_REQUIRED :
						self::checkingRequired($field,$data);
					break;	
					case self::$TYPE_UNIQUE :
						self::checkingUnique($field,$data,$primaryKey);
					break;
					case self::$TYPE_EMAIL:
						self::checkingEmail($field,$data);
					break;
					case self::$TYPE_ALPHA:
						self::checkingAlpha($field,$data);
					break;
					case self::$TYPE_NUMBER:
						self::checkingNumber($field,$data);
					break;
					case self::$TYPE_ALPHA_NUMBER:
						self::checkingAlphaNumber($field,$data);
					break;
					
					
				}
			}
			
		
		}
	}
	
	
	
	private static function checkingRequired($field,$data){
	
		$value = trim($data[$field]);
		
		if($value =="" || $value == null || $value =="null"){
				self::$errors[$field]["message"] =  self::$MSG_REQUIRED  ;
				self::$errors[$field]["type"] 	 =  self::$TYPE_REQUIRED;
		}
		
	}
	
	
	private static function checkingMaxMin($field,$data,$splitKey){
		
		$value 	= trim($data[$field]);
		$dlen	= strlen($value);  
		
		switch(strtolower($splitKey[0])){
			case "max";
				if( $dlen > $splitKey[1]){
						self::$errors[$field]['message']	=  self::$MSG_MAX_LENGTH . $splitKey[1]  ;
						self::$errors[$field]["type"] 	 	=  self::$TYPE_MAX;
				}		
			break;
			case "min";
				if( $dlen < $splitKey[1]){
						self::$errors[$field]['message']	=  self::$MSG_MIN_LENGTH . $splitKey[1]  ;
						self::$errors[$field]["type"] 	 	=  self::$TYPE_MIN;
				}
			break;
		}
	}
	
	

	private static function checkingUnique($field,$data,$primaryKey){
		$ci = &get_instance();
		
		$model = self::$classValidater;
		$table = $model::table;
		$value = $data[$field];
		$fcheck=[$field=>$value];
		
		$pkey="id";

		if($primaryKey !== null )$pkey=$primaryKey;
		
		$ci->db->where("$pkey <>" ,@$data[$pkey]);
		$ci->db->where($fcheck );
		if ($ci->db->field_exists('delete_at', $table)){
			$ci->db->where('delete_at',null);
			
			$ci->db->or_where("$pkey <>" ,@$data[$pkey]);
				$ci->db->where($fcheck );
			$ci->db->where('delete_at','0000-00-00 00:00:00');
		}

		
		
		
		
		
		
		
		$q = $ci->db->get($table)->result_array();
		
		
		if(count($q)>0){
			self::$errors[$field]['message']	=  self::$MSG_UNIQUE ;
			self::$errors[$field]["type"] 	 	=  self::$TYPE_UNIQUE;
		}		
		

	 
	}	
	
	private static function checkingNumber($field,$data){
		$value = $data[$field];
		
		$d = str_replace(",","", $value);
		
		$num = is_numeric($d);

		 if( $num == false ){
			self::$errors[$field]['message']	=  self::$MSG_NUMBER ;
			self::$errors[$field]["type"] 	 	=  self::$TYPE_NUMBER;
		 }
	}
	
	private static function checkingEmail($field,$data){
		$value = $data[$field];
		if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
			self::$errors[$field]['message']	=  self::$MSG_EMAIL ;
			self::$errors[$field]["type"] 	 	=  self::$TYPE_EMAIL;
		}
	}
	
	private static function checkingAlpha($field,$data){
		$value = $data[$field];
		if(!preg_match("/^([a-zA-Z' ]+)$/",$value) && $value !=="" ){
			self::$errors[$field]['message']	=  self::$MSG_ALPHA ;
			self::$errors[$field]["type"] 	 	=  self::$TYPE_ALPHA;
		}
	}
	
	private static function checkingAlphaNumber($field,$data){
		$value = $data[$field];
		// if(!preg_match("/^([a-zA-Z' ]+)$/",$value)){
			// self::$errors[$field] = self::$MSG_ALPHA ;
			// self::$methodes[$field] = "alpha";
		// }
	}
	
}

