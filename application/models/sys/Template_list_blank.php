<?php
class Template_list_blank extends CI_Model {

function __construct(){
      parent::__construct();
}

function create_view_list($fl,$pv,$gf,$field_alias_form,$type_input_field,$server_side,$page_version){

$string = "
<p>Halow..ini Page Blank</p>





<?php for(\$x=0;\$x<30;\$x++) echo \"<br>\";	?>
";



$result = _createFile($string,$pv,$fl .'.php');		
return $result;		
	
}



}