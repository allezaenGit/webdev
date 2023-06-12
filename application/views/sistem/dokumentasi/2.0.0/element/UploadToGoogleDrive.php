<div class="row ">

<div class="col-md-12 parentFilter">		

<h4  class="childFilter" style=" font-weight: bold;"># Upload File</h4>
<p> </p>
<label class="label bg-gray childFilter">Upload file</label>
<label class="label bg-gray childFilter">Google Drive</label>


<br>
<br>
<p>Upload ke file google drive</p>	
<br><br>
<div class="accordion" id="accordionExample">

<div class="card">
		<div class="card-header" id="step1">
			
			<button class="collapsed "  data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
			 <b><u>Step #1. Setting OAuth & Credential Google Drive</u></b>
			</button>
			
		 
		</div>
		<div id="collapse1" class="collapse" aria-labelledby="step1" data-parent="#accordionExample">
		  <div class="card-body">
				<div id="set-step1">
						<p>Masuk ke <a href="https://console.cloud.google.com/apis/dashboard">Console Google Developer</a><br>
						dan buat project baru atau gunakan project yang sudah ada.
						</p>
						<p class="text-center"><img class="ybs-image-slider " data-image="create_project" src="<?php echo base_url()?>images/dokumentasi/85.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#1. Create New Project</p>

						<br><br>
						<p>Kemudian masuk ke menu Apis & Service, dan Enable Google Drive API</p>
						<p class="text-center"><img class="ybs-image-slider" data-image="Apis & Service Dashboard" src="<?php echo base_url()?>images/dokumentasi/86.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#2. Apis & Service Dashboard</p>

						<br><br>
						<p class="text-center"><img class="ybs-image-slider" data-image="Enable API" src="<?php echo base_url()?>images/dokumentasi/87.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#3. Enables API</p><br><br>

						<p class="text-center"><img class="ybs-image-slider" data-image="Choose Google Drive API" src="<?php echo base_url()?>images/dokumentasi/88.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#4. Google Drive API</p><br><br>

						<p class="text-center"><img class="ybs-image-slider" data-image="Drive API" src="<?php echo base_url()?>images/dokumentasi/89.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#5. Google Drive API Enable</p><br><br>
						<br><br>
						<p>Setelah API Google Drive Enable, kembali ke menu Apis & Service Dashboard lihat G#2. Apis & Service Dashboard</p>
						<p>Kemuadian Buat Credential OAuth 2</p>
						<p>Pilih Menu OAuth Consent screen</p>
						<p class="text-center"><img class="ybs-image-slider" data-image="OAuth 2" src="<?php echo base_url()?>images/dokumentasi/94.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#6. OAuth Consent Screen</p><br><br>
						<p class="text-center"><img class="ybs-image-slider" data-image="OAuth 2" src="<?php echo base_url()?>images/dokumentasi/95.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#7. OAuth Consent Screen</p><br><br>


						<p class="text-center"><img class="ybs-image-slider" data-image="OAuth 2" src="<?php echo base_url()?>images/dokumentasi/96.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#8. OAuth Consent Screen Save & Continue</p><br><br>


						<p class="text-center"><img class="ybs-image-slider" data-image="OAuth 2" src="<?php echo base_url()?>images/dokumentasi/97.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#9. OAuth Consent Screen Add Scopes</p><br><br>

						<p class="text-center"><img class="ybs-image-slider" data-image="OAuth 2" src="<?php echo base_url()?>images/dokumentasi/98.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#10. OAuth Consent Screen Add Scopes</p><br><br>

						<p class="text-center"><img class="ybs-image-slider" data-image="OAuth 2" src="<?php echo base_url()?>images/dokumentasi/99.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#11. OAuth Consent Screen Save & Continue</p><br><br>


						<p class="text-center"><img class="ybs-image-slider" data-image="OAuth 2" src="<?php echo base_url()?>images/dokumentasi/100.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#12. OAuth Consent Screen Add User</p><br><br>

						<p class="text-center"><img class="ybs-image-slider" data-image="OAuth 2" src="<?php echo base_url()?>images/dokumentasi/101.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#13. OAuth Consent Screen Save & Continue</p><br><br>

						<p>Setelah Selesai kemudian masuk ke menu Credential dan Create Credential</p>
						<p class="text-center"><img class="ybs-image-slider" data-image="Credential" src="<?php echo base_url()?>images/dokumentasi/90.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#14. Credential</p><br><br>


						<p class="text-center"><img class="ybs-image-slider" data-image="Credential" src="<?php echo base_url()?>images/dokumentasi/91.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#15. Create Credential</p><br><br>

						<p class="text-center"><img class="ybs-image-slider" data-image="Credential" src="<?php echo base_url()?>images/dokumentasi/92.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#16. OAuth Client ID</p><br><br>


						<p class="text-center"><img class="ybs-image-slider" data-image="Credential" src="<?php echo base_url()?>images/dokumentasi/102.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#17. Application Type - Web application</p>
						<p class="text-sm text-center" >pastikan anda memilih tipe Web application</p><br><br>

						<p class="text-center"><img class="ybs-image-slider" data-image="Credential" src="<?php echo base_url()?>images/dokumentasi/103.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#18. Application Type - Web application</p>
						<p class="text-sm text-center" >Masukkan Uris : <br><b><u>https://Isi-Dengan-Domain-Anda/api/Public_Access/gdrive_aXmqpMdcdDaoPfsdzUiadCdBczzcBqorGdjKKluroo</u></b></p>

						<p class="text-sm text-center" >Kemuadian Create..</p><br><br>

						<p class="text-center"><img class="ybs-image-slider" data-image="Credential" src="<?php echo base_url()?>images/dokumentasi/104.png" style="border:1px solid black">
						</p>
						<p class="text-sm text-center" >G#18. Download Credential</p>
						<br><br>
					<br>
					<br>
					<br>
					<br>
				</div>

	   
	   </div>
    </div>
  </div>
