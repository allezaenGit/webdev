<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
class Dokumentasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function index(){
		
		
		
		$data = array();
		$data['title_page_big'] 	= "General Menu";
		$data['link_sample_icon']	= site_url()."sistem/Dokumentasi/sample_icon";
		$data['link_sample_sticker']	= site_url()."sistem/Dokumentasi/sample_sticker_telegram";
		$data['link_petunjuk_penggunaan']	= site_url()."sistem/Dokumentasi_109/general";
		$data['link_sample_element']	= site_url()."sistem/Dokumentasi_Element";
		$this->template->load('sistem/dokumentasi/General_menu_dokumentasi',$data);
	}
	


	public function sample_icon(){
		$breadcrumb = array();
		$breadcrumb['sistem'] 		= site_url()."sistem/Pengaturan";
		$breadcrumb['Sample Icon'] 	= "";
		
		$data = array();
		$data['breadcrumb']			= $breadcrumb;
		$data['title_page_big'] 	= "Sample Icon";		
		$this->template->load('sistem/dokumentasi/Sample_icon',$data);
	}
	public function sample_sticker_telegram(){
		
		
		$this->db->where('name','{{sticker:TeddyBear}}');
		$TeddyBear = $this->db->get('sys_sticker')->result();
		
		$this->db->where('name','{{sticker:SweetyStrawberry}}');
		$SweetyStrawberry = $this->db->get('sys_sticker')->result();
		
		$this->db->where('name','{{sticker:SnappyCrab}}');
		$SnappyCrab = $this->db->get('sys_sticker')->result();
		
		$this->db->where('name','{{sticker:Snail}}');
		$Snail = $this->db->get('sys_sticker')->result();
		
		$this->db->where('name','{{sticker:SeaKingdom}}');
		$SeaKingdom = $this->db->get('sys_sticker')->result();
		
		$this->db->where('name','{{sticker:HotCherry}}');
		$HotCherry = $this->db->get('sys_sticker')->result();
		
		$this->db->where('name','{{sticker:BreadToast}}');
		$BreadToast = $this->db->get('sys_sticker')->result();
		
		$this->db->where('name','{{sticker:Blobfish}}');
		$Blobfish = $this->db->get('sys_sticker')->result();
		
		$this->db->where('name','{{sticker:AnimatedEmojies}}');
		$AnimatedEmojies = $this->db->get('sys_sticker')->result();
		
		$breadcrumb = array();
		$breadcrumb['sistem'] 		= site_url()."sistem/Pengaturan";
		$breadcrumb['Sample Sticker Telegram'] 	= "";
		
		$data = array();
		$data['breadcrumb']			= $breadcrumb;
		$data['title_page_big'] 	= "Sample Stricker Telegram";	
		
		$data['TeddyBear']			= $TeddyBear;
		$data['SweetyStrawberry']	= $SweetyStrawberry;
		$data['SnappyCrab']			= $SnappyCrab;
		$data['Snail']				= $Snail;
		$data['SeaKingdom']			= $SeaKingdom;
		$data['HotCherry']			= $HotCherry;
		$data['BreadToast']			= $BreadToast;
		$data['Blobfish']			= $Blobfish;
		$data['AnimatedEmojies']	= $AnimatedEmojies;	
		$this->template->load('sistem/dokumentasi/Sample_sticker_telegram',$data);
	}
	

	

}
