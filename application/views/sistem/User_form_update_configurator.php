<div class="row">
 <div class="col-md-12 col-lg-12">
          <!-- Horizontal Form -->
          <div class="box box-info shadow">
            <div class="box-header with-border">
              <h3 class="box-title">Create User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           <form class="form-horizontal" id="form-a">
				<input hidden class="data-sending" id="id" value="<?php echo $id ?>" name="id">
				<div class="box-body">
                <div class="form-group">
					<label class="col-sm-2 control-label">Nama Pengguna</label>
					
					<div class="col-sm-10">
						<input type="text" class="form-control data-sending focus-color" id="input-nama-user" name='nmuser' placeholder="Nama pengguna" value="<?php echo $nmuser;?>">
					</div>
                </div>
				
				
				
				<div class="form-group" >
					<label class="col-sm-2 control-label">Reset Password</label>

					<div class="col-sm-10">
						 <input type="checkbox" id="select-reset" class="data-sending" value="off">
					</div>
				</div>
				
				<div class="form-group input-pass" style="display:none">
					<label class="col-sm-2 control-label">Password</label>
					
					<div class="col-sm-10">
						  <input type="password" class="form-control data-sending focus-color" id="input-pass-user" name='passuser' placeholder="Password" value="">
					</div>
                </div>
				
				<div class="form-group input-pass" style="display:none">
					<label class="col-sm-2 control-label">Konfirm Password</label>
					
					<div class="col-sm-10">
						 <input type="password" class="form-control focus-color" id="re-pass" name="re_pass" placeholder="Password" value="">
					</div>
                </div>
				
				
				
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Upload Foto</label>
					
					<div class="col-sm-10">
						<div class="custom-file">
							<input type="file" class="custom-file-input " id="inputfile" name="inputfile" >
							<label class="custom-file-label form-control">Choose file</label>
							
						</div>
					</div>
                </div>
				
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Preview Foto</label>
					
					<div class="col-sm-10">
						<div class="row">
									<div class="text-center">
								<div id="img-container">
								<img style="cursor:pointer; width:150px; max-width:150px; max-height:150px;" 
								  class="card-profile-img profile-user-img ybs-image-slider data-sending" 
								  name="picture" data-image="<?php echo $nmuser?>" 
								  src="<?php echo $picture ?>" id="img-detail">
											
								</div> 
								 <h3 class=""><?php echo $nmpicture?></h3>
								 <p>
								 <?php echo $nmlevel?>
								 </p>
							</div>
						</div>
					</div>
                </div>
				

				
              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class=" pull-right">
					<button id="btn-apply" type="button" class="btn btn-primary shadow"><i class="fe fe-check"></i> Setuju</button>	
					<button disabled id="btn-save" type="button" class="btn btn-primary shadow"><i class="fe fe-save"></i> Simpan</button>	
					<button disabled id="btn-cancel" type="button" class="btn btn-primary shadow">Batal</button>
					<a  href="<?php echo $link_back?>" id="btn-close" class="btn btn-primary shadow">Tutup</a>
				   </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
</div>
</div>




<script>



$(document).ready(function(){
	$("#select-reset").checkboxpicker();
	$('#inputfile').change(function(){
		prepare_picture();
	});
	$('.profile-user-img').val('default.png');
	
	$('#select-reset').change(function(){
		if($('#select-reset').val()=='off'){
			$('#select-reset').val('on');
			$('.input-pass').css({'display':'block'});
			$('#re-pass').val('');
			$('#input-pass-user').val('');
			$('#input-pass-user').focus();
			
		}else{
			$('#select-reset').val('off');
			$('.input-pass').css({'display':'none'});
			$('#input-nama-user').focus();
		}
		
	})
	
});


$('.data-sending ,#re-pass').keydown(function(e){
	switch(e.which){
		case 13:
		$('#btn-apply').click();
		return false;
	}
})
	



$('#btn-apply').click(function(){
	
	if($('#input-nama-user').val()=="" ||$('#input-nama-user').val()==null){
		show_error_message('Nama pengguna tidak boleh kosong !');
		play_sound_failed();	
		$('#input-nama-user').focus();
		return;
	}
	
	if($('#select-reset').val()=="off"){
		
	
	}else{
		if($('#input-pass-user').val()=="" ||$('#input-pass-user').val()==null){
			show_error_message('Password tidak boleh kosong !');
			play_sound_failed();	
			$('#input-pass-user').focus();
			return;
		}
		if($('#re-pass').val()=="" ||$('#re-pass').val()==null){
			show_error_message('Masukkan Ulang Password anda !');
			play_sound_failed();	
			$('#re-pass').focus();
			return;
		}
		if($('#input-pass-user').val() !== $('#re-pass').val()){
			show_error_message('Password tidak sama !');
			play_sound_failed();	
			$('#input-pass-user').focus();
			return;
		}
	}
	

	
	
	
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
	$('#inputfile').attr('disabled',true);
	$('#select-reset').attr('disabled',true);
	$('.form-control').attr('disabled',true);
	$('#btn-apply').attr('disabled',true);
	$('#btn-cancel').attr('disabled',false);
	$('#btn-save').attr('disabled',false);
	$('#btn-save').focus();
	
}
function cancel(){
	$('#inputfile').attr('disabled',false);
	$('#select-reset').attr('disabled',false);
	$('.form-control').attr('disabled',false);
	$('#btn-cancel').attr('disabled',true);
	$('#btn-save').attr('disabled',true);
	$('#btn-apply').attr('disabled',false);
	
	
	
}

function simpan(){
	send_data = ybs_dataSending(get_dataSending('form-a'));

	var a = new ybsRequest();
	a.process("<?php echo $link_save?>",send_data,'POST');
	a.onAfterSuccess = function(){
			cancel();
	}
	a.onFailed =function(data){
		cancel();
		$(data.elementid).focus();
		show_error_message(data.message);
	}
}


</script>


<script>
		function prepare_picture(){
			

				var form_el = $('#form-a')[0];
				
			
				var form_data = new FormData(form_el);
				form_data.append("<?php echo $this->security->get_csrf_token_name() ?>",get_sec_val());
				
				$.ajax({	type:'POST',
							enctype:'multipart/form-data',
							url:"<?php echo $link_prepare_picture ?>",
							data:form_data,
							processData:false,
							contentType:false,
							cache:false,
			
							success:function(data){
									var a =JSON.parse(data);
									sec_val = a.sec_val;
									var b = sec_val.split("=");
									var c = b[1].replace("&","");		
									$("#sec").val(c);
									
									if(a.success!=="false"){
										var img_new =" <?php echo base_url()?>"+a.message;
										$('.profile-user-img').attr('src',img_new);
										$('.profile-user-img').val(a.message);
										$('.custom-file-label').text(a.original_name);
									}else{
									
										show_error_message(a.message);
										play_sound_failed();
										$('.custom-file-label').text('Choose file');
										$('.profile-user-img').val('default.png');
										$('.profile-user-img').attr('src',"<?php echo $picture;?>");
																			
									}		

	
						
							},
							error:function(XMLHttpRequest,textStatus,errorThrown){
								
							},

				});
				
			}
		</script>