<br>
 <div class="card">
    <div class="card-header" id="step2">
     
			<button data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
			<b><u>Step #2. Upload & Setting Credential Google Drive In Server</u></b>
			</button>
		
		</div>
		<div id="collapse2" class="collapse" aria-labelledby="step2" data-parent="#accordionExample">
		  <div class="card-body">
				<div id="set-step2">
					<p>Masuk ke Menu Sistem <a href="<?= site_url('sistem/UploadFile') ?>">Upload Internal File</a><br>
					<p>Upload Credential ke server dengan memilih menu Tambah,pilih FIle dan isi Keterangan yang di butuhkan</a>
					</p>
					<p class="text-center"><img class="ybs-image-slider" data-image="Credential" src="<?php echo base_url()?>images/dokumentasi/105.png" style="border:1px solid black">
					</p>
					<p class="text-sm text-center" >G#18. Upload Credential To Server</p>
					<br><br>

					<p  class="text-sm text-center">setelah berhasil ,anda akan mendapatkan path upload pada halaman list upload file</a>
					</p>
					<p class="text-center"><img class="ybs-image-slider" data-image="Credential" src="<?php echo base_url()?>images/dokumentasi/106.png" style="border:1px solid black">
					</p>
					<p class="text-sm text-center" >G#19. Upload Credential To Server</p>
					<p class="text-sm text-center" >Copy Path Credential yang Muncul dan Masuk ke Menu Sistem <a href="<?= site_url('sistem/GDriveCredential')?>">Google Drive Credential</a>, kemudian pilih tambah data</p>
					<br><br>

					<p class="text-center"><img class="ybs-image-slider" data-image="Credential" src="<?php echo base_url()?>images/dokumentasi/107.png" style="border:1px solid black">
					</p>
					<p class="text-sm text-center" >G#20. Setting Credential To Server</p>
					<p class="text-sm text-center" >Pastikan Anda memasukkan google Account yang terkait dengan Credential tadi</p>
					
					<br>
					<br>
					<br>
					<br>
				</div>

	   
	   </div>
    </div>
  </div>
<br>
 <div class="card">
    <div class="card-header" id="step3">
      
			<button data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
			<b><u>Step #3. Use Library Google Drive in File Controller</u></b>
			</button>
		
		</div>
		<div id="collapse3" class="collapse" aria-labelledby="step3" data-parent="#accordionExample">
		  <div class="card-body">
				<div id="set-step3">
					<p>langkah terakhir untuk menguploa file ke Google Drive kita menggunakan Library Google Drive dari YBS Sistem</a>.</p>
