<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function _generate($data='xseusgh') {
    $f1 = sha1($data);
	$f2 = md5('dxmn'.$f1.'zdnhs');
	return $f2;
}

function _encrypt($data){
	$ci 	= get_instance();
	$enc 	= $ci->encryption->encrypt($data);
	
	return $enc ;
	
}

function _decrypt($data){
	
	$ci 	= get_instance();
	$decy 	= $ci->encryption->decrypt($data);
	return $decy;
}

function _prepareStatement($data=''){
	$a= str_replace('<script>','',$data);
	$a= str_replace('</script>','',$a);
	$a= str_replace("'","\'",$a);
	$a= str_replace(";","",$a);
	$a= str_replace("SELECT","\'",$a);
	$a= str_replace("DROP TABLE","\'",$a);
	$a= str_replace("=","\=",$a);
	return $a;
};




function _encode_id($data,$log_ref){
		$result="";
		$dsum = ($log_ref * 2) + $data;
		if($dsum==""||$dsum==null){
				$result 	= "";
			}else{
				$result = $dsum.$log_ref;
		}
		
		
	return $result;
}

function _create_random_div(){
	Date_default_timezone_set('Asia/Makassar');
	$time 	= time();
	$d 		= date('s',$time);
	$d 		= $d*1+6/2;
	$x=0;
	$result = "<div hidden></div>";
	for($x==0;$x<$d;$x++){
		$result .= "<div hidden></div>";
	}

	return $result;	
}	


function dd($d=false){
	var_dump($d);
	die;	
}

function _decode_id($data,$log_ref){
			$result="";
            $dsum = str_replace($log_ref,"",$data);
			if($dsum==""||$dsum==null){
				$result 	= "";
			}else{
				$result 	= @($dsum - ($log_ref*2));
			}
           	
	return $result;
}

function _createFile($string, $path_file,$file_name){
	
	if (!file_exists($path_file)){
            mkdir($path_file, 0777, true);
    }

	
    $create = fopen($path_file .'/'.$file_name, "w") or die("Change your permision folder for application  to 777");
    fwrite($create, $string);
    fclose($create);
    
    return $path_file;
}
function _createFolder($path_file){
	if (!file_exists($path_file)){
            mkdir($path_file, 0777, true);
    }
}


function fillable($d,$param){
	$fill = array();
	foreach($param as $v){
		$fill[$v]="";
	}


	if(!isset($d))
		$d = array();
	
	if(!is_array($d)){
		$d = (array) $d;
	}
	
	$val  = array_intersect_key($d,$fill);
	return $val;
}

//merefresh index array  
// function reindex(){
	// array_splice($detail , 0, 0);
// }


//mengambil salah satu ini object 
function pluck($obj,$name,$assoc=true){
	
	if(is_array($obj)){
		$str = json_encode($obj);
		$obj = json_decode($str,false);
	}
	
			$ar = array();
			foreach($obj as $v){
				if($assoc){
					$ar[]=[$name=> @$v->$name];
				}else{
					$ar[]=@$v->$name;	
				}
				
			}
			return $ar;
}

function bind($d,$nArr,$key=null){
		
	$d = json_encode($d);
   	$d = json_decode($d,true);
	
	$nArr = json_encode($nArr);
	$nArr = json_decode($nArr,true);
	
	 $x=0;
	 foreach($nArr as $v){
		
		 
		if($key==null){
			foreach($v as $i2=>$v2){
				$d[$x][$i2] = $v2;
			}
			
		}else{
			$d[$x][$key] = $v;
		}
		 
		 $x++;
	 }
	 
	$d = json_encode($d);
   	$d = json_decode($d);
	 return $d;
}


function br($c=30){
	 for($x=0;$x<$c;$x++) echo "<br>";	
}


