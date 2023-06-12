<div class="row ">

<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<h4  class="childFilter" style=" font-weight: bold;"># Select Option</h4>
<label class="label bg-gray childFilter">default</label>


<br>
<br>
<p class="childFilter">sample :</p>	

<div class="form-group">
<label>Select Default</label>
<select class="form-control">
	<option>option 1</option>
	<option>option 2</option>
	<option>option 3</option>
	<option>option 4</option>
	<option>option 5</option>
</select>
</div>

<br>
<p class="childFilter">html code for standar Form</p>
<pre>
&lt;div class="form-group">
&lt;label class="control-label">Select Default&lt;/label>
&lt;select class="form-control">
	&lt;option>option 1&lt;/option>
	&lt;option>option 2&lt;/option>
	&lt;option>option 3&lt;/option>
	&lt;option>option 4&lt;/option>
	&lt;option>option 5&lt;/option>
&lt;/select>
&lt;/div>		
</pre>
<br>
<p class="childFilter">html code for Horizontal Form</p>
<pre>
&lt;div class="form-group">
&lt;label class="col-sm-2 control-label">Select Default&lt;/label>
&lt;div class="col-sm-10">
&lt;select class="form-control">
	&lt;option>option 1&lt;/option>
	&lt;option>option 2&lt;/option>
	&lt;option>option 3&lt;/option>
	&lt;option>option 4&lt;/option>
	&lt;option>option 5&lt;/option>
&lt;/select>
&lt;/div>
&lt;/div>			
</pre>				

<br><br> <br><br>

</div>

</div>



<div class="row ">

<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<h4  class="childFilter" style=" font-weight: bold;"># Select2 Minimal</h4>
<label class="label bg-gray childFilter">select2</label>
<label class="label bg-gray childFilter">plugin</label>
<label class="label bg-gray childFilter">one selected</label>


<br>
<br>
<p class="childFilter">sample :  one selected</p>	

<div class="form-group">
	<label class="control-label">Minimal</label>
	<select class="form-control select2" >
	<option selected="selected">Alabama</option>
	<option>Alaska</option>
	<option>California</option>
	<option>Delaware</option>
	<option>Tennessee</option>
	<option>Texas</option>
	<option>Washington</option>
	</select>
</div>



<p class="childFilter">html code for standar Form</p>
<pre>
&lt;div class="form-group">
	&lt;label class="control-label">Minimal&lt;/label>
	&lt;select class="form-control select2" >
	&lt;option selected="selected">Alabama&lt;/option>
	&lt;option>Alaska&lt;/option>
	&lt;option>California&lt;/option>
	&lt;option>Delaware&lt;/option>
	&lt;option>Tennessee&lt;/option>
	&lt;option>Texas&lt;/option>
	&lt;option>Washington&lt;/option>
	&lt;/select>
&lt;/div>
</pre>	


<p class="childFilter">html code for Horizontal Form</p>
<pre>
&lt;div class="form-group">
	&lt;label class="col-sm-2 control-label">Minimal&lt;/label>
	&lt;div class="col-sm-10">
	&lt;select class="form-control select2" >
	&lt;option selected="selected">Alabama&lt;/option>
	&lt;option>Alaska&lt;/option>
	&lt;option>California&lt;/option>
	&lt;option>Delaware&lt;/option>
	&lt;option>Tennessee&lt;/option>
	&lt;option>Texas&lt;/option>
	&lt;option>Washington&lt;/option>
	&lt;/select>
	&lt;/div>
&lt;/div>
</pre>				

dan copy javascript :
<div class="callout callout-ybs-danger shadow">
    <h4><i class="fe fe-volume-2"></i> note :</h4>
    <div class="box-body table-responsive no-padding">
	<code> $('.select2').select2(); </code><br>
      code ini hanya sekali saja di buat dalam sebuah form<br>
	  jika di form belum ada code ini..maka silahkan copy code dibawah <i class="fa fa-arrow-circle-down"></i>
    </div>
</div>
<pre>

&lt;script>
	$(function () {
			$('.select2').select2();
	});
&lt;/script>
</pre>
<br><br> <br><br>

</div>

</div>







<div class="row ">

<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<h4  class="childFilter" style=" font-weight: bold;"># Select2 Multiple</h4>
<label class="label bg-gray childFilter">select2</label>
<label class="label bg-gray childFilter">multiple</label>
<label class="label bg-gray childFilter">disabled option</label>
<label class="label bg-gray childFilter">plugin</label>


<br>
<br>
<p class="childFilter">sample : multiple select</p>	

<div class="form-group">
	<label class="control-label">Multiple</label>
	<select class="form-control select2" multiple="multiple" >
	<option selected="selected">Alabama</option>
	<option>Alaska</option>
	<option>California</option>
	<option>Delaware</option>
	<option>Tennessee</option>
	<option>Texas</option>
	<option>Washington</option>
	</select>
</div>
<script>
	$(function () {
		
		$('.select2').select2();
	  
	});
</script>



<p class="childFilter">html code for Standar Form</p>
<pre>
&lt;div class="form-group">
	&lt;label  class="control-label" >Multiple&lt;/label>
	&lt;select class="form-control select2" multiple="multiple" >
	&lt;option selected="selected">Alabama&lt;/option>
	&lt;option>Alaska&lt;/option>
	&lt;option>California&lt;/option>
	&lt;option>Delaware&lt;/option>
	&lt;option>Tennessee&lt;/option>
	&lt;option>Texas&lt;/option>
	&lt;option>Washington&lt;/option>
	&lt;/select>
