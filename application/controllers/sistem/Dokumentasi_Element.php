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
class Dokumentasi_Element extends CI_Controller {

    public function __construct() {
        parent::__construct();
		
    }

	public function index(){
		$data['page'] = "button";
	
		$data['title_page_big'] = "Sample Button";

		$data['body_dokumentasi'] =$this->load->view("sistem/dokumentasi/2.0.0/element/Button",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/2.0.0/Template_Sample_Element',$data);
	}
	
	
	public function  button(){
		$data['page'] = "button";
		
		$data['title_page_big'] = "Sample Button";

		$data['body_dokumentasi'] =$this->load->view("sistem/dokumentasi/2.0.0/element/Button",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/2.0.0/Template_Sample_Element',$data);
	}
	
	
	public function  panel(){
		$data['page'] = "panel";
		$data['title_page_big'] = "Sample Panel / Form";

		$data['body_dokumentasi'] =$this->load->view("sistem/dokumentasi/2.0.0/element/Panel",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/2.0.0/Template_Sample_Element',$data);
	}
	
	
	public function  form(){
		$data['page'] = "form";
		$data['title_page_big'] = "Sample Form";

		$data['body_dokumentasi'] =$this->load->view("sistem/dokumentasi/2.0.0/element/Form",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/2.0.0/Template_Sample_Element',$data);
	}
	
	public function  input_text(){
		$data['page'] = "input_text";
		$data['title_page_big'] = "Sample Input Text";

		$data['body_dokumentasi'] =$this->load->view("sistem/dokumentasi/2.0.0/element/InputText",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/2.0.0/Template_Sample_Element',$data);
	}
	
	public function  select(){
		$data['page'] = "select";
		$data['title_page_big'] = "Sample Select";

		$data['body_dokumentasi'] =$this->load->view("sistem/dokumentasi/2.0.0/element/Select",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/2.0.0/Template_Sample_Element',$data);
	}

	public function  select_db(){
		$data['page'] = "select_db";
		$data['title_page_big'] = "Sample Select Database";

		$data['body_dokumentasi'] =$this->load->view("sistem/dokumentasi/2.0.0/element/SelectDB",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/2.0.0/Template_Sample_Element',$data);
	}
	
	public function  toggle(){
		$data['page'] = "toggle";
		$data['title_page_big'] = "Toggle";

		$data['body_dokumentasi'] =$this->load->view("sistem/dokumentasi/2.0.0/element/Toggle",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/2.0.0/Template_Sample_Element',$data);
	}
	
	public function  widget(){
		$data['page'] = "widget";
		$data['title_page_big'] = "Sample Widget";

		$data['body_dokumentasi'] =$this->load->view("sistem/dokumentasi/2.0.0/element/Widget",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/2.0.0/Template_Sample_Element',$data);
	}
	
	public function  chart_js(){
		$data['page'] = "Chart_js";
		$data['title_page_big'] = "Sample ChartJS";

		$data['body_dokumentasi'] =$this->load->view("sistem/dokumentasi/2.0.0/element/Chart_js",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/2.0.0/Template_Sample_Element',$data);
	}
	
	public function  amchart(){
		$data['page'] = "amchart";
		$data['title_page_big'] = "Sample amChart";

		$data['body_dokumentasi'] =$this->load->view("sistem/dokumentasi/2.0.0/element/Amchart",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/2.0.0/Template_Sample_Element',$data);
	}
	
	
	public function  storageview(){
		$data['page'] = "storageview";
		$data['title_page_big'] = "Sample StorageView";

		$data['body_dokumentasi'] =$this->load->view("sistem/dokumentasi/2.0.0/element/StorageView",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/2.0.0/Template_Sample_Element',$data);
	}
	public function  uploadfile(){
		$data['page'] = "uploadfile";
		$data['title_page_big'] = "Sample Upload File";

		$data['body_dokumentasi'] =$this->load->view("sistem/dokumentasi/2.0.0/element/UploadFile",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/2.0.0/Template_Sample_Element',$data);
	}


	public function scanner_qr(){
		$data['page'] = "scanner_qr";
		$data['title_page_big'] = "Scanner QRCode";

		$data['body_dokumentasi'] =$this->load->view("sistem/dokumentasi/2.0.0/element/ScannerQRView",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/2.0.0/Template_Sample_Element',$data);
	}

	
	//####################################

	
	public function system_requirtment(){
		$data['page'] = "requirtment";
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['title_dokumentasi'] = "System Requirtment";

		$data['body_dokumentasi'] =$this->load->view("sistem/dokumentasi/1.0.9/System_requirtment",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	
	
	
	public function pengaturan_menu(){
		$data['page'] = "pengaturan_menu";
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['title_dokumentasi'] = "Pengaturan Menu";

		$data['body_dokumentasi'] = $this->load->view("sistem/dokumentasi/1.0.9/Pengaturan_menu",null,TRUE);
		
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	
	
	public function pengaturan_template(){
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['page'] = "pengaturan_template";
		$data['title_dokumentasi'] = "Pengaturan Template";
		$data['body_dokumentasi'] = $this->load->view("sistem/dokumentasi/1.0.9/Pengaturan_template",null,TRUE);
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	
	public function registrasi_form(){
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['page'] = "registrasi_form";
		$data['title_dokumentasi'] = "Registrasi Form";
		$data['body_dokumentasi'] = $this->load->view("sistem/dokumentasi/1.0.9/Registrasi_form",null,TRUE);
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	
	public function level_konfigurasi(){
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['page'] = "level_konfigurasi";
		$data['title_dokumentasi'] = "Level Konfigurasi";
		$data['body_dokumentasi'] = $this->load->view("sistem/dokumentasi/1.0.9/Level_konfigurasi",null,TRUE);
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	
	public function user_konfigurasi(){
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['page'] = "user_konfigurasi";
		$data['title_dokumentasi'] = "User Konfigurasi";
		$data['body_dokumentasi'] = $this->load->view("sistem/dokumentasi/1.0.9/User_konfigurasi",null,TRUE);
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	
	public function crud_generator(){
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['page'] = "crud_generator";
		$data['title_dokumentasi'] = "CRUD Generator";
		$data['body_dokumentasi'] = $this->load->view("sistem/dokumentasi/1.0.9/Crud_generator",null,TRUE);
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	
	public function error_report(){
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['page'] = "error_report";
		$data['title_dokumentasi'] = "Error Report";
		$data['body_dokumentasi'] = $this->load->view("sistem/dokumentasi/1.0.9/Error_report",null,TRUE);
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	
	public function csrf_protection(){
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['page'] = "csrf_protection";
		$data['title_dokumentasi'] = "CSRF Protection";
		$data['body_dokumentasi'] = $this->load->view("sistem/dokumentasi/1.0.9/Csrf_protection",null,TRUE);
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	
	public function front_end(){
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['page'] = "front_end";
		$data['title_dokumentasi'] = "Access Front End";
		$data['body_dokumentasi'] = $this->load->view("sistem/dokumentasi/1.0.9/Front_end",null,TRUE);
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	
	public function page_maintenance(){
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['page'] = "page_maintenance";
		$data['title_dokumentasi'] = "Page Maintenance";
		$data['body_dokumentasi'] = $this->load->view("sistem/dokumentasi/1.0.9/Page_maintenance",null,TRUE);
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	
	public function panduan_form(){
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['page'] = "panduan_form";
		$data['title_dokumentasi'] = "Panduan Membuat Form";
		$data['link_tahap_lanjut'] =  base_url()."sistem/Dokumentasi_109/panduan_form_lanjutan";
		$data['body_dokumentasi'] = $this->load->view("sistem/dokumentasi/1.0.9/Panduan_membuat_form",$data,TRUE);
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	
	public function panduan_form_lanjutan(){
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['page'] = "panduan_form";
		$data['title_dokumentasi'] = "Panduan Membuat Form";
		$data['link_tahap_lanjut'] = base_url()."sistem/Dokumentasi_109/panduan_form_lanjutan";
		$data['body_dokumentasi'] = $this->load->view("sistem/dokumentasi/1.0.9/Panduan_membuat_form_2",$data,TRUE);
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	
	public function panduan_upload_file(){
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['page'] = "panduan_upload_file";
		$data['title_dokumentasi'] = "Panduan Upload File";
		$data['body_dokumentasi'] = $this->load->view("sistem/dokumentasi/1.0.9/Panduan_upload_file",$data,TRUE);
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	
	public function bot_telegram(){
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['page'] = "bot_telegram";
		$data['title_dokumentasi'] = "Bot Telegram";
		$data['body_dokumentasi'] = $this->load->view("sistem/dokumentasi/1.0.11/Bot_telegram",$data,TRUE);
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	
	public function create_bot_telegram(){
		$data['title_page_big'] = "Petunjuk Penggunaan";
		$data['page'] = "bot_telegram";
		$data['title_dokumentasi'] = "Create Bot Telegram";
		$data['body_dokumentasi'] = $this->load->view("sistem/dokumentasi/1.0.11/Create_Bot",$data,TRUE);
		$this->template->load('sistem/dokumentasi/1.0.9/Template_dokumentasi',$data);
	}
	

}
