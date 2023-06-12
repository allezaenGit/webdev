<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template {

    var $template_data = array();
	private $username="";
	private $idlevel ="";
	private $nmlevel="";
	private $CI;

	
	function load($view, $view_data = array(), $return = FALSE) {
        $template = 'sistem/Template';
		$this->CI = & get_instance();
		
		 //memastikan jika user telah login,di tandai dengan adanya token
		 //fungsi ini tidak di simpan di controller karena akan menyebabkan loop saat melakukan redirect ke controller auth

		  if (!$this->CI->session->has_userdata('token')) {
			  $msg =  $this->CI->session->flashdata('auth_login');
			  if($msg !=='Opps..max 1 login per user, anda telah login pada perangkat yang lain'){
				//Di eksekusi saat browser di clear
				$this->CI->session->set_flashdata('auth_login','Opps..browser cleaning');
			  }
			 redirect('auth', 'refresh');
		  }	 else{

			 ////memastikan jika token valid/terdaftar ,mencegah token di isi manual
			 $token = $this->CI->session->userdata('token');
			 $logtime  = $this->CI->session->userdata('logtime');
			 
			 $valid = $this->CI->auth->is_valid_token($token,$logtime);
			 
			 if($valid=='false'){
				redirect('auth', 'refresh');	
			 }
		  
		 }

			
			//menyiapkan view_data dengan sisipan data
			$view_data = $this->_prepare_data($view_data);
				
			//jika yg di $view hanya berisi nama file view,tidak disi dalam bentuk array 
            if(!is_array($view)){
				$this->template_data['content_body'] = $this->CI->load->view($view, $view_data, TRUE);
			}else{
				foreach ($view as $key => $value) {
					if (!empty($value)) {
						$this->template_data[$key] = $this->CI->load->view($view[$key], $view_data, TRUE);
					}
				}
			}

		$id_user  		= $this->CI->_user_id;
		
		
		//id group server = 1
		$is_server = "false";
		
		if($id_user=="1"){
			$is_server = "true";
		}

		
	
		$ff = substr($_SERVER['SCRIPT_NAME'],1,strlen($_SERVER['SCRIPT_NAME']));
		$ff = str_replace("/index.php","",$ff);
		$fp = str_replace("index.php","",$ff);
		
		$this->template_data['is_server']				= $is_server;	
		$this->template_data['menu']					= $this->create_menu();
		$this->template_data['menu_notify_security']	= $this->create_notify_security();
		$this->template_data['fparent']					= $fp; //digunakan untuk mendeteksi jika app berada dalam subfolder	
		$this->template_data['breadcrumb']				= $this->create_breadcrumb($view_data['breadcrumb']);
		return $this->CI->load->view($template, $this->template_data, $return);
		
    }
	


	
	function _prepare_data($view_data){
		
		if(!is_array($view_data)){
			$view_data['title_page_big'] = '';
			$view_data['title_page_small'] = '';
			$view_data['breadcrumb'] = array();
		}else{
			
			if(element('title_page_big',$view_data)==NULL){
				$view_data['title_page_big'] = '';
			}
			if(element('title_page_small',$view_data)==NULL){
				$view_data['title_page_small'] = '';
			}
			if(element('breadcrumb',$view_data)==NULL){
				$view_data['breadcrumb'] = array();
			}
		}
		return $view_data;
	}
	

	
	function create_menu(){
		  $this->CI 				= & get_instance();
		  $this->CI->load->model('sys/Sys_authorized_menu_model','auth_menu');
		  
		  $mm['auth_menu']			= $this->CI->auth_menu;	
		  return $this->CI->load->view('sistem/Menu',$mm,TRUE);
	}
	
	
	function create_breadcrumb($data){
		$this->CI 				= & get_instance();
			//mencetak menu dashboard setting,hanya dicetak jika form.shortcut=1
		$star_light = 'dash-unselect';
		if($this->CI->_is_dashboard){
			  $star_light= 'dash-select' ;
		}
		
		$cumb="";	
		if($this->CI->_user_form_shortcut=='1'){
				$cumb .= "<li><a href=\"javascript:void(0)\"><i class=\"fa fa-star $star_light\" id=\"ybs-dash\"></i> </a></li> \n";
		}
		
		$cumb .='<li><a href="'. site_url() .'Home"><i class="fa fa-home"></i> Home</a></li>';
		
		
		$c = count($data);
		$x=1;
		
		foreach($data as $i => $link){
			
			if($x==$c){
				$cumb .= "<li class=\"active\">$i</li>  \n";
			}else{
				$cumb .= "<li><a href=\"$link\">$i</a></li>  \n";
			}
			$x++;
		}
		
 		return $cumb;
	}
	
	
	function create_notify_security(){
		 $this->CI = & get_instance();
		 $msg="";
		 //memastikan hanya user configurator yang dapat melihat menu ini
		 if($this->CI->_user_id=='1'){
			
			
			
				//notify Debug enabled
				$i= './file_sec/debug';
				if(file_exists($i) ){ 
					$content= file_get_contents($i);
					if($content=='on'){
							$msg ='   <li class="dropdown notifications-menu">
									<a href="#" class="nav-link icon icon-shake-jump" data-toggle="dropdown"> <i class="fe fe-alert-triangle"> </i><span class="label label-danger">1</span></a>
									 <ul class="dropdown-menu">
									 <li class="header text-center label-danger" ><b><i class="fe fe-alert-triangle"></i>  YBS - Warning</b></li>
									  <li  >
									   <ul class="menu">
									    
										<li>
											<a href="'.site_url("sistem/Keamanan/error_report").'">
											   <h5>
												<b><i class="fa fa-exclamation-circle text-red" ></i> <u>Error Report Enable !!</u></b>
											   
											  </h5>
											  <p style="font-size:11px">Berisiko tinggi pada keamanan sistem</p>
											</a>
										 </li>	
										 
										 
										 
										</ul>	
									  </li>
									</ul>
								  </li>';
						
					}
				}

		
			
				
			 
			 
		 }
		 return $msg;
	}
	

	

}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */