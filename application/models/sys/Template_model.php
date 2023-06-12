<?php

class Template_model extends CI_Model {

function __construct(){
      parent::__construct();
}

function create_model($file_name,$path_model,
					  $field_alias_field,$table_join,$index_alias_table_join,
					  $table,$crud_show,$type_input_field,$field_validation,$ifcu){

$private_where="";
$private_ss_where="";
$private_insert="";
$private_id=""; 
$separator="";

if($crud_show=='off'){
	$private_id 		= "\$user_id";
	$private_where		= "		\$this->db->where('$table.user_input',\$user_id);";	
	$private_ss_where 	= "\$this->datatables->where('$table.user_input',\$user_id);";
	$private_insert		= " 	\$data['user_input'] = \$user_id;";
	$separator 			=  ",";
}					  
						  
$string = "<?php
/*
* GENERATE CRUD GENERATOR
* NOTE : 
* 1. field update_at dan delete_at akan otomatis terbentuk pada table jika field tersebut tidak di temukan.
*	 hal ini di perlukan untuk fungsi softdelete.
* 2. struktur field delete_at  di setting NOT NULL sehingga bernilai 0000-00-00 00:00:00 jika row tidak disi.
*	 hal ini bertujuan untuk meminimalisir query or where
* 3. jika anda mengganti struktur delete_at menjadi ALLOW NULL maka replace code
*    yang memiliki pendanda REPLACE  yang sama ,dengan code di bawah ini
*
*	 //<REPLACE A1>
	 if (\$this->db->field_exists('delete_at', '$table')){
				\$this->datatables->where('$table.delete_at',null);
				$private_ss_where
				\$this->datatables->where_post();
				\$this->datatables->or_where('$table.delete_at','0000-00-00 00:00:00');
	 }
	 //<END REPLACE A1>
	 
	 //<REPLACE A2>
	 if (\$this->db->field_exists('delete_at', '$table')){
			\$this->db->where('$table.delete_at',null);
			$private_where
			\$this->db->or_where('$table.delete_at','0000-00-00 00:00:00');
	 }
	 //<END REPLACE A2>
	 
	 
	 //<REPLACE A3>
		if (\$this->db->field_exists('delete_at', '$table')){
			\$this->db->where('$table.delete_at',null);
			\$this->db->or_where('$table.delete_at','0000-00-00 00:00:00');
			\$this->db->where('$table.id <>',\$id);
		}
	 //<REPLACE A3>
*
*/


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class $file_name extends CI_Model {
   public \$id;	
   const table = \"$table\";
   
   /*type rules : required|unique|max:10|min:10|email|alpha|number */
   /*  example multi rules  : \"required|unique|max:8\"  */
   const rules = [";

foreach($field_validation as $i=> $val){
if($i!=="id" && $val !=="" && 	$ifcu[$i]==1){
	
$string .="
	\"$i\" => \"$val\",";
}
}

$string .="  
  ];
   
   const fillable = [";
foreach($field_validation as $i=> $val){
if($ifcu[$i]==1 || $i=="id"){
	
$string .="
	\"$i\",";
}
}



   
$string.="   
   ];
   
   function __construct(){
        parent::__construct();
   }	
	
	public function json($private_id$separator \$apiPost=null){
		if(\$apiPost)
			\$this->datatables->injectPost(\$apiPost);
		
		\$this->datatables->select('";
		 foreach($field_alias_field as $key=>$val){
			if(isset($type_input_field[$val])){ 
				$typeinput = $type_input_field[$val];
				switch ($typeinput){
						case 'dd.mm.yyyy' :
							$string.= "\n\t\t\tDATE_FORMAT($key,\"%d.%m.%Y\") as $val,";	
						break;
						case 'dd-mm-yyyy':
							$string.= "\n\t\t\tDATE_FORMAT($key,\"%d-%m-%Y\") as $val,";	
						break;
						
						case 'dd/mm/yyyy':
							$string.= "\n\t\t\tDATE_FORMAT($key,\"%d/%m/%Y\") as $val,";	
						break;
						
						case 'dd mm yyyy':
							$string.= "\n\t\t\tDATE_FORMAT($key,\"%d %m %Y\") as $val,";	
						break;
						
						case 'd M yyyy':
							$string.= "\n\t\t\tDATE_FORMAT($key,\"%d %M %Y\") as $val,";	
						break;
						
						case 'unix' :
							$string.= "\n\t\t\tFROM_UNIXTIME($key,\"%d.%m.%Y\") as $val,";	
						break;
						
						default :
						$string.= "\n\t\t\t$key as $val,";		
				}	
			}else{
				$string.= "\n\t\t\t$key as $val,";	
			}
			
			
		}
		
		
$string .="\n\t\t');

		//<REPLACE A1>
		if (\$this->db->field_exists('delete_at', '$table')) 
			\$this->datatables->where('$table.delete_at','0000-00-00 00:00:00');
		//<END REPLACE A1>
		
		\$this->datatables->from('$table');\n";

$xx = 0;
foreach($table_join as $key=>$val){
$ak = explode('____',$key);
$taf = $table.'.'.$key;
if(count($ak)>1){
	$alias = explode('_-_',$ak[1]);
	$taf = $alias[1].'.'.$alias[0];

}
$string .="	
		\$this->datatables->join('$val $index_alias_table_join[$xx]','$index_alias_table_join[$xx].id=$taf','LEFT'); \n";		
$xx++;
}
		
	
	
		
$string .="
		$private_ss_where
		
		//mengembalikan dalam bentuk array
		\$q =  json_decode(\$this->datatables->generate(),true);
		return \$q;
	}
	

   public function get_all($private_id){
		\$afield = [";	

   foreach($field_alias_field as $key=>$val){
	   if(isset($type_input_field[$val])){ 
			$typeinput = $type_input_field[$val];
			switch ($typeinput){
					case 'dd.mm.yyyy' :
						$string.= "\n\t\t\t'DATE_FORMAT($key,\"%d.%m.%Y\") as $val',";	
					break;
					case 'dd-mm-yyyy':
						$string.= "\n\t\t\t'DATE_FORMAT($key,\"%d-%m-%Y\") as $val',";	
					break;
					
					case 'dd/mm/yyyy':
						$string.= "\n\t\t\t'DATE_FORMAT($key,\"%d/%m/%Y\") as $val',";	
					break;
					
					case 'dd mm yyyy':
						$string.= "\n\t\t\t'DATE_FORMAT($key,\"%d %m %Y\") as $val',";	
					break;
					
					case 'd M yyyy':
						$string.= "\n\t\t\t'DATE_FORMAT($key,\"%d %M %Y\") as $val',";	
					break;
					
					case 'unix' :
						$string.= "\n\t\t\t'FROM_UNIXTIME($key,\"%d.%m.%Y\") as $val',";	
					break;
					
					default :
					$string.= "\n\t\t\t'$key as $val',";		
			}
	   }else{
		   $string.= "\n\t\t\t'$key as $val',";	
	   }	
		
   }

$string.="
		
		];
		

		//<REPLACE A2>
		if (\$this->db->field_exists('delete_at', '$table')) 
			\$this->db->where('$table.delete_at','0000-00-00 00:00:00');
		//<END REPLACE A2>
		
		\$this->db->select(\$afield);\n";	


$xx = 0;
foreach($table_join as $key=>$val){
$ak = explode('____',$key);
$taf = $table.'.'.$key;
if(count($ak)>1){
	$alias = explode('_-_',$ak[1]);
	$taf = $alias[1].'.'.$alias[0];

}
$string .="		\$this->db->join('$val $index_alias_table_join[$xx]','$index_alias_table_join[$xx].id=$taf','LEFT'); \n";		
$xx++;
}


$string .=$private_where."
		\$this->db->order_by('$table.id', 'ASC');
		return \$this->db->get('$table')->result_array();
   }";



//----->function get_by_id <-------// 
$string .="


	public function get_by_id(\$id$separator$private_id){
		\$afield = [";
		
foreach($field_alias_field as $key=>$val){
	if(isset($type_input_field[$val])){ 
			$typeinput = $type_input_field[$val];
			switch ($typeinput){
					case 'dd.mm.yyyy' :
						$string.= "\n\t\t\t'DATE_FORMAT($key,\"%d.%m.%Y\") as $val',";	
					break;
					case 'dd-mm-yyyy':
						$string.= "\n\t\t\t'DATE_FORMAT($key,\"%d-%m-%Y\") as $val',";	
					break;
					
					case 'dd/mm/yyyy':
						$string.= "\n\t\t\t'DATE_FORMAT($key,\"%d/%m/%Y\") as $val',";	
					break;
					
					case 'dd mm yyyy':
						$string.= "\n\t\t\t'DATE_FORMAT($key,\"%d %m %Y\") as $val',";	
					break;
					
					case 'd M yyyy':
						$string.= "\n\t\t\t'DATE_FORMAT($key,\"%d %M %Y\") as $val',";	
					break;
					
					case 'unix' :
						$string.= "\n\t\t\t'FROM_UNIXTIME($key,\"%d.%m.%Y\") as $val',";	
					break;
					
					default :
					$string.= "\n\t\t\t'$key as $val',";		
			}
	}else{
		 $string.= "\n\t\t\t'$key as $val',";
	}			
		
}

$string.="
		
		];
		
		
		
		\$this->db->select(\$afield);\n";	

$xx=0;

foreach($table_join as $key=>$val){
$ak = explode('____',$key);
$taf = $table.'.'.$key;
if(count($ak)>1){
	$alias = explode('_-_',$ak[1]);

	$taf = $alias[1].'.'.$alias[0];
	// $t = $k[0].'_-_'.$ak[0];//1_-_..	
	// $taf = $alias_table_join[$t].'.'.$ak[1];

}
$string .="		\$this->db->join('$val $index_alias_table_join[$xx]','$index_alias_table_join[$xx].id=$taf','LEFT'); \n";			
$xx++;
}


$string .=$private_where."
		\$this->db->where('$table.id', \$id);
		\$this->db->order_by('$table.id', 'ASC');
		return \$this->db->get('$table')->row();
   }";
//end get_by_id		



//----->function if_exist<-------// 		
$string .="


	/* Memastikan data yg dibuat tidak kembar/sama,
	   fungsi ini sebagai pengganti fungsi primary key dr db,
	   krn primary key sudah di gunakan untuk column id.
	   -create : id di kosongkan.
	   -update : id di isi dengan id data yg di proses.	
	*/	
	function if_exist(\$id,\$data".$separator.$private_id."){
		\$this->db->where('$table.id <>',\$id);
		
		
		//<REPLACE A3>
		if (\$this->db->field_exists('delete_at', '$table')) 
			\$this->db->where('$table.delete_at','0000-00-00 00:00:00');
		//<END REPLACE A3>
".$private_where."
		\$q = \$this->db->get_where('$table', \$data)->result_array();
		
		
		if(count(\$q)>0){
			return true;
		}else{
			return false;
		}		

	
";		
		

		
$string .="
	}
";		
//end if_exist			
		

//----->function insert<-------// 	
$string .="

	function insert(\$data".$separator.$private_id."){
	".$private_insert."
	    /* transaction rollback */
		\$this->db->trans_start();
		
		\$this->db->insert('$table', \$data);		
		/* id primary yg baru saja di input*/
		\$this->id = \$this->db->insert_id(); 
		
		\$this->db->trans_complete();
		return \$this->db->trans_status(); //return true or false
";



$string .="	}";		
//end insert		

		

//----->function update<-------// 	
$string .="

	function update(\$id,\$data".$separator.$private_id."){
".$private_where."
		/* transaction rollback */
		\$this->db->trans_start();

		\$this->db->where('$table.id', \$id);
		\$this->db->update('$table', \$data);
		
		\$this->db->trans_complete();
		return \$this->db->trans_status(); //return true or false	
";





$string .="	}";		
//end update	



//----->function delete_multiple<-------// 	
$string .="

	function delete_multiple(\$data".$separator.$private_id.",\$softdelete=false){
		/* transaction rollback */
		\$this->db->trans_start();
		
		if(!empty(\$data)){
			if(!\$softdelete){
				\$this->db->where_in('$table.id',\$data);	
		".$private_where."
				\$this->db->delete('$table');
			}else{
				\$tm = Date('Y-m-d H:i:s',time());
				\$this->db->where_in('$table.id',\$data);
				\$this->db->update('$table',['delete_at'=>\$tm]);
			}	
		}
		
		\$this->db->trans_complete();
		return \$this->db->trans_status(); //return true or false	
		
";


$string .="	}";		
//end delete_multiple	



		
//end class		
$string .= "


};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator ".date('Y-m-d H:i:s')." */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/
"	;	
		
		
$result = _createFile($string,$path_model,$file_name .'.php');		
return $result;		
		
}	
	
	
	
}	