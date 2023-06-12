<?php
namespace ybs\general;


class Storage{
	
	
	
/**
 * getFiles
 *	 
 * Berfungsi untuk mendapatkan informasi akses file
 * yang berada di dalam folder Upload / temp upload
 * 	
 * How its Work :
 * nilai TimeStamp yang anda masukkan akan di cocokan pada 
 * table sys_user_upload dan akan mengembalikan data array object
 * berisi type,link,orig_name,time,path,size
 * ex. 
 *	[
 *		type 		=> "image",
 *		link 		=> "http://....",
 *		orig_name 	=> "example.jpg",
 *		time		=> 12345678901,
 *		path		=> "http://....",
 *		size		=> "120 KB",
 *		external_access => true/false,
 *		external_url=>  "http://....",
 *	] 
 *		
 *			
 * 
 * @param mixed		$times   integer or array timestamp file 
 * @param boolean	$b 		(default) false.
 * 							 true  : akses terbatas hanya file milik user yg dapat di berikan. 
 *							 false : dapat mengakses semua file tanpa terkecuali  
 * @return object		
 */		
	static function getFiles($times,$b=false,$temp=FALSE){
		$ci = & get_instance();
		$stor = $ci->YbsServiceStorage;
		$data = $stor->get_access_file($times,$b,$temp);
		$str = json_encode($data);
		$obj = json_decode($str,false);
		// if(count($data)==1)
			// return $obj[0];
		
		return $obj;
			
	} 
	
	static function getFile($times,$b=false,$temp=FALSE){
		
		return self::getFiles($times,$b,$temp)[0];
			
	} 
	
/**
 * delete
 *	 
 * Berfungsi untuk menghapus File 
 * yang berada di dalam folder Upload dan menghapus data file
 * pada table sys_user_upload
 * 	
 * How its Work :
 * nilai TimeStamp yang anda masukkan akan di cocokan pada 
 * table sys_user_upload , kemudian menggunakan data nya untuk
 * menghapus file asli..setelah di hapus, barulah kemudian
 * data pada table sys_user_upload di hapus.
 *
 * @param mixed		$times   integer or string timestamp file 
 * @param boolean	$b 		(default) false.
 * 							 true  : akses terbatas hanya file milik user yg dapat di berikan. 
 *							 false : dapat mengakses semua file tanpa terkecuali  
 * @return boolean		
 */	
	static function delete($times,$b=false,$relation=null){
		$ci = & get_instance();
		$stor = $ci->YbsServiceStorage;
		
		if($relation){
			$table 	= @$relation[0];
			$action = @$relation[1];
			$field  = @$relation[2];
			
			$ci->db->where($field ,$times);
			
			if(strtolower($action)=='delete'){
				$ci->db->delete($table);
			}else{
				$ci->db->update($table,[$field=>null]);
			}
			
		}
		
		return $stor->remove_file($times,$b);
	}
	
	
	

/**
 * deleteByID
 *	 
 * Berfungsi untuk menghapus File 
 * yang berada di dalam folder Upload dan menghapus data file
 * pada table sys_user_upload ,berdasarkan nilai ID
 * 	
 * How its Work :
 * nilai ID yang di masukkan akan di cocokan pada table yang anda tunjuk, 
 * kemudian akan menarik data timestamp pada field yg anda tentukan.
 * nilai timestamp kemudian di cocok kan kembali pada table sys_user_upload
 * dan kemudian menggunakan data nya untuk menghapus file asli..
 * setelah di hapus, barulah kemudian data pada table sys_user_upload di hapus.
 *
 * @param integer	$id   	id table
 * @param string	$table	table name
 * @param array		$field	field table yang menampung nilai timestamp
 * @param boolean	$b 		(default) false.
 * 							 true  : akses terbatas hanya file milik user yg dapat di berikan. 
 *							 false : dapat mengakses semua file tanpa terkecuali  
 */		
	static function deleteByID($id,$table,$field,$b = false){

		$ci = & get_instance();
		$ci->db->where("id",$id);
		$files = $ci->db->get($table)->row();
		
		$stor = $ci->YbsServiceStorage;		
		foreach($field as $val){
			$stor->remove_file($files->$val,$b);
		}
		
	}

	
}

