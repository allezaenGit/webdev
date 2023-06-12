<div class="row ">

<div class="col-md-12 parentFilter">		

<h4  class="childFilter" style=" font-weight: bold;"># Upload File</h4>
<p> </p>
<label class="label bg-gray childFilter">Upload file</label>
<label class="label bg-gray childFilter">Upload image</label>
<label class="label bg-gray childFilter">Upload Document</label>



<br>
<br>
<p class="childFilter">sample :</p>	

<div id="box-loading" class="box box-primary shadow">
	<div class="box-body">
		<div id="doc" name="doc"></div>
	</div>	
</div>
<?= _js('ybs-upload')?>
<script>
$(document).ready(function(){
		
		
        $("#doc").singleUpload({
            type    		: "audio", //image | document | video | audio | all
            pathDest  		: "my-data/doc" ,
			preview 		: true,
			showLoadingIn	: "#box-loading",
			data			: "",
		
        });
       
    })


</script>

<br>
html & javascript code :
<pre>

&lt;div id="box-loading" class="box box-primary shadow">
	&lt;div class="box-body">
		&lt;div id="doc" name="doc">&lt;/div>
	&lt;/div>	
&lt;/div>

&lt;?= _js('ybs-upload')?>

&lt;script>

	$(document).ready(function(){
		
        $("#doc").singleUpload({
            type    		: "document", //image | document | video | audio | all
            pathDest  		: "my-data/doc" ,
            //data :"",
            //imageResize:{	
            //				width:600,
            //				height:400,
            //				quality:50,
            //				ratio: true,
            //			},	
			
            //isPublic:true,
            //preview 		: false,
            //showLoadingIn	: "#box-loading",
            //externalUrl : true,
			
        });
       
    })

&lt;/script>	
</pre>	

<br>
php controller code :
<pre>
//insert/simpan terlebih dahulu nilai timestamp file upload ke datatabase
//lalu jalankan fungsi di bawah

//untuk proses tambah File
FileUpload::save(); 

//untuk proses Edit File
FileUpload::update() 


</pre>	
<br>


<p><b><u>type :</u></b> image | document | video | audio | all </p>
<p>Tipe File yang akan di upload</p>
<br>

<p><b><u>pathDest :</u></b> folder tujuan upload file</p>
<p>lokasi : upload_files/pathDest..</p>
<br>

<p><b><u>data :</u></b> nilai timestamp file yang telah upload </p>
<p>digunakan untuk keperluan <b><u>preview</u></b> file saat proses update</p>
<br>

<p><b><u>imageResize :</u></b> perintah untuk meresize file image yang di upload</p>
<p>width,height : dimension image</p>
<p>quality : kualitas gambar</p>

<br>

<p><b><u>isPublic :</u></b> default true</p>
<p>false : preview file hanya dapat di akses oleh user yang melakukan upload</p>
<p>true : semua user dapat mengakses preview file tersebut </p>

<br>

<p><b><u>preview      :</u></b> default true</p>
<p>true : menampilkan box preview Image/File</p>

<br>

<p><b><u>showLoadingIn        :</u></b> default true</p>
<p>jika anda memilih untuk tidak menampilkan <b><u>preview</u></b> , maka anda dapat menambahkan Loading Progress.sebagai tanda file sedang di proses saat pemilihan file</p>
<br>

<p><b><u>externalUrl        :</u></b> default false </p>
<p>true :Mengizinkan file di akses dari halaman depan/FrontEnd tanpa login</p>
<p>url tersebut dapat juga di gunakan pada text Editor</p>
<br>
 

</div>
</div>
      <!-- ./row -->