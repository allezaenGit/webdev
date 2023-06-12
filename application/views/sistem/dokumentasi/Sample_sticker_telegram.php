<?php echo _css("emoji") ?>

<div class="col-md-12 col-xl-12">
<div class="box box-primary shadow">
            <div class="box-header with-border">
              <h3 class="box-title">Telegram Sticker</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
 
              </div>
            </div>
            <!-- /.box-header -->
<div class="box-body">
            
		<div class="col-md-12">
		<!-- Custom Tabs -->
		<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#tab_1" data-toggle="tab">AnimatedEmojies</a></li>
						  <li><a href="#tab_2" data-toggle="tab">Blobfish</a></li>
						  <li><a href="#tab_3" data-toggle="tab">BreadToast</a></li>
						  <li><a href="#tab_4" data-toggle="tab">HotCherry</a></li>
						  <li><a href="#tab_5" data-toggle="tab">SeaKingdom</a></li>
						  <li><a href="#tab_6" data-toggle="tab">Snail</a></li>
						   <li><a href="#tab_7" data-toggle="tab">SnappyCrab</a></li>
						    <li><a href="#tab_8" data-toggle="tab">SweetyStrawberry</a></li>
							 <li><a href="#tab_9" data-toggle="tab">TeddyBear</a></li>
						 
						</ul>
						<div class="tab-content">
						  <div class="tab-pane active" id="tab_1">
								<div class="icons-list-wrap">
								  <ul class="icons-list">
									<?php foreach($AnimatedEmojies as $list){
											$cname = str_replace(["{{sticker:","}}"],"",$list->name)  . "#" . $list->no ;	
										?>
											<li class="icons-list-item"><button class="btn btn-copy sticker" title="<?= $cname?>"  style="background: url(<?=  base_url('images/sticker/AnimatedEmojies/'). $list->no ?>.png);" ></button></li>		
											
									<?php } ?>
									
									<?php for($x=0;$x<22 ;$x++) {?>
											<li></li>
									<?php }?>
								  </ul>
								</div>
								
								
						  </div>
						  <!-- /.tab-pane -->
						  <div class="tab-pane" id="tab_2">
								<div class="icons-list-wrap">
								  <ul class="icons-list">
									<?php foreach($Blobfish as $list){
									
										$cname = str_replace(["{{sticker:","}}"],"",$list->name)  . "#" . $list->no ;	
									?>
											<li class="icons-list-item"><button class="btn btn-copy sticker" title="<?= $cname?>"  style="background: url(<?=  base_url('images/sticker/Blobfish/'). $list->no ?>.png);" ></button></li>		
											
									<?php } ?>
									
									<?php for($x=0;$x<22 ;$x++) {?>
											<li></li>
									<?php }?>
								  </ul>
								</div>
						  </div>
						  <!-- /.tab-pane -->
						  <div class="tab-pane" id="tab_3">
								<div class="icons-list-wrap">
									  <ul class="icons-list">
										<?php foreach($BreadToast as $list){
										
											$cname = str_replace(["{{sticker:","}}"],"",$list->name)  . "#" . $list->no ;	
										?>
												<li class="icons-list-item"><button class="btn btn-copy sticker" title="<?= $cname?>"  style="background: url(<?=  base_url('images/sticker/BreadToast/'). $list->no ?>.png);" ></button></li>		
												
										<?php } ?>
										
										<?php for($x=0;$x<22 ;$x++) {?>
												<li></li>
										<?php }?>
									  </ul>
									</div>
						  </div>
						  <!-- /.tab-pane -->
						   <div class="tab-pane" id="tab_4">
								<div class="icons-list-wrap">
									  <ul class="icons-list">
										<?php foreach($HotCherry as $list){
										
											$cname = str_replace(["{{sticker:","}}"],"",$list->name)  . "#" . $list->no ;	
										?>
												<li class="icons-list-item"><button class="btn btn-copy sticker" title="<?= $cname?>"  style="background: url(<?=  base_url('images/sticker/HotCherry/'). $list->no ?>.png);" ></button></li>		
												
										<?php } ?>
										
										<?php for($x=0;$x<22 ;$x++) {?>
												<li></li>
										<?php }?>
									  </ul>
									</div>
						  </div>
						  <!-- /.tab-pane -->
						  
						   <div class="tab-pane" id="tab_5">
									<div class="icons-list-wrap">
									  <ul class="icons-list">
										<?php foreach($SeaKingdom as $list){
										
											$cname = str_replace(["{{sticker:","}}"],"",$list->name)  . "#" . $list->no ;	
										?>
												<li class="icons-list-item"><button class="btn btn-copy sticker" title="<?= $cname?>"  style="background: url(<?=  base_url('images/sticker/SeaKingdom/'). $list->no ?>.png);" ></button></li>		
												
										<?php } ?>
										
										<?php for($x=0;$x<22 ;$x++) {?>
												<li></li>
										<?php }?>
									  </ul>
									</div>
						  </div>
						  <!-- /.tab-pane -->
						   <div class="tab-pane" id="tab_6">
								<div class="icons-list-wrap">
									  <ul class="icons-list">
										<?php foreach($Snail as $list){
										
											$cname = str_replace(["{{sticker:","}}"],"",$list->name)  . "#" . $list->no ;	
										?>
												<li class="icons-list-item"><button class="btn btn-copy sticker" title="<?= $cname?>"  style="background: url(<?=  base_url('images/sticker/Snail/'). $list->no ?>.png);" ></button></li>		
												
										<?php } ?>
										
										<?php for($x=0;$x<22 ;$x++) {?>
												<li></li>
										<?php }?>
									  </ul>
									</div>
						  </div>
						  <!-- /.tab-pane -->
						  
						   <div class="tab-pane" id="tab_7">
									<div class="icons-list-wrap">
									  <ul class="icons-list">
										<?php foreach($SnappyCrab as $list){
										
											$cname = str_replace(["{{sticker:","}}"],"",$list->name)  . "#" . $list->no ;	
										?>
												<li class="icons-list-item"><button class="btn btn-copy sticker" title="<?= $cname?>"  style="background: url(<?=  base_url('images/sticker/SnappyCrab/'). $list->no ?>.png);" ></button></li>		
												
										<?php } ?>
										
										<?php for($x=0;$x<22 ;$x++) {?>
												<li></li>
										<?php }?>
									  </ul>
									</div>
						  </div>
						  <!-- /.tab-pane -->
						  
						   <div class="tab-pane" id="tab_8">
									<div class="icons-list-wrap">
									  <ul class="icons-list">
										<?php foreach($SweetyStrawberry as $list){
										
											$cname = str_replace(["{{sticker:","}}"],"",$list->name)  . "#" . $list->no ;	
										?>
												<li class="icons-list-item"><button class="btn btn-copy sticker" title="<?= $cname?>"  style="background: url(<?=  base_url('images/sticker/SweetyStrawberry/'). $list->no ?>.png);" ></button></li>		
												
										<?php } ?>
										
										<?php for($x=0;$x<22 ;$x++) {?>
												<li></li>
										<?php }?>
									  </ul>
									</div>
						  </div>
						  <!-- /.tab-pane -->
						   <div class="tab-pane" id="tab_9">
								<div class="icons-list-wrap">
								  <ul class="icons-list">
									<?php foreach($TeddyBear as $list){
									
										$cname = str_replace(["{{sticker:","}}"],"",$list->name)  . "#" . $list->no ;	
									?>
											<li class="icons-list-item"><button class="btn btn-copy sticker" title="<?= $cname?>"  style="background: url(<?=  base_url('images/sticker/TeddyBear/'). $list->no ?>.png);" ></button></li>		
											
									<?php } ?>
									
									
									<?php for($x=0;$x<22 ;$x++) {?>
											<li></li>
									<?php }?>
									
									
								  </ul>
								</div>
						  </div>
						  <!-- /.tab-pane -->
						  
						</div>
						<!-- /.tab-content -->
		</div>
		<!-- nav-tabs-custom -->
		</div>
		<!-- /.col -->
					
					
					
			 
			 
			 
			 
			 
					<div class="">
						Copy Clipboard Sticker : <input  readonly type="text" id="copy-icon" value="" style="border:none; background-color:rgba(255,255,255,0);">
						<br><br>
					</div>			 
			 
			 
</div>
                  



</div>
</div>



<script>
$(document).ready(function() {
  /** Initialize tooltips */
  $('[data-toggle="tooltip"]').tooltip();
    
	function myFunction() {
	  /* Get the text field */
	  var copyText = $("btn-copy");
		copyText.select();
	  /* Select the text field */
	  copyText.select();
	  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

	  /* Copy the text inside the text field */
	  document.execCommand("copy");

	  /* Alert the copied text */
	  alert("Copied the text: " + copyText.value);
	}

  
  
});



 $(".btn-copy").click(function(){
	
	var icn = $(this).attr("title");
	$("#copy-icon").val(icn);
	
	
	var copyText = document.getElementById("copy-icon");
	copyText.select();
	copyText.setSelectionRange(0, 99999);
	document.execCommand("copy");
	show_success_message("Copy to Clipboard : " +copyText.value);
	
});
 


</script>
