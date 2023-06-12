<?php echo _css('datatables,icheck')?>
<style>
	table#table-detail.dataTable tbody tr:hover {
	  background-color: #d9d9dd;
	}
</style>
<div class="row">
<div class="col-sm-12 col-lg-12">
<div style="font-size:12px">


<div class="callout callout-ybs-primary shadow">
						<h4>Petunjuk:</h4>
						<textarea id="text-code-petunjuk" class="form-control bg-dark text-white" rows="3" readonly></textarea>
						
</div>
					  
					  







</div>

</div>
<form id="form-a">

<div class="col-sm-12 col-lg-12">
<div style="font-size:12px">


<div class="callout callout-ybs-danger shadow">
				<h4>STEP 1.</h4>
				<h4>Pilih table</h4>
				<div class="form-group"> 
				<br>	
					<label class="form-label">Pilih Table data base</label> 
					<select id="select-table-db" name='table_name' class="form-control data-sending select2 focus-color" style="width:100%"> 
					<option value="none">--pilih table--</option> 
					<?php foreach($table_list as $val){?>
						 <option value="<?php echo $val?>"><?php echo $val?></option> 
					<?php }?>
					</select> 
				</div> 	
				<br>
				<div class="form-group">
				<label class="form-label">Folder Name</label>
				<input type="text" class="form-control data-sending focus-color" id="general-folder" name="general_folder" placeholder="">
				</div>
				
				<div class="form-group">
				<label class="form-label">File Name</label>
				<input type="text" class="form-control data-sending focus-color" id="general-file-name" name="general_file_name" placeholder="">
				<br>
				<b><a href="javascript:void(0)" style="color:blue" class="label-link-form" id="label-link-form" name="link"  value="" target="_blank">Output URL : -</a></b>
				<br><br>
			
				 <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> 
					pastikan output url belum di gunakan '404 Page Not Found'..<br>
					proses generate akan mereplace semua file jika memiliki nama yang sama
				
				</div>
					  
					  
</div>





</div>

</div>





<div class="col-sm-12 col-lg-12">
<div style="font-size:12px">


<div class="callout callout-ybs-primary shadow">
						<h4>STEP 2.</h4>
						<h4>Pilih sistem Form Create-Update & validasi server</h4>
						
				
						note : 
						<li>validasi dilakukan di controller.</li>
						<li>CU :Field di Includekan dalam Form Create-Update</li>
				
						<div class='box-body table-responsive'  id='box-table'>
						
						<table id="table-detail" class="table table-hover table-striped" style="width:150%">
						<thead>
					
							<tr >
							<th>No</th>
							<th></th>
							
							<th>Field Name</th>
							<th>CU</th>
							<th>Data Kembar</th>
							<th>Data Kosong</th>
							<th>Validasi Lainnya</th>
							</tr>

						</thead>
						<tbody >
						
						</tbody>
						</table>

						
						</div>
						
						
</div>
</div>
</div>


<div class="col-sm-12 col-lg-12">
<div style="font-size:12px">
<div class="callout callout-ybs-primary shadow">
						<h4>STEP 3.</h4>
						<h4>Pilih Join Table</h4>

						<span class="tag tag-orange"> NOTE : </span><br>


					
						
							<ul>
								<li>Field Show akan menggantikan view dari Field Name</li>
								<li>Alias Table Join Harus di isi jika menggunakan JOIN Table</li>
								<li>Alias Table Join hanya boleh alfabeth a-z,</li>
								tanpa spasi/karakter lain
							</ul>
					
						
						
						<div class='box-body table-responsive'  id='box-table-join'>

						<table id="table-detail-join" class="table table-hover table-striped" style="width:150%">
						<thead>
					
							<tr >
							<th>No</th>
							<th>Field Name</th>
							<th>Join Table</th>
							<th>Field Show</th>
							<th>Type Input</th>
							<th>Alias Table Join</th>
							</tr>

						</thead>
						<tbody >
						
						</tbody>
						</table>

						
						</div>

						<br>
</div>
</div>
</div>
	

	
						
				  


<div class="col-sm-12 col-lg-12">
<div style="font-size:12px">
 <div class="form-group">
		<button disabled id="btn-apply-next" type="button" class="btn btn-success" onclick="next_process()" ><i class="fa fa-share-alt"></i> Tahap Selanjutnya</button>	
</div>
</div>
</div>







<div class="col-sm-12 col-lg-12 container-next-process" style="display:none">
<div style="font-size:12px">
<div class="callout callout-ybs-primary shadow">
						<h4>STEP 4.</h4>
						<h4>Alias Field Form</h4>

						<span class="tag tag-orange"> NOTE : </span><br>
						<ul>
							<li>Title Alias Form adalah title yang akan di tampilkan pada setiap form</li>
						</ul>
					
						
						
						<div class='box-body table-responsive'  id='box-table-title-alias'>
						
						<table id="table-detail-title-alias" class="table table-hover table-striped" style="width:150%">
						<thead>
					
							<tr >
							<th>No</th>
							<th class="checkbox-header"> </th>
							<th>Field Name</th>
							<th>Alias Field</th>
							<th>Title Alias Form</th>
							</tr>

						</thead>
						<tbody >
						
						</tbody>
						</table>

						
						</div>

						<br>
</div>
</div>
</div>




<div class="col-sm-12 col-lg-12 container-next-process" style="display:none">
<div style="font-size:12px">
<div class="callout callout-ybs-primary shadow">
					<h4>STEP 5.</h4>
					<h4>Tampilkan data CRUD untuk semua user</h4>
					<div class="form-group">
					
				
					<input  checked type="checkbox" id="select-crud-show" name="crud_show" class="data-sending" value='on'>&emsp;
						Ya,Tampilkan
					<br><br>
					<ul>
						<li>YA  	= data bersifat public dapat di lihat/update/hapus oleh user yang memiliki otorisasi yang sama</li>
						<li>TIDAK   = data bersifat private hanya user yg melakukan input yang dapat melihat/update/hapus.</li>
					
					</ul>
	
					
		</div>
						
</div>
</div>
</div>





<div class="col-sm-12 col-lg-12 container-next-process" style="display:none">
<div style="font-size:12px">
<div class="callout callout-ybs-primary shadow">
					<h4>STEP 6.</h4>
					<h4>Methode Server Side</h4>
					
						<input checked type="checkbox" id="select-server-side" name="server_side" class="data-sending" value='on'>
						
						&emsp; Ya,Gunakan
					<br>
					<ul>
						<li>YA  	= untuk table yang memiliki / diprediksi akan memiliki jumlah data yang besar > 1000 row</li>
						<li>TIDAK   = untuk table dengan data yang kecil, 1000 row.</li>
					
					</ul>

						<span class="text-red">WARNING !!</span><br>
						<span class="text-red">SERVER-SIDE harus digunakan untuk table dengan row > 1000, jika tidak di gunakan akan terjadi error. </span>
					
						
</div>
</div>
</div>



<div class="col-sm-12 col-lg-12 container-next-process" style="display:none">
<div style="font-size:12px">
<div class="callout callout-ybs-primary shadow">
					<h4>STEP 7. (OPTIONAL)</h4>
					<h4>Create View Controller Model</h4>
					
					<input disabled checked type="checkbox" id="create_model"   value='off'>
					<label for="create_model" > Create Model</label>			
					
					<br>
					<input checked type="checkbox" id="create_controller" name="create_controller"  value='on'>
						<label for="create_controller" > Create Controller</label>		
					<br>
						<ul>
							<li><input checked 	class="opt_create_controller"  type="radio" id="opt_create_controller_def" name="opt_create_controller[]" value="default"> Default</li>
							<li><input 			class="opt_create_controller"  type="radio" id="opt_create_controller_blank" name="opt_create_controller[]" value="blank"> Blank Page</li>
						</ul>
					
					
					<input checked type="checkbox" id="create_view" name="create_view" value='on'>
					<label for="create_view" > Create View</label>
					<br>
						<ul>
							<li><input checked 	 class="opt_create_view" type="radio" id="opt_create_view_def" 	name="opt_create_view[]" value="default"> Default</li>
							<li><input 			 class="opt_create_view" type="radio" id="opt_create_view_blank" name="opt_create_view[]" value="blank"> Blank Page</li>
						</ul>
					<br>
					
					
					<h4>Create API</h4><label class="form-label text-danger" style="font-size:10px"> ** not support for type upload file</label>
					<div class="form-group">
					<label class="form-label">End Point Name</label>
					
					<input type="text" class="form-control data-sending focus-color input-alfa" id="end_point" name="end_point" placeholder="">
					</div>
					<br>
				    <b><a href="javascript:void(0)" style="color:blue" class="label-link-api" id="label-link-api"   value="" target="_blank">Output URL : -</a></b>
					<br>
					<br>
					<br>
					
						
</div>
</div>
</div>


<div class="col-sm-12 col-lg-12 container-next-process" style="display:none">
<div style="font-size:12px">
<div class="callout callout-ybs-primary shadow">
					<h4>STEP 8.</h4>
					<h4>Approve & Generate</h4>
					
					<div class="form-group">
					<button id="btn-apply" type="button" class="btn btn-primary" onclick="apply()" ><i class="fe fe-check"></i> Setuju</button>	
					<button disabled="" onclick="generate_form()" id="btn-save" type="button" class="btn btn-success"><i class="fa fa-american-sign-language-interpreting"></i> Generate CRUD</button>	
					<button disabled="" id="btn-cancel" type="button" class="btn btn-primary" onclick="disable_button(true)">Batal</button>
					</div>
						 
				
					
					<br>
					<br>
					<b><a href="javascript:void(0)" class="form-label label-link-form label-link-form" style="color:blue" name="link"  value="" target="_blank">Output URL : -</a><b><br>
					<a href="<?php echo $link_registrasi_url?>" class="btn btn-info form-label" target="_blank">Open Registrasi URL</a>
					<a href="<?php echo $link_create_menu?>" class="btn btn-success form-label" target="_blank">Buat Menu</a>

					
						
</div>
</div>
</div>











</form>
</div>
<?php echo _js('datatables,icheck')?>





<script>



<?php 
// General Variable, Agar dapat di gunakan pada semua fungsi
?>
var table_join,table_detail,table_detail_alias;
var data_parent,row_process;


