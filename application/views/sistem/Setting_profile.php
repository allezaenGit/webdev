<div class="row">
<div class="col-md-12 col-xl-12">

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Reset Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form-a" class="form-horizontal">
              <div class="box-body">
                <div class="form-group" style="display:block">
                  <label for="inputEmail3" class="col-sm-2 control-label">Enter Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control data-sending focus-color" id="old-pass" name='old_pass' placeholder="Password" value="">
                  </div>
                </div>
                <div class="form-group  input-pass" style="display:none">
                  <label for="inputPassword3" class="col-sm-2 control-label">New Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control data-sending focus-color" id="new-pass" name='new_pass' placeholder="Password" value="">
                  </div>
                </div>
				
				<div class="form-group input-pass" style="display:none">
                  <label for="inputPassword3" class="col-sm-2 control-label">Konfirm Password</label>

                  <div class="col-sm-10">
                     <input type="password" class="form-control  data-sending focus-color" id="re-pass" name='re_pass' placeholder="Password" value="">
                  </div>
                </div>
            
              </div>
              <!-- /.box-body -->
              <div class="box-footer input-pass" style="display:none">
                <button id="btn-apply" type="button" class="btn btn-primary shadow" onclick="simpan()"><i class="fe fe-check"></i> Setuju</button>	
				<button disabled id="btn-save" type="button" class="btn btn-primary shadow"><i class="fe fe-save"></i> Simpan</button>	
				<button id="btn-cancel" type="button" class="btn btn-primary shadow">Batal</button>
              </div>
              <!-- /.box-footer -->
            </form>
</div>



</div>
</div>


<script>
$('#old-pass').keydown(function(e){
	switch(e.which){
		case 13:
		pass_check();
		break;
	}
});


$('#new-pass, #re-pass').keydown(function(e){
	switch(e.which){
		case 13:
		simpan();
		break;
	}
	
});

$('#btn-cancel').click(function(){
	batal();
});

function batal(){
	$('#old-pass').attr('disabled',false);
	$('.input-pass').css('display','none');
	$('#re-pass').val('');
	$('#new-pass').val('');
	
	$('#re-pass').removeClass('data-sending');
	$('#new-pass').removeClass('data-sending');
	$('#old-pass').addClass('data-sending');
	
	$('#old-pass').val('');
	$('#old-pass').focus();
}

function pass_check(){
	var send_data = $("#form-a").getForm();
	var a = new ybsRequest();
	a.process("<?php echo $link_check?>",send_data,'POST');
	a.onSuccess = function(data){
		$('#old-pass').attr('disabled',true);
		$('.input-pass').css('display','block');
		
		$('#re-pass').addClass('data-sending');
		$('#new-pass').addClass('data-sending');
		$('#old-pass').removeClass('data-sending');

		$('#new-pass').focus();
	};
	
	a.onFailed  = function(){
		batal();
	};
}

function simpan(){
 var send_data = $("#form-a").getForm();
 var a = new ybsRequest();
 a.process("<?php echo $link_update?>",send_data,'POST'); 
 a.onAfterSuccess = function(){
	 batal();
 }
 
}



</script>