
<?php echo _css("editor-summernote") ?>

<div class="row">
<div class="col-md-8 col-lg-8">
<!-- Horizontal Form -->
<div class="box box-info shadow " id="box-loading" >
<div class="box-header with-border">
<h3 class="box-title">Form</h3>
</div>

<form class="form-horizontal" id="form-a" method="POST" action="<?= $link_save?>">
<div class="box-body">
<input hidden class="data-sending" id="id" name="id" value="<?php if(isset($id))echo $id?>">


					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo $title->sys_filesistem_file ?></label>
						<div class="col-sm-10">
						  <div id="all-container" name="file"></div>
						</div>
					</div>
					<!-- end box -->
			
					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo $title->sys_filesistem_keterangan ?></label>

						<div class="col-sm-10">
							<input type="text" class="form-control data-sending focus-color"  id="keterangan" name="keterangan" placeholder="<?php echo $title->general->desc_required ?>" value="<?php if(isset($data)) echo $data->keterangan ?>" >
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
<div class="col-md-4 col-lg-4">
<div class="col-lg-12">
  <div id="storage"></div>
</div>
</div>



</div>


<script>
$(document).ready(function(){
    $('#storage').storageView({
		data:"<?= @$data->file ?>",
        showTitle : ['name','date','size','path'],
        showBtn : ['download','remove','copyURL'],
        itemSM: 1,
        itemMD:4,
        itemLG:2,
        
        relation:{
          table:'sample_upload',
          field:'image,doc',
          actionRow:'update',
        },
    });
});
</script>



<?php echo _js('datepicker,editor-summernote,ybs-upload,select2Chain')?>

<script>var page_version="1.0.12"</script>

<script> 
function _refreshOnResize(){
	
	
}

$(document).ready(function(){
	
$(".select2").select2();	
 
$("#all-container").singleUpload({
    type    	: "all", //image | document | video | audio | all
    pathDest  	: "sistem/file" ,
    data 		: "<?= @$data->file ?>",
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