$(document).ready(function(){

	$("#select-crud-show").checkboxpicker();
	$("#select-server-side").checkboxpicker();
	$('#select-table-db').select2(); 
	
	
	
	$('#create_controller').change(function(){
		if($('#create_controller').val()=='off'){
			$('#create_controller').val('on');
			$('#opt_create_controller_def').attr("disabled",false);
			$('#opt_create_controller_blank').attr("disabled",false);
			
			$('#create_view').val('on');
			$('#create_view').prop("checked",true);
			$('#opt_create_view_def').attr("disabled",false);
			$('#opt_create_view_blank').attr("disabled",false);
		}else{
			$('#create_controller').val('off');
			$('#opt_create_controller_def').attr("disabled",true);
			$('#opt_create_controller_blank').attr("disabled",true);
			
			$('#create_view').val('off');
			$('#create_view').prop("checked",false);
			$('#opt_create_view_def').attr("disabled",true);
			$('#opt_create_view_blank').attr("disabled",true);
		}
	})
	
	
	$('#create_view').change(function(){
		// if($('#create_controller').val()=='off'){
			// $('#create_view').val('off');
			// $('#create_view').prop("checked",false);
			// return;
		// }
		
		if($('#create_view').val()=='off'){
			$('#create_view').val('on');
			$('#create_view').prop("checked",true);
			$('#opt_create_view_def').attr("disabled",false);
			$('#opt_create_view_blank').attr("disabled",false);
		}else{
			$('#create_view').val('off');
			$('#create_view').prop("checked",false);
			$('#opt_create_view_def').attr("disabled",true);
			$('#opt_create_view_blank').attr("disabled",true);
		}
		

		
	})
	
	$('.opt_create_controller').change(function(){
		if($("#opt_create_controller_blank").prop("checked")==true){
			$("#opt_create_view_def").prop("checked",false);
			$("#opt_create_view_blank").prop("checked",true);
		}
	})
	
	$('.opt_create_view').change(function(){
		if($("#opt_create_controller_blank").prop("checked")==true){
			$("#opt_create_view_def").prop("checked",false);
			$("#opt_create_view_blank").prop("checked",true);
		}
	})
	
	
	
	
	
	
	<?php
		// Fungsi Toogle Switch
		// "on"  untuk penanda crud public
		// "off" untuk penanda crud private
	?>
	$('#select-crud-show').change(function(){
		if($('#select-crud-show').val()=='off'){
			$('#select-crud-show').val('on');
		}else{
			$('#select-crud-show').val('off');
		}
		
	})
	
	
	

	$('#select-server-side').change(function(){
		if($('#select-server-side').val()=='off'){
			$('#select-server-side').val('on');
		}else{
			$('#select-server-side').val('off');
		}
		
	})
	



	$("#end_point").keyup(function(e){
		let v = $(this).val();
		if(v=="" || v==null ){
			$("#label-link-api").text("Output URL : -" );
		}else{
			v = v.toLowerCase();
			v = v.charAt(0).toUpperCase() + v.slice(1);
			$("#label-link-api").text("Output URL : <?= site_url() . 'api' ?>/" + v );
		}
		
		
		
	});
	
	
});


$('#select-table-db').change(function(){
	
	<?php 
		
		// * data_parent = "";
		// * mereset data_parent..
		// * data_parent merupakan variable public dan 
		// * digunakan pada function refresh_table_join,
		// * tepatnya pada datatables->createdRow..
		// * nilai data_parent harus di reset ketika refresh_table_join di panggil,
		// * jika tidak maka data lama yang akan di gunakan..ini menyebabkan konflik.
		// *
		// * "data_parent" di isi saat pemanggilan fungsi get_field_select_table,
		// * tepatnya pada add row table join.
		// * Fungsi utama data_parent adalah sebagai 
		// * penanda ketika row join akan  dihapus.
	?>
	
	
	data_parent = '';
	


	if($(this).val()!=="none" && $(this).val()!==""){
		table_detail = $('#table-detail').DataTable();
		table_detail.clear().draw();
		table_detail.destroy();
		
		table_join= $('#table-detail-join').DataTable();
		table_join.clear().draw();
		table_join.destroy();
		
		$('#general-folder').val($(this).val());
		$('#general-file-name').val($(this).val());
		$('#general-folder').change();
		refresh_table();
		refresh_table_join();
		
		disable_next_process(false);
		show_next_process(false);
		
	}else{
		try{
			table_detail.clear().draw();
			table_detail.destroy();
			
			table_join.clear().draw();
			table_join.destroy();
			
			disable_next_process(true);
			show_next_process(false);
			
			$('#btn-save').attr('disabled',true);
			$('#btn-cancel').attr('disabled',true);
			$('#btn-apply').attr('disabled',false);
			
			$('#general-folder').val('');
			$('#general-file-name').val('');
			$('#general-folder').change();
		}catch(error){
			
		}
		

		
	}
	
});


$('#table-detail-join').on('change','td .alias-table-join , .select-show-join',function(e){
		disable_next_process(false);
		show_next_process(false);
});	

$('#table-detail-join').on('keydown','td .alias-table-join',function(e){
		disable_next_process(false);
		show_next_process(false);
		
		var key = e.keyCode;
		return ((key >=65 && key <=90) || key ==8 || key == 37 || key ==39 || key==189 || key==102 || key==100 || (key >=48 && key <=57) );	
		
});

$('#general-folder, #general-file-name').keydown(function(e){
	var key = e.keyCode;
	return ((key >=65 && key <=90) || key ==8 || key == 37 || key ==39 || key==189 || key==102 || key==100 || (key >=48 && key <=57) );	
});	

$('#general-folder, #general-file-name').keyup(function(e){
	
	var folder_name = $('#general-folder').val();
	var file_name	= $('#general-file-name').val();
	var link="";
	if(file_name=="" || folder_name ==""){
		link = '';
	}else{
		link = "<?php echo site_url() ?>" +folder_name.toLowerCase()  + '/'+ ucfirst(file_name.toLowerCase());
	}
	set_output_url(link);	
});

$('#general-folder, #general-file-name').change(function(e){
	var folder_name = $('#general-folder').val();
	var file_name	= $('#general-file-name').val();
	var link="";
	if(file_name=="" || folder_name ==""){
		link = '';
	}else{
		link = "<?php echo site_url() ?>" + folder_name.toLowerCase()  + '/'+ ucfirst(file_name.toLowerCase());
	}
	set_output_url(link);	
});	





