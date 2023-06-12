<div class="row">
<div class="col-sm-12 col-lg-12">
<div style="font-size:12px">


<div class="callout callout-ybs-primary shadow">
						<h4>Informasi</h4>
						Untuk menampilkan detail error pada browser
						<br>
						anda dapat  mengenable Error Report, <br>
						digunakan hanya untuk memudahkan dalam penelusuran error.<br>
						<br>
						<br>
						<span style="color:red">
							<i class="fe fe-alert-triangle" aria-hidden="true"></i> NOTE :<br>
							Untuk Keamanan <b>Disable Error Report</b> , ketika dalam kondisi <b>online / production</b>,<br><br>
							Error yang sampai ke End User berisiko tinggi dalam sistem keamanan, <br>
							informasi tersebut dapat digunakan untuk menemukan celah dalam sebuah sistem.
						</span>
						<br>
						<br>
						
					
						
						<div class="box-footer">
						
						 <div class="form-group pull-left" id="form-a">
                        <label> Enable Error Reporting </label><br>
							<input <?php echo $select_reset ?> type="checkbox" id="select-reset" name="ereport" class="data-sending" value="<?php echo $value?>" data-group-cls="btn-group-sm">
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
    a.process("<?php echo $link_change_report?>",send_data,'POST');
}

</script>