&lt;/div>
</pre>	

<p class="childFilter">html code for Horizontal Form</p>
<pre>
&lt;div class="form-group">
	&lt;label  class="col-sm-2 control-label" >Multiple&lt;/label>
	&lt;div class="col-sm-10">
	&lt;select class="form-control select2" multiple="multiple" >
	&lt;option selected="selected">Alabama&lt;/option>
	&lt;option>Alaska&lt;/option>
	&lt;option>California&lt;/option>
	&lt;option>Delaware&lt;/option>
	&lt;option>Tennessee&lt;/option>
	&lt;option>Texas&lt;/option>
	&lt;option>Washington&lt;/option>
	&lt;/select>
	&lt;/div>
&lt;/div>
</pre>				

dan copy javascript :
<div class="callout callout-ybs-danger shadow">
    <h4><i class="fe fe-volume-2"></i> note :</h4>
    <div class="box-body table-responsive no-padding">
	<code> $('.select2').select2(); </code><br>
      code ini hanya sekali saja di buat dalam sebuah form<br>
	  jika di form belum ada code ini..maka silahkan copy code dibawah <i class="fa fa-arrow-circle-down"></i>
    </div>
</div>
<pre>

&lt;script>
	$(function () {
			$('.select2').select2();
	});
&lt;/script>
</pre>




<br>
<br>
<p class="childFilter">sample : disable option</p>	

<div class="form-group">
	<label class="control-label">Disable Options</label>
	<select class="form-control select2" multiple="multiple" >
	<option selected="selected">Alabama</option>
	<option>Alaska</option>
	<option disabled="disabled">California</option>
	<option>Delaware</option>
	<option>Tennessee</option>
	<option>Texas</option>
	<option>Washington</option>
	</select>
</div>



<p class="childFilter">html code for Horizontal Form</p>
<pre>
&lt;div class="form-group">
	&lt;label class="control-label">Disable option&lt;/label>
	&lt;select class="form-control select2" multiple="multiple" >
	&lt;option selected="selected">Alabama&lt;/option>
	&lt;option>Alaska&lt;/option>
	&lt;option disabled="disabled">California&lt;/option>
	&lt;option>Delaware&lt;/option>
	&lt;option>Tennessee&lt;/option>
	&lt;option>Texas&lt;/option>
	&lt;option>Washington&lt;/option>
	&lt;/select>
	&lt;/div>
&lt;/div>
</pre>

<p class="childFilter">html code for Horizontal Form</p>
<pre>
&lt;div class="form-group">
	&lt;label class="col-sm-2 control-label">Disable option&lt;/label>
	&lt;div class="col-sm-10">
	&lt;select class="form-control select2" multiple="multiple" >
	&lt;option selected="selected">Alabama&lt;/option>
	&lt;option>Alaska&lt;/option>
	&lt;option disabled="disabled">California&lt;/option>
	&lt;option>Delaware&lt;/option>
	&lt;option>Tennessee&lt;/option>
	&lt;option>Texas&lt;/option>
	&lt;option>Washington&lt;/option>
	&lt;/select>
	&lt;/div>
&lt;/div>
</pre>




<br><br> <br><br>

</div>

</div>





<div class="row ">

<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<h4  class="childFilter" style=" font-weight: bold;"># Select2 Icons</h4>
<label class="label bg-gray childFilter">select2</label>
<label class="label bg-gray childFilter">Icons</label>
<label class="label bg-gray childFilter">plugin</label>


<br>
<br>
<p class="childFilter">sample : select icons</p>	

<div class="form-group"  >
<label class="control-label">Icon Menu</label>
<?php echo create_select_icon('input-icon-menu');?>

</div>

<script>
	$(function () {

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
			
	
	
})
</script>


html + php code for Standar Form
<pre>
&lt;div class="form-group"  >
&lt;label class="control-label">Icon Menu&lt;/label>
&lt;?php echo create_select_icon('input-icon-menu');?>
&lt;/div>
</pre>

html + php code for Horizontal Form
<pre>
&lt;div class="form-group"  >
&lt;label class="col-sm-2 control-label">Icon Menu&lt;/label>
&lt;div class="col-sm-10">
&lt;?php echo create_select_icon('input-icon-menu');?>
&lt;/div>
&lt;/div>
</pre>


dan copy javascript :
<div class="callout callout-ybs-danger shadow">
    <h4><i class="fe fe-volume-2"></i> note :</h4>
    <div class="box-body table-responsive no-padding">
	<code> $('.select2').select2(); </code><br>
      code ini hanya sekali saja di buat dalam sebuah form<br>
	  jika di form belum ada code ini..maka silahkan copy code dibawah <i class="fa fa-arrow-circle-down"></i>
    </div>
</div>
<pre>

&lt;script>
	$(function () {
			
			$('.select2').select2();
			
			
			function iformat(icon){
				var orig = icon.element;
				return $('<span><i class="' + $(orig).val() + '"> </i>  &ensp;' + icon.text + '</span>' )
			}


			$('#input-icon-menu').select2({
				templateSelection : iformat,
				templateResult:iformat,
				allowHtml :true
				
			});
	});
&lt;/script>
</pre>








<br><br> <br><br>

</div>

</div>










