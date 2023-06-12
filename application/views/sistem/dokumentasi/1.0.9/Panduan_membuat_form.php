

<div style="font-size:14px">
<b>Tingkat Dasar :</b>  
  <ul class="">
	  <li><a href="#membuat-form">Membuat Form</a></li>
			<ul class="">
				<li><a href="#desain-view">  Create File View</a></li>
				<li><a href="#create-controller">  Create File Controller</a></li>
				<li><a href="#default-content-user-login">  Data User Login</a></li>
			</ul>
	  <li><a href="#request-response">Request & Response</a></li>			
	  <li><a href="<?php echo base_url()?>sistem/Dokumentasi_109/registrasi_form">  Registrasi URL Form</a></li>
	  <li><a href="<?php echo base_url()?>sistem/Dokumentasi_109/pengaturan_menu">  Buat Menu Baru / Update Menu.(Optional)</a></li>
	  <li><a href="<?php echo base_url()?>sistem/Dokumentasi_109/level_konfigurasi">  Konfigurasi Level Akses</a></li>
  </ul>

  
<br>

<br> 
  
<h2 id="membuat-form"><u>TINGKAT DASAR</u></h2>
<h4 id="membuat-form">TAHAP 1:  MEMBUAT FORM.</h4><br>
<h4 id='desain-view'>A. Desain View</h4>

<ul class="">
	  <li><a href="javascrip:void(0)">  nama folder : </a><span class="tag tag-indigo" style="font-size:10px">sample</span></li>
	  <li><a href="javascrip:void(0)">  nama file: </a><span class="tag tag-indigo" style="font-size:10px">View_1.php</span></li>
</ul>
path :   <br>
<code>Application/views/sample/View_1.php</code>

<b>
<pre data-enlighter-language="php" data-enlighter-highlight="5">
&lth1>FILE VIEW&lt/h1>
&ltp>Halo.. pesan ini berasal dari file View_1.php &lt/p>
&lt?= $pesan ;?>
</pre> 
</b>

<h4 id="create-controller">B. Create Controller</h4>
 <ul class="">
	  <li><a href="javascrip:void(0)">  nama folder : </a>sample</li>
	  <li><a href="javascrip:void(0)">  nama file: </a>Sample_1.php</li>
</ul>
path : <br>
<code>Application/Controllers/sample/Sample_1.php</code>


<pre data-enlighter-language="php" data-enlighter-highlight="5">

&lt?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use ybs\http\Request;
use ybs\http\Response;


class Sample_1 extends CI_Controller {
		
	public function __construct() {
		parent:: __construct();
	}
	
	public function index() {
		
		$breadcrumb = [
			'Sample'         =>   url(),
			'Sample 1'       =>  '',
		];
		
		$data = [
			'breadcrumb'            => $breadcrumb,
			'title_page_big'        => 'Sample 1',
			'pesan'                 => 'ini pesan dari controller';
			
		];
		
		response()->view('sample/View_1',$data);
		
	}

}
</pre>


<br>
penjelasan singkat :
<br><br>
<b>NameSpace</b>
<pre style="margin-bottom:0px !important">
use ybs\http\Request;
use ybs\http\Response;
</pre>
  Di atas adalah Class yang akan digunakan untuk Menangkap Request dan Mengirim Response

<br>
<br>
<br>
<br>
<b>Index Function</b>
<pre>
public function index()
</pre>
Function yang akan di jalankan ketika mengakases url <br> <code><?= site_url('sample/Sample_1')?></code>


<br>
<br>
<br>
<br>

