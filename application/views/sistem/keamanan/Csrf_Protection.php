<div class="row">
<div class="col-sm-12 col-lg-12">
<div style="font-size:12px">


<div class="callout callout-ybs-primary shadow">
						<h4>Informasi</h4>
						Untuk Menambah Keamanan Sistem 
						<br>
						anda dapat  mengaktifkan CSRF PROTECTION, <br>
						<br>
						CSRF PROTECTION berfungsi mencegah percobaan request dari luar sistem.
						<br>
						<br>
						<span style="color:red">
							<i class="fe fe-alert-triangle" aria-hidden="true"></i> NOTE :<br>
							jika anda mengaktifkan CSRF PROTECTION, maka anda tidak dapat membuka 2 tab halaman sekaligus</b>, 
						</span>
						<br>
						<br>
						
					
						
						<div class="box-footer">
						
						 <div class="form-group pull-left" id="form-a">
                        <label> AKTIFKAN </label><br>
                          <input <?php echo $select_reset ?> type="checkbox" id="select-reset" name="reset" class="data-sending" value="<?php echo $value?>">
						</div>
					
						<div class=" pull-right">
						<a  href="<?php echo $link_back?>" id="btn-close" class="btn btn-primary shadow">Tutup</a>
						</div> 
						</div>
						
</div>
					  
					  






</div>

</div>
</div>



<script>
$(document).ready(function(){
	$("#select-reset").checkboxpicker();
})




$('#select-reset').change(function(){

		if($('#select-reset').val()=='off'){
			$('#select-reset').val('on');
			change_error_report();
		}else{
			$('#select-reset').val('off');
			change_error_report();
		}
})

function change_error_report(){
	var a = new ybsRequest();
	var aa = get_dataSending('form-a');
    
	var b = get_json_format('token',data_token);
	
	aa.push(b);
	send_data = ybs_dataSending(aa);
    a.process("<?php echo $link_change?>",send_data,'POST');
}

</script>