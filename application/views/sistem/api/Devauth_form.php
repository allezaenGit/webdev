
<?php echo _css("datatables,icheck,editor-summernote") ?>

<div class="row">
<div class="col-md-12 col-lg-12">
<!-- Horizontal Form -->
<div class="box box-info shadow " id="box-loading" >
<div class="box-header with-border">
<h3 class="box-title">Form</h3>
</div>

<form class="form-horizontal" id="form-a" method="post" action="<?= $link_save ?>">
<div class="box-body">
<input hidden class="data-sending" id="id" name="id" value="<?php if(isset($id))echo $id?>">


					<div class="form-group">
						<label class="col-sm-2 control-label">ID-DEV</label>

						<div class="col-sm-10">
							<input disabled type="text" class="form-control "  placeholder="<?php echo $title->general->desc_required ?>" value="<?=  $data[0]->id_dev ?>" >
						</div>
					</div>

			
			
					<div class="form-group">
						<label class="col-sm-2 control-label">REGISTER NAME</label>

						<div class="col-sm-10">
							<input disabled type="text" class="form-control "  placeholder="<?php echo $title->general->desc_required ?>" value="<?= $data[0]->name ?>" >
						</div>
					</div>

					
			
					<div class="form-group">
						<label class="col-sm-2 control-label">EMAIL</label>

						<div class="col-sm-10">
							<input disabled type="text" class="form-control" placeholder="<?php echo $title->general->desc_required ?>" value="<?= $data[0]->email ?>" >
						</div>
					</div>
					
					
					<hr class="devider">
					<br>
					
					
					
					
					<div class="form-group">
						<label class="col-sm-2 control-label">PILIH OTORISASI</label>

						<div class="col-sm-10">
							<div class="row">
						<div class='box-body table-responsive'  id='box-table'>
						<small>
						<table id="table-detail-url" class="table ybs-table table-striped table-hover table-bordered" style="width:150%">
						<thead>
					
							<tr >
							<th>No</th>
							<th class="checkbox-header"></th>
							<th>API</th>
							<th>Method </th>
							<th>End Point</th>
							
							
							</tr>

						</thead>
						<tbody>
						
						</tbody>
						</table>

						</small>
						</div>
						</div>
						</div>
					</div>
					
					
					
			
							 
	
	
	<div class="box-footer">
                <div class=" pull-right">
					<button id='btn-apply' type='button' class='btn btn-primary shadow'><i class='fe fe-check'></i> <?php echo $title->general->button_apply ?></button>	
					<button disabled='' id='btn-save' type='button' class='btn btn-primary shadow'><i class="fe fe-save"></i> Tambah Data</button>	
					<button disabled='' id='btn-cancel' type='button' class='btn btn-primary shadow'> <?php echo $title->general->button_cancel ?></button>
					<a href='<?php echo $link_back ?>' id='btn-close' class='btn btn-primary shadow'> <?php echo $title->general->button_close ?></a>
				</div>
    </div>
	

</div>
</form>
</div>
</div>
</div>





<?php echo _js('datatables,icheck,datepicker,editor-summernote,ybs-upload')?>

<script>var page_version="1.0.12"</script>

<script> 
function _refreshOnResize(){
	$(".select2").select2();
}

$(document).ready(function(){
	
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


$(document).ready(function(){
	refresh_table_url();
});


function refresh_table_url(){

	$('#table-detail-url').DataTable({
				data				: <?= $listUrl ?>,
				 
				columns				:	[	{data:'no',width:"5%"},
											{data:null,width:"5%",
												render: function ( data, type, row ) {
														if ( type === 'display' ) {
															 var konfirm="";
															 return '<input type="checkbox" class="checkbox flat-red dt-select2"  '+ row.checked+' name="'+row.file+'[]" value="'+row.origUrl+'">';
														}
														
														return data;
												},
											},
											
											
											{data: "file",width:"10%"
											
											},
											{data: "method",width:"5%"

											},
											{data: "url",

											},
											

											
	
										],
				
				
				columnDefs			:	[ 
											//SETTING UNTUK KOLOM 0 (NOMOR URUT)
											{"searchable": false,"orderable": false,"targets": 0} ,
								
											//SETTING UNTUK KOLOM 1 (CHECK)
											{"searchable": false,"orderable": false,"targets": 1} ,
							
										],
							
				order				: 	[[ 1, 'asc' ]],
			
				
										//MENAMBAHKAN CLASS PADA ROW
				createdRow			: 	function ( row, data, index ) {
											$(row).addClass('cursor-pointer');
											$(row).addClass('ybs-rows-click');
										},
				
										//MEMANGGIL ULANG FUNGSI SAAT TABLE DI DRAW ULANG	
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
				searching			: 	true,
				ordering			: 	true,
				info				: 	true,
				autoWidth			: 	false,
				responsive			: 	false,
				

			});
			
			//membuat nomor urut
			var t = $('#table-detail-url').DataTable();
			t.on( 'draw.dt', function () {
			var PageInfo = $('#table-detail-url').DataTable().page.info();
				 t.column(0, { page: 'current' }).nodes().each( function (cell, i) {
					 var num = i + 1 + PageInfo.start;
					cell.innerHTML = '<small>' + num + '</small>';
				} );
			} );
			

}

function simpan(){
	start_loading_in('#box-loading');
	
	$("#form-a").ybsRequest({
		onComplite : function(){
				stop_loading_in('#box-loading');
		}		
	})
}


</script>

