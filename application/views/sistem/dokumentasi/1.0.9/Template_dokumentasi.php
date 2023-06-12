<div class="row">
<div class="col-lg-3">
<div class="box box-info shadow">	
    <div class="box-body" >
	
	<ul class="list-unstyled list-separated">	
		<div class="list-group list-group-transparent mb-0" style=" font-size: 14px;" >
			<a href="<?php echo base_url()?>sistem/Dokumentasi_109/general" class="list-group-item list-group-item-action <?php if(strtolower($page)=="general"){ echo " active";}?>"><span class="icon mr-3"><i class="fe fe-flag"></i></span>Introduction</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_109/system_requirtment" class="list-group-item list-group-item-action <?php if(strtolower($page)=="requirtment"){ echo " active";}?>" ><span class="icon mr-3"><i class="fe fe-alert-triangle"></i></span>System Requirement</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_109/pengaturan_menu" class="list-group-item list-group-item-action <?php if(strtolower($page)=="pengaturan_menu"){ echo " active";}?>"><span class="icon mr-3"><i class="fe fe-align-center"></i></span>Pengaturan Menu</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_109/pengaturan_template" class="list-group-item list-group-item-action <?php if(strtolower($page)=="pengaturan_template"){ echo " active";}?>"><span class="icon mr-3"><i class="fe fe-airplay"></i></span>Pengaturan Template</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_109/registrasi_form" class="list-group-item list-group-item-action <?php if(strtolower($page)=="registrasi_form"){ echo " active";}?>"><span class="icon mr-3"><i class="fe fe-feather"></i></span>Registrasi Form / URL</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_109/level_konfigurasi" class="list-group-item list-group-item-action <?php if(strtolower($page)=="level_konfigurasi"){ echo " active";}?>"><span class="icon mr-3"><i class="fe fe-bar-chart"></i></span>Level Konfigurasi</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_109/user_konfigurasi" class="list-group-item list-group-item-action <?php if(strtolower($page)=="user_konfigurasi"){ echo " active";}?>"><span class="icon mr-3"><i class="fe fe-users"></i></span>User Konfigurasi</a>
		
			<a href="<?php echo base_url()?>sistem/Dokumentasi_109/error_report" class="list-group-item list-group-item-action <?php if(strtolower($page)=="error_report"){ echo " active";}?>"><span class="icon mr-3"><i class="fe fe-activity"></i></span>Keamanan (Error Report)</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_109/csrf_protection" class="list-group-item list-group-item-action <?php if(strtolower($page)=="csrf_protection"){ echo " active";}?>"><span class="icon mr-3"><i class="fe fe-activity"></i></span>Keamanan(CSRF Protect)</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_109/front_end" class="list-group-item list-group-item-action <?php if(strtolower($page)=="front_end"){ echo " active";}?>"><span class="icon mr-3"><i class="fe fe-activity"></i></span>Keamanan(Front End)</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_109/page_maintenance" class="list-group-item list-group-item-action <?php if(strtolower($page)=="page_maintenance"){ echo " active";}?>"><span class="icon mr-3"><i class="fe fe-battery-charging"></i></span>Page Maintenance</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_109/panduan_form" class="list-group-item list-group-item-action <?php if(strtolower($page)=="panduan_form"){ echo " active";}?>"><span class="icon mr-3"><i class="fe fe-cloud-drizzle"></i></span>Panduan membuat form</a>
			
			
			<a href="<?php echo base_url()?>sistem/Dokumentasi_109/bot_telegram" class="list-group-item list-group-item-action <?php if(strtolower($page)=="bot_telegram"){ echo " active";}?>"><span class="icon mr-3"><i class="fa fa-send"></i></span>Panduan Bot Telegram</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_109/upload_google_drive" class="list-group-item list-group-item-action <?php if(strtolower($page)=="upload_google_drive"){ echo " active";}?>"><span class="icon mr-3"><i class="fa fa-tasks"></i></span>Upload To Google Drive</a>
		
		</div>				
	</ul>
	</div>
</div>	
</div>



<div class="col-lg-9">
<div class="box box-danger shadow">
            <div class="box-header with-border">
			
              <div class="user-block">
				
			  
			     <img src="<?php echo base_url()?>images/dokumentasi/sayyaf.png" class="img-circle" alt="User profile picture">
             
                <span class="username"><a href="javascript:void(0)">Dhiya As Sayyaf</a></span>
                <span class="description">YBS Sistem</span>
				<span class="description">
						<a href="https://id-id.facebook.com/people/Dhiya-As-Sayyaf/100008796433530" title="Facebook" data-toggle="tooltip" target="_blank" style="padding-left:5px"><i class="text-blue fa fa-facebook"></i></a>
						<a href="https://wa.me/6281342046414?text=Assalamualaikum..%20" title="whatsapp" data-toggle="tooltip" target="_blank" style="padding-left:5px"><i class="text-green fa fa-whatsapp"></i></a>
						<a href="https://www.youtube.com/playlist?list=PLa5lI5XCqbP55HISIuBnjAIXgVSwtBAGl" target="_blank" title="ybs-system" data-toggle="tooltip" style="padding-left:5px"><i class="text-red fa fa-youtube-play"></i></a>
				</span>
				
				
				
              </div>
		
              <!-- /.user-block -->
              <div class="box-tools">
 
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
             
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="padding-left:20px">
			<h4><b><?php echo $title_dokumentasi?></b></h4>
			<br>
			<?php echo $body_dokumentasi?>
			
             
        
           <br><br><br> <br>           <!-- /.box-footer -->
          </div>
          <!-- /.box -->
</div>
</div>






</div>




				