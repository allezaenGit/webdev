<?php
use ybs\http\Request;
use ybs\http\Response;
 
class Crud_generator extends CI_Controller { 
	var 	$c_path;
	var 	$v_path;
	var 	$m_path;
	var		$page_version;
	
	public function __construct() {
		parent::__construct();

		$this->load->model('sys/Crud_generator_model','crud_model');
		$this->c_path 	= APPPATH . 'controllers';
		$this->v_path 	= APPPATH . 'views';
		$this->m_path 	= APPPATH . 'models';
		
		$this->page_version	= $this->_appinfo['version'];
	}
	

	public function index(){
			$breadcrumb	= array();
			$breadcrumb['sistem']			= site_url() . 'sistem/Pengaturan';
			$breadcrumb['CRUD Generator']	= site_url() . 'sistem/Crud_generator';
			
			$data = array();
			$data['breadcrumb']					= $breadcrumb;
			$data['title_page_big'] 			= 'CRUD Generator';
			$data['table_list']					= $this->crud_model->get_table_list();
			$data['link_get_field_table']		= site_url().'sistem/Crud_generator/get_field_table/'.$this->_token;	
			$data['link_get_field_table_join']	= site_url().'sistem/Crud_generator/get_field_table_join/'.$this->_token;
			$data['link_get_title_alias']		= site_url().'sistem/Crud_generator/get_title_alias/'.$this->_token;
			$data['link_generate_form']			= site_url().'sistem/Crud_generator/generator_form/'.$this->_token;
			$data['link_registrasi_url']		= site_url().'sistem/Registrasi_form/create';
			$data['link_create_menu']			= site_url().'sistem/Pengaturan_tampilan/create_menu';
			$this->template->load('sistem/crud_generator/Generator_form',$data);
	}

	
	
