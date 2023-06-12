
<div class="row">
 <div class="col-md-12 col-lg-12">
          <!-- Horizontal Form -->
          <div class="box box-info shadow">
            <div class="box-header with-border">
              <h3 class="box-title">Create Menu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           <form class="form-horizontal" id="form-a">
				<input hidden class="data-sending" id="id" value="<?php echo $id ?>" name="id">
				<div class="box-body">
                <div class="form-group">
					<label class="col-sm-2 control-label">Type Menu</label>

					<div class="col-sm-10">
                    <select  id="select-type-menu" name='is_parent' class="form-control select2 focus-color" >
                        <option value="0" >Menu Utama</option>
						<option value="1" >Sub Menu</option>
                        </select>
					</div>
                </div>
				
				<div class="form-group" id="menu-utama" style="display:none">
					<label class="col-sm-2 control-label">Pilih Menu Utama</label>

					<div class="col-sm-10">
                    <select id="select-menu-parent" name="menu_parent"  class="form-control select2 focus-color"></select>
					</div>
				</div>
				
				<div class="form-group"  >
					<label class="col-sm-2 control-label">Menu</label>

					<div class="col-sm-10">
                     <input type="text" class="form-control focus-color" id="input-nama-menu" name='name' placeholder="Nama menu" value="<?php echo $menu_name?>">
					</div>
				</div>
				
				<div class="form-group"  >
					<label class="col-sm-2 control-label">Icon Menu</label>

					<div class="col-sm-10 ">
                      <?php echo create_select_icon('input-icon-menu');?>
					</div>
				</div>
				
				<div class="form-group"  >
					<label class="col-sm-2 control-label">Pilih URL</label>

					<div class="col-sm-10">
						<select id="select-url" class="form-control select2 focus-color" name='id_form'>
							<option value="1" >--NO LINK-- </option>
							<?php foreach($list_urlform as $key =>$val){ ?>
								<option value="<?php echo $val['id']?>" > " <?php echo $val['form_name']?> "</option>
							<?php }?>
							
						</select>
						<small id='note-link' style="display:none"><p class="text-blue">* note : tidak di  akan jalankan jika <b>"Menu Utama"</b>  memiliki sub menu</p></small>  	
					
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
			<?php for($x=0;$x<30;$x++) echo "<br>";	?>
          </div>
</div>
</div>




<script>

$(document).ready(function(){
	
	_refreshOnResize();

	var icon = '<?php echo $menu_icon?>';
	if(icon==""){
		icon = "#";
	}

	$('#input-icon-menu').val(icon); // Select the option with a value of '1'
	$('#select-type-menu').trigger('change'); // Notify any JS components that the value changed	   
	
	$('#select-menu-parent').select2();
	
	$('#select-url').val("<?php echo $selected_link?>");
	$('#select-url').trigger('change'); 
	
})





function _refreshOnResize(){
	function iformat(icon){
		var orig = icon.element;
		return $('<span><i class="' + $(orig).val() + '"> </i>  &ensp;' + icon.text + '</span>' )
	}
	function ilink(el){
		return $('<span><i class="fe fe-link"> </i>  &ensp;' + el.text + '</span>' )
	}

	$('#input-icon-menu').select2({
		templateSelection : iformat,
		templateResult:iformat,
		allowHtml :true
		
	});
	
	$('#select-url').select2({
		templateSelection : ilink,
		templateResult:ilink,
		allowHtml :true
		
	});


	
	$('#select-type-menu').select2();
	$('#select-menu-parent').select2();
	
}




$('#select-type-menu').ready(function(){
	$('#select-type-menu').val("<?php echo $selected_type?>");	
	$('#select-type-menu').change();
})


$('.data-sending').keydown(function(e){
	remove_message();
	switch(e.which){
		case 13 :
		apply();
		return false;
	}
});
	
$('#select-type-menu').change(function(){
	var x = $('#select-type-menu').val();
	if(x==0){
		$('#select-menu-parent option').remove();
		$('#menu-utama').css({'display':'none'});
		$('#note-link').css('display','block');
	
		
	}else{
		$('#menu-utama').css('display','block');
		$('#note-link').css({'display':'none'});
		get_parent_menu();
	}
});

function get_parent_menu(){
	
	var a = new ybsRequest();
	a.process("<?php echo $link_get_parent_menu?>",'');
	a.onSuccess  = function(data){
		$('#select-menu-parent option').remove();
		var opt;
		var selected_parent = "<?php echo $selected_parent?>";
		$.each(data.message,function(key,val){
			
			if(val.id==selected_parent){
				opt = opt + '<option selected value="'+val.id+'">'+val.name+'</option>'
		    }else{
				opt = opt + '<option value="'+val.id+'">'+val.name+'</option>'
			}
			
			
		});
		
		$('#select-menu-parent').append(opt);
		
	
	}
	
}


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
	if($('#select-type-menu').val()==1 && $('#select-menu-parent').val()==null ){
		show_error_message('Menu Utama belum dipilih');
		play_sound_failed();	
		$('#select-menu-parent').focus();
		return false;
	}
	
	if($('#input-nama-menu').val()=="" ||$('#input-nama-menu').val()==null){
		show_error_message('Nama menu tidak boleh kosong !');
		play_sound_failed();	
		$('#input-nama-menu').focus();
		return false;
	}
	


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
	send_data = $("#form-a").getForm();

	var a = new ybsRequest();
	a.process("<?php echo $link_save?>",send_data,'POST');
	a.onAfterSuccess = function(){
			cancel();
	}
}



</script>