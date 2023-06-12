

<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head>
	<title><?php echo $this->_appinfo['login_title_bar']?></title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<!--<link rel="stylesheet" type="text/css" href="styles.css">-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/front-end/login/style3/style.css">
	<link rel="icon" type="image/png" href="<?php echo base_url('api/Public_Access/get_logo_title_bar')?>">
	<?php echo _css("ybs")?>

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/plugins/sweetalert/sweetalert2.min.css">   

	<script src="<?php echo base_url()?>assets/back-end/plugins/sweetalert/sweetalert2.all.min.js"></script>
	
	
</head>
<body style="background-image: url('<?php echo base_url(); ?>images/login/bg/Style3.jpg')!important">
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				   <?php echo form_open('auth'); ?> 	
					<?php  //create random div menghentikan brute force attack yang melakukan injeksi  melalui posisi element
							echo _create_random_div()
					?>	
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						
						<input type="text" autocomplete="current-password" id="cd\ #?';/\%&<?php echo $element_name_iduser ?> .body.form-control" class="form-control focus-color" placeholder="<?php echo $this->_appinfo['login_label_user']?>" name="<?php echo $element_name_iduser ?>"  value="<?php echo set_value($element_name_iduser ); ?>"  >
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" autocomplete="current-password" id="cd\ #?';/\%&<?php echo $element_name_password ?> .body.form-control"  class="form-control focus-color" placeholder="<?php echo $this->_appinfo['login_label_password']?>"  name="<?php echo $element_name_password ?>" value="<?php echo set_value($element_name_password); ?>">
					</div>
					<div >
							<small> <span class="help-block" id='label_error_bottom' style="color:#fff !important"><?php echo form_error($this->_old_label_pass); ?></span> </small>
					</div>
					
                    <div class="form-group">
						
						<input type="submit" value="<?php echo $this->_appinfo['login_label_button']?>" class="btn float-right login_btn" >
						<button type="button" class="btn btn-otp float-left  login_btn" ><i class='fas fa-paper-plane'></i> OTP</button>
					</div>
                    <!-- /.col -->
				
					
				</form>
			</div>
			
		</div>
	</div>
</div>

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
		


</body>
</html>