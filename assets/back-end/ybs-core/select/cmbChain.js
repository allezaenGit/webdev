$(function () {
function chainTo(parentid,elementid){
			var el = $('#'+elementid + ' option');
			var option_model = [];
		
			$.each(el,function(k,y){
				var t = $(y).text();
				var val = $(y).val();
				var dlink = $(y).attr('data-link');
				var selected = $(y).attr('selected');
				var i = [];
				i['text'] = t;
				i['value'] = val;
				i['data_link'] = dlink;
				i['selected'] = selected;
				option_model.push(i);
			})
		
			
			
			$('#'+parentid).ready(function(){
				var value = $('#'+parentid).val();
				refresh_child(value,option_model,elementid);
			});
			
			$('#'+parentid).selectize({
				 onChange: function(value){
					refresh_child(value,option_model,elementid);
							 
				 }
			});
			
}
	
});	