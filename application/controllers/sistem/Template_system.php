<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_system extends CI_Controller {

    function __construct(){
        parent::__construct();
    }
	
	public function index(){
		
	}
	
	public function style(){
		
		$d_map = directory_map(APPPATH.'/views/front-end/login/');
		$styleLogin=array();
		
		foreach($d_map as $key=>$val){
			$styleLogin[] = str_replace('.php',"",$val);
		}
		
		
		
		
		
		
		$breadcrumb = array();
		$breadcrumb['sistem']	= site_url().'sistem/Pengaturan';	
		$breadcrumb['Pengaturan template']	= site_url().'sistem/Template_system/style';
		
		$data = array();
		$data['breadcrumb']	= $breadcrumb;
		$data['title_page_big'] = "Pengaturan Template";
		$data['link_update_login_setting'] = site_url().'sistem/Template_system/update_login_setting/'.$this->_token;
		$data['link_update_template_setting'] = site_url().'sistem/Template_system/update_template_setting/'.$this->_token;
		$data['link_set_login_style']	= site_url().'sistem/Template_system/set_login_style/'.$this->_token;
		$data['styleLogin'] = $styleLogin;
		$this->template->load("sistem/Pengaturan_template_system",$data);
	}


	public function set_login_style($token){
		if($token ==$this->_token && $this->_user_id==1){
			$data = $this->input->post("data_ajax",TRUE);
			$val =json_decode($data,TRUE);
			
			$i= './application/config/config_ybs.php';
					
			if( !file_exists($i) ) die("File not found");
			$content= file_get_contents($i);

			$nc = str_replace("\$config['login_style']='".$this->_appinfo['login_style']."';",
								"\$config['login_style']='".$val['login_style']."';",$content);
			write_file($i,$nc);						
			
			$o = new Outputview();
			$o->success="true";
			$o->message=	$val['login_style'] ." berhasil di set"; 
			echo $o->result();
			
		}else{
			redirect("Auth");	
		}	
	}
	
	public function update_login_setting($token){
		if($token ==$this->_token && $this->_user_id==1){
			
			$data = $this->input->post("data_ajax",TRUE);
			$val =json_decode($data,TRUE);
			
				$logo_login="";
				$logo_title_bar="";
				
				$this->load->model('sys/Sys_service_storage_model','tstor');
				
				$Obj_logo_login 		= $this->tstor->get_file_temp_bytime($this->_user_id,$val['logo_login']);
				$Obj_logo_title_bar 	= $this->tstor->get_file_temp_bytime($this->_user_id,$val['logo_title_bar']);
				
				$logo_login_source		= "";
				$logo_title_bar_source 	= "";
				
				$logo_login_dest		= "";
				$logo_title_bar_dest 	= "";
				
				if($Obj_logo_login){
					$logo_login_source = "./temp_upload/".$Obj_logo_login->name;
					$val['logo_login_ext'] = strtolower($val['logo_login_ext']);
					if($val['logo_login_ext'] !==".png" && $val['logo_login_ext'] !==".jpg" && $val['logo_login_ext'] !==".svg" && $val['logo_login_ext'] !==".jpeg" ){
						$val['logo_login_ext'] =".png";
					}
					$logo_login_dest   = "./images/logo/login".$val['logo_login_ext'];
				}
				
				if($Obj_logo_title_bar){
					$logo_title_bar_source = "./temp_upload/".$Obj_logo_title_bar->name;
					$val['logo_title_bar_ext'] = strtolower($val['logo_title_bar_ext']);
					if($val['logo_title_bar_ext'] !==".png" && $val['logo_title_bar_ext'] !==".jpg" && $val['logo_title_bar_ext'] !==".svg" && $val['logo_title_bar_ext'] !==".jpeg" ){
						$val['logo_title_bar_ext'] =".png";
					}
					$logo_title_bar_dest   = "./images/logo/logo_titlebar".$val['logo_title_bar_ext'];
				}
				
				
				
				try{
					
					if(is_file($logo_login_source)){
						copy($logo_login_source,$logo_login_dest);
					}
					
					if(is_file($logo_title_bar_source)){
						copy($logo_title_bar_source,$logo_title_bar_dest);
					}
					
					
					$i= './application/config/config_ybs.php';
					
					if( !file_exists($i) ) die("File not found");
					$content= file_get_contents($i);

					$nc = str_replace("\$config['login_title_bar']='".$this->_appinfo['login_title_bar']."';",
										"\$config['login_title_bar']='".$val['login_title_bar']."';",$content);
										
					$nc1 = str_replace("\$config['login_title_box']='".$this->_appinfo['login_title_box']."';",
										"\$config['login_title_box']='".$val['login_title_box']."';",$nc);					
							
					$nc2 = $nc1;			
					if($val['logo_login'] !==""){
						$nc2 = str_replace("\$config['login_logo']='".$this->_appinfo['login_logo']."';",
										"\$config['login_logo']='login".$val['logo_login_ext']."';",$nc1);			
					}					
										
					$nc3 = str_replace("\$config['login_logo_size']='".$this->_appinfo['login_logo_size']."';",
										"\$config['login_logo_size']='".$val['login_logo_size']."';",$nc2);
										
										
					$nc4 = str_replace("\$config['login_label_user']='".$this->_appinfo['login_label_user']."';",
										"\$config['login_label_user']='".$val['login_label_user']."';",$nc3);	
					
					$nc5 = str_replace("\$config['login_label_password']='".$this->_appinfo['login_label_password']."';",
										"\$config['login_label_password']='".$val['login_label_password']."';",$nc4);	

					$nc6 = str_replace("\$config['login_label_button']='".$this->_appinfo['login_label_button']."';",
										"\$config['login_label_button']='".$val['login_label_button']."';",$nc5);
					$nc7 = $nc6;
					if($val['logo_title_bar'] !==""){
						$nc7 = str_replace("\$config['logo_title_bar']='".$this->_appinfo['logo_title_bar']."';",
										"\$config['logo_title_bar']='logo_titlebar".$val['logo_title_bar_ext']."';",$nc6);			
					}										
					
					write_file($i,$nc7);
				
					
				} catch(Exception $e) {
					$o = new Outputview();
					$o->success="false";
					$o->message="Error". $e->message; 
					echo $o->result();
					return;
				}
				
				
				
			
			
			
			
			
			$o = new Outputview();
			$o->success="true";
			$o->message="Data Berhasil di simpan"; 
			echo $o->result();
		
			
			
		}else{
			redirect("Auth");
		}
	}
	
	
	public function update_template_setting($token){
		if($token ==$this->_token && $this->_user_id==1){
		$data = $this->input->post("data_ajax",FALSE);
		$data = str_replace(["script","'","delete","update","insert","fetch"],"",$data);
		$val =json_decode($data,TRUE);
			
				$row="";
				$this->load->model('sys/Sys_service_storage_model','tstor');
				$row = $this->tstor->get_file_temp_bytime($this->_user_id,$val['template_logo']);
				
				$path_source="";
				$path_dest="";
				
				if($row){
					$path_source = "./temp_upload/".$row->name;
					$val['ext'] = strtolower($val['ext']);
					if($val['ext'] !==".png" && $val['ext'] !==".jpg" && $val['ext'] !==".svg" && $val['ext'] !==".jpeg" ){
						$val['ext'] =".png";
					}
					$path_dest   = "./images/logo/logo".$val['ext'];
				}
				
				
				try{
					
					if(is_file($path_source)){
						copy($path_source,$path_dest);
					}
					
					$i= './application/config/config_ybs.php';
					
					if( !file_exists($i) ) die("File not found");
					$content= file_get_contents($i);

					$nc = str_replace("\$config['template_title_bar']='".$this->_appinfo['template_title_bar']."';",
										"\$config['template_title_bar']='".$val['template_title_bar']."';",$content);
											
					
					// $nc1 = $nc;			
					// if($val['template_logo'] !==""){
						// $nc1 = str_replace("\$config['template_logo']='".$this->_appinfo['template_logo']."';",
										// "\$config['template_logo']='logo".$val['ext']."';",$nc);			
					// }							
					
					// $nc2 = str_replace("\$config['template_logo_size']='".$this->_appinfo['template_logo_size']."';",
										// "\$config['template_logo_size']='".$val['template_logo_size']."';",$nc1);
										
					$nc1 = str_replace("\$config['template_footer_left']='".$this->_appinfo['template_footer_left']."';",
										"\$config['template_footer_left']='".$val['template_footer_left']."';",$nc);	
					
					$nc2 = str_replace("\$config['template_footer_right']='".$this->_appinfo['template_footer_right']."';",
										"\$config['template_footer_right']='".$val['template_footer_right']."';",$nc1);	
										
					$nc3 = str_replace("\$config['template_menu_title_mini']='".$this->_appinfo['template_menu_title_mini']."';",
										"\$config['template_menu_title_mini']='".$val['menu_title_mini']."';",$nc2);
										
					$nc4 = str_replace("\$config['template_menu_title_long']='".$this->_appinfo['template_menu_title_long']."';",
										"\$config['template_menu_title_long']='".$val['menu_title_long']."';",$nc3);							

														
					
					write_file($i,$nc4);
				
					
				} catch(Exception $e) {
					$o = new Outputview();
					$o->success="false";
					$o->message="Error". $e->message; 
					echo $o->result();
					return;
				}
				
				
				
			
			
			
			
			
			$o = new Outputview();
			$o->success="true";
			$o->message="Data Berhasil di simpan";
			echo $o->result();

		}else{
			redirect("Auth");
		}
	}
	
	
	
	
	private function change_config($file_name){
		$i= './application/config/config_ybs.php';
			
			if( !file_exists($i) ) die("File not found");
			$content= file_get_contents($i);

			$nc = str_replace("\$config['login_logo']='".$this->_appinfo['login_logo']."';",
								"\$config['login_logo']='$file_name';",$content);
			
			write_file($i,$nc);
	}
	
	
	
}