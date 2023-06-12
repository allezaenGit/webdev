

<div style="font-size:14px">
<b>Upload File :</b>  
  <ul class="">
	  <li><a href="#upload-single-file">  Single File menggunakan YBS REQUEST</a></li>
			<ul><li><a href="#upload-single-file"> #Latihan 1 - create form upload & edit</a></li>
			</ul>
	   
	  
  </ul>
  

<br> 
<h3 class="text-mute" id="upload-single-file"><b>Single File with YBS REQUEST</b></h3>
<div style="font-size:14px">
untuk mengupload file ,dilakukan dalam beberapa langkah :<br><br>

	<ul>
	<i class="fa fa-check"></i> Membuat element untuk memilih file yang akan di upload.<br>
	<i class="fa fa-check"></i> Menyimpan data <span class="tag tag-indigo" style="font-size:10px">TIMEPOST </span> kedalam database.<br>
	<i class="fa fa-check"></i> Menyimpan permanent file upload<br>
	<i class="fa fa-check"></i> Menampilkan data menggunakan <span class="tag tag-indigo" style="font-size:10px">TIMEPOST</span> 
	</ul>
<br><br>

<div style="font-size:12px">
<div class="callout callout-ybs-danger shadow">
<h4>PENTING :</h4>
- file yang telah di upload hanya dapat di akses
menggunakan <span class="tag tag-indigo" style="font-size:10px">TIMEPOST</span> <br>yang di peroleh 
setelah file tersebut berhasil di upload.
</div>	
</div>


LATIHAN 1. <br>
Membuat form upload & edit <br>

<img class="ybs-image-slider" data-image="upload_file" src="<?php echo base_url()?>images/dokumentasi/60.png" style="border:1px solid black ;width:300px;height:300px">
<br>
<br>
<code>1. Buat table database : </code><br>
<pre>
table name :sample_upload_single_file
field name: id (int 11 , primary key , autoincreament)
field name: image (int 11)
field name: doc (int 11)
field name: keterangan (varchar 200)
</pre>


<code>2. Buat file view : </code><br>
<code>Application/views/sample/upload_view.php</code>
<pre data-enlighter-language="jquery" data-enlighter-highlight="5">


&lt;div class="row">
&lt;div class="col-md-12 col-lg-12">

&lt;!-- Box Horizontal Form -->
&lt;div class="box box-info shadow " id="box-loading" >
&lt;div class="box-header with-border">
&lt;h3 class="box-title">Form Upload&lt;/h3>
&lt;/div>
&lt;form class="form-horizontal" id="form-a" action="&lt;?php echo site_url() ?>sample/upload/simpan" method="POST">
&lt;div class="box-body">

					&lt;!-- box input photo -->
					&lt;div class="form-group">
						&lt;label class="col-sm-2 control-label">Photo&lt;/label>
						&lt;div class="col-sm-10">
							&lt;div id="image-container" name="image">&lt;/div>
						&lt;/div>
					&lt;/div>
					&lt;!-- end box -->
					
					
					&lt;!-- box input document -->
					&lt;div class="form-group">
						&lt;label class="col-sm-2 control-label">Document&lt;/label>
						&lt;div class="col-sm-10">
							&lt;div id="document-container" name="doc">&lt;/div>
						&lt;/div>
					&lt;/div>
					&lt;!-- end box -->
					
			
					&lt;!-- box input document -->
					&lt;div class="form-group">
						&lt;label class="col-sm-2 control-label">Keterangan&lt;/label>
						&lt;div class="col-sm-10">
							&lt;input type='text' class='form-control focus-color'  id='keterangan' name='keterangan' placeholder='keterangan' value='' >
						&lt;/div>
					&lt;/div>
					&lt;!-- end box -->
			
							 
	
	&lt;!-- box tombol action-->
	&lt;div class="box-footer">
                &lt;div class=" pull-right">
					&lt;button  id='btn-save' type='button' class='btn btn-primary shadow' onclick='simpan()' >&lt;i class="fe fe-save">&lt;/i> Simpan&lt;/button>	
				&lt;/div>
    &lt;/div>
	&lt;!-- end box -->

&lt;/div>
&lt;/form>
&lt;/div>
&lt;!-- end Box Horizontal Form -->

&lt;/div>
&lt;/div>

&lt;!-- load js -->
&lt;?php echo  _js("ybs-upload") ?>


&lt;script>
    $(document).ready(function(){
        $("#image-container").singleUpload({
            type		: "image", //image | document | video | audio | all
            pathDest	: "my-data/foto" 
        });
        $("#document-container").singleUpload({
            type		: "document", //image | document | video | audio | all
            pathDest	: "my-data/Document" 
        });
    })
	
	
    function simpan(){
        $("#form-a").ybsRequest({
            onComplite :function(){
               $("#image-container").reset();
               $("#document-container").reset();
           }
        });
  }
	
&lt;/script>


</pre>

<code>3. Buat file model : </code><br>
<code>Application/models/sample/upload_model.php</code>
<pre data-enlighter-language="jquery" data-enlighter-highlight="5">
&lt?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class upload_model extends CI_Model {
	
    
	
	function __construct(){
        parent::__construct();
	}	
	
	public function get_all(){
	  return $this->db->get('sample_upload_single_file')->result_array();
	}
  
	
	public function insert($data){
		return $this->db->insert('sample_upload_single_file',$data);
	}


}
</pre>


<code>4. Buat file controller : </code><br>
<code>Application/controllers/Sample/Upload.php</code>
<pre data-enlighter-language="jquery" data-enlighter-highlight="5">
&lt?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Upload extends CI_Controller {
   
   function __construct(){
        parent::__construct();
        //meload model upload
        $this->load->model("sample/Upload_model","tupload");
   }
   


	public function index(){
	
		$data = array(
		  'title_page_big'   	 => 'Upload file',
		  'images'				 => $images,
		);
		
		//meload view 
		$this->template->load('sample/Upload_view',$data);
	}

	  
	public function simpan(){
		
  
		//menangkap data
		$val    = $this->input->post('data_ajax',TRUE);
		
		//filter data
		$val = fillable($val,Upload_model::$field);

		//insert db
		$success = $this->tupload->insert($val);
		
		//menyimpan file permanent
		FileUpload::save($success);
		
		
		$o = new Outputview();
		$o->success = "true";
		$o->message = "Berhasil";
		echo $o->result();
   
	}
  
}	
</pre>
</div><br>
  

