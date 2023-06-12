<?php
class Template_controller extends CI_Model {


function __construct(){
      parent::__construct();
	  
}




function create_controller($fc,$fm,$fl,$ff,$pc,$gf,
					  $field_alias_form,$field_alias_field,$type_input_field,
					  $field_double,$field_empty,
					  $crud_show,$server_side){

$private_where="";
$private_insert="";
$private_id=""; 
$separator="";

if($crud_show=='off'){
	$private_id 	= "\$this->_user_id";
	$separator =  ",";
}	
					  

$string = "<?php
require APPPATH. '/controllers/$gf/$fc"."_config.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use ybs\general\Load;
use ybs\general\Validation;
use ybs\general\Storage;

use ybs\http\Request;
use ybs\http\Response;



//untuk menggunakan model Eloquent laravel aktifkan code di bawah ini//
//use model\\".$gf."\\" .$fm . ";


class $fc extends CI_Controller {
	
	private \$tmodel;
	private \$softdelete = FALSE;
	
	
    public function __construct(){
        parent::__construct();
		
		 //use this for load all model in folder
		 Load::model(\"$gf\");
		 
		 \$this->tmodel =  new \\$fm();
		 
		 IDCoder::run(\$this);
    }

";

//----->function index <-------//  
$string .="
	public function index(){
		\$breadcrumb = [
			'$fc' 	=>   url(),
			'List Data' 		=>  '',
		];
		
		\$data = [
			'breadcrumb'			=> \$breadcrumb,
			'title_page_big'		=> 'Daftar $fc',
			'title'					=> new $fc"."_config(),
			'link_refresh_table'	=> url(\"refresh_table/\" . \$this->_token ),
			'link_create'			=> url(\"create\"),
			'link_update'			=> url(\"update\"),
			'link_delete'			=> url(\"delete_multiple\"),
		];
		
		response()->view('$gf/$fl',\$data);

	}
";	
//----->END index <-------//  	




//----->function refresh_table <-------//  
$string .="
	public function refresh_table(\$token){
		if(\$token==\$this->_token){";
			
			


if($server_side=='on'){
$string .= "
			
			\$row = \$this->tmodel->json($private_id);
			
			//create key n put in session for encode id
			\$key  = IDCoder::createKey();
			
			\$x = 0;
			foreach(\$row['data'] as \$val){
				
				\$idgenerate = IDCoder::encode(\$val['id'],\$key);
				
				//generate ID		
				\$row['data'][\$x]['id'] = \$idgenerate;
				
				";


			
foreach($type_input_field as $i => $val){
	
	switch($val){
		
		case 'upload-img':	
$string .= "	
				//create preview image
				$$i  		= Storage::getFiles(\$val['$i'])[0];
				\$linkFile 	= @$".$i."->link;
				\$nameFile 	= @$".$i."->orig_name;
				\$row['data'][\$x]['$i'] =  \"<a href='#' class='thumbnail'>
											<img src='\$linkFile'  class='ybs-image-slider ybs-table-preview' data-image='\$nameFile'  alt='opps image not found'>
											</a>\";
";		
		break;
				
		case 'upload-video':
$string .= "	
				//create preview video
				$$i  = Storage::getFiles(\$val['$i'])[0];
				\$linkFile 	= @$".$i."->link;
				\$nameFile 	= @$".$i."->orig_name;
				\$row['data'][\$x]['$i'] =  \"<video width='250' height='150' controls src='\$linkFile'>
											  Your browser does not support the video tag.
											  </video>\";
";			
		break;
		case 'upload-audio':
$string .= "
				//create preview audio
				$$i  = Storage::getFiles(\$val['$i'])[0];
				\$linkFile 	= @$".$i."->link;
				\$nameFile 	= @$".$i."->orig_name;
				\$row['data'][\$x]['$i'] =  \"<audio controls>
											  <source src='\$linkFile' type='audio/mpeg'>
												Your browser does not support the audio element.
											  </audio>\";
";			
		break;
		case 'upload-doc':		
		case 'upload-all':
$string .= "
				//create download document
				$$i  = Storage::getFiles(\$val['$i'])[0];
				\$linkFile 	= @$".$i."->link;
				\$nameFile 	= @$".$i."->orig_name;
				\$row['data'][\$x]['$i'] =  \"<a href='\$linkFile' >\$nameFile</a>\";
";		
		break;	
		break;
		
	}	
}					
			
$string .="		
				\$x++;
			}
			
			response()->dataTables(\$row);
";
}else{
	
$string .="
			\$row = \$this->tmodel->get_all($private_id);
			
			//create key n put in session for encode id
			\$key  = IDCoder::createKey();
			
			\$x = 0;
			foreach(\$row as \$val){
				\$idgenerate = IDCoder::encode(\$val['id'],\$key);
				\$row[\$x]['id'] = \$idgenerate;
				
				
";

foreach($type_input_field as $i => $val){
	
	switch($val){
		
		case 'upload-img':	
$string .= "	
				//create preview image
				$$i  = Storage::getFiles(\$val['$i'])[0];
				\$linkFile 	= @$".$i."->link;
				\$nameFile 	= @$".$i."->orig_name;
				\$row[\$x]['$i'] =  \"<a href='#' class='thumbnail'>
											<img src='\$linkFile'  class='ybs-image-slider ybs-table-preview' data-image='\$nameFile'  alt='opps image not found'>
											</a>\";
";		
		break;
				
		case 'upload-video':
$string .= "	
				//create preview video
				$$i  = Storage::getFiles(\$val['$i'])[0];
				\$linkFile 	= @$".$i."->link;
				\$nameFile 	= @$".$i."->orig_name;
				\$row[\$x]['$i'] =  \"<video width='250' height='150' controls src='\$linkFile'>
											  Your browser does not support the video tag.
											  </video>\";
";			
		break;
		case 'upload-audio':
$string .= "
				//create preview audio
				$$i  = Storage::getFiles(\$val['$i'])[0];
				\$linkFile 	= @$".$i."->link;
				\$nameFile 	= @$".$i."->orig_name;
				\$row[\$x]['$i'] =  \"<audio controls>
											  <source src='\$linkFile' type='audio/mpeg'>
												Your browser does not support the audio element.
											  </audio>\";
";			
		break;
		case 'upload-doc':		
		case 'upload-all':
$string .= "
				//create download document
				$$i  = Storage::getFiles(\$val['$i'])[0];
				\$linkFile 	= @$".$i."->link;
				\$nameFile 	= @$".$i."->orig_name;
				\$row[\$x]['$i'] =  \"<a href='\$linkFile' >\$nameFile</a>\";
";		
		break;	
		break;
		
	}	
}	


$string .="				
				\$x++;
			}
			
			
			response()->dataTables(\$row,FALSE);
";
}			
			
$string .="			

		}else{
			response()->goto('Auth');
		}
	}
";
//----->END refresh_table <-------//  



//----->function create <-------//  
$string .="
	public function create(){
		\$breadcrumb =[
			'$fc' 	=>   url(),
			'Create' 		=>  '',
		];
		
		\$data =[
			'breadcrumb'			=> \$breadcrumb,
			'title_page_big'		=> 'Add Data',
			'title'					=> new $fc"."_config(),
			'link_save'				=> url('create_action'),
			'link_back'				=> \$this->agent->referrer(),
		];
		";
$string .="			

		response()->view('$gf/$ff',\$data);

	}
";
//----->END function create <-------//  
	
	
	
//----->function create action <-------//  	
$string .="

	public function create_action(){
		
		\$val 	= request();
";

foreach($type_input_field as $i => $val){
	
	switch($val){
			
		case 'summernote':
$string .= " 

		//warning ! penggunaan false membuat filter xss_clean tidak bekerja
		\$editor		= Request::post(\"$i\",false);
		\$val[\"$i\"]   = urldecode(\$editor);

";		
		break;
		
	}	
}
	


$string .="		
		//use validation MVC
		\$valid = Validation::run(\$val,\\$fm::class);
		
		
		if(!\$valid) response()->json(Validation::error());
		
		
";	


foreach($type_input_field as $i => $val){
	
	switch($val){
		case "dd.mm.yyyy" :
		case "dd-mm-yyyy" :
		case "dd/mm/yyyy" :
		case "dd mm yyyy" :
		case "d M yyyy" :
$string .="
		//convert to sql date
		\$sqldate = \$val['$i'];
		\$val['$i']= strtosqldate(\$sqldate);
";			
		break;
		case "unix" :
$string .="
		//convert to unixtime
		\$unix = \$val['$i'];
		\$val['$i']= strtotime(\$unix);
";	
		break;
		
		case "number" :
$string .="
		//remove separator thousands
		\$val['$i']= str_replace(',','',\$val['$i']);
";			
		
		break;
		
		
	}
	
}




$string .="
		//remove id before insert
		unset(\$val['id']);
		 
		\$success = \$this->tmodel->insert(\$val$separator$private_id);
		
		//menyimpan file permanent, 
		//fungsi ini akan bekerja ketika ada file yang di upload	
		FileUpload::save(\$success);

		response()->json(\$success);

	}
";	
//----->END create action <-------//  	





//----->function update <-------//  
$string .="

	public function update(\$id){
	
		\$id_generate		= \$id;
		
		//create Temp Key for protect session if you open another tab in the same time 
		//Temp Key == First Key 
		\$key  = IDCoder::createTempKey(\$id);
		
		\$id  =  IDCoder::decode(\$id,\$key);   
		
		\$row = \$this->tmodel->get_by_id(\$id$separator$private_id);
		
		if(\$row){
			\$breadcrumb =[
				'$fc' 	=>   url(),
				'Update Data' 		=>  '',
			];";
			
foreach($type_input_field as $i => $val){
	
	switch($val){
			
		case 'summernote':
$string .= " 
		\$row->$i = htmlentities(\$row->$i);
";		
		break;
		
	}	
}			
			
$string .="
			
			
			\$data = array(
				'breadcrumb'			=> \$breadcrumb,
				'title_page_big'		=> 'Update Data',
				'title'					=> new $fc"."_config(),
				'link_save'				=> url('update_action'),
				'link_back'				=> \$this->agent->referrer(),
				'data'					=> \$row,";
				
				
foreach($field_empty as $k=>$v){

if($k=='id'){
	$string .="
				'$k'					=> \$id_generate,";					
}	

}
				
$string .="
			);
			
			response()->view('$gf/$ff',\$data);
		}else{
			response()->goto(\$this->agent->referrer());
		}
	}
";


//----->END function update <-------//  
$string .="
	public function update_action(){
		
		
		\$val 		= request();";
foreach($type_input_field as $i => $val){
	
	switch($val){
			
		case 'summernote':
$string .= " 

		//warning ! penggunaan false membuat filter xss_clean tidak bekerja
		\$editor		= Request::post(\"$i\",false);
		\$val[\"$i\"]   = urldecode(\$editor);
		

";		
		break;
		
	}	
}
	
		
$string .="
		
		\$key		= IDCoder::getTempKey(\$val[\"id\"]);
		
		\$val['id']	= IDCoder::decode(\$val[\"id\"],\$key);
		

		\$valid = Validation::run(\$val,\\$fm::class);
		
		if(!\$valid) response()->json(Validation::error());
			
		
";	
	

foreach($type_input_field as $i => $val){
	
	switch($val){
		case "dd.mm.yyyy" :
		case "dd-mm-yyyy" :
		case "dd/mm/yyyy" :
		case "dd mm yyyy" :
		case "d M yyyy" :
$string .="
		//convert to sql date
		\$sqldate = \$val['$i'];
		\$val['$i']= strtosqldate(\$sqldate);
";			
		break;
		case "unix" :
$string .="
		//convert to unixtime
		\$unix = \$val['$i'];
		\$val['$i']= strtotime(\$unix);
";	
		break;
		case "number" :
$string .="
		//remove separator thousands
		\$val['$i']= str_replace(',','',\$val['$i']);
";			
		
		break;		
		
	}
	
}



$string .="

		\$success = \$this->tmodel->update(\$val['id'],\$val$separator$private_id);
		
		//update file, 
		//fungsi ini akan bekerja ketika ada file yang di upload	
		FileUpload::update(\$success);
		
		response()->json(\$success);

	}
";	



//----->function update action <-------//  







//----->END function update action<-------//  


//----->function delete multiple <-------//  	
$string .="
	public function delete_multiple(){
		
		\$val=request();
		
		\$data = explode(',',\$val['data_delete']);

		\$key = IDCoder::getKey();
		
		\$xx=0;
		foreach(\$data as \$value){
			\$id =  IDCoder::decode(\$value,\$key);
			
			//delete file permanent, 
			//fungsi ini akan bekerja ketika ada file yang di upload	
			Storage::deleteByID(\$id,\\$fm::table,[";
			
foreach($type_input_field as $i => $val){
	
	switch($val){
		
		case 'upload-img':	
		case 'upload-doc':
		case 'upload-video':
		case 'upload-audio':
		case 'upload-all':
		
$string .= " \"$i\", ";		
		break;
		
	}	
}				
			
			
$string .="]);
			
			
			
			//menganti ke id asli
			\$data[\$xx] = \$id;
			\$xx++;	
		}
";


$string .="		
		\$success = \$this->tmodel->delete_multiple(\$data$separator$private_id,\$this->softdelete);
		
		\$o = new Outputview();
		
		//create message
		if(\$success){
			\$o->success 	= true;
			\$o->message	= 'Data berhasil di hapus !';
		}else{
			\$o->success 	= false;
			\$o->message	= 'Opps..Gagal menghapus data !!';
		}
		
		
		response()->json(\$o->result());
	
	}
";	



//----->END delete multiple <-------//  		
	
	
	
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
	
	
	
$this->create_config_file($fc,$fm,$fl,$ff,$pc,$gf,
					  $field_alias_form,$field_alias_field,$type_input_field,
					  $crud_show);
					  
$result = _createFile($string,$pc,$fc .'.php');		
return $result;			
	
}



function create_config_file($fc,$fm,$fl,$ff,$pc,$gf,
					  $field_alias_form,$field_alias_field,$type_input_field,
					  $crud_show){

$string = "<?php
require_once APPPATH . 'controllers/sistem/General_title.php';
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class $fc".'_config'." {
	

";



$string .="
   function __construct(){
	   /* title */
	    \$this->general		= new General_title();
";

foreach($field_alias_form as $key=>$val){
$keys = str_replace('.','_',$key);	
$string .="		\$this->$keys	= '$val';
";	
}

$string .="
		
		
		
		/*field_alias_database db*/
";	
foreach($field_alias_field as $key=>$val){
$keys = str_replace('.','_',$key);	
$string .="		\$this->f_$val	= '$val';
";	
}


$string .="
		
		
		
		/* CONFIG FORM LIST */
		/* field_alias_database => \$title */	
		\$this->table_column =array(
";	
foreach($field_alias_field as $key=>$val){
$keys = str_replace('.','_',$key);	
$string .="			\$this->f_$val	=> \$this->$keys,
";	
}

$string .="		);
";




//end class		
$string .= "
	}

};









/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator ".date('Y-m-d H:i:s')." */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

"	;	

$result =  _createFile($string,$pc,$fc .'_config.php');	
}











}
