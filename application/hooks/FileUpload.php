<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FileUpload {
   
   
   private $CI;
   static protected $fileUpload;
    
   public function prePost(){
	    
	  $this->CI = & get_instance();
	  if($this->CI->session->userdata('idlogin')){
		  

		//detect file upload type post
		$defContainer = $this->CI->ybsArray;
		
		//menangkap data upload file
		if($defContainer==null || $defContainer=="" ){
			if(!isset($_POST['ybsUData'])){
				return;
			}
			
			self::$fileUpload  =  $this->CI->input->post("ybsUData",TRUE);

			unset($_POST['ybsUData']);
			
		}else{
			$cntUpload  =  $this->CI->input->post($defContainer,TRUE);
			if(!isset($cntUpload["ybsUData"])){
				return;
			}
			self::$fileUpload = $cntUpload["ybsUData"];

			unset($_POST[$defContainer]['ybsUData']);
		}	

		
		unset($_POST['ybsArray']);
	 }
	  
	}
	
/**
 * save
 *	 
 * Berfungsi untuk menyimpan file upload berdasarkan 
 * data yang di kirim dari client 
 * 	
 * How its Work :
 * pada saat server menerima data post, fungsi prepost di jalankan
 * untuk mengecek apakah client mengirimkan file atau tidak.
 * jika file ada, maka akan di tampung sementara dalam object fileUpload
 * yg kemudian akan di proses setelah fungsi update,save di jalankan
 *
 * @param boolean	$b 		(default) true untuk menjalankan proses update 
 */		
	static function save($b = true){
		if($b){

			if(self::$fileUpload==null) return false;
			
			foreach(self::$fileUpload as $file){
				self::save_temp($file['nfile']);
			}
		}
			
	}
	
	
	
/**
 * update
 *	 
 * Berfungsi untuk mengupdate file upload berdasarkan 
 * data yang di kirim dari client 
 * 	
 * How its Work :
 * pada saat server menerima data post, fungsi prepost di jalankan
 * untuk mengecek apakah client mengirimkan file atau tidak.
 * jika file ada, maka akan di tampung sementara dalam object fileUpload
 * yg kemudian akan di proses setelah fungsi update,save di jalankan
 *
 * @param boolean	$b 		(default) true untuk menjalankan proses update 
 */		
	static function update($b = true){
		if($b){
			
			
			if(self::$fileUpload==null) return false;
			
			foreach(self::$fileUpload as $file){
				
				if($file['nfile'] !== $file['ofile']){
					self::save_temp($file['nfile']);
					self::remove_upload($file['ofile']);
				}
				
				
			}
		}
	}
	
	
	
	
/**
 * delete
 *	 
 * Berfungsi untuk mendelete file upload berdasarkan nilai timestamp 
 * 
 * @param integer	$ts		nilai timestamp file 	
 * @param boolean	$b 		(default) true untuk menjalankan proses delete 
 */	
	// static function delete($ts,$b = true){
		// if($b){
			// self::remove_upload($ts);
		// }
	// }
	

	
/**
 * deleteByID
 *	 
 * Berfungsi untuk mendelete file berdasarkan id dari table / data 
 * 
 * How its Work :
 * mengambil nilai timestamp dari field table berdasarkan id,
 * kemudian menjalankan fungsi remove_upload untukj menghapus file
 * beserta data pada table sys_user_upload
 * 
 * @param integer	$id 
 * @param string	$table 	nama table yang di jadikan referensi
 * @param string	$field 	nama field yang berisi informasi timestamp file 
 * @param boolean	$b 		(default) true untuk menjalankan proses delete 
 */
	// static function deleteByID($id,$table,$field,$b = true){
		// if($b){
			// $CI = & get_instance();
			// $CI->db->where("id",$id);
			// $files = $CI->db->get($table)->row();
			
			// foreach($field as $val){
				// self::remove_upload($files->$val);
			// }
		// }
	// }
	
	
	
	static function save_temp($time){
			$CI = & get_instance();
			$CI->load->model('sys/Sys_service_storage_model','tstor');
			$path_temp = './temp_upload/';
			$val  = explode(" ",$time);
			
			foreach($val as $k){
				$success = $CI->tstor->move_temp($CI->_user_id,$k);
				if($success){
					$path_source 	= $path_temp . $CI->tstor->file_moved_name;
					$path_dest   	= $CI->tstor->file_moved_path . $CI->tstor->file_moved_name;
					
					if(file_exists($path_source)){
						rename($path_source, $path_dest);
					}
					
				}
			}
		
	}
	
	
	private static function remove_upload($time){
			$CI = & get_instance();
			$CI->load->model('sys/Sys_service_storage_model','tstor');
			$path_temp = './temp_upload/';
		
			
			//mendapatkan nama file upload
			$file 		= $CI->tstor->get_file_bytime($CI->_user_id,$time);

			
			//menghapus file jika ada
			$message = "";
			$success 	= self::_delete_file($file);
			
			//memastikan jika file berhasil di hapus 
			if($success	== 'true'){
				$CI->tstor->delete_file_bytime($CI->_user_id,$time);
			}
				

	}
	
	
	
	
	private static function _delete_file($file){
		$success ='true';

		if(isset($file)){
			if(file_exists($file->file_path . $file->name)){
				if(!unlink($file->file_path . $file->name)){
					$success='false';
				}
			}
					
		}

		return $success;
	}
	
   
   
  


  
}
