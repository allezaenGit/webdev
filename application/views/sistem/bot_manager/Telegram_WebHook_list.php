<?= $menu?>

<style>
	table#table-detail.dataTable tbody tr:hover {
	  background-color: #d9d9dd;
	}
</style>
<?php echo _css('datatables,icheck')?>
<div class="row">

<div class="col-md-12 col-lg-12">
<div class="panel panel-lte">
<div class="panel-heading lte-heading-primary">Daftar Service</div>
<div class="panel-body">
			<br>
		<a class="btn  btn-social btn-primary shadow" href="<?php echo $link_create?>" id="btn-create">
                <i class="fas fa-plus-circle"></i> Tambah Data
        </a>
		<a href="#" class="btn btn-social btn-danger shadow" id="btn-delete">
                <i class="fas fa-trash"></i> Hapus Data
        </a>
		<br>
		<hr class="devider">
		<br>
		
		<div class='box-body table-responsive '  id='box-table'>
		<small style="font-size:13px !important">
		<table id="table-detail" class="table table-striped table-hover table-bordered" style="width:150%">
		<thead>
	
           <tr >
			<th class="nst">No</th>
			<th class="nst"><label><input type='checkbox'  id='general_check'> </label></th>
			<?php foreach($title->table_column as $key=>$val){ ?>
				<th><?php echo $val ?></th>
			<?php } ?>
			<th class="nst">Action</th>
            </tr>

        </thead>
		<tbody>
		
		</tbody>
		</table>
		<div hidden>
			<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger"   id="button_delete_single" ></button>
		</div>
		</small>
		</div>
		
		<div class='col-md-12 col-xl-12'>
	
		<div class='form-group'>
				
				
			<input type='checkbox' id='hscroll-table' value='off' data-group-cls="btn-group-sm"> HScroll
						
						
					
		</div>
		</div>
		
</div>
</div>
</div>




</div>



<?php echo _js('datatables,icheck')?>







<script>var page_version="1.0.12"</script>

<script>
var resp_table=true;
var table_detail;
$(document).ready(function(){
	$('#hscroll-table').checkboxpicker();
	$('#hscroll-table').prop('checked',true);
		set_scroll_table();
	
	$('#hscroll-table').change(function(){
		set_scroll_table();
	});
	
});

function set_scroll_table(){
	resp_table=!$('#hscroll-table').prop('checked');
	refresh_table();
}	

<?php //MEMBUAT INPUT SEARCH  ?>
$('#table-detail thead tr').clone(true).appendTo( '#table-detail thead' );
$('#table-detail thead tr:eq(1) th').each( function (i) {
	if($(this).hasClass('nst')){
		$(this).html('');
	}else{
		var bb =  '<input hidden  type="text" placeholder=" filter by.." class="column-search" data_index="'+i+'"/>' ;
		$(this).html(bb);
	}
} );
					
	

function refresh_table(value_search){
	$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };	
	if(!resp_table){
		$('.column-search').removeAttr('hidden');
	}else{
		$('.column-search').attr('hidden','hidden');
	}	

				