	public function generator_form($token){
		if($this->_token == $token && $this->_user_id==1){
			
				$val 	= $this->input->post('data_ajax',true);
			
			//	response()->json(request());
			
				if(!$val){
					redirect('auth');
					return;
				}
				
			
								

				$table 					= $val['table_name'];
				$general_folder			= $val['general_folder'];
				$general_file_name		= $val['general_file_name'];
				$crud_show				= @$val['crud_show'];
				$create_view			= @$val['create_view'];
				$create_controller		= @$val['create_controller'];
				$opt_create_view		= $val['opt_create_view'];
				$opt_create_controller	= $val['opt_create_controller'];
				$end_point				= $val['end_point'];
				
				
				
				
				$server_side			= @$val['server_side'];
				$field_validation		= $val['otherValidation'];
				$field_tabel			= $val['field'];
				$field_empty 			= $val['dk'];
				$field_double			= $val['dr'];
				$ifcu					= @$val['ifcu'];
				$table_join				= array();
				$field_alias_field 		= array();
				$type_input_field		= array();
				//$alias_table_join		= array();
				$index_alias_table_join	= array();
				$field_alias_form 		= array();
				
					
				$select_show_join		= array();
				
				$sj = $val['sj'];
				$atj = $val['atj'];
				
				foreach($sj as $i=>$v){
					if($v!=="none") {
						$table_join[$i] = $v;
					}	
				}
				
				$xy=0;
				foreach($atj as $i=>$v){
					if($v!=="") {
						$index_alias_table_join[$xy] = $v;
						$xy++;
					}	
				}
	

				
				$itj=0;
				foreach($val as $key=>$value){
					
							$a = explode('___',$key);
							
							switch($a[0]){
							
								case 'af': //alias_field
									$f = str_replace("__",".",$a[1]);
									
									$field_alias_field[$f] = $value; 
									break;
									
								case 'am': //alias form
									$f = str_replace("__",".",$a[1]);
									$field_alias_form[$f] = $value; 
									break;	
			
								case 'ssj': //select_show_join
									$f = $a[1];
									if($value !=='none'){
										$select_show_join[$f] = $value; 
									}
									
									break;	
								case 'sti' : //select_type_input
									$f = $a[1];
									$type_input_field[$f] = $value; 
									break;	
							}
							
						
					
				}
			
			
				
				if($general_folder=='sistem' || $general_folder=='sys'){
					$o = new Outputview();
					$o->success 	= 'false';
					$o->message 	= 'Opps..folder sistem tidak dapat digunakan !!';//
					$o->elementid	= '#general-folder';
					echo $o->result();
					return;
				}

				$general_folder = strtolower($general_folder);
				$general_file_name = strtolower($general_file_name);
				
				$gf 		= $general_folder;		//ucfirst($table); 			//general folder
				$fc			= ucfirst($general_file_name); 	//file controllers
				$fm			= $fc.'Model';	//file model
				$ORMfm		= $fc.'Model_ORM';	//file model
				$fl			= $fc.'_list';	//file view list
				$ff			= $fc.'_form';	//file view form
				
				$pm 		= APPPATH . 'models/' . $gf ;
				$pc			= APPPATH . 'controllers/' . $gf ;
				$pca		= APPPATH . 'controllers/api/';
				$pv			= APPPATH . 'views/' . $gf ;
				
				
				if($crud_show==null){
					$crud_show="off";
					$this->crud_model->create_field_user_input($table);
				}
				
				if($server_side==null) $server_side=="off"; 
				
				
				$this->crud_model->create_field_update_at($table);
				$this->crud_model->create_field_delete_at($table);
				
				
				foreach($field_validation as $i => $val){
					if($field_empty[$i]==0){
						$s="";
						if($field_validation[$i]!=="")$s="|";
						$field_validation[$i] = $field_validation[$i] . $s .  "required";	
					}
					
					if($field_double[$i]==0){
						$s="";
						if($field_validation[$i]!=="")$s="|";
						$field_validation[$i] = $field_validation[$i] . $s ."unique";	
					}
					
					$field_validation[$i] = str_replace(",","|",$field_validation[$i]);
				
				}
				
				$valid =false;
				foreach($ifcu as $v){
					
					if($v==1){
						
						$valid=true;
						break;
					}
				}
				
				if(!$valid){
					$o = new Outputview();
					$o->success 	= 'false';
					$o->message 	= 'Opps..Form harus berisi minimal 1 inputan..cek IFCU anda !';//
					
					echo $o->result();
					return;
				}
				
		
				$result = array();
				$this->load->model('sys/Template_model','tm');
				$result['create_model'] = $this->tm->create_model($fm,$pm,$field_alias_field,$table_join,$index_alias_table_join,
																  $table,$crud_show,$type_input_field,$field_validation,$ifcu);
				

				$this->load->model('sys/Template_ORMmodel','ORMtm');
				$result['create_ORMmodel'] = $this->ORMtm->create_model($gf,$ORMfm,$pm,$field_alias_field,$table_join,$index_alias_table_join,$table,$crud_show,$type_input_field);
				
			
				if($create_controller){
				
					if($opt_create_controller[0]=="default"){
						
						$this->load->model('sys/Template_controller','tc');
						$result['create_controller'] = $this->tc->create_controller($fc,$fm,$fl,$ff,$pc,$gf,
																				$field_alias_form,$field_alias_field,$type_input_field,
																				$field_double,$field_empty,
																				$crud_show,$server_side);
					}else{
						$this->load->model('sys/Template_controller_blank','tc');
						$result['create_controller'] = $this->tc->create_controller($fc,$fm,$fl,$ff,$pc,$gf,
																				$field_alias_form,$field_alias_field,$type_input_field,
																				$field_double,$field_empty,
																				$crud_show,$server_side);
					}
				}
				
				if($create_view){
					
					if($opt_create_view[0]=="default"){
					
					$this->load->model('sys/Template_list','tl');
					$result['create_list'] = $this->tl->create_view_list($fl,$pv,$gf,$field_alias_form,$type_input_field,$server_side,$this->page_version);
					
					
					$this->load->model('sys/Template_form','tf');
					$result['create_form_input'] = $this->tf->create_view_form($ff,$pv,$gf,$select_show_join,$field_tabel,$table,$type_input_field,$this->page_version,$ifcu);
					
					}else{
						$this->load->model('sys/Template_list_blank','tl');
						$result['create_list'] = $this->tl->create_view_list($fl,$pv,$gf,$field_alias_form,$type_input_field,$server_side,$this->page_version);
					}
					
				}
				
				

				if($end_point){
						$end_point = strtolower($end_point);
						$end_point = ucfirst($end_point);
						$this->load->model('sys/Template_controller_api','tca');
						$result['create_controller_api'] = $this->tca->create_controller($end_point,$fm,$fl,$ff,$pca,$gf,
																				$field_alias_form,$field_alias_field,$type_input_field,
																				$field_double,$field_empty,
																				$crud_show,$server_side);
				}
				
				
				
				$o = new Outputview();
				$o->success = 'true';
				$o->message =  'Done..! Proses Generate Form Selesai..';//
				echo $o->result();
		}else{
			redirect("Auth");
		}
	}
	
	
	
