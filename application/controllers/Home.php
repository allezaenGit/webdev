<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Form_General
 *
 * @author Dhiya
 */
class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
		
    }

    public function index() {
		
		//meload dashboard jika tidak ada redirect lain
		$this->load->model('sys/Sys_dashboard_model','dashboard');
		$dashboard = $this->dashboard->get_form($this->_user_id);
			
		if($dashboard!==false){
			redirect($dashboard->link);
		}else{
			//untuk mengganti default halaman home
			//buat statement or hapus code di bawah
			
				$view = 'sistem/Home';
				$data['title_page_big']	 	= 	'';
				$this->template->load($view, $data);
			
			//-------------------------------------//
			
			
			//kemudian ganti dengan perintah di bawah
			
			//redirect("your controller");
			
			//-----------------------------------//
		}
	
      
		
    }
	
	public function mirror(){
			$view = 'sistem/Blank';
			$data['title_page_big']	 	= 	'Sistem Informasi';
			$this->template->load($view, $data);
	}
	

}
