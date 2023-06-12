<?= $menu ?>

<!-- box collapse solid header-->
<form id="form-a" method="POST" action="<?= url('actionSetting') ?>">
<div class="box box-info  box-solid shadow">
    <div class="box-header with-border">
        <h3 class="box-title">Setting</h3>
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        </div>
    </div>
    
    <div class="box-body">
		
		<div class='form-group'>
				<label class="form-control">Tracking User Telegram</label>
				<input  id="tracking" type='checkbox'  class='checkboxpicker' value='off' data-group-cls="btn-group-sm">  
		</div>
		
		<br>
		
		<div class='form-group'>
				<label class="form-control">Enable Record Emo</label>
			  <input id="record_emo" type='checkbox'  class='checkboxpicker' value='off' data-group-cls="btn-group-sm">  
		</div>
		
		<br>
		
		<div class='form-group'>
				<label class="form-control">Enable Register OTP</label>
			  <input id="register_otp" type='checkbox'  class='checkboxpicker' value='off' data-group-cls="btn-group-sm">  
		</div>
		<pre>
		Menggunakan Register OTP :
		Langkah #1 Setting Bot
		- Buat Command Bot :
			- Service  : pilih Service yang di inginkan
			- Command name : "otp_register"
			- Descriptions : "Registrasi"
			- Output Message : "Opps..Contact Your Administrator!"
			
			"note : Command name tidak boleh di ganti !"
		
		Langkah #2
		- Buka bot telegram , ketik : /otp_register 
		  dan tunggu sampai pesan "Registrasi OTP" muncul
		- kemudian isi username dan password login anda.
		format : username#password
		
		</pre>
		
		
		<br>
		
    </div>
</div>



<script>
$(document).ready(function(){
  $('.checkboxpicker').checkboxpicker();
  
   $('#tracking').prop('checked',<?= $setting->tracking ?>);
   $('#record_emo').prop('checked',<?= $setting->record_emo ?>);
	$('#register_otp').prop('checked',<?= $setting->register_otp ?>);
  
  $('.checkboxpicker').change(function(){
		$('#form-a').ybsRequest({
			append : {
				tracking : $('#tracking').prop('checked'),
				record_emo : $('#record_emo').prop('checked'),
				register_otp : $('#register_otp').prop('checked'),
			},
		});
  });
  
  
  
  
  
});

function simpan(){
	
}

</script>