$('#table-detail-join').on('change','td .select-join',function(e){

	data_parent = '';
	row_process = '';
	
	
	disable_next_process(false);
 	show_next_process(false);
	
	
	var tr 			= $(this).closest('tr');
	row_process 	= $(tr).attr('data-row');

	var parent 		= $(tr).attr('data-child');

	reset_child_row(parent);
	$(tr).attr('data-child',null);
	

	var table_name  = $(this).val();
	if(table_name==$('#select-table-db').val()){
		$(this).val('none');
		show_error_message('Opps..belum support join table sendiri !!');
	}else{
		get_field_select_table(table_name,row_process);
		$('#alias-table-join-'+row_process).attr('name','atj['+row_process+'_-_'+table_name+']');

	}
												
});

$('#table-detail-join').on('change','td .alias-table-join',function(e){
	var tr 			= $(this).closest('tr');
	row_process 	= $(tr).attr('data-row');
	mychilds 		= $(tr).attr('data-child');
	alias_table		= $(this).val();
	
	if(mychilds ==null){
		return;
	}
	
	mychild = mychilds.split('_');
	$.each(mychild,function(k,v){
		var c = $('.ybs-rows-click[data-parent="'+v+'"] td .select-join');
		$.each(c,function(x,y){
			Nname  =$(y).attr('name').replace("]","_-_"+alias_table + "]");
			new_name = Nname.replace(".","____");
			//var new_name = $(y).attr('name')+'_-_'+alias_table;
			$(y).attr('name',new_name);
		})
	});
	
	
});	




$('#table-detail-title-alias').on('keydown','td .alias-field , .alias-form',function(e){
	disable_button(true);
	var key = e.keyCode;

	return ((key >=65 && key <=90) || key ==8 || key == 37 || key ==39 || key==189 || key==102 || key==100 || (key >=48 && key <=57) );	
});	



function disable_next_process(b){

	if(b==true){
		$('#btn-apply-next').attr('disabled',true);
	}else{
		$('#btn-apply-next').attr('disabled',false);
	}
}

function show_next_process(b){
	if(b==true){
		$('.container-next-process').css({'display':'block'});
	}else{
		$('.container-next-process').css({'display':'none'});
		$('#btn-cancel').click();
	}
}


function next_process(){

	var t  = $('.alias-table-join');
	var tx  = $('.alias-table-join');
	var complite = true;
	if($('#general-folder').val()==""){
		$('#general-folder').focus();
		show_error_message('Opps..nama folder tidak boleh kosong !');
		return false;
	}
	
	if($('#general-file-name').val()==""){
		$('#general-file-name').focus();
		show_error_message('Opps..nama file tidak boleh kosong !');
		return false;
	}
	
	
	
	<?php
	// * Looping input alias-table-join
	// * $.each menggunakan variable pembantu complite dan is_double,
	// * sebagai penanda break looping..
	// * karena fungsi return false pada jquery hanya menghentikan loop,
	// * tanpa keluar dr function parent
	?>

	var rr = 0;
	$.each(t,function(k,v){
		
		
		var disabled = $(v).attr('disabled');
		if(!disabled){
			
		
			if($(v).val()==''){
				$(v).focus();
				complite = false;
				show_error_message('Alias Table tidak boleh kosong');
				return false;
			}
			
			var x = 0;
			var is_double=false;
			$.each(tx,function(y,z){
				var dsb = $(z).attr('disabled');
				if(!dsb){
					if($(v).val()==$(z).val()){
						x++;
					}
					
					if(x>1){
						$(z).focus();
						complite = false;
						show_error_message('Alias Table tidak boleh kembar');
						is_double = true;
						return false;
					}
					
				}	
				
			});
			
			if(is_double){
				return false;
			}
	
		}
		rr++;
	});
	
	


	
	if(complite){
		show_next_process(true);
		disable_next_process(true);
		get_title_alias('');
	}

}

function reset_child_row(parent){
	
	if(parent ==null){
		return;
	}
	
	var sp = parent.split('_');
	$.each(sp,function(k,vp){
		
		
		var childrens	= $('.ybs-rows-click[data-parent="'+vp+'"]');
		
		$.each(childrens,function(k,v){

			var childs = $(v).attr('data-child');

			if(childs == null){
				table_join.rows($(v)).remove().draw();
			}else{
				reset_child_row(childs);
				
				
				table_join.rows($(v)).remove().draw();
			}
		});
	});
	
}


function set_output_url(link){
	if(link==''){
		link= 'javascript:void(0)';
		$('.label-link-form').text("Output URL : - ");
	}else{
		$('.label-link-form').text("Output URL : " + link);
	}

	$('.label-link-form').attr('href',link);
}




</script>

<script> 
 	//$('#select-table-db').selectize({}); 
</script>


<script>



function get_title_alias(row){

	var t 	= $('.select-join');
	var al  = $('.alias-table-join'); 
	
	var b 	=	[];
	var alt = 	[];
	
	b.push($('#select-table-db').val());
	
	var x = 0;
	$.each(t,function(key,value){
		if($(value).val() !=='none'){
			b.push($(value).val()+'___'+$(al[x]).val());
		}
		
		x++;
	});
	

	var c = get_json_format('table_name',b);
	send_data = ybs_dataSending([c]);

	var a = new ybsRequest();
	a.process("<?php echo $link_get_title_alias?>",send_data);
	a.onSuccess = function(data){
		var table_alias= $('#table-detail-title-alias').DataTable();
		table_alias.clear().draw();
		table_alias.destroy();
		
		refresh_table_title_alias(data.message);
	}
	
	a.onAfterFailed = function(){
		if(row !== ''){
			$('#select-join-'+row).val('none');
			$('#select-show-join-'+row+' option').remove();
			var opt='<option value="none">--Pilih Field--</option>';
			$('#select-show-join-'+row).append(opt);
		}
	}
	

};

