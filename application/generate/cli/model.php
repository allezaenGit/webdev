<?php
namespace user\generate\cli;
use \ybs\cli\template\support\BluePrint;
use \ybs\cli\template\support\Schema;

class model{

public function up(BluePrint $bp){
Schema::create($bp,function(BluePrint $data){
$data->output ="<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class $data->className extends CI_Model {
	public \$id;	
	const table = \"..your table..\";
	const rules = [
		\"..yourfield..\" => \"..your rules..\",   //rules ex : required|max:20||min:5||unique||alpha  
	];
   
   function __construct(){
        parent::__construct();
   }
   
   
   function get_all(){
	   \$afield = array(
			\$this->table . '.*',
	   );
	   
	   \$this->db->select(\$afield);
	   return \$this->db->get(\$this->table)->result_array();
   }
   
   function get_by_id(\$id){
	   \$afield = array(
			\$this->table . '.*',
	   );
	   
	   \$this->db->select(\$afield);
	   \$this->db->where(\$this->table .'.id',\$id);
	   return \$this->db->get(\$this->table)->row();
   }
   
   
   /* Memastikan data yg dibuat tidak kembar/sama,
	   fungsi ini sebagai pengganti fungsi primary key dr db,
	   krn primary key sudah di gunakan untuk column id.
	   -create : id di kosongkan.
	   -update : id di isi dengan id data yg di proses.	
	*/	
	function if_exist(\$id,\$data){
		\$this->db->where(\$this->table.'.id <>',\$id);

		\$q = \$this->db->get_where(\$this->table, \$data)->result_array();
		
		if(count(\$q)>0){
			return true;
		}else{
			return false;
		}		

	

	}
   
   
   
   function insert(\$data){
	/* transaction rollback */
	\$this->db->trans_start();
		
	\$this->db->insert(\$this->table, \$data);		
	/* id primary yg baru saja di input*/
	\$this->id = \$this->db->insert_id(); 
		
	\$this->db->trans_complete();
	 return \$this->db->trans_status(); //return true or false
   }
   
   
   function update(\$id,\$data){
	   /* transaction rollback */
		\$this->db->trans_start();
		
		\$this->db->where(\$this->table.'.id', \$id);
		\$this->db->update(\$this->table, \$data);
		
		\$this->db->trans_complete();
		return \$this->db->trans_status(); //return true or false
   }
   
   
   
   function delete(\$data){
	  /* transaction rollback */
		\$this->db->trans_start();
		
		if(!empty(\$data)){
			
			\$this->db->where_in(\$this->table.'.id',\$data);	
	
			\$this->db->delete(\$this->table);
			
			
		}	
		
		
		
		
		\$this->db->trans_complete();
		return \$this->db->trans_status(); //return true or false
	
   }
   
   
   
   
   
   
   
   
   
   
}


		
";


});
	 
}	

	
	
}