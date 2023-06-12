<div class="row">
 <div class="col-md-12 col-lg-12">
          <!-- Horizontal Form -->
          <div class="box box-info shadow">
            <div class="box-header with-border">
              <h3 class="box-title">Upload File Template</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           <form class="form-horizontal" id="form-a">
				
				<div class="box-body ">
				
						<div class="container">
							<a class="btn  btn-social btn-info shadow" href="<?php echo $link_download_template_user?>" id="btn-create">
							<i class="fa fa-cloud-download"></i> Download Template User
							</a>
						</div>
						<br>
					
						
					  <div class="callout callout-primary ">
						<h4>Ikuti Instruksi Berikut!</h4>

						  <i class="fe fe-check mr-2" aria-hidden="true"></i> <small> Step 1. Download Template User</small><br>
						  <i class="fe fe-check mr-2" aria-hidden="true"></i> <small> Step 2. Isi Table pada Sheet Template</small><br>
						  <i class="fe fe-check mr-2" aria-hidden="true"></i> <small> Step 3. Upload kembali file Template yang telah di isi</small><br>
						  <i class="fe fe-check mr-2" aria-hidden="true"></i> <small> Step 4. Konfirm dan Save</small>
					  </div>
					  
					  <div class="form-group">
							<label class="col-sm-2 control-label">Upload File Template</label>
							
							<div class="col-sm-10">
								<div class="custom-file">
									<input type="file" class="custom-file-input " id="inputfile" name="inputfile" >
									<label class="custom-file-label form-control">Choose file</label>
								</div>
							</div>
						</div>
			
				

				
					<div class="callout text-green" id="information-success">
				   
					 
					</div>
					
					<div class="callout  text-red" id="information-failed">
					
					 
					</div>

				
					<div class="box-footer">
					<div class=" pull-right">
					<a  href="<?php echo $link_back?>" id="btn-close" class="btn btn-primary shadow">Tutup</a>
					</div> 
					</div>
				
              
              </div>
            
            </form>
          </div>
</div>
</div>




<script>
$(document).ready(function(){
	$('#inputfile').change(function(){
		$("#box-upload").addClass("active");
		upload_template();
	
	});
	$("#information-success").hide();
	$("#information-failed").hide();
	
	
});

function upload_template(){
			

				var form_el = $('#form-a')[0] ;
			
				var form_data = new FormData(form_el);
				form_data.append("<?php echo $this->security->get_csrf_token_name() ?>",get_sec_val());
		
				$.ajax({	type:'POST',
							enctype:'multipart/form-data',
							url:"<?php echo $link_upload_template ?>",
							data: form_data,
							
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
										$("#box-upload").removeClass("active");
										
										$("#information-failed").hide();
										
										$("#information-success").show();
										$("#information-success").empty();
										$("#information-success").append("<i class=\"fe fe-check mr-2\" aria-hidden=\"true\"> </i> <small> Information :</small><br>");
										$("#information-success").append(a.message);			

										$('.custom-file-label').text(a.original_name);
										
										$('#inputfile').val("");
									}else{
										show_error_message(a.message);
										play_sound_failed();
										$("#box-upload").removeClass("active");
									
										$("#information-success").hide();
										
										$("#information-failed").show();
										$("#information-failed").empty();
										$("#information-failed").append("<i class=\"fe fe-alert-triangle mr-2\" aria-hidden=\"true\"> </i> <small> Report :</small><br>");
										$("#information-failed").append(a.message);	
										
										$('.custom-file-label').text('Choose file');
										$('#inputfile').val("");
		
								
																			
									}		

	
						
							},
							error:function(XMLHttpRequest,textStatus,errorThrown){
								
							},

				});
				
			}

</script>
<script>
function save(link){
	$("#box-upload").addClass("active");
	var a = new ybsRequest();
	a.process(link);
	a.onAfterSuccess  = function(data){
		$("#box-upload").removeClass("active");
		$("#information-failed").hide();

		
		$("#information-success").show();
		$("#information-success").empty();
		$("#information-success").append("<i class=\"fe fe-check mr-2\" aria-hidden=\"true\"> </i> <small> Information :</small><br>");
		$("#information-success").append(data.message);								
										
	};
	a.onAfterFailed = function(data){
		$("#box-upload").removeClass("active");
		$("#information-success").hide();
		
		$("#information-failed").show();
		$("#information-failed").empty();
		$("#information-failed").append("<i class=\"fe fe-alert-triangle mr-2\" aria-hidden=\"true\"> </i> <small> Report :</small><br>");
		$("#information-failed").append(data.message);	
	}
}
</script>