function refresh_table(){
	var d = $('#select-table-db').ybs_json();
	if(d=='none'){
		return;
	}
	send_data  = ybs_dtSending([d]);
	table_detail = $('#table-detail').DataTable({
				ajax				:	{	url: "<?php echo $link_get_field_table; ?>" ,
											contentType: "application/json",
											type: "GET",
											data : function ( d ){
												d.data_ajax = send_data;
											},
											dataSrc: "message",
											
											<?php //DISABLE CLIENT SIDE ?>
											dataFilter: function(response){
															var a = JSON.parse(response);
														
															if(a.elementid > 1000){
																$("#select-server-side").attr("disabled",true);
																$("#select-server-side").val("on");
																$("#select-server-side").prop('checked', true);
																$("#select-server-side").toggleClass("custom-disabled");
														
															}else{
																$("#select-server-side").attr("disabled",false);
																$("#select-server-side").removeClass("custom-disabled");
															}
															return response;
											},	
										},
							
				 
				columns				:	[	{data:null,width:"5%"},
											{data:null,width:"5%",
												render: function ( data, type, row ) {
														if ( type === 'display' ) {
															 var konfirm=row.name;
															 return '<input type="checkbox" class="checkbox flat-red dt-select2" value="'+row.id+"-"+konfirm+"  "+'">';
														}
														
														return data;
												},
											},
											
											
											{data: "name"},
											{data:null,width:"80px",
												render: function ( data, type, row ) {
														if ( type === 'display' ) {
															 var konfirm=row.name;
															
															 var opt  =  '<option value="0">TIDAK</option> \n' +
																		 '<option selected value="1">YA</option> \n' ;
															 let disable= "";
															 if(row.name=="id"){
																 opt  =  '<option  selected value="0">TIDAK</option> \n' +
																		 '<option  value="1">YA</option> \n' ;
																		 disable="disabled";
															 }	 
															 
															 var select = '<select '+disable+'  name="ifcu['+row.name+']" class="form-control data-sending focus-color" > \n ' + 
																			opt +
																			'</select>';
																			
															return select;			 
														}
														
														return data;
												},
											},
											
											{data:null,
												render : function(data,type,row){
													if(type==='display'){
														
														var disabled = '';
														var opt  =  '<option value="0">Cegah</option> \n' +
																	'<option selected value="1">Izinkan</option> \n' ;
																	
														if(row.primary_key=='1'){
															disabled = 'disabled';
															opt  =  '<option selected value="0">Cegah</option> \n' +
																	'<option  value="1">Izinkan</option> \n' ;
														}
														if(row.name == 'user_input'){
															disabled = 'disabled';
														}
														
														
														
														var select = '<select '+ disabled +'  name="dr['+row.name+']" class="form-control data-sending focus-color" > \n ' + 
																	  opt +
																	 '</select>';
														return select;
													
													}			
													return data;
												},
											
											
											
											},
											{data:null,
												render : function(data,type,row){
													if(type==='display'){
														
														var disabled = '';
														if(row.primary_key=='1'){
															disabled = 'disabled';
														}
														if(row.name == 'user_input'){
															disabled = 'disabled';
														}
														var select = '<input type="hidden" name="field[]" value="'+row.name+'" > \n' +  
																	 '<select '+ disabled +'  name="dk['+row.name+']" class="form-control data-sending  focus-color" > \n ' + 
																	 '<option value="0">Cegah</option> \n' +
																	 '<option value="1">Izinkan</option> \n' +
																	 '</select>';
														return select;
													
													}			
													return data;
												},
											
											
											
											},
											{data:null,
												render : function(data,type,row){
													if(type==='display'){
														
														var disabled = '';
														if(row.primary_key=='1'){
															disabled = 'disabled';
														}
														if(row.name == 'user_input'){
															disabled = 'disabled';
														}
														var select = '<select '+ disabled +'   name="otherValidation['+row.name+']" class="form-control data-sending focus-color select2 selectValidation"  multiple="multiple" style="width:100%"> \n ' + 
																	
																		 '<option value="alpha">Hanya Huruf (a-z)</option> \n' +
																		 '<option value="number">Hanya Angka (0-9)</option> \n' +
																		// '<option value="alpha_number">Hanya Huruf & Angka (a-z,0-9)</option> \n' +
																		 '<option value="email">Format EMAIL</option> \n' +
																		 '<option value="max:10">MAX:10</option> \n' +
																		 '<option value="max:20">MAX:20</option> \n' +
																		 '<option value="max:50">MAX:50</option> \n' +
																		 '<option value="max:100">MAX:100</option> \n' +
																		 '<option value="max:199">MAX:199</option> \n' +
																		 '<option value="max:255">MAX:255</option> \n' +
																		 '<option value="min:4">MIN:4</option> \n' +
																		 '<option value="min:6">MIN:6</option> \n' +
																		 '<option value="min:8">MIN:8</option> \n' +
																		 '<option value="min:12">MIN:12</option> \n' +
																	 '</select>';
														return select;
													
													}			
													return data;
												},
											
											
											
											},
											
											
										],
				
				
				columnDefs			:	[ 
											
											{"searchable": false,"orderable": false,"targets": 0} ,
								
											
											{"searchable": false,"orderable": false,"targets": 1} ,
							
										],
							
				order				: 	[[ 1, 'asc' ]],
			
				
										
				createdRow			: 	function ( row, data, index ) {
											$(row).addClass('cursor-pointer');
											$(row).addClass('ybs-rows-click');
											
											
										},
				
											
				drawCallback		: 	function() {
											$('.dt-select2').iCheck({
												checkboxClass: 'icheckbox_flat-green',
											});
										
											$(".select2").select2();
										},
				
				
				scrollY 			:	"300px",
				scrollCollapse		:	false,
				scrollX 			:	true,
				paging				: 	true,
				lengthChange		: 	false,
				lengthMenu			: 	[[ -1], [ "All"]],
				searching			: 	false,
				ordering			: 	true,
				info				: 	true,
				autoWidth			: 	false,
				responsive			: 	false,

			});
			
		
			table_detail.on( 'draw.dt', function () {
			var PageInfo = $('#table-detail').DataTable().page.info();
				 table_detail.column(0, { page: 'current' }).nodes().each( function (cell, i) {
					 var num = i + 1 + PageInfo.start;
					cell.innerHTML = '<small>' + num + '</small>';
				} );
			} );

}

