(function( $ ){
	
	
	$.fn.singleUpload= function(options){
		
		if(options===undefined)
		options = [];	
		
		if(cupt==0){
			clear_temp_upload();
			cupt=1;
		}
		
		$(this).attr('ispublic', options.isPublic);
		
		let preview = "";
		
		if(options.preview !== undefined && options.preview !== "" ){
				if(options.preview==false) preview = 'hidden';
		}	
		
		validation(options);
		var type_input = options.type;
		
		var cnt		= this;
		var id		= $(cnt).attr('id');
		var name 	= $(cnt).attr('name');
		var el = 	'<form id="form-data-'+id+'">'+
				
						options.title+
					'	<input type="file" '+ options.type +'  id="inputfile-'+id+'" name="file" style="display:none">'+
					'	<input hidden  id="value-'+id+'" name="'+name+'" >'+
					
					'	<input hidden  id="nfile-'+id+'" name="ybsUData['+id+'][nfile]" >'+
					'	<input hidden  id="ofile-'+id+'" name="ybsUData['+id+'][ofile]" >'+
					
					'	<div class="input-group">'+
					'	<div class="input-group-btn">'+
					'		<button type="button" class="btn btn-default" id="btn-inputfile-'+id+'"><i class="fa fa-folder-open"></i></button>'+
					'	</div>'+
					'	<input readonly type="text" class="form-control" placeholder="'+options.placeholder+'" id="label-inputfile-'+id+'" style="background-color:#fff">'+
					' <span class="input-group-btn">'+
                    '  <button type="button" class="btn btn-default btn-flat " title="clear" id="btn-reset-'+id+'" ><i class="fas fa-trash"></i></button>'+
                    '</span>'+
					'	</div>'+
				
					
					
					'<!-- image container -->'+
					'<div class="box box-info" style="width:150px;border:none">'+
					
									'<div '+ preview +' class="storage-body">'  + 
									'<div class="row" >'+
									
										'<div class="col-lg-12">'+
										'<div class="storage-image-container" id="container-image-preview-'+id+'">'+
										'	<p id="image-preview-'+id+'" src="" class="storage-content file" alt="" ></p>'+
									

										'</div>'+	
										'</div>'+	
									
										'<div class="col-lg-12">'+
										'<div  class="storage-footer">'+
											'<p class="storage-footer-text text-center">Preview</p>'+
										'</div>'+	
										'</div>'+	
								
										'<div class="col-lg-12">'+
										'<div class="text-right storage-footer-button" >'+
											 
										'</div>'+	
										'</div>'+
									
									
									
									'</div>' + 
									'</div>' + 
					
					'</div>'+
					
					
					'</form>';
					
				
					
					
					
		$(this).append(el);
		reset();
		
		if(options.data !== undefined && options.data !== "" ){
			//penanda bahwa container memiliki file lama 
			$('#'+id).attr("data-old",options.data); /*deprecated*/
			
			$('#ofile-'+id).val(options.data);
			
		
			set_preview(options.data,'#image-preview-'+id,id,"",options.isPublic);
		}
		
		
		
		$('body').on("click",'#btn-inputfile-'+id + ', #label-inputfile-' + id,function(){
			$('#inputfile-'+id).val("");
			$('#inputfile-'+id).click();
		
		});
		
		
		$('body').on("change",'#inputfile-'+id,function(e){
			valid = check_extension(this);
			if(valid==false){
				show_error_message("Opps..your file not allowed");
				$('#btn-inputfile-'+id).attr("disabled", false);
				$('#label-inputfile-'+id).attr("disabled", false);
				reset();
			}else{
			
				upload_temp_file();
			}
			console.log('input click');
		});
		
	
		
		$('body').on("click",'#btn-reset-'+id,function(){
			reset();
		
		});
		
		
		function check_extension(inputfile){
			ext = inputfile.value.split('.')[1];
			var imagesList = ["jpeg","jpg","png","ico","svg","bmp"];	
			var videoList = ["wmv","mp4","mpeg","mpg","mov","avi","ogm","ogv"];	
			var audioList = ["mp3","mid","aiff","ogg","wav","aiff","wma"];	
			var documentList = ["xlsx","xls","doc","docx","ppt","pptx","txt","pdf"];	

			var output;
			switch(type_input){
				case "accept=image/*":
					output = imagesList.indexOf(ext);
					break;
				case "accept=video/*":
					output = videoList.indexOf(ext);
					break;
				case "accept=audio/*":
					output = audioList.indexOf(ext);
					break;
			    case "accept=.xlsx,.xls,.doc,docx,.ppt,.pptx,.txt,.pdf":
					output = documentList.indexOf(ext);
					break;
			}
			
		
			if(output== -1){
				output = false;
			}else{
				output = true;
			}
			
			return output;
			
		}
		
		
	
		
		function upload_temp_file(){
			if(options.showLoadingIn !== undefined && options.showLoadingIn !== "" ) start_loading_in(options.showLoadingIn);
			
			start_loading_in('#container-image-preview-'+id);
			reset();
			$('#inputfile-'+id).attr('name',"file");
			$('#btn-inputfile-'+id).attr("disabled", true);
			$('#label-inputfile-'+id).attr("disabled", true);
		
			// let rez = "";
			// if(options.imageResize){
				// rez = {"resize":options.imageResize};
			// }
			
			var a = new ybsRequest();
			a.processUploadFile('form-data-'+id,options.pathDest,"false",options);
			a.onSuccess = function(data){
				var ext = data.ext;
				var timepost = data.time_post;
				var orig_name = data.orig_name;
				$('#'+id).attr("data-ext",ext);
				$('#'+id).attr("data-time",timepost);
				$('#'+id).attr("data-orig-name",orig_name);
				$('#'+id).attr("data-upload",a.message);
				$('#value-'+id).val(timepost);
				$('#nfile-'+id).val(timepost);
				
				$('#label-inputfile-'+id).val(orig_name);
				set_preview(timepost,'#image-preview-'+id,id,"temp",true);
		  } 
		  a.onComplite = function(){
			  if(options.showLoadingIn !== undefined && options.showLoadingIn !== "" ) stop_loading_in(options.showLoadingIn);
			  stop_loading_in('#container-image-preview-'+id);
			  $('#btn-inputfile-'+id).attr("disabled", false);
			  $('#label-inputfile-'+id).attr("disabled", false);
			  $('#inputfile-'+id).attr('name',"");

		  }
		};
		
	    
		
	
	function validation(data){
		if(data.title ===undefined ){
			data.title = "";
		}
		if(data.type ===undefined ){
			data.type = "";
		}
		
		if(data.placeholder ===undefined){
			data.placeholder = "Choose file";
		}
		
		if(data.pathDest === undefined || data.pathDest===""){
			data.pathDest = "root";
		}
		
		
		switch(data.type){
			case "image":
			case "audio":
			case "video":
				 data.type = "accept=" + data.type + "/*";
			break;
			case "document":
				data.type = "accept=.xlsx,.xls,.doc,docx,.ppt,.pptx,.txt,.pdf";
			 
			break;
			default :
				data.type="";
			
		}
		
		
		
	}
	
	function reset(){
		$('#inputfile-'+id).attr('name',"");
		$('#'+id).attr("data-ext","");
		$('#'+id).attr("data-time","");
		$('#'+id).attr("data-orig-name","");
		$('#'+id).attr("data-upload","");
		$('#value-'+id).val("");
		$('#nfile-'+id).val("");
		
		$('#label-inputfile-'+id).val("");
		$('#image-preview-'+id).attr("src","");
		$('#image-preview-'+id).attr("style","");
		$('#image-preview-'+id).removeClass("file-excel");
		$('#image-preview-'+id).removeClass("file-word");
		$('#image-preview-'+id).removeClass("file-power-point");
		$('#image-preview-'+id).removeClass("file-pdf");
		$('#image-preview-'+id).removeClass("file-other");
	}

	
	 
    return this;
   }
   

   
   function set_preview(time_post,id_element,id="",temp="",isPublicFiles){
	
					    
			var a = new dropzone_result(time_post,temp,"",isPublicFiles);
			a.onComplite = function(data){
			  var b = JSON.parse(data.message);
			
			  $.each(b,function(k,y){
				
				//$(id_element).attr("src",y.link);
				
				$(id_element).css('background-image', 'url(' + y.link + ')');
				
				$('#label-inputfile-'+id).val(y.orig_name);
				$('#value-'+id).val(time_post);
				$('#nfile-'+id).val(time_post);
				
				$(id_element).removeClass("file-excel");
				$(id_element).removeClass("file-word");
				$(id_element).removeClass("file-power-point");
				$(id_element).removeClass("file-pdf");
				$(id_element).removeClass("file-other");
				
				switch(y.ext){
					case "xls" :case "xlsx" :
						$(id_element).addClass("file-excel");
					break;
					case "doc" :case "docx" :
						$(id_element).addClass("file-word");
					break;
					case "ppt" :case "pptx" :
						$(id_element).addClass("file-power-point");
					break;
					case "pdf" :
						$(id_element).addClass("file-pdf");
					break;
					case "svg": 
					case "jpg":
					case "png":
					case "jpeg":
					case "img" :
					case "ico" :
					case "bmp" :
					break;
					default :
						$(id_element).addClass("file-other");
				}
				
			  })
			}
	    }
   
   $.fn.file= function(file){
	   let cnt		= this;
	   let id		= $(cnt).attr('id');
	   let isPublicFiles  = $(cnt).attr('ispublic');
	   $('#ofile-'+id).val(file);
	   
	   set_preview(file,'#image-preview-'+id,id,"",isPublicFiles);
	}
	
	$.fn.reset= function(){
		var cnt		= this;
		var id		= $(cnt).attr('id');
		$('#inputfile-'+id).attr('name',"");
		$('#'+id).attr("data-ext","");
		$('#'+id).attr("data-time","");
		$('#'+id).attr("data-orig-name","");
		$('#'+id).attr("data-upload","");
		$('#value-'+id).val("");
		$('#nfile-'+id).val("");
		$('#label-inputfile-'+id).val("");
		$('#image-preview-'+id).attr("src","");
		$('#image-preview-'+id).attr("style","");
		$('#image-preview-'+id).removeClass("file-excel");
		$('#image-preview-'+id).removeClass("file-word");
		$('#image-preview-'+id).removeClass("file-power-point");
		$('#image-preview-'+id).removeClass("file-pdf");
		$('#image-preview-'+id).removeClass("file-other");
	}		
	
	
		
}( jQuery ));
	

