
<?php echo _css("editor-summernote") ?>

<div class="row">
<div class="col-md-12 col-lg-12">
<!-- Horizontal Form -->
<div class="box box-info shadow " id="box-loading" >
<div class="box-header with-border">
<h3 class="box-title">Form</h3>
</div>

<form class="form-horizontal" id="form-a">
<div class="box-body">
<input hidden class="data-sending" id="id" name="id" value="<?php if(isset($id))echo $id?>">


							
					<div class="form-group"> 
							<label class="col-sm-2 control-label">USER</label>
							
							<div class="col-sm-10">
							
							<input disabled type="text" class="form-control focus-color"   value="<?= $data->nmuser ?>" >
						
							</div>
					</div>
						
			
					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo $title->sys_bot_telegram_client_chat_id ?></label>

						<div class="col-sm-10">
							<input disabled type="text" class="form-control focus-color" value="<?= $data->chat_id ?>" >
						</div>
					</div>

			
			
					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo $title->sys_bot_telegram_client_register_date ?></label>

						<div class="col-sm-10">
							<input disabled type="text" class="form-control focus-color" value="<?= $data->register_date ?>" >
						</div>
					</div>

			
			
					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo $title->sys_bot_telegram_client_register_time ?></label>

						<div class="col-sm-10">
							<input disabled type="text" class="form-control focus-color" value="<?= $data->register_time ?>" >
						</div>
					</div>

			
			
							
					<div class="form-group"> 
							<label class="col-sm-2 control-label"><?php echo $title->sys_bot_telegram_client_status ?></label>
							
							<div class="col-sm-10">
							<?php $v='';  if(isset($data)) $v = $data->status; 
								  echo create_cmb_database(array(	'id'			=>'status',
																	'name'			=>'status',
																	'table'			=>'sys_status',
																	'field_show'	=>'status',
																	'primary_key'	=>'id', 
																	'selected'		=>$v,
																	'field_link'	=>'',
																	'class'			=>'data-sending')); 
						    ?> 
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
</div>
</div>
</div>


<?php echo _js('datepicker,editor-summernote,ybs-upload')?>

<script>var page_version="1.0.12"</script>

<script> 
function _refreshOnResize(){
	$(".select2").select2();
}

$(document).ready(function(){
	
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
	
	var send_data = $('#form-a').getForm();

	var a = new ybsRequest();
	a.process('<?php echo $link_save?>',send_data,'POST');
	a.onAfterSuccess = function(){
			cancel();
	}
	a.onBeforeFailed = function(){
			cancel();
	}
	a.onComplite = function(){
		stop_loading_in('#box-loading');
	}
}


</script>