function refresh_table_join(){
	var color_random = get_random_color();
	var d = $('#select-table-db').ybs_json();
	
	send_data  = ybs_dtSending([d]);
	table_join = $('#table-detail-join').DataTable({
				ajax				:	{	url: "<?php echo $link_get_field_table_join; ?>" ,
											contentType: "application/json",
											type: "GET",
											data : function ( d ){
												d.data_ajax = send_data;
											},
											dataSrc: "message",
										},
							
				 
				columns				:	[	{data:null,width:"5%"},
											{data: "name"},
											{data:null,
												render : function(data,type,row,meta){
													if(type==='display'){
														var disabled ='';
														if(row.primary_key=='1'){
															disabled = 'disabled';
														}
														
														if(row.name == 'user_input'){
															disabled = '';
														}
														var select = '<select '+disabled+' id="select-join-'+meta.row+'" name="sj['+row.name+']" data-row="'+meta.row+'" class="form-control data-sending select2 focus-color select-join" style="width:100%"> \n ' + 
																	 '<option value="none">--Pilih Table--</option> \n' +
																	  <?php foreach($table_list as $val){?>
																			 '<option value="<?php echo $val?>"><?php echo $val?></option> \n' + 
																	  <?php }?>																	 
																	 '</select>';
																	 
																		
														return select;
													
													}			
													return data;
												},
											
											
											
											},
								
											{data:null,
												render : function(data,type,row,meta){
													if(type==='display'){
														var disabled ='';
														var a = row.name.split('.');
														
														if(row.primary_key=='1'|| a.length > 1){
															disabled = 'disabled';
														}
														if(row.name == 'user_input'){
															disabled = 'disabled';
														}
														
														var select = '<select '+disabled+' id="select-show-join-'+meta.row+'" data-row="'+meta.row+'" name="ssj___'+row.name+'" class="form-control data-sending custom-select focus-color select-show-join" > \n ' + 
																	  '<option value="none">--Pilih Field--</option> \n' +
																	 '</select>';
														return select;
													
													}			
													return data;
												},
											
											},
											{data:null,
												render : function(data,type,row,meta){
													if(type==='display'){
														var disabled ='';
														var a = row.name.split('.');
														
														if(row.primary_key=='1'|| a.length > 1){
															disabled = 'disabled';
														}
														if(row.name == 'user_input'){
															disabled = 'disabled';
														}
														var select = '<select '+disabled+' id="select-type-input-'+meta.row+'" data-row="'+meta.row+'" name="sti___'+row.name+'" class="form-control data-sending select2 focus-color select-type-input" style="width:100%"> \n ' + 
																	  '<option value="text">Text</option> \n' +
																	  '<option value="textarea"> Text Area </option> \n' +
																	  '<option value="password"> Text Password </option> \n' +
																	  '<option value="number"> Text Format Money </option> \n' +
																	  '<option value="summernote"> Text Editor Summernote </option> \n' +
																	  '<option value="combobox"> Combobox </option> \n' +
																	  '<option value="upload-img"> Upload Single Image </option> \n' +
																	  '<option value="upload-doc"> Upload Single Document </option> \n' +
																	  '<option value="upload-video"> Upload Single Video </option> \n' +
																	  '<option value="upload-audio"> Upload Single Sound </option> \n' +
																	  '<option value="upload-all"> Upload Single </option> \n' +
																	  '<option value="dd.mm.yyyy"> Date (01.12.2019) </option> \n' +
																	  '<option value="dd-mm-yyyy"> Date (01-12-2019) </option> \n' +
																	  '<option value="dd/mm/yyyy"> Date (01/12/2019) </option> \n' +
																	  '<option value="dd mm yyyy"> Date (01 12 2019) </option> \n' +
																	  '<option value="d M yyyy">   Date (01 Jan 2020) </option> \n' +
																	  '<option value="unix">   Date UNIXTIME (01.12.2019) </option> \n' +
																	  '<option value="time">  Time (H:i:s) </option> \n' +
																	 '</select>';
														return select;
													
													}			
													return data;
												},
											
											},
											
											{data:null,
												render : function(data,type,row,meta){
													if(type==='display'){
														var input = '<input disabled type="text" id="alias-table-join-'+meta.row+'" name="atj['+meta.row+'_-_'+row.name+']" class="form-control data-sending alias-table-join" value=""></input>';
														return input;
													}			
													return data;
												},
											
											},
											
											
										],
				
				
				columnDefs			:	[ 
											
											{"searchable": false,"orderable": false,"targets": 0} ,
								
											
											// {"searchable": false,"orderable": false,"targets": 1} ,
							
										],
							
				// order				: 	[[ 1, 'asc' ]],
			
				
										
				createdRow			: 	function ( row, data, index ) {
											$(row).addClass('cursor-pointer');
											$(row).addClass('ybs-rows-click');
											
											$(row).attr('data-row',index);
											$(row).attr('data-parent',data_parent);
							
											var c = $('.ybs-rows-click[data-row="'+row_process+'"]').attr('data-child');
											
											if(c==null){
												$('.ybs-rows-click[data-row="'+row_process+'"]').attr('data-child',data_parent);
											}else{
												c = c + '_' + data_parent;
												$('.ybs-rows-click[data-row="'+row_process+'"]').attr('data-child',c);
											}
											
											var a = data.name.split('.');
											if(a.length > 1){
												$(row).addClass(color_random);
											}

										},
				
										
				drawCallback		: 	function() {
											$('.dt-select2').iCheck({
												checkboxClass: 'icheckbox_flat-green',
											});
											$(".select2").select2();
										},
				
				
				scrollY 			:	"300px",
				scrollCollapse		:	false,
				scrollX 			:	true,
				paging				: 	true,
				lengthChange		: 	false,
				lengthMenu			: 	[[ -1], [ "All"]],
				searching			: 	false,
				ordering			: 	true,
				info				: 	true,
				autoWidth			: 	false,
				responsive			: 	false,

			});
			
		
			table_join.on( 'draw.dt', function () {

			var PageInfo = $('#table-detail-join').DataTable().page.info();
				 table_join.column(0, { page: 'current' }).nodes().each( function (cell, i) {
					 var num = i + 1 + PageInfo.start;
					cell.innerHTML = '<small>' + num + '</small>';
				} );
			} );
			
			

}