<pre>
$drive = new GoogleDrive();

/*
$pathFile = path file yang akan di upload,include dengan file name nya,
$pathGdrive = Folder tujuan/upload di Google Drive (jika folder tidak di temukan maka akan di buat secara otomatis)
$fileNameGDrive = nama File yang akan di gunakan pada Google Drive
$fileGdrive = path di Google Drive include file name ex: project/sample/test.png 
*/


//proses upload return boolean
$sukses = $drive->upload($pathFile,$pathGdrive,$fileNameGDrive);


//proses shareFile 
$sukses = $drive->shareFile($fileGdrive,$userEmail,$messageEmail);

//proses Remove shareFile from user
$sukses = $drive->removeShare($fileGdrive,$userEmail);

//delete file
$sukses = $drive->deleteFile($fileGdrive);

//get ListFile
$files = $drive->getFiles($pathGdrive);	


//get Permission File
$permission = $drive->getPermissionFile($fileGdrive);
</pre>					
					
					
					<p>berikut contoh penerapan nya :<br><br>terlebih dahulu buat controller dan view yang akan di gunakan. <br>anda dapat menggunakan YBS CLI Tools untuk mempercepat pembuatan Controller View</p>

					<p>untuk vidio tutor nya anda dapat melihat Link vidio ini <a  href='https://fb.watch/6De391jwbC/'>YBS CLI Tools</a></p>
					<p>Selanjutnya pada Controller anda dapat meload Library GoogleDrive </p>

controller : sample/Upload_gdrive					
<pre>
&lt;?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
  
use ybs\general\Load;
use ybs\general\Validation;
use ybs\general\Storage;
use ybs\http\Request;
use ybs\http\Response;

class Upload_gdrive extends CI_Controller {
        
    function __construct(){
      parent::__construct();
	  
      $this->load->library("GoogleDrive",null,"drive");
    
	}
         
    function index(){
  
      $breadcrumb = [
        'Upload_gdrive'   =>   url(),
       ];
  
      $data = [
        'breadcrumb'      => $breadcrumb,
        'title_page_big'    => 'Sampe Google Drive',
      ];
      
      
      
      response()->view('sample/Upload_gdriveView',$data);
      
    }
    
    function uploadfile(){
     
      $file = Storage::getFile(request('doc'),false,true);
      
     
      $sukses  = $this->drive->upload($file->path_temp,"project1/testUpload","sampleFile.pdf");
      
      
      $o = new Outputview();
      if($sukses){
          $o->success = true;
          $o->message = "file berhasil di upload";
          $o->style=true;
          response()->json($o);
      }else{
          $o->success = false;
          $o->message = "file gagal di upload";
          $o->style=true;
          response()->json($o);
      }
    }
    
    
    function shareFile(){
     
      $sukses = $this->drive->shareFile("project1/testUpload/sampleFile.pdf","milikkita04@gmail.com","ini pesan Body email !");
      
      $o = new Outputview();
      if($sukses){
          $o->success = true;
          $o->message = "file berhasil di share";
          $o->style=true;
          response()->json($o);
      }else{
          $o->success = false;
          $o->message = "file gagal di share";
          $o->style=true;
          response()->json($o);
      }
    }
    
    function removeShare(){
      
      
      $sukses = $this->drive->removeShare("project1/testUpload/sampleFile.pdf","milikkita04@gmail.com");
      
      $o = new Outputview();
      if($sukses){
          $o->success = true;
          $o->message = "file berhasil di proses";
          $o->style=true;
          response()->json($o);
      }else{
          $o->success = false;
          $o->message = "file gagal di proses";
          $o->style=true;
          response()->json($o);
      }
    }
    
