<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use ybs\general\Separator;

/**
*	Class ini di akses melalui Client Ajax.
*	
*
*/
class Service_Storage extends CI_Controller {
    private $path_temp;
	public function __construct() {
        parent::__construct();
		$this->load->model('sys/Sys_service_storage_model','tmodel');
		$this->path_temp 		= './temp_upload/';
		$this->load->helper('file');
    }


	public function index(){
		
		
	}

	
	public function get_access_file($token){
		if($token==$this->_token){
			$data	 = $this->input->get('data_ajax',true);
			$val  	 = json_decode($data,true);
			$folder = "";
			$rekusif = false;
			$time="";
			
			if(strpos($val['time'],",")){
				$time  = explode(",",$val['time']);
			}else{
				$time  = explode(" ",$val['time']);
			}
			
			
			
			if(@$val['f']){ //folder
				$f  = explode(",",$val['f']);
				$folder = trim($f[0]);
				$rekusif = @$f[1];	
			}
			
			
			
			if($time=='' || $time ==null){
				$o = new Outputview();
				$o->success = 'false';
				$o->message = 'Opps tidak ada data..';
				echo $o->result();
				return;
			}
			
			$isPublic= @$val['p'];
			
			$private ;
			if(!$isPublic){
				//define null
				$private = false;
			}else{
				if($isPublic !=="true" ){
					$private = true;
				}else{
					$private = false;
				}
			}
			
			
			//memastikan pengecekan berdasarkan lokasi folder atau nilai timestamp
			$row=array();
			
			if($folder){
				$row = $this->tmodel->get_all_file_byfolder($this->_user_id,$folder,$rekusif,$private);
			}else{
				$row  = $this->tmodel->get_all_file_bytime($this->_user_id,$time,$private);
			}
			
			
			
			$data = array();	
			
			
			
			
			foreach($row as $val){
				$file  		= $val->file_path . $val->name;
				$mime  		= get_mime_by_extension($file);
				
				$url_link 	= site_url().'Service_Storage/get_file/'.$this->_token . '_' . $val->time;
				if(!$private){
					$url_link 	= site_url().'Service_Storage/get_file_pub/'.$this->_token . '_' . $val->time;
				}
				
				$types		= explode('/',$mime);
				$type		= "";
				$ext 		= pathinfo($file, PATHINFO_EXTENSION);
				$orig_name	= $val->orig_name;
				switch($types[0]){
					case  'image' :
						$type = "image";
						break;
					case  'video' :
						$type = "vidio";
						break;
					case  'audio' :
						$type = "audio";
						break;
					default :
						$type = "application";
				}
				
				
				$external_url ="";
				if($val->external_access){
					$external_url = site_url() . "api/Public_Access/getFile/". $val->time . Separator::ACCESS_FILE_UPLOAD . time() . $val->ext;
				}
				
				
				$dt = array(
					'type'		=> $type,	
					'link'		=> $url_link,
					'orig_name'	=> $orig_name,
					'time'		=> $val->time,
					'path'		=> str_replace('./upload_files/','',$val->file_path),
					'ext'		=> $ext,
					'size'		=> $val->size,
					'date'		=> date("Y-m-d H:i:s",$val->time),
					'external_access'	=> $val->external_access,
					'external_url'		=> $external_url,
				);
				
				$data[] = $dt;
			}
			$o = new Outputview();
			$o->success = 'true';
			$o->message = json_encode($data);
			echo $o->result();
		}else{
			//	jika mencoba request tanpa otorisasi.
			//  redirect('https://www.polri.go.id/');
		}
	}
	
	
	public function get_access_file_temp($token){
		if($token==$this->_token){
			$data = $this->input->get('data_ajax',true);
			$val  = json_decode($data,true);
			$val  = explode(" ",$val['time']);
			
			if($val=='' || $val ==null){
				$o = new Outputview();
				$o->success = 'false';
				$o->message = 'Opps tidak ada data..';
				echo $o->result();
				return;
			}
			$row  = $this->tmodel->get_all_file_temp_bytime($this->_user_id,$val);
			
			$data = array();	
			
			
			foreach($row as $val){
				$file  		= $val->file_path . $val->name;
				$mime  		= get_mime_by_extension($file);
				$url_link 	= site_url().'Service_Storage/get_files_temp/'.$this->_token . '_' . $val->time;
				$types		= explode('/',$mime);
				$type		= "";
				$ext 		= pathinfo($file, PATHINFO_EXTENSION);
				$orig_name	= $val->orig_name;
				switch($types[0]){
					case  'image' :
						$type = "image";
						break;
					case  'video' :
						$type = "vidio";
						break;
					case  'audio' :
						$type = "audio";
						break;
					default :
						$type = "application";
				}
				
				$dt = array(
					'type'		=> $type,	
					'link'		=> $url_link,
					'orig_name'	=> $orig_name,
					'time'		=> $val->time,
					'ext'		=> $ext,
					'size'		=> $val->size,
					'path'		=> str_replace('./upload_files/','',$val->file_path),
					'date'		=> date("Y-m-d H:i:s",$val->time),
				);
				
				$data[] = $dt;
			}
			$o = new Outputview();
			$o->success = 'true';
			$o->message = json_encode($data);
			echo $o->result();
		}else{
			//	jika mencoba request tanpa otorisasi.
			//  redirect('https://www.polri.go.id/');
		}
	}
	
	
	
	
	
