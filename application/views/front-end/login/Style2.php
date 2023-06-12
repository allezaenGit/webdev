<!DOCTYPE html>
<html><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">

<title><?php echo $this->_appinfo['login_title_bar']?></title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/back-end/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/back-end/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/back-end/bower_components/Ionicons/css/ionicons.min.css">
 <link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/plugins/fonts/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/plugins/fonts/feather/font-feather.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/back-end/dist/css/AdminLTE.min.css">
<link rel="icon" type="image/png" href="<?php echo base_url('api/Public_Access/get_logo_title_bar')?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/back-end/plugins/iCheck/square/blue.css"></head>

<?php echo _css("ybs")?>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/plugins/sweetalert/sweetalert2.min.css">   

<script src="<?php echo base_url()?>assets/back-end/plugins/sweetalert/sweetalert2.all.min.js"></script>

	


<body class="hold-transition login-page" style="background-image: url('<?php echo base_url(); ?>images/login/bg/Style2.jpg')!important">
    <div class="login-box">
        <div class="login-logo">
		<img src="<?php echo base_url('api/Public_Access/get_logo_login')?>" class="h-<?php echo $this->_appinfo['login_logo_size']?> fontlogo" alt="">
      
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body" style="background: rgb(0,0,0,.4) !important ;color:#fff;">
            <p class="login-box-msg"><?php echo $this->_appinfo['login_title_box']?></p>

			   <?php echo form_open('auth'); ?> 	
					<?php  //create random div menghentikan brute force attack yang melakukan injeksi  melalui posisi element
							echo _create_random_div()
					?>	
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" autocomplete="current-password" id="cd\ #?';/\%&<?php echo $element_name_iduser ?> .body.form-control" class="form-control focus-color" placeholder="<?php echo $this->_appinfo['login_label_user']?>" name="<?php echo $element_name_iduser ?>"  value="<?php echo set_value($element_name_iduser ); ?>"  >
				</div>	
				<div >
					<small> <span class="help-block" style="color:#fff !important"><?php echo form_error($this->_old_label_name); ?></span> </small>
				</div>				
                <br>
				
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					 <input type="password" autocomplete="current-password" id="cd\ #?';/\%&<?php echo $element_name_password ?> .body.form-control"  class="form-control focus-color" placeholder="<?php echo $this->_appinfo['login_label_password']?>"  name="<?php echo $element_name_password ?>" value="<?php echo set_value($element_name_password); ?>" >
				</div>	
				<div >
							<small> <span class="help-block" id='label_error_bottom' style="color:#fff !important"><?php echo form_error($this->_old_label_pass); ?></span> </small>
				</div>			
                <br>
				

				

                <div class="row">
				
                    <div class="col-xs-6">
                       <button type="button" class="btn btn-primary btn-block btn-otp" ><i class='fas fa-paper-plane'></i> OTP Telegram</button>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary btn-block" ><?php echo $this->_appinfo['login_label_button']?></button>
                    </div>
                    <!-- /.col -->
				
                </div>
            </form>
				<br>
				

        </div>
        <!-- /.login-box -->
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

