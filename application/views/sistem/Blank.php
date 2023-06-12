<!-- box callout -->
<div class="callout callout-ybs-danger shadow">
    <h4><i class="fe fe-volume-2"></i> Detection No Auth</h4>
    <div class="box-body table-responsive no-padding">
	<br>
      ANDA TIDAK MEMILIKI OTORISASI untuk mengakses URL : <br><br>
	  
	  <ul><li><b><?= $this->session->flashdata('urlLoopAuth');?></b></ul></li><br>
	  <p>hubungi administrator anda, untuk mendapatkan akses halaman ini </p>
    </div>
</div>