	public function get_field_table($token){
		if($this->_token == $token && $this->_user_id==1){
			$data 	= $this->input->get('data_ajax',true);
			$val	= json_decode($data,true);
		
			$o= new outputview();
			
			if(!isset($val['table_name'])){
				redirect('auth');
				return;
			}
			
			if($val['table_name']=='none'){
				$o->success='false';
				echo $o->result();
				return;
			}
			
			$lfield 	= $this->crud_model->get_field_info($val['table_name']);
			$count_row 	=  $this->crud_model->get_count($val['table_name']);
			$o->success ='true';
			$o->message = $lfield;
			
			//menggunakan variable elementid untuk mengirim jumlah row
			$o->elementid = $count_row;
			
			echo $o->result();
			return;
		}else{
			redirect("Auth");
		}
		
		
	}
	
	public function get_field_table_join($token){
		if($this->_token == $token && $this->_user_id==1){
			
			$data 	= $this->input->get('data_ajax',true);
			$val	= json_decode($data,true);
		
			$o= new outputview();
			if(!isset($val['table_name'])){
				redirect('auth');
				return;
			}	
			
			if($val['table_name']=='none'){
				$o->success='false';
				echo $o->result();
				return;
			}
			
			
			
			$lfield = $this->crud_model->get_field_info($val['table_name']);

			$o->success ='true';
			$o->message = $lfield;
			echo $o->result();
			return;
		}else{
			redirect("Auth");
		}	
	}
	
	public function get_title_alias($token){
		if($this->_token == $token && $this->_user_id==1){
			$data 		= $this->input->get('data_ajax',true);
			$val		= json_decode($data,true);
			
			if(!isset($val['table_name'])){
				redirect('auth');
				return;
			}
			
			$xf  		= explode(',',$val['table_name']); 
			
			
			
			$table_fname = array();
			$table = array();
			$x = 0;
			
			
			$o = new outputview();
		
			foreach($xf as $val){
				$ff 	= array();
				$ff 	= explode('___',$val);
				$talias='';
				$table_name	= $ff[0];
				
				//mendapatkan alias table
				if(count($ff)>1){
					$talias = $ff[1];
				}else{
					$talias = $table_name;
				}
				
				
				$lfield = $this->crud_model->get_field_info($table_name);
				
				$xy =0;
				foreach($lfield as $val_field){
					$table['nomor']	 = [$x+1];	
					$table['name']   =  $talias.'__'.$val_field->name;
					
					
					
					//harus membuat alias field name jika antara table ada nama field yang sama
					$alias =$val_field->name;
					
					
					foreach($table_fname as $val_join){
						if($alias == $val_join['alias_field']){
							//mengchitung jumlah field yang sama
							$xy++;
						}
						if($xy>0){
							//jika field yang sama lebih besar dari 1
							//tambahkan nama table
							$alias = $talias.'_'.$val_field->name;
							
							//reset count
							$xy=0;
						}
					}
					
					$table['alias_field']   =  $alias;
					$table['title_alias']  =  strtoupper($val_field->name);
					$table_fname[$x] = $table;
					$x++;
				}
				
			}
			
			
			
			$o->success='true';
			$o->message=$table_fname;
			echo $o->result();
		}else{
			redirect("Auth");
		}	
			
	}
	
	

	
	
} 