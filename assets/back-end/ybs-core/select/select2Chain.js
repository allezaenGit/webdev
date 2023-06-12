
(function( $ ){
	
	$.fn.chainTo = function(object){
		let table 	= $(this).data("table");
		let show  	= $(this).data("show");
		let hasOne 	= $(this).data("hasone");
		let where  	= $(this).data("where"); 	
		let idElement 	  = $(this).attr("id");
		let selected = $(this).data("selected"); 
		let primary  = $(this).data("primary");
		
		
		let child = object;
		$(child).data("isChild","true");
		
		//check jika element sdh di gunakan sebagai child 
		let isChild = $(this).data("isChild");
		
		if(isChild===undefined){
			
			getDataSelect(idElement,table,show,child,false,hasOne,where,selected,primary);
			
		}else{

			getDataSelect(idElement,table,show,child,true,hasOne,where,selected,primary);
			
		}
			

	}
	
	
	
	
	function getDataSelect(idElement,table,show,child,isChild,hasOne,where,selected,primary,transfer){
		
		let f="";
		let host = document.location.origin;
		
		if(xax==""){ //di ambil dari lib/Template.php
			f = "";
		}else{
			f = "/" + xax;
		}

		let link_data = host + f +svrCMB;
		
		link_data = link_data.replace(/([^:]\/)\/+/g, "$1");
		
		a  =  get_json_format('t',table);
		b  =  get_json_format('fs',show);
		c  =  get_json_format('w','');
		x  =  get_json_format('wv','');
		y  =  get_json_format('tk',data_token);
		ho =  get_json_format('ho',hasOne);
		we =  get_json_format('we',where);
		pri = get_json_format('primary',primary);

		send_data = ybs_dataSending([y,a,b,c,x,ho,we,pri]);
	
		if(!isChild){
			let req = new ybsRequest();
			req.process(link_data,send_data);
			req.onSuccess = function(data){
				let m = data.message;
			
				$.each( m, function( i, v ) {
					let newOption = new Option(v.text, v.value, false, false);
					
					$("#" +idElement).append(newOption);
				});
				
				$("#" +idElement).select2("destroy").select2();
				
				
		
				
				try {
					let ss = selected.split(",");
					$("#" +idElement).val(ss).trigger('change');
				}
				catch(err) {
					$("#" +idElement).val(selected).trigger('change');
				}
				
				
				
				
			
			}
		}
		
		
		if(child){
			$("#" +idElement).change(function(){
				changeParent($(this).val(),child,link_data);
			});
		}
		
	}
	
	
	function changeParent(value,child,link_data){
		
	
		let table 	=  $(child).data("table");
		let show  	=  $(child).data("show");
		let foreign =  $(child).data("foreign");
		let hasOne	=  $(child).data("hasone");			
		let where	=  $(child).data("where");
		let selected =  $(child).data("selected");
		let primary =  $(child).data("primary");
		
		$(child)
			.find('option')
			.remove()
			.end();
			
		$(child).trigger('change');	
		
		e  =  get_json_format('t',table);
		f  =  get_json_format('fs',show);
		g  =  get_json_format('w',foreign);
		h  =  get_json_format('wv',value);
		y  =  get_json_format('tk',data_token);
		ho =  get_json_format('ho',hasOne);
		we =  get_json_format('we',where);
		pri=  get_json_format('primary',primary);
		
		send_data = ybs_dataSending([y,e,f,g,h,ho,we,pri])
		
		let req = new ybsRequest();
		req.process(link_data,send_data);
		req.onSuccess = function(data){
			let m = data.message;
			
			
			$.each( m, function( i, v ) {
				newOption = new Option(v.text, v.value, false, false);
				$(child).append(newOption);
			});
			
			$(child).select2("destroy").select2();
			
			
			
			try {
					let ss = selected.split(",");
					$(child).val(ss).trigger('change');
			}catch(err) {
					$(child).val(selected).trigger('change');
			}
			
			
			
		}
		
		
	}
	
		
}( jQuery ));
