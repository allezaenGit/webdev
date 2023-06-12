<div class="row">
<div class="col-sm-12 col-lg-12">
<div style="font-size:12px">


<div class="callout callout-ybs-info shadow">
						<h4>Allow Access File</h4>
						<form class="form-horizontal" id="form-a">
							 <div class="form-group">
								<label class="col-sm-2 control-label">Pilih controller</label>

								<div class="col-sm-10">
									<select name="fc" id="fc" class="form-control select2 data-sending"> 
												
										<?php foreach($file_controller as $val){
												$selected = "";$text = $val;
												if(strtolower($selected_file)==strtolower($val)){
													$selected = "selected";
												}
												if($val=="Auth"){
													$text = $val . " (Default Login Form)";
												}
												echo  "<option $selected value=\"$val\">$text</option>";
											   
											  }
										?>
									</select> 
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Pilih Function</label>

								<div class="col-sm-10">
									<select name="function" id="function" class="form-control select2 data-sending"> 
									</select> 
								</div>
							</div>
						
								
						
						<br>
						<br>

						
					    <div class="box-footer">
						  <div class=" pull-right">
							<button id="btn-apply" type="button" class="btn btn-primary shadow"><i class="fe fe-check"></i> Setuju</button>	
							<button disabled id="btn-save" type="button" class="btn btn-primary shadow"><i class="fe fe-save"></i> Simpan</button>	
							<button disabled id="btn-cancel" type="button" class="btn btn-primary shadow">Batal</button>
							<a  href="<?php echo $link_back?>" id="btn-close" class="btn btn-primary shadow">Tutup</a>
						   </div>
					  </div>
							 
					
						
						
						</form>
						
</div>
					  
					  






</div>

</div>
</div>









<script>

function _refreshOnResize(){
	$('#fc').select2();
}

var select_file;

$('#fc').change(function(){
	get_function();
});



$(document).ready(function(){
	_refreshOnResize();
	get_function();
});

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


function get_function(){
	
	$('#function option').remove();
	
	var d = get_json_format('file',$('#fc').val());
	
	send_data  = ybs_dataSending([d]);
	
	var a = new ybsRequest();
	a.process("<?php echo $link_getfunction ?>",send_data,'GET');
	
	a.onSuccess = function(data){
		 var ha="";
	
		 $.each(data.message,function(key,val){
			 var selected = "<?php echo $selected_function?>";
			 
			 if(val.trim()==selected.trim()){
				 ha =ha + '<option selected value="'+val+'" >'+val+'</option>';
			 }else{
				 ha =ha + '<option value="'+val+'" >'+val+'</option>';
			 }
			
			
		})
		$('#function').append(ha);
		
		
		
		
		
		
	}
}

function simpan(){
	var data = get_dataSending('form-a');
	send_data = ybs_dataSending(data);
	var a = new ybsRequest();
	a.process("<?php echo $link_setrouter?>",send_data,"POST");
	cancel();
}


</script>