    function deleteFile(){
      
      
      $sukses = $this->drive->deleteFile("project1/testUpload/sampleFile.pdf");
      
      $o = new Outputview();
      if($sukses){
          $o->success = true;
          $o->message = "file berhasil di hapus";
          $o->style=true;
          response()->json($o);
      }else{
          $o->success = false;
          $o->message = "file gagal di hapus";
          $o->style=true;
          response()->json($o);
      }
      
    }
    
    
    function getFiles(){
      
    
      $sukses = $this->drive->getFiles("project1/testUpload/");  
      
      $o = new Outputview();
      if($sukses){
          $o->success = true;
          $o->message = $sukses;
          $o->style=true;
          response()->json($o);
      }else{
          $o->success = false;
          $o->message = "file gagal mendapatkan file";
          $o->style=true;
          response()->json($o);
      }
      
    }
    
    function getPermissionFile(){
      
      
      $sukses = $this->drive->getPermissionFile("project1/testUpload/sampleFile.pdf");
      
      $o = new Outputview();
      if($sukses){
          $o->success = true;
          $o->message = $sukses;
          $o->style=true;
          response()->json($o);
      }else{
          $o->success = false;
          $o->message = "file gagal mendapatkan permission file";
          $o->style=true;
          response()->json($o);
      }
    }
    
    
    
}


		
</pre>


view : sample/Upload_gdriveView
<pre>
&lt;!-- Horizontal Form -->
&lt;div class="box box-info shadow"  id="box-loading">
&lt;div class="box-header with-border">
&lt;h3 class="box-title">Horizontal Form&lt;/h3>
&lt;/div>
&lt;!-- /.box-header -->
&lt;!-- form start -->
&lt;form class="form-horizontal" id="form-a" method="POST" action="">
&lt;!-- body -->
&lt;div class="box-body">
  &lt;!-- UploadFile -->
  &lt;div class="form-group">
  &lt;label for="inputEmail3" class="col-sm-2 control-label">Upload File&lt;/label>
  &lt;div class="col-sm-10">
   &lt;div id="box-loading" class="box box-primary shadow">
   &lt;div class="box-body">
    &lt;div id="doc" name="doc">&lt;/div>
   &lt;/div>  
    &lt;/div>
  &lt;/div>
  &lt;/div>
   
             
&lt;/div>
&lt;!-- /.body -->
&lt;!-- footer -->
&lt;div class="box-footer">
  &lt;div class=" pull-right">
  &lt;button id="btn-upload" type="button" class="btn btn-primary shadow">&lt;i class="fe fe-check">&lt;/i>Upload&lt;/button>  
  &lt;button id="btn-share" type="button" class="btn btn-primary shadow">&lt;i class="fe fe-check">&lt;/i>Share&lt;/button>
  &lt;button id="btn-remove-share" type="button" class="btn btn-primary shadow">&lt;i class="fe fe-check">&lt;/i>Remove Share&lt;/button> 
  &lt;button id="btn-delete-file" type="button" class="btn btn-primary shadow">&lt;i class="fe fe-check">&lt;/i>Delete File&lt;/button> 
  
  &lt;/div>
&lt;/div>
&lt;!-- footer -->
&lt;/form>
&lt;/div>
&lt;?= _js('ybs-upload')?>
&lt;script>
  $(document).ready(function(){
    
        $("#doc").singleUpload({
            type        : "document", //image | document | video | audio | all
            pathDest      : "my-data/doc" ,
           
        });
    
    
    $("#btn-upload").click(function(){
		 proses("&lt;?= url('uploadFile')?>");
    });
	
	$("#btn-share").click(function(){
		 proses("&lt;?= url('shareFile')?>");
    });
	
	$("#btn-remove-share").click(function(){
		 proses("&lt;?= url('removeShare')?>");
    });
	
	$("#btn-delete-file").click(function(){
		 proses("&lt;?= url('deleteFile')?>");
    });
	
	
	function proses(url){
		 start_loading_in("#box-loading");
		 
		  $("#form-a").attr("action",url);
		  
		  $("#form-a").ybsRequest({
			onComplite : function(){
			  stop_loading_in("#box-loading");
			}
		  });
	}
       
    })
&lt;/script>  

</pre>
	
					
					<br>
					<br>
					<br>
					<br>
				</div>

	   
	   </div>
    </div>
  </div>
  
  
</div>





</div>
</div>
      <!-- ./row -->