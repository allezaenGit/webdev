
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
						<label class="col-sm-2 control-label"><?php echo $title->sys_mail_server_host ?></label>

						<div class="col-sm-10">
							<input type="text" class="form-control data-sending focus-color"  id="host" name="host" placeholder="<?php echo $title->general->desc_required ?>" value="<?php if(isset($data)) echo $data->host ?>" >
						</div>
					</div>

			
			
					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo $title->sys_mail_server_user_name ?></label>

						<div class="col-sm-10">
							<input type="text" class="form-control data-sending focus-color"  id="user_name" name="user_name" placeholder="<?php echo $title->general->desc_required ?>" value="<?php if(isset($data)) echo $data->user_name ?>" >
						</div>
					</div>

			
			
					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo $title->sys_mail_server_password ?></label>

						<div class="col-sm-10">
							<input type="password" class="form-control data-sending focus-color"  id="password" name="password" placeholder="<?php echo $title->general->desc_required ?>" value="<?php if(isset($data)) echo $data->password ?>" >
							<input type="checkbox" id="show-password" class="pointer"> <small >show password</small></input>
						</div>
					</div>

			
			
					<div class="form-group"> 
							<label class="col-sm-2 control-label"><?php echo $title->sys_mail_server_smtp_auth ?></label>
							
							<div class="col-sm-10">
							<select class="select2 form-control" id="smtp_auth" name="smtp_auth" style="width:100%">
								<?php if(@$data->smtp_auth==1){ ?>
											<option selected value="1"> YA</option>
											<option value="0"> TIDAK</option>	
								<?php }else{ ?>
											<option  value="1"> YA</option>
											<option selected value="0"> TIDAK</option>	
								<?php }	?>
							
							
								
							</select>
							</div>
					</div>
						

			
			
					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo $title->sys_mail_server_smtp_secure ?></label>

						<div class="col-sm-10">
							<select class="select2 form-control" id="smtp_secure" name="smtp_secure" style="width:100%">
								<?php if(@$data->smtp_secure=="ssl"){ ?>
											<option selected value="ssl">SSL</option>
											<option value="tls">TLS</option>	
								<?php }else{ ?>
											<option  value="ssl">SSL</option>
											<option selected value="tls">TLS</option>	
								<?php }	?>
							
							
								
							</select>
						</div>
					</div>

			
			
					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo $title->sys_mail_server_port ?></label>

						<div class="col-sm-10">
							<input type="text" class="form-control data-sending focus-color"  id="port" name="port" placeholder="<?php echo $title->general->desc_required ?>" value="<?php if(isset($data)) echo $data->port ?>" >
						</div>
					</div>

			
			
					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo $title->sys_mail_server_email_sender ?></label>

						<div class="col-sm-10">
							<input type="text" class="form-control data-sending focus-color"  id="email_sender" name="email_sender" placeholder="<?php echo $title->general->desc_required ?>" value="<?php if(isset($data)) echo $data->email_sender ?>" >
						</div>
					</div>

			
			
					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo $title->sys_mail_server_email_name ?></label>

						<div class="col-sm-10">
							<input type="text" class="form-control data-sending focus-color"  id="email_name" name="email_name" placeholder="<?php echo $title->general->desc_required ?>" value="<?php if(isset($data)) echo $data->email_name ?>" >
						</div>
					</div>

			
			
							
					<div class="form-group"> 
							<label class="col-sm-2 control-label"><?php echo $title->sys_mail_server_status ?></label>
							
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
						
			
							
					<div class="form-group"> 
							<label class="col-sm-2 control-label"><?php echo $title->sys_mail_server_debug ?></label>
							
							<div class="col-sm-10">
							<?php $v='';  if(isset($data)) $v = $data->debug; 
								  echo create_cmb_database(array(	'id'			=>'debug',
																	'name'			=>'debug',
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
	$("#show-password").click(function(){
		let check = $("#show-password").prop("checked");
		if(check){
			$("#password").attr("type","text");
		}else{
			$("#password").attr("type","password");
		}
	});
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

