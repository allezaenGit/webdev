<?php
class Template_form extends CI_Model {

function __construct(){
      parent::__construct();
}

function create_view_form($ff,$pv,$gf,$select_show_join,$field_tabel,$table,$type_input_field,$page_version,$ifcu){
$string = "
<?php echo _css(\"datepicker,editor-summernote\") ?>

<div class=\"row\">
<div class=\"col-md-12 col-lg-12\">
<!-- Horizontal Form -->
<div class=\"box box-info shadow \" id=\"box-loading\" >
<div class=\"box-header with-border\">
<h3 class=\"box-title\">Form</h3>
</div>

<form class=\"form-horizontal\" id=\"form-a\" method=\"POST\" action=\"<?= \$link_save?>\">
<div class=\"box-body\">
<input hidden class=\"data-sending\" id=\"id\" name=\"id\" value=\"<?php if(isset(\$id))echo \$id?>\">

";

foreach($field_tabel as $field){
if($field !=='id' && $field !=='user_input'){
	switch($type_input_field[$field]){
			
			case 'combobox':
			$join =explode('___',$select_show_join[$field]);
			$table_join  = $join[0];
			$field_show  = $join[1];
				if($ifcu[$field]==0)break;
			$string .= "
							
					<div class=\"form-group\"> 
							<label class=\"col-sm-2 control-label\"><?php echo \$title->$table"."_$field ?></label>
							
							<div class=\"col-sm-10\">
							
							<?php \$v = @\$data->$field; ?>
							<select   id='$field' name='$field' class='form-control select2' style='width:100%' 
								 data-table='$table_join' 
								 data-show='$field_show'  
								 data-selected='<?= \$v ?>'
								 data-where=''
								 data-foreign=''
								 data-hasone=''
								  
								>
							</select>
							
							
							</div>
					</div>
						
			";
			break;
			case 'dd.mm.yyyy' :
			case 'dd-mm-yyyy':
			case 'dd/mm/yyyy':
			case 'dd mm yyyy':
			case 'd M yyyy':
			case 'unix':
				if($ifcu[$field]==0)break;
			$string .="
					<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\"><?php echo \$title->$table"."_$field ?></label>

						<div class=\"col-sm-10\">
							<div class=\"input-group date\">
							<div class=\"input-group-addon\">
								<i class=\"fa fa-calendar\"></i>
							</div>
								<input readonly type=\"text\" class=\"form-control data-sending input-simple-date pull-right\" placeholder=\"<?php echo \$title->general->desc_required ?>\" id=\"$field\" name=\"$field\" value=\"<?php if(isset(\$data)) echo \$data->$field?>\">
								
							</div>
						</div>
					</div>	
			
					
			";
			
			break;
			case 'password' :
				if($ifcu[$field]==0)break;
			$string .="
					<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\"><?php echo \$title->$table"."_$field ?></label>

						<div class=\"col-sm-10\">
							<input type=\"password\" class=\"form-control data-sending focus-color\" id=\"$field\" name=\"$field\" placeholder=\"<?php echo \$title->general->desc_required ?>\" value=\"<?php if(isset(\$data)) echo \$data->$field ?>\">
						</div>
					</div>	
			
			";
			break;
			case 'number' :
				if($ifcu[$field]==0)break;
			$string .="
					<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\"><?php echo \$title->$table"."_$field ?></label>

						<div class=\"col-sm-10\">
							<input type=\"text\" class=\"form-control data-sending focus-color ybs-input-number\" id=\"$field\" name=\"$field\" placeholder=\"<?php echo \$title->general->desc_required ?>\" value=\"<?php if(isset(\$data)) echo number_format(\$data->$field,2) ?>\" autocomplete=\"off\">
						</div>
					</div>	
			";
			break;
			
			case 'textarea' :
				if($ifcu[$field]==0)break;
			$string .="
					<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\"><?php echo \$title->$table"."_$field ?></label>

						<div class=\"col-sm-10\">
							<textarea class=\"form-control data-sending focus-color\" id=\"$field\" name=\"$field\" placeholder=\"<?php echo \$title->general->desc_required ?>\" autocomplete=\"off\"><?php if(isset(\$data)) echo \$data->$field ?></textarea>
						</div>
					</div>	
			
			
			
			";
			
			break;
			
			case 'summernote' :
				if($ifcu[$field]==0)break;
			$string .="
					<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\"><?php echo \$title->$table"."_$field ?></label>

						<div class=\"col-sm-10\">
							<textarea class=\"form-control data-sending focus-color editor\" id=\"$field\" name=\"$field\" placeholder=\"<?php echo \$title->general->desc_required ?>\" autocomplete=\"off\"><?php if(isset(\$data)) echo \$data->$field ?></textarea>
						</div>
					</div>	
			
			
			
			";
			
			break;
			
			case 'upload-img' :
				if($ifcu[$field]==0)break;
			$string .="
					<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\"><?php echo \$title->$table"."_$field ?></label>
						<div class=\"col-sm-10\">
						  <div id=\"image-container\" name=\"$field\"></div>
						</div>
					</div>
					<!-- end box -->
			";
			break;
			
			case 'upload-doc' :
				if($ifcu[$field]==0)break;
			$string .="
					<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\"><?php echo \$title->$table"."_$field ?></label>
						<div class=\"col-sm-10\">
						  <div id=\"doc-container\" name=\"$field\"></div>
						</div>
					</div>
					<!-- end box -->
			";
			break;
			
			case 'upload-video' :
				if($ifcu[$field]==0)break;
			$string .="
					<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\"><?php echo \$title->$table"."_$field ?></label>
						<div class=\"col-sm-10\">
						  <div id=\"video-container\" name=\"$field\"></div>
						</div>
					</div>
					<!-- end box -->
			";
			break;
			
			case 'upload-audio' :
				if($ifcu[$field]==0)break;
			$string .="
					<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\"><?php echo \$title->$table"."_$field ?></label>
						<div class=\"col-sm-10\">
						  <div id=\"audio-container\" name=\"$field\"></div>
						</div>
					</div>
					<!-- end box -->
			";
			break;
			
			case 'upload-all' :
				if($ifcu[$field]==0)break;
			$string .="
					<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\"><?php echo \$title->$table"."_$field ?></label>
						<div class=\"col-sm-10\">
						  <div id=\"all-container\" name=\"$field\"></div>
						</div>
					</div>
					<!-- end box -->
			";
			break;
			
			
			
			
			case 'alfa':
				if($ifcu[$field]==0)break;
			$string .="
					<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\"><?php echo \$title->$table"."_$field ?></label>

						<div class=\"col-sm-10\">
							<input type=\"text\" class=\"form-control data-sending focus-color input-alfa\"  id=\"$field\" name=\"$field\" placeholder=\"<?php echo \$title->general->desc_required ?>\" value=\"<?php if(isset(\$data)) echo \$data->$field ?>\" >
						</div>
					</div>	
			
			
			";
			break;
			
			case 'alfa_number':
				if($ifcu[$field]==0)break;
			$string .="
					<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\"><?php echo \$title->$table"."_$field ?></label>

						<div class=\"col-sm-10\">
							<input type=\"text\" class=\"form-control data-sending focus-color input-alfa-number\"  id=\"$field\" name=\"$field\" placeholder=\"<?php echo \$title->general->desc_required ?>\" value=\"<?php if(isset(\$data)) echo \$data->$field ?>\" >
						</div>
					</div>
		
			
			";
			break;
			
			case 'time' :
				if($ifcu[$field]==0)break;
				$string .="
					<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\"><?php echo \$title->$table"."_$field ?></label>

						<div class=\"col-sm-10\">
							<div class=\"input-group date\">
							<div class=\"input-group-addon\">
								<i class=\"fa fa-clock-o\"></i>
							</div>
								<input readonly type=\"text\" class=\"form-control data-sending timepicker pull-right\" placeholder=\"<?php echo \$title->general->desc_required ?>\" id=\"$field\" name=\"$field\" value=\"<?php if(isset(\$data)) echo \$data->$field?>\">
								
							</div>
						</div>
					</div>	
			
					
			";
				
				
			break;
			
			
			default :
				if($ifcu[$field]==0)break;
			
			$string .="
					<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\"><?php echo \$title->$table"."_$field ?></label>

						<div class=\"col-sm-10\">
							<input type=\"text\" class=\"form-control data-sending focus-color\"  id=\"$field\" name=\"$field\" placeholder=\"<?php echo \$title->general->desc_required ?>\" value=\"<?php if(isset(\$data)) echo \$data->$field ?>\" >
						</div>
					</div>

			
			";	
	}
}	
};	
	





$string .="				 
	
	
	<div class=\"box-footer\">
                <div class=\" pull-right\">
					<button id='btn-apply' type='button' class='btn btn-primary shadow'><i class='fe fe-check'></i> <?php echo \$title->general->button_apply ?></button>	
					<button disabled='' id='btn-save' type='button' class='btn btn-primary shadow'><i class=\"fe fe-save\"></i> <?php echo \$title->general->button_save ?></button>	
					<button disabled='' id='btn-cancel' type='button' class='btn btn-primary shadow'> <?php echo \$title->general->button_cancel ?></button>
					<a href='<?php echo \$link_back ?>' id='btn-close' class='btn btn-primary shadow'> <?php echo \$title->general->button_close ?></a>
				</div>
    </div>
	

</div>
</form>
<?php for(\$x=0;\$x<30;\$x++) echo \"<br>\";	?>
</div>
</div>
</div>


<?php echo _js('datepicker,editor-summernote,ybs-upload,select2Chain')?>

<script>var page_version=\"".$page_version."\"</script>

<script> 
function _refreshOnResize(){
	
	
}

$(document).ready(function(){
	
$(\".select2\").select2();	
";

foreach($field_tabel as $field){
if($field !=='id' && $field !=='user_input'){
	switch($type_input_field[$field]){
		case 'combobox' :
			if($ifcu[$field]==0)break;
$string .="
$(\"#$field\").chainTo(\"\");	
";
		break;		
		case 'summernote':
			if($ifcu[$field]==0)break;
$string .= " 
$('#$field').summernote({
				height: 300,
});

$(\".form-group.note-form-group\").ready(function(){
	var a = $(\".form-group.note-form-group\").find(\"input\");
	$.each(a,function(x,y){
		id  = y.id;
		if(id.indexOf(\"image\") !=-1){	
			$(this).closest(\"div\").remove();
			
		}
		
	})
});


";		
		break;
		
		case 'upload-img' :
			if($ifcu[$field]==0)break;
$string .=" 
$(\"#image-container\").singleUpload({
    type    : \"image\", //image | document | video | audio | all
    pathDest  : \"my-upload/image\" ,
    data :\"<?= @\$data->$field ?>\",
});";
		break;
		
		case 'upload-doc' :
			if($ifcu[$field]==0)break;
$string .=" 
$(\"#doc-container\").singleUpload({
    type    : \"document\", //image | document | video | audio | all
    pathDest  : \"my-upload/document\" ,
    data :\"<?= @\$data->$field ?>\",
});";
		break;
		
		case 'upload-video' :
			if($ifcu[$field]==0)break;
$string .=" 
$(\"#video-container\").singleUpload({
    type    : \"video\", //image | document | video | audio | all
    pathDest  : \"my-upload/video\" ,
    data :\"<?= @\$data->$field ?>\",
});";
		break;
		
		case 'upload-audio' :
			if($ifcu[$field]==0)break;
$string .=" 
$(\"#audio-container\").singleUpload({
    type    : \"audio\", //image | document | video | audio | all
    pathDest  : \"my-upload/audio\" ,
    data :\"<?= @\$data->$field ?>\",
});";
		break;
		
		case 'upload-all' :
			if($ifcu[$field]==0)break;
$string .=" 
$(\"#all-container\").singleUpload({
    type    : \"all\", //image | document | video | audio | all
    pathDest  : \"my-upload/all\" ,
    data :\"<?= @\$data->$field ?>\",
});";
		break;
		
		
		
		
		
	}	
}
}		

$string .="	
})

	
$('.data-sending').keydown(function(e){
	remove_message();
	switch(e.which){
		case 13 :
		if($(this).is(\"textarea\"))return;
		apply();
		return false;
	}
});

</script>

<script>

";

foreach($field_tabel as $field){
if($field !=='id' && $field !=='user_input'){
switch ($type_input_field[$field]){
	case 'dd.mm.yyyy' :
	case 'dd-mm-yyyy':
	case 'dd/mm/yyyy':
	case 'dd mm yyyy':
	case 'd M yyyy':
		if($ifcu[$field]==0)break;
$string .="
$('#$field').datepicker({ 
		autoclose: true ,
		format:'$type_input_field[$field]',
		todayHighlight:true,
  		todayBtn: 'linked',
})
 
";
break;
case 'time':
		if($ifcu[$field]==0)break;
$string .="
$('#$field').timepicker({ 
	showMeridian: false,
    showSeconds:true,
})
 
";
break;

	case 'unix' :
		if($ifcu[$field]==0)break;
$string .="
$('#$field').datepicker({ 
		autoclose: true ,
		format:'dd.mm.yyyy',
		todayHighlight:true,
  		todayBtn: 'linked',
})
 
";	

}

		
}
}	




$string .="
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


function simpan(){
	start_loading_in('#box-loading');
	
	$('#form-a').ybsRequest({
		append : {
			//yourIndexName: 'yourValue',
			
		},
		
		onComplite :function(){
		  stop_loading_in('#box-loading');
		  cancel();
		},
		
		onAfterSuccess : function(){
		  cancel();
		},
		
		onBeforeFailed : function(){
		  stop_loading_in('#box-loading');
		  cancel();
		},
	});
	
	
}


</script>

";







$result = _createFile($string,$pv,$ff .'.php');		
return $result;		
}





}	