	public function get_file($token){
		$t = explode("_",$token);
		if(count($t)!==2){
			return;
		}
		
		if($t[0]==$this->_token){
			$time 	= $t[1];
			$row 	= $this->tmodel->get_file_bytime($this->_user_id,$time);
			if($row){
				$name	= $row->file_path . $row->name;
				// Quick check to verify that the file exists
				if( !file_exists($name) ) die("File not found");
					$this->load->helper('download');
					$f= file_get_contents($name);
					force_download($row->orig_name,$f);
			}
			
		}
		
	}
	
	public function get_file_pub($token){
		$t = explode("_",$token);
		if(count($t)!==2){
			return;
		}
		
		if($t[0]==$this->_token){
			$time 	= $t[1];
			$row 	= $this->tmodel->get_file_bytime($this->_user_id,$time,false);
			if($row){
				$name	= $row->file_path . $row->name;
				// Quick check to verify that the file exists
				if( !file_exists($name) ) die("File not found");
					$this->load->helper('download');
					$f= file_get_contents($name);
					force_download($row->orig_name,$f);
			}
			
		}
		
	}
	
	
	public function get_files_temp($token){
		$t = explode("_",$token);
		if(count($t)!==2){
			return;
		}
		
		if($t[0]==$this->_token){
			$time 	= $t[1];
			$row 	= $this->tmodel->get_file_temp_bytime($this->_user_id,$time);
			if($row){
				$name	= "./temp_upload/" . $row->name;
				// Quick check to verify that the file exists
				
				if( !file_exists($name) ) die("File not found".var_dump($row));
					$this->load->helper('download');
					$f= file_get_contents($name);
					force_download($row->orig_name,$f,TRUE);
			}
			
		}
		
	}
	
	public function get_general_file($token){
		$t = explode("_",$token);
		if(count($t)!==2){
			return;
		}
		
		if($t[0]==$this->_token){
			$time 	= $t[1];
			$row 	= $this->tmodel->get_file_bytime('',$time,FALSE);
			if($row){
				$name	= $row->file_path . $row->name;
				// Quick check to verify that the file exists
				if( !file_exists($name) ) die("File not found");
					$this->load->helper('download');
					$f= file_get_contents($name);
					force_download($row->orig_name,$f);
			}
		}
		
	}
	
	public function get_file_temp($data){
		$ex = explode($this->_separator_a,$data);
		if(count($ex)!==2){
			return;
		}
		if($ex[0]==$this->_token){
			
			$name= "./temp_upload/".$ex[1] ;
			if( !file_exists($name) ) die("File not found");
					$this->load->helper('download');
					$f= file_get_contents($name);
					force_download($ex[1],$f);
		}else{
			redirect("Auth");
		}
	}
	
	public function display_image($token){
		$t = explode("_",$token);
		if(count($t)!==2){
			return;
		}
		
		if($t[0]==$this->_token){
			$time 	= $t[1];
			$row 	= $this->tmodel->get_file_bytime($this->_user_id,$time);
			
			if($row){
				$name	= $row->file_path . $row->name;
				// Quick check to verify that the file exists
				if( !file_exists($name) ) die("File not found");
					$config['image_library'] = 'gd2';
					$config['source_image'] =  $name;

					$this->load->library('image_lib', $config);
					
					$a =  $this->image_lib->image_create_gd($name);
					$this->image_lib->image_display_gd($a);
			}
			
		}
	}
	
	
	/* set_external_url
	* Fungsi ini di pakai untuk mengeset Enable/Disable 
	* external url dari File yang telah di Upload,
	* fungsi ini di panggal oleh enableExternalUrl pada ybs.js
	*
	*/
	public function set_external_url($token){
		if($token==$this->_token){
			$time = request('time');
			$external_access = ['external_access'=>request('external_access')];
			
			
			$this->tmodel->setEnableExternalURL($external_access,$time);
			
			$o = new Outputview();
			$o->success = true;
			$o->style=true;
			$o->message = "Berhasil di Update";
			
			response()->json($o->result());
			
		}else{
			redirect(site_url());
		}
	}

	
	
}