function refresh_table_title_alias(data_load){

	table_detail_alias = $('#table-detail-title-alias').DataTable({

				data				: data_load, 
				columns				:	[	{data:"nomor",width:"5%"},
											{data:null,width:"5%",
												render: function ( data, type, row ) {
														if ( type === 'display' ) {
															 var konfirm=row.name;
															 var r = '<input type="checkbox" class="checkbox flat-red dt-select2" value="'+row.id+"-"+konfirm+"  "+'">';
															 if(row.alias_field=='id'){
																r = '<input disabled checked type="checkbox" class="checkbox flat-red dt-select2" value="'+row.id+"-"+konfirm+"  "+'">';	
															 }	
															
															 return r;
														}
														
														return data;
												},
											},
											{data: "name"},
											{data:null,
												render : function(data,type,row,meta){
													if(type==='display'){
														var input = '<input disabled type="text" id="af___'+row.name+'" name="af___'+row.name+'" class="form-control data-sending focus-color alias-field" value="'+row.alias_field+'"></input>';
														return input;
													}			
													return data;
												},
											
											},
											
											{data:null,
												render : function(data,type,row,meta){
													if(type==='display'){
														var r = '<input  type="text" id="am___'+row.name+'" name="am___'+row.name+'" class="form-control data-sending focus-color alias-form" value="'+row.alias_field.toString().toUpperCase()+'"></input>';
													
														return r;
													}			
													return data;
												},
											
											},
											
											
										],
				
				
				columnDefs			:	[ 
											
											{"searchable": false,"orderable": false,"targets": 0} ,
								
											
											// {"searchable": false,"orderable": false,"targets": 1} ,
							
										],
							
				// order				: 	[[ 1, 'asc' ]],
			
				
										
				createdRow			: 	function ( row, data, index ) {
											
											if(data.alias_field !=='id'){
												$(row).addClass('cursor-pointer');
												$(row).addClass('ybs-rows-click');
												$(row).addClass('sound-table');
											}	
											
										},
				
											
				drawCallback		: 	function() {
											$('.dt-select2').iCheck({
												checkboxClass: 'icheckbox_flat-green',
											});
											
										},
				
				
				scrollY 			:	"300px",
				scrollCollapse		:	false,
				scrollX 			:	true,
				paging				: 	true,
				lengthChange		: 	false,
				lengthMenu			: 	[[ -1], [ "All"]],
				searching			: 	false,
				ordering			: 	true,
				info				: 	true,
				autoWidth			: 	false,
				responsive			: 	false,

			});
			

			table_detail_alias.on( 'draw.dt', function () {
				
			var PageInfo = $('#table-detail-title-alias').DataTable().page.info();
				 table_detail_alias.column(0, { page: 'current' }).nodes().each( function (cell, i) {
					 var num = i + 1 + PageInfo.start;
					cell.innerHTML = '<small>' + num + '</small>';
				} );
			} );

}


	
function get_field_select_table(table_name,row){

		<?php //prepare data json ?>
		var d = get_json_format('table_name',table_name);
		if(table_name=='none'){
			$('#alias-table-join-'+row).attr('disabled',true);
			$('#alias-table-join-'+row).val('');
			$('#select-type-input-'+row).val('all');
			$('#select-type-input-'+row).attr('disabled',false);
		}
		
		send_data  = ybs_dataSending([d]);
		
		
		<?php //request data field table ?>
		var a  = new ybsRequest();
		a.process( "<?php echo $link_get_field_table_join; ?>" ,send_data);
		
		
		<?php //jika data berhasil di dapat ?>
		a.onSuccess = function(data){
			
			
			<?php //reset select show join ?>
			$('#select-show-join-'+row+' option').remove();
			
			<?php //prepare option select ?>
			var opt='';

			<?php //looping data field from server ?>
			$.each(data.message,function(key,val){
				
				<?php //create option value ?>
				if(val.name !=='id' && val.name !=='user_input' ){
					opt = opt + '<option value="'+table_name+'___'+val.name+'">'+val.name+'</option>';
				}
				
				<?php //enable alias table ?>
				$('#alias-table-join-'+row).attr('disabled',false);
				$('#alias-table-join-'+row).val('');
				
				
				<?php //add row table join 
					  //yang bertipe int dan bukan field id dan user_input*/ ?>
				if(val.name !=='id' && val.name !=='user_input' && val.type=='int'){
					
					var d = new Date();
					data_parent = d.getTime();
					table_join.rows.add([{"name":table_name+'.'+val.name}]);

				}
				
				
		
			});	
			
		
		

			<?php //add option value to select show join ?>
			$('#select-show-join-'+row).append(opt);
			

			<?php //redraw table ?>
			table_join.draw(false);
			$('#select-join-'+row).focus();

			<?php //type input harus combobox ?>
			$('#select-type-input-'+row).val('combobox');
			$('#select-type-input-'+row).attr('disabled',true);
			
			
		};
		a.onFailed = function(){
			$('#select-show-join-'+row+' option').remove();
			var opt='<option value="none">--Pilih Field--</option>';
			$('#select-show-join-'+row).append(opt);
		}
		

}



