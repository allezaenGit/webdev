<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">

<title><?php echo $this->_appinfo['login_title_bar']?></title>

<link rel="icon" type="image/png" href="<?php echo base_url('api/Public_Access/get_logo_title_bar')?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/front-end/login/style4/style.css">

<?php echo _css("ybs")?>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/plugins/sweetalert/sweetalert2.min.css">   

<script src="<?php echo base_url()?>assets/back-end/plugins/sweetalert/sweetalert2.all.min.js"></script>

</head>


<body >

<div class="background-wrap">
  <div class="background"></div>
</div>

 <?php echo form_open('auth'); ?> 	
	<?php  //create random div menghentikan brute force attack yang melakukan injeksi  melalui posisi element
		echo _create_random_div()
	?>	
					
  <h1 id="litheader">Sign In</h1>
  <div class="inset">
    <p>
      <input type="text" autocomplete="current-password" id="cd\ #?';/\%&<?php echo $element_name_iduser ?> .body.form-control" class="form-control " placeholder="<?php echo $this->_appinfo['login_label_user']?>" name="<?php echo $element_name_iduser ?>"  value="<?php echo set_value($element_name_iduser ); ?>"  >
    </p>
    <p>
      <input type="password" autocomplete="current-password" id="cd\ #?';/\%&<?php echo $element_name_password ?> .body.form-control"  class="form-control " placeholder="<?php echo $this->_appinfo['login_label_password']?>"  name="<?php echo $element_name_password ?>" value="<?php echo set_value($element_name_password); ?>">
		
	</p>
     <small> <span class="help-block" id='label_error_bottom' style="color:#fff !important"><?php echo form_error($this->_old_label_pass); ?></span> </small>
       
  </div>
  <p class="p-container">
  
	<input type="submit" value="<?php echo $this->_appinfo['login_label_button']?>"  >
	
	
	
  </p>
</form>

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>/assets/back-end/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>/assets/back-end/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>/assets/back-end/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url('assets/back-end/ybs-core/ybs.js') ?>"></script>

<script>
		
		$(document).ready(function () {
		var data_error = "<?php echo $this->session->flashdata('auth_login') ?>";
			if(data_error !==""){
				$('#label_error_bottom').text(data_error);				
			}
	
		 })
		 
		 
		 $(".btn-otp").click(function(){
			let frl =  "<?= $this->session->userdata('tokenFormLogin') . '_' ?>";
			let url =  "<?= site_url('api/Public_Access/getTokenOTP/') ?>" + frl ;
			let timerInterval;
				 Swal.mixin({
				  input: 'text',
				  confirmButtonText: 'Next &rarr;',
				  showCancelButton: true,
				  progressSteps: ['1', '2'],
				  showLoaderOnConfirm: true,
				  timer: 60000,
				  
				  preConfirm: (data) => {
					return fetch(`${url}${data}`)
					  .then(response => {
						if (!response.ok) {
						  throw new Error(response.statusText)
						}
						
						return response.json();
					  })
					  .catch(error => {
						Swal.showValidationMessage(
						  `Request failed: ${error}`
						)
					  }).then(r => {
							if(r.success==false){
								Swal.showValidationMessage(
								  `Request failed: ${r.message}`
								)
							}else{
								<?php //MEMBUAT TIMER ?>
								timerInterval = setInterval(() => {
								  const content = Swal.getContent()
								  if (content) {
									const t = content.querySelector('t')
									if (t) {
									    mlsec = Swal.getTimerLeft();
										t.textContent = parseInt(mlsec/1000);
									}
								  }
								}, 100)
								
								<?php //mengeset url validation ?>
								url = r.url;
								
							}
							
					  })
				  },
				  allowOutsideClick: () => !Swal.isLoading()
				}).queue([
				  {
					title: 'UserName',
					text: 'Masukkan username anda..'
				  },
				  {
					title: 'CODE',
					html: `
						Masukkan kode OTP <br>
						kode telah di kirim ke telegram anda<br><br>
						<b>sisa waktu anda <t></t> detik</b>
					  `,
				  },
				
				]).then((result) => {
				  if (result.value) {
					window.location.href = "<?= site_url('home')?>"
				  }
				})
		 });
		  
</script>

<script>
$(document).ready(function() {

    var state = false;

    //$("input:text:visible:first").focus();

    $('#accesspanel').on('submit', function(e) {

        e.preventDefault();

        state = !state;

        if (state) {
            document.getElementById("litheader").className = "poweron";
            document.getElementById("go").className = "";
            document.getElementById("go").value = "Initializing...";
        }else{
            document.getElementById("litheader").className = "";
            document.getElementById("go").className = "denied";
            document.getElementById("go").value = "Access Denied";
        }

    });

});
</script>

</body >
</html>