<b>BreadCrumb</b>
<pre>
$breadcrumb = [
      'Sample'         =>   url(),
      'Sample 1'       =>  '',
];
</pre>
Membuat breadcrumb, pada sudut kanan atas form..<br>
dengan tampilan seperti berikut :
<pre>
Home > Sample > Sample 1
</pre>
<a>url( )</a> merupakan fungsi yang akan menghasilkan url dari controller yang dipanggil
<br><br>
contoh : <br>
<a>url( )</a>  menghasilkan  <u><code>"<?= site_url('sample/Sample_1')?>"</code></u><br> 
<a>url('create')</a>  menghasilkan  <u><code>"<?= site_url('sample/Sample_1/create')?>"</code></u><br> 
<a>url('update')</a>  menghasilkan  <u><code>"<?= site_url('sample/Sample_1/update')?>"</code></u><br>
<br>
<br>
<br>
<br>
<b>Data Form</b>
<pre>
$data = [
      'breadcrumb'            => $breadcrumb,
      'title_page_big'        => 'Sample 1',
      'pesan'                 => 'ini pesan dari controller';      
];
</pre>
Merupakan data yang akan di kirim ke form/view


<br>
<br>
<br>
<br>
<b>Response / Load View</b>
<pre>
response()->view('sample/sampleView_1',$data);
</pre>
<a>response()->view(...)</a> adalah fungsi yang di gunakan untuk meload view dan mengirimnya sebagai response 




<br>
<br>
<br>
<br>


YBS Sistem di lengkapi dengan <br>
<span id="default-content-user-login"><b>Data Standar User Login :</b></span>
<span>anda dapat mengambil data user login tanpa perlu melakukan query lagi.</span>  

	<ul>
	<li>$this->_user_id;</li>
	<li>$this->_user_name;</li>
	<li>$this->_user_picture;</li>
	<li>$this->_user_level_id;</li>
	<li>$this->_user_level_name;</li>
	<li>$this->_user_form_id;</li>
	<li>$this->_user_form_code;</li>
	<li>$this->_user_form_name;</li>
	<li>$this->_user_form_shortcut;</li>
	<li>$this->_is_dashboard;</li>
	<li>$this->_token;</li>
	</ul>



	
	
	
	
<br>
<br>
<h4 id="request-response"><u>PHP : Request & Response</u></h4><br>
<b>Class Request / Funtion request( )</b>	<br>
untuk menangkap data yang dikirim dari client kita dapat menggunakan class Request atau pun fungsi request()<br>	
<pre>
/**
   Request memiliki 4 fungsi yaitu : get,post,put,delete ,all
   dan setiap fungsi memiliki 3 param.. yaitu : indexName(mix),xss_clean(boolen),obj(boolean)
   Request::get($index=null,$xss_clean=true,$obj=true);
*/   
   
//mendapatkan request tipe get
Request::get('elementName');

		 
//mendapatkan request tipe post
Request::post('elementName');
         

//mendapatkan request tipe put
Request::put('elementName');
         
 
//mendapatkan request tipe delete
Request::delete('elementName');


//mendapatkan request all dengan mengabaikan tipe/method request
Request::all();   //return array

//code di atas dapat juga dilakukan dengan memanggil fungsi
request();  //return array


</pre>	
	
<br>
<br>
<br>
<br>

<b>Class Response / Funtion response( )</b>	<br>
untuk mengirim Data/Melakuan Response kita dapat menggunakan class Response atau pun fungsi response()<br>		
<pre>
/**
   Response memiliki 3 fungsi yaitu : view,json,dataTables
   - response()->view("your/path/view",array());
   - response()->json($data,$status=200);
   - response()->dataTables($data,$serverSide=TRUE);
*/   
   
//Respon untuk menampilkan halaman view
Response::view("your/path/view",array());
     atau
response()->view("your/path/view",array());


//Response untuk menampilkan data json
Response::json($data,$status);
     atau
response()->json($data,$status);


//Response untuk menampilkan dataTables
Response::dataTables($data);
     atau
response()->dataTables($data);


//Response untuk mengalihkan halaman
//$type : 'success' or 'warning' or 'danger'
Response::goto($url,$message,$type,$data); 
     atau
response()->goto($url,$message,$type,$data);

</pre>	
  
</div><br>