table_detail = $('#table-detail').dataTable({
				destroy				: true,
				processing			: true,
				serverSide			: true,				
				language			: {processing : '<div class="dimmer active"><div class="loader"></div><br><br><br>mohon tunggu...</div>'},
				ajax				:	{	url: "<?php echo $link_refresh_table; ?>" ,
											type: "POST",
											dataSrc: "message",	
										
											data : function ( d ){
													if(value_search!==undefined){
														d.search = {value:value_search,regex:false};
													}
													<?php //MENGIRIM TOKEN CSRF ?>
													d.<?php echo $this->security->get_csrf_token_name() ?> = get_sec_val();
													
												},
												
											<?php //MENGESET ULANG TOKEN CSRF ?>
											dataFilter: function(response){
															set_sec_val(response);
															return response;
												},										},
							
				 
				columns				:	[	{data:null,width:"5%"},
											{data:null,width:"5%",
												<?php //MEMBUAT CHECKBOX ?>
												render: function ( data, type, row ) {
														if ( type === 'display' ) {
															 var konfirm='';
															 return '<input type="checkbox" class="checkbox flat-red dt-select2" value="'+row.id+"-"+konfirm+"  "+'">';
														}
														
														return data;
												},
											},
											
											<?php foreach($title->table_column as $alias_field=>$val){?>
												{data:"<?php echo $alias_field ?>" ,		},
											<?php }?>

											{data:null,width:"15%",
												<?php //MENAMBAHKAN BUTTON ACTION ?>
												render: function ( data, type, row ) {
														if ( type === 'display' ) {
															var konfirm='';
															var btn_group='	<div class="box" id="loader-button" style="border:none;background:none">';
															var icn = 'fa fa-play';
															var icn_title = 'Start Service';
															var icn_col = 'text-green';
															if(row.start==1){
																icn = 'fa fa-pause';
																icn_title = 'Stop Service';
																icn_col ='text-gray';
															}
															
															btn_group = btn_group + '<small><button type="button" class="btn btn-default btn-sm shadow '+icn_col+'"  title="'+icn_title+'" onclick=\' start_stop("'+row.id+'") \'  ><i class="'+icn+'"></i></button></small>'; 
															btn_group = btn_group + '<a href="<?php echo $link_send_command?>/'+row.id+'" class="btn btn-default text-blue btn-sm shadow" title="Send Command to Bot"><i class="fa fa-cloud-upload"></i></a>'; 
															btn_group = btn_group + '<a href="<?php echo $link_update?>/'+row.id+'" class="btn btn-default text-green btn-sm shadow" title="update"><i class="fas fa-pen"></i></a>'; 
															btn_group = btn_group + '<small><button type="button" class="btn btn-default text-red btn-sm shadow"  id="btn_pre_delete" onclick=\' ybsDeleteTable("'+row.id+"-"+konfirm+'","<?php echo $link_delete ?>","#table-detail") \'  ><i class="fas fa-trash"></i></button></small>';
															btn_group = btn_group + '</div>';
															return btn_group;
														}	
														return data;	
												}	
											},
											
											
										],
				
				
				columnDefs			:	[ 
											<?php //SETTING UNTUK KOLOM 0 (NOMOR URUT) ?>
											{"searchable": false,"orderable": false,"targets": 0, "className":"dt-center"} ,
								
											<?php //SETTING UNTUK KOLOM 1 (CHECK) ?>
											{"searchable": false,"orderable": false,"targets": 1} ,
							
										],
							
				order				: 	[[ 1, 'asc' ]],
			
				
										<?php //MENAMBAHKAN CLASS PADA ROW ?>
				rowCallback			: 	function(row, data, iDisplayIndex) {
											$(row).addClass('cursor-pointer');
											$(row).addClass('ybs-rows-click');
					
											var info = this.fnPagingInfo();
											var page = info.iPage;
											var length = info.iLength;
											var index = page * length + (iDisplayIndex + 1);
											$('td:eq(0)', row).html(index);
										},							
				
										<?php //MEMANGGIL ULANG FUNGSI SAAT TABLE DI DRAW ULANG	 ?>
				drawCallback		: 	function() {
											$('.dt-select2').iCheck({
												checkboxClass: 'icheckbox_flat-green',
											});
											
										},
				dom					: 'Blfrtip',
				
				buttons				: ['copy','excel'],			
				
				initComplete		: 	function() {
											var api = this.api();
											if(value_search!==undefined){
												api.search(value_search).draw();	
											}
											
											$('#table-detail_filter input')
													.off('.DT')
													.on('keyup.DT', function(e) {
														if (e.keyCode == 13) {
															value_search =this.value;
															api.search(this.value).draw();
														}
											});									
											
											$('.column-search').on('keyup', function(e) {
												if (e.keyCode == 13) {
														var i = $(this).attr('data_index');
														api.columns(i).search(this.value).draw();
												}
											});									},						
				
				scrollY 			:	"300px",
				scrollCollapse		:	false,
				scrollX 			:	true,
				paging				: 	true,
				lengthChange		: 	true,
				lengthMenu			: 	[[10,50,100], [10,50,100]],
				searching			: 	true,
				ordering			: 	true,
				info				: 	true,
				autoWidth			: 	false,
				responsive			: 	resp_table,
				orderCellsTop		:   true,

			});	
}


$('#btn-delete').click(function(){
	ybsDeleteTableChecked('<?php echo $link_delete?>','#table-detail');
});
</script>

<script>
function start_stop(id){
	start_loading_in("#loader-button");
	var a = new ybsRequest();
	$("#loader-form").addClass("active");
	a.process("<?php echo $link_start_stop ?>/"+id);
	a.onAfterSuccess =  function ($data){
		
	}
	a.onComplite = function(){
		stop_loading_in("#loader-button");
	}
	
}
</script>