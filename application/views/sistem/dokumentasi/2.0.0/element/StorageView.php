<div class="row ">

<div class="col-md-12 parentFilter">		

<h4  class="childFilter" style=" font-weight: bold;"># Storage View</h4>
<p>Mendisplay semua file berdasarkan lokasi penyimpanan </p>
<label class="label bg-gray childFilter">upload</label>
<label class="label bg-gray childFilter">download</label>
<label class="label bg-gray childFilter">storage</label>
<label class="label bg-gray childFilter">display</label>
<label class="label bg-gray childFilter">file</label>


<br>
<br>
<p class="childFilter">sample :</p>	

<div class="row">
<div class="col-lg-12">
	<div id="storage">
	</div>
</div>
</div>

<script>
$(document).ready(function(){
		$('#storage').storageView({
              location: ['my-upload/',true],
			  showTitle : ['name','date','size','path'],
			  showBtn : ['download','remove','copyURL'],
			  itemSM: 12,
			  itemMD:4,
			  itemLG:4,
			  
			  relation:{
				table:'sample_upload',
				field:'image,doc',
				actionRow:'update',
			  },
		
		});
});

</script>

<br>

<pre>

&lt;div class="row">
&lt;div class="col-lg-12">
	&lt;div id="storage">&lt;/div>
&lt;/div>
&lt;/div>

&lt;script>
$(document).ready(function(){
		$('#storage').storageView({
				location: ['my-upload/',true],
				showTitle : ['name','date','size','path'],
				showBtn : ['download','remove','copyURL'],
				itemSM: 1,
				itemMD:4,
				itemLG:4,
				
				relation:{
					table:'sample_upload',
					field:'image,doc',
					actionRow:'update',
				},

		});
});

&lt;/script>
</pre>	

<p><b><u>data :</u></b> "nilai timestamp"</p>
<p>untuk menampilkan hanya 1 atau beberapa file saja, 
<br> ex. data : "1245678901 39876544522 23993383778"<br>
<u class="text-danger">note : nonaktifkan location jika anda menggunakan fungsi ini</u></p>

<br>
<p><b><u>location :</u></b> [lokasi file,boolean rekusif]</p>
<p>rekusif = true  , untuk menampilkan semua file termasuk yang berada di dalam sub folder</p>
<p>rekusif = false  , tidak menampilkan file yang berada di dalam sub folder</p>
<br>
<p><b><u>showTitle :</u></b> ['name','date','size','path']</p>
<p>name : menampilkan nama file</p>
<p>date: menampilkan tanggal upload</p>
<p>size: menampilkan ukuran file (Kb) </p>
<p>path: menampilkan lokasi file</p>

<br>
<p><b><u>showBtn :</u></b> ['download','remove','copyURL']</p>
<p>download : menampilkan Button Download</p>
<p>remove: menampilkan Button Remove</p>
<p>copyURL: menampilkan Button Copy URL untuk Akses External/front End </p>


<br>
<p><b><u>itemSM , itemMD , itemLG :</u></b> int (0-12)</p>
<p>Jumlah file yang akan di tampilkan dalam 1 baris, SM, MD , LG mengikuti ukuran layar</p>

<br>
<p><b><u>relation :</u></b> {table :..., field :..., actionRow : ...}</p>
<p>Aksi yang akan di lakukan terhadap table yang berelasi saat file di hapus</p>
<p><b>table</b> nama table yang memiliki relasi ke fileupload</p>
<p><b>field</b> nama field yang berelasi/berisi nilai timestamp</p>
<p><b>actionRow</b> update / delete...mengupdate field menjadi 0 atau mendelete row field , jika file di hapus</p>

<br>

</div>

</div>
      <!-- ./row -->