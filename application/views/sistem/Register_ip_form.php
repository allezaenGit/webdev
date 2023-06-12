
<div class="row">
<div class="col-md-12 col-lg-12">
<!-- Horizontal Form -->
<div class="box box-info shadow">
<div class="box-header with-border">
<h3 class="box-title"><?php echo $title->sys_maintenance_ip_ip_address ?></h3>
</div>
            <!-- /.box-header -->
            <!-- form start -->
           <form class="form-horizontal" id="form-a">
				<input hidden class='data-sending' id='id' value='<?php if(isset($id))echo $id?>'>
				<div class="box-body">
				
                <div class="form-group">
					<label class="col-sm-2 control-label"><?php echo $title->sys_maintenance_ip_ip_address ?></label>

					<div class="col-sm-10">
						<input type='text' class='form-control data-sending focus-color'  id='ip_address' name='ip_address' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->ip_address ?>' >
					</div>
                </div>
				
				
				
				
			
              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class=" pull-right">
					<button id='btn-apply' type='button' class='btn btn-primary shadow'><i class='fe fe-check'></i> <?php echo $title->general->button_apply ?></button>	
					<button disabled='' id='btn-save' type='button' class='btn btn-primary shadow'><i class="fe fe-save"></i> <?php echo $title->general->button_save ?></button>	
					<button disabled='' id='btn-cancel' type='button' class='btn btn-primary shadow'> <?php echo $title->general->button_cancel ?></button>
					<a href='<?php echo $link_back ?>' id='btn-close' class='btn btn-primary shadow'> <?php echo $title->general->button_close ?></a>
				   </div>
              </div>
              <!-- /.box-footer -->
            </form>
</div>
</div>
</div>


<script>var page_version="1.0.12"</script>

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
	<?php
	/* mengambil data yang akan di kirim dari form-a */
	/* dalam bentuk array json tanpa penutup.. */
	/* memungkinkan penambahan data dengan cara push */
	/* ex. data.push */
	?>
	var data = get_dataSending('form-a');
	
	<?php
	/* complite json format */
	/* ybs_dataSending(array); */
	?>
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

