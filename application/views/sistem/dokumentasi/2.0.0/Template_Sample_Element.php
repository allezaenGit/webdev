<div class="row">
<div class="col-lg-3">
<div class="box box-info shadow">	
    <div class="box-body" >
	
	<ul class="list-unstyled list-separated">	
		<div class="list-group list-group-transparent mb-0" style=" font-size: 14px;" >
			<a href="<?php echo base_url()?>sistem/Dokumentasi_Element/button" class="list-group-item list-group-item-action <?php if($page=="button") echo " active" ?>"><span class="icon mr-3"><i class="fa fa-hand-pointer-o"></i></span>Button & Alert</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_Element/panel" class="list-group-item list-group-item-action <?php if($page=="panel") echo " active" ?>" ><span class="icon mr-3"><i class="fa fa-list-alt"></i></span>Box Panel</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_Element/form" class="list-group-item list-group-item-action <?php if($page=="form") echo " active" ?>" ><span class="icon mr-3"><i class="fa fa-window-maximize"></i></span>Form</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_Element/input_text" class="list-group-item list-group-item-action <?php if($page=="input_text") echo " active"?>"><span class="icon mr-3"><i class="fe fe-align-center"></i></span>Input</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_Element/select" class="list-group-item list-group-item-action <?php if($page=="select") echo " active"?>"><span class="icon mr-3"><i class="fa fa-list"></i></span>Select / Combobox</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_Element/select_db" class="list-group-item list-group-item-action <?php if($page=="select_db") echo " active"?>"><span class="icon mr-3"><i class="fa fa-list"></i></span>Select / Combobox DataBase</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_Element/toggle" class="list-group-item list-group-item-action <?php if($page=="toggle") echo " active"?>"><span class="icon mr-3"><i class="fa fa-slack"></i></span>Toggle CheckboxPicker</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_Element/widget" class="list-group-item list-group-item-action <?php if(strtolower($page)=="widget"){ echo " active";}?>"><span class="icon mr-3"><i class="fa fa-american-sign-language-interpreting"></i></span>Widget</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_Element/chart_js" class="list-group-item list-group-item-action <?php if(strtolower($page)=="chart_js"){ echo " active";}?>"><span class="icon mr-3"><i class="fa fa-bar-chart"></i></span>Chart JS</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_Element/amchart" class="list-group-item list-group-item-action <?php if(strtolower($page)=="amchart"){ echo " active";}?>"><span class="icon mr-3"><i class="fa fa-bar-chart"></i></span>amChart</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_Element/storageview" class="list-group-item list-group-item-action <?php if(strtolower($page)=="storageview"){ echo " active";}?>"><span class="icon mr-3"><i class="fa fa-database"></i></span>Storage View</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_Element/uploadfile" class="list-group-item list-group-item-action <?php if(strtolower($page)=="uploadfile"){ echo " active";}?>"><span class="icon mr-3"><i class="fa fa-cloud-upload"></i></span>UploadFile</a>
			<a href="<?php echo base_url()?>sistem/Dokumentasi_Element/scanner_qr" class="list-group-item list-group-item-action <?php if(strtolower($page)=="scanner_qr"){ echo " active";}?>"><span class="icon mr-3"><i class="fa fa-qrcode"></i></span>QR Code Scanner</a>
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
				
				<input type="text" id="filter-data" class="form-control" placeholder=" search..." >
				
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
			<h4><b><?php echo @$title_dokumentasi?></b></h4>
			<!--<br>-->
			<?php echo $body_dokumentasi?>
			
             
        
           <br><br><br> <br>           <!-- /.box-footer -->
          </div>
          <!-- /.box -->
</div>
</div>






</div>



<?php echo _js("text-mark")?>
 <script type="text/javascript">
       jQuery(document).ready(function(){
          jQuery("#filter-data").jcOnPageFilter({animateHideNShow: true,
                    focusOnLoad:true,
                    highlightColor:'yellow',
                    textColorForHighlights:'#000000',
                    caseSensitive:false,
                    hideNegatives:true,
                    parentLookupClass:'parentFilter',
                    childBlockClass:'childFilter'});
       });          
</script>

				