<div class="row">
<div class="col-md-12 col-lg-12">
<!-- Horizontal Form -->
<div class="box box-info shadow" id="box-loading">
<div class="box-header with-border">
<h3 class="box-title">Form</h3>
</div>

<form class="form-horizontal" id="form-a">
<div class="box-body">
<input hidden class='data-sending' id='id' value='<?php if(isset($id))echo $id?>'>


					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo $title->sys_bot_telegram_admin_system_name ?></label>

						<div class="col-sm-10">
							<input disabled   type='text' class='form-control focus-color'  id='name'  placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->name ?>' >
						</div>	
					</div>
					
					
					
					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo $title->sys_bot_telegram_admin_system_id_bot ?></label>

						<div class="col-sm-10">
							<?php $v='';  if(isset($data)) $v = $data->id_bot; 
								  echo create_cmb_database(array(	'id'			=>'id_bot',
																	'name'			=>'id_bot',
																	'table'			=>'sys_bot_telegram_register',
																	'field_show'	=>'name',
																	'primary_key'	=>'id', 
																	'selected'		=>$v,
																	'field_link'	=>'',
																	'class'			=>'custom-select data-sending')); 
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




<?php echo _js('datepicker')?>

<script>var page_version="1.0.12"</script>




<!--

<?php echo _css('selectize,datepicker')?>

<?php echo card_open('Form','bg-green',true)?>	
	
	<form id='form-a'>
	<input hidden class='data-sending' id='id' value='<?php if(isset($id))echo $id?>'>
					
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->sys_bot_telegram_admin_system_name ?></label>
							<input disabled   type='text' class='form-control focus-color'  id='name' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->name ?>' >
					</div>
					</div>
	
	
					<div class='col-md-12 col-xl-12'>				
					<div class='form-group'> 
							<label class='form-label'><?php echo $title->sys_bot_telegram_admin_system_id_bot ?></label> 
							<?php $v='';  if(isset($data)) $v = $data->id_bot; 
								  echo create_cmb_database(array(	'id'			=>'id_bot',
																	'name'			=>'id_bot',
																	'table'			=>'sys_bot_telegram_register',
																	'field_show'	=>'name',
																	'primary_key'	=>'id', 
																	'selected'		=>$v,
																	'field_link'	=>'',
																	'class'			=>'custom-select data-sending')); 
						    ?> 
					</div>
					</div>			
			
				
			
							 
	
	<div class='col-md-12 col-xl-12'>

	   <div class='form-group'>
		<button id='btn-apply' type='button' class='btn btn-primary'><i class='fe fe-check'></i> <?php echo $title->general->button_apply ?></button>	
		<button disabled='' id='btn-save' type='button' class='btn btn-primary'><i class="fe fe-save"></i> <?php echo $title->general->button_save ?></button>	
		<button disabled='' id='btn-cancel' type='button' class='btn btn-primary'> <?php echo $title->general->button_cancel ?></button>
		<a href='<?php echo $link_back ?>' id='btn-close' class='btn btn-primary'> <?php echo $title->general->button_close ?></a>
	   </div>
			 
	</div>
	</form>


<?php echo card_close()?>

<?php echo _js('selectize,datepicker')?>

<script>var page_version="1.0.8"</script>-->

<script> 

$(document).ready(function(){
	
})

	
$('.data-sending').keydown(function(e){
	remove_message();
	switch(e.which){
		case 13 :
		apply();
		return false;
	}
});

</script>

<script>
$('.input-simple-date').datepicker({ 
		autoclose: true ,
		format:'dd.mm.yyyy',
 })

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
	$('#name').attr('disabled',true);
}


function simpan(){
	
	var data = get_dataSending('form-a');
	
	
	send_data = ybs_dataSending(data);

	var a = new ybsRequest();
	a.process('<?php echo $link_save?>',send_data,'POST');
	a.onAfterSuccess = function(){
			cancel();
	}
	a.onBeforeFailed = function(){
			cancel();
	}
}


</script>

