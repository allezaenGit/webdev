
<?php echo _css("editor-summernote") ?>

<div class="row">
<div class="col-md-12 col-lg-12">
<!-- Horizontal Form -->
<div class="box box-info shadow " id="box-loading" >
<div class="box-header with-border">
<h3 class="box-title">Form</h3>
</div>

<form class="form-horizontal" id="form-a" method="POST" action="<?= $link_save?>">
<div class="box-body">

<pre>
		MENDAPATKAN PATH CREDENTIAL :  
		Upload terlebih dahulu Credential Google Drive Ke server menggunakan 
		Menu Sistem "Upload Internal File".
		Setelah mengupload File, anda akan mendapatkan Path file pada table list upload,
		Copy dan pastekan di sini.	
		
		
</pre>
<input hidden class="data-sending" id="id" name="id" value="<?php if(isset($id))echo $id?>">
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Google Account</label>

						<div class="col-sm-10">
							<input type="text" class="form-control data-sending focus-color"  id="account" name="account" placeholder="your-account@gmail.com" value="<?= @$data->account ?>" >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Descriptions</label>

						<div class="col-sm-10">
							<input type="text" class="form-control data-sending focus-color"  id="descriptions" name="descriptions" placeholder="<?php echo $title->general->desc_required ?>" value="<?= @$data->descriptions ?>" >
						</div>
					</div>



					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo $title->sys_gdrive_path_credential ?></label>

						<div class="col-sm-10">
							<input type="text" class="form-control data-sending focus-color"  id="path_credential" name="path_credential" placeholder="<?php echo $title->general->desc_required ?>" value="<?php if(isset($data)) echo $data->path_credential ?>" >
						</div>
					</div>

			
			
							
					<div class="form-group"> 
							<label class="col-sm-2 control-label"><?php echo $title->sys_gdrive_status ?></label>
							
							<div class="col-sm-10">
							
							<?php $v = @$data->status; ?>
							<select   id='status' name='status' class='form-control select2' style='width:100%' 
								 data-table='sys_status' 
								 data-show='status'  
								 data-selected='<?= $v ?>'
								 data-where=''
								 data-foreign=''
								 data-hasone=''
								  
								>
							</select>
							
							
							</div>
					</div>
						
							 
	
	
	<div class="box-footer">
                <div class=" pull-right">
					<button id='btn-apply' type='button' class='btn btn-primary shadow'><i class='fe fe-check'></i> <?php echo $title->general->button_apply ?></button>	
					<button disabled='' id='btn-save' type='button' class='btn btn-primary shadow'><i class="fe fe-save"></i> <?php echo $title->general->button_save ?></button>	
					<button disabled='' id='btn-cancel' type='button' class='btn btn-primary shadow'> <?php echo $title->general->button_cancel ?></button>
					<a href='<?php echo $link_back ?>' id='btn-close' class='btn btn-primary shadow'> <?php echo $title->general->button_close ?></a>
				</div>
    </div>
	
		
</div>
</form>
<?php for($x=0;$x<30;$x++) echo "<br>";	?>
</div>
</div>
</div>


<?php echo _js('datepicker,editor-summernote,ybs-upload,select2Chain')?>

<script>var page_version="1.0.12"</script>

<script> 
function _refreshOnResize(){
	
	
}

$(document).ready(function(){
	
$(".select2").select2();	

$("#status").chainTo("");	
	
})

	
$('.data-sending').keydown(function(e){
	remove_message();
	switch(e.which){
		case 13 :
		if($(this).is("textarea"))return;
		apply();
		return false;
	}
});

</script>

<script>


$('#btn-apply').click(function(){
		apply();
		play_sound_apply();
});

$('#btn-close').click(function(){
	play_sound_apply();
});

$('#btn-cancel').click(function(){
	cancel();
	play_sound_apply();
});

$('#btn-save').click(function(){
	simpan();
})

function apply(){
	
	$('.form-control').attr('disabled',true);
	$('#btn-apply').attr('disabled',true);
	$('#btn-cancel').attr('disabled',false);
	$('#btn-save').attr('disabled',false);
	$('#btn-save').focus();
}
function cancel(){
	
	$('.form-control').attr('disabled',false);
	$('#btn-cancel').attr('disabled',true);
	$('#btn-save').attr('disabled',true);
	$('#btn-apply').attr('disabled',false);
	
}


function simpan(){
	start_loading_in('#box-loading');
	
	$('#form-a').ybsRequest({
		append : {
			//yourIndexName: 'yourValue',
			
		},
		
		onComplite :function(){
		  stop_loading_in('#box-loading');
		  cancel();
		},
		
		onAfterSuccess : function(){
		  cancel();
		},
		
		onBeforeFailed : function(){
		  stop_loading_in('#box-loading');
		  cancel();
		},
	});
	
	
}


</script>