</script>


<script>
function apply(){
	var fl = $('.alias-field');
	var ff = $('.alias-form');
	var complite 	= true;
	var is_double 	= false; 
	
	
	<?php 
		// * Validasi alias field :
		// * - mencegah data kosong
		// * - mencegah data kembar
	?>
	$.each(fl,function(k,v){
		if($(v).val()==''){
			$(v).focus();
			show_error_message('Opps..tidak boleh kosong !!');
			complite = false;
			return false;
		}
		
		var xx =0;
		$.each(fl,function(kk,vv){
			if($(vv).val()==$(v).val()){
				xx++;
			}
			
			if(xx>1){
				$(vv).focus();
				show_error_message('Opps.."'+$(vv).val()+'" sudah digunakan..tidak boleh sama !!');
				complite = false;
				is_double = true;
				return false;
			}
			
		});
		
		if(is_double){
				return false;
		}
		
	});
	
	if(!complite){
		return false;
	}
	
	<?php
		// * Validasi alias form :
		// * - mencegah data kosong
		// * - mencegah data kembar
	?>
	$.each(ff,function(k,v){
		if($(v).val()==''){
			$(v).focus();
			show_error_message('Opps..tidak boleh kosong !!');
			complite = false;
			return false;
		}
		
		var xx =0;
		$.each(ff,function(kk,vv){
			if($(vv).val()==$(v).val()){
				xx++;
			}
			
			if(xx>1){
				$(vv).focus();
				show_error_message('Opps.."'+$(vv).val()+'" sudah digunakan..tidak boleh sama !!');
				complite = false;
				is_double = true;
				return false;
			}
			
		});
		
		if(is_double){
				return false;
		}
		
	});
	
	
	if(!complite){
		return false;
	}
	
	disable_button(false);
	
}


function generate_form(){
	
	if($('#general-folder').val()==""){
		$('#general-folder').focus();
		show_error_message('Opps..nama folder tidak boleh kosong !');
		return false;
	}
	
	if($('#general-file-name').val()==""){
		$('#general-file-name').focus();
		show_error_message('Opps..nama file tidak boleh kosong !');
		return false;
	}
	
	// var aa = get_dataSending('form-a');
	// send_data = ybs_dataSending(aa);
	send_data = $("#form-a").getForm();
		
	var a = new ybsRequest();
	a.process('<?php echo $link_generate_form?>',send_data,"POST");
	a.onComplite = function(){
		disable_button(true);
	}
	
}

function disable_button(b){
	$('#btn-apply').attr('disabled',!b);
	$('#btn-save').attr('disabled',b);
	$('#btn-cancel').attr('disabled',b);
}



$("#table-detail").on("change",".selectValidation",function(){
	var val = $(this).val();
	var i =[];
	var a=0,n=0,na=0,min=[],max=[];
	$.each(val,function(x,y){
		switch(y){
			case 'alpa' :
			a=1;
			break;
			case 'number' :
			n=1;
			break;
			case 'number-alpa' :
			na=1;
			break;
			default :
				mm = y.split(":");
				if(mm[0]=='min'){
					min.push(y);
				}
				if(mm[0]=='max'){
					max.push(y);
				}
		}
	});
	
	
	
	
	if(a==1 && n ==1){
		var index = val.indexOf('number');
		if (index !== -1) val.splice(index, 1);
		show_error_message("pilih salah satu ! hanya huruf atau hanya angka ?");
		$(this).val(val).trigger("change"); ;
	}
	
	if(a==1 && na ==1){
		var index = val.indexOf('number-alpa');
		if (index !== -1) val.splice(index, 1);
		show_error_message("pilih salah satu ! hanya huruf atau  angka & huruf ?");
		$(this).val(val).trigger("change"); ;
	}
	
	if(n==1 && na ==1){
		var index = val.indexOf('number-alpa');
		if (index !== -1) val.splice(index, 1);
		show_error_message("pilih salah satu ! hanya angka atau hanya angka & huruf ?");
		$(this).val(val).trigger("change"); ;
	}
	
	if(max.length > 1 ){
		var ii = max[1];
		var index = val.indexOf(ii);
		if (index !== -1) val.splice(index, 1);
		show_error_message("pilih salah satu ! tipe max");
		$(this).val(val).trigger("change"); ;
	}
	
	if(min.length > 1 ){
		var ii = min[1];
		var index = val.indexOf(ii);
		if (index !== -1) val.splice(index, 1);
		show_error_message("pilih salah satu ! tipe min");
		$(this).val(val).trigger("change"); ;
	}

	
	
});




</script>




<script>
	var a = '- Table data base harus memiliki : '+
			'- primary key dengan nama field "id" ,  type int or double,    autoincreament\n'+
			'- nama field hanya boleh menggunakan karakter (a-z) dan underscore "_" jangan menggunakan karakter lainnya termasuk spasi \n'+
			'- Table tidak bisa join ke dirinya sendiri \n' +
			'- Table data base yang bersifat private harus memiliki field dengan nama "user_input"';
	$('#text-code-petunjuk').val(a);
</script>