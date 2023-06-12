<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->_appinfo['template_title_bar']?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     

  <script src="<?php echo base_url() ?>assets/back-end/bower_components/jquery/dist/jquery.min.js"></script>
  
  
  <script src="<?php echo base_url() ?>assets/back-end/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/ybs-core/ybs.css" /> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/ybs-core/slider/ybs-slider.css" /> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/plugins/fonts/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/plugins/fonts/feather/font-feather.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/plugins/iCheck/all.css"> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/plugins/toastr-master/toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/plugins/sweetalert/sweetalert2.min.css">   
  <script src="<?php echo base_url()?>assets/back-end/plugins/toastr-master/toastr.js"></script>
  <script src="<?php echo base_url()?>assets/back-end/plugins/sweetalert/sweetalert2.all.min.js"></script>

  <script src="<?php echo base_url()?>assets/back-end/plugins/bootstrap-checkbox/dist/js/bootstrap-checkbox.js"></script>
  
  <link rel="icon" type="image/png" href="<?php echo base_url('api/Public_Access/get_logo_title_bar')?>">
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
  <script>var data_token="<?php echo  $this->_token?>";var sec_val="<?php echo $this->security->get_csrf_token_name()."=".$this->security->get_csrf_hash()?>&";var xax="<?php echo $fparent?>"
  </script>
  
  
     <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/back-end/plugins/EnlighterJS/Build/EnlighterJS.min.css" />
    <script type="text/javascript" src="<?php echo base_url()?>assets/back-end/plugins/EnlighterJS/Resources/MooTools-Core-1.6.0.js"></script>

    
    <script type="text/javascript" src="<?php echo base_url()?>assets/back-end/plugins/EnlighterJS/Build/EnlighterJS.min.js"></script>


	
	
	
	<meta name="EnlighterJS" content="Advanced javascript based syntax highlighting" data-language="javascript" data-indent="2" data-selector-block="pre" data-selector-inline="code" />
    <style type="text/css">
        /* custom hover effect using specific css class */
        .EnlighterJS.myHoverClass li:hover{
            background-color: #c0c0c0;
        }
    </style>

</head>
<body class="hold-transition <?=  $this->_skin ?> sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php echo $this->_appinfo['template_menu_title_mini']?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo $this->_appinfo['template_menu_title_long']?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
	  <!--<a href="#" class="pull-left" >
       <img src="<?php echo base_url("api/Public_Access/get_logo_template")?>" class="mt-4 ml-4 h-<?php echo $this->_appinfo['template_logo_size']?>" alt="ybs logo">
      </a>-->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!--<li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
               <!-- <ul class="menu">
                  <li><!-- start message -->
                    <!--<a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url() ?>assets/back-end/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                <!--</ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
		
		
		
		  <?php if($this->_user_id == "1") { ?>	
		  
			<?= $menu_notify_security ?>
		  
		  
		  
		  
		  <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa  fa-windows"></i>
             
            </a>
            <ul class="dropdown-menu">
              <li class="header text-center" ><b><i class="fa  fa-windows"></i>  YBS - Core</b></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
						<a href="<?php echo site_url()?>sistem/Pengaturan"  >
						  <i class="fa fa-android text-blue"> </i> &nbsp; Sistem
						</a>
                  </li>
				  
				  <li>
						<a href="<?php echo site_url()?>sistem/Dokumentasi"  >
						  <i class="fa fa-stack-overflow text-blue"> </i> &nbsp; Dokumentasi
						</a>
                  </li>
				  
                  <li>
						<a href="<?php echo site_url()?>sistem/Profile/setting" >
						  <i class="fa  fa-slack text-blue"> </i> &nbsp; Reset Password
						</a>
                  </li>
                  
                </ul>
              </li>
            
            </ul>
          </li>
		<?php } ?>	
		  
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

			  <img src="<?php echo base_url().'YbsService/get_picture_profile/'.$this->_token ?>" class="user-image" alt="User Image" >
              <span class="hidden-xs"><?php echo $this->_user_name?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
				<img src="<?php echo base_url().'YbsService/get_picture_profile/'.$this->_token ?>" class="img-circle " alt="User Image" >
                <p>
				<?php echo $this->_user_name  ?>
                  <small><?php echo $this->_user_level_name ?></small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url()?>sistem/profile/setting" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url()?>/sistem/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
		  
		  
		  
		  
		  
          
		  
		  <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().'YbsService/get_picture_profile/'.$this->_token ?>" class="img-circle " alt="User Image" >
        </div>
        <div class="pull-left info">
          <p><?php echo $this->_user_name?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Code Form...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">DAFTAR MENU</li>
		<?php echo $menu?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title_page_big?>
        <small><i class="fa  fa-slack "> </i> &ensp; <?php echo $title_page_small?></small>
      </h1>
      <ol class="breadcrumb">
	  <!-- Control Sidebar Toggle Button -->
		   
	    <?php echo $breadcrumb ?>
        <!--<li><a href="<?php echo site_url() ?>Home"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>-->
      </ol>
    

	
	
	
	</section>

    <!------ BODY-------->
	<!-- Main content -->
    <section class="content" >
	
		<?php  echo $content_body; ?>
    </section>
    <!-- /.content -->
	
	
	
	
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
     <?php echo $this->_appinfo['template_footer_right']?>
    </div>
     <?php echo $this->_appinfo['template_footer_left']?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
   
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
       

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<footer class="footer">
		 <div class="content-general">
		<?php //berfungsi melakukan redirect dengan ajax halaman ?>
		<form id="redirect-form" action="#" method="post" accept-charset="utf-8">
			<input id="redirect-form-tk" type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="">
			<button hidden id="redirect-button" type="submit" ></button>
		</form>

		<audio id="sound_click">
		<source src="<?php echo base_url('sound/click.wav') ?>"  type="audio/mpeg" >  
		</audio>

		<audio id="sound_entered">
		<source src="<?php echo base_url('sound/entered.wav') ?>"  type="audio/mpeg" >  
		</audio>
			
		<audio id="sound_apply">
		<source src="<?php echo base_url('sound/apply.wav') ?>"  type="audio/mpeg" >  
		</audio>
			
		<audio id="sound_success">
		<source src="<?php echo base_url('sound/success.wav') ?>"  type="audio/mpeg" >  
		</audio>

		<audio id="sound_failed">
		<source src="<?php echo base_url('sound/failed.wav') ?>"  type="audio/mpeg" >  
		</audio>	

		
			
			
			<div id='general-helper'>
			<p id="test_time"></p>
			<?php //popup Message Delete ?>
			<div class="modal modal-danger fade" id="modal-danger">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title">Konfirmasi Penghapusan Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
				
				</div>
				
				<div class="modal-body">
				<p>Data yang akan di hapus :</p>
				</div>
				
				<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal"> Batal</button>
				<a href="#" class="btn btn-outline" title="delete" id="button_konfirm_delete"  data-dismiss="modal"><i class="fa fa-trash-o"></i><span> Hapus</span></a>
				</div>
			</div>
			</div>
			</div>	
			</div>
				
				
		  </div>
	
      </footer>
  
<section id="section_script">

<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/back-end/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>assets/back-end/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/back-end/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/back-end/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url() ?>assets/back-end/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/back-end/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/back-end/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/back-end/dist/js/demo.js"></script>

<script id="src_ybs" src="<?php echo base_url() ?>assets/back-end/ybs-core/ybs.js"></script>
<script  src="<?php echo base_url()?>assets/back-end/ybs-core/slider/ybs-slider.js"></script>



<script>

    $( window ).on( "load", function() {
		if(!$('#content-body').hasClass("fadeIn")){
				$('#content-body').addClass("zoom");
				
		}
		
		$('#content-body').css('display','flex');
		clearTimeout(window.resizedFinished);
		window.resizedFinished = setTimeout(function(){
					refresh_content_template();	
					
									
		}, 400);
			
		if($.isFunction(window._callBackFromContent)){
				_callBackFromContent();
		}	
			
    });
	
		$(document).ready(function(){
			 $('.sidebar-menu').tree();
			var data_error  	=  "<?php  echo $this->session->flashdata('auth_form') ?>";
			var data_success 	= "<?php echo $this->session->flashdata('redirect_success') ?>";
			var data_failed  	= "<?php echo $this->session->flashdata('redirect_failed') ?>";
			var data_warning 	= "<?php echo $this->session->flashdata('redirect_warning') ?>";
			
			
			if(data_error !==""){
				show_error_message(data_error);	
				play_sound_failed();				
			}
			if(data_success !==""){
				show_success_message(data_success);	
				play_sound_success();				
			}
			if(data_failed!==""){
				show_error_message(data_failed);	
				play_sound_failed();				
			}
			if(data_warning!==""){
				show_warning_message(data_warning);	
				play_sound_failed();				
			}
			
			$('#ybs-dash').click(function(){
					var select='0';
					if($('#ybs-dash').hasClass('dash-unselect')){
						$('#ybs-dash').removeClass('dash-unselect');
						$('#ybs-dash').addClass('dash-select');
						select = '1';
					}else{
						$('#ybs-dash').removeClass('dash-select');
						$('#ybs-dash').addClass('dash-unselect');	
						select='0';
					}
					var y = get_json_format('idform',"<?php echo $this->_user_form_id?>");
					var z = get_json_format('select',select);
					send_data = ybs_dataSending([y,z]);
					var a = new ybsRequest();
					a.loadingIn = function(){
						return '';
					}
					a.process("<?php echo site_url('sistem/sys_dashboard/change/').$this->_token?>",send_data,'POST');
			});
			
			
			
			
		});
		
		$(window).resize(function() {
		
			clearTimeout(window.resizedFinished);
			window.resizedFinished = setTimeout(function(){
				  refresh_content_template();
				  
			}, 400);
		});
		 
		$("a.sidebar-toggle").click(function(){
			  $('body').one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",function(event) {
				   refresh_content_template();
				  
			  });
		});

		function refresh_content_template(){
			try{
				$.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust().responsive.recalc();
			}catch(err){
				
			}
			
			try{
				_refreshOnResize();
			}catch(err){
				
			}
		}
		
		
		function saveSkin(val){
					var y = get_json_format('skin',val);
					
					send_data = ybs_dataSending([y]);
					var a = new ybsRequest();
					a.loadingIn = function(){
						return '';
					}
					a.process("<?php echo site_url('sistem/sys_dashboard/skin/').$this->_token?>",send_data,'POST');
			}
		

	</script>






</section>



</body>
</html>
