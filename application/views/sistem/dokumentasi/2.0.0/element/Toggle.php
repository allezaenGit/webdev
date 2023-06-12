<div class="row ">

<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<h4  class="childFilter" style=" font-weight: bold;"># Toggle CheckboxPicker</h4>
<label class="label bg-gray childFilter">toggle</label>
<label class="label bg-gray childFilter">checkbox picker</label>

<br>
<br>
<p class="childFilter">sample :</p>	

<div class='form-group'>
			<input type='checkbox' class='checkboxpicker' value='off' data-group-cls="btn-group-sm">	
</div>

<div class='form-group'>
<input type="checkbox" class='checkboxpicker'  data-off-icon-cls="fa fa-thumbs-down" data-on-icon-cls="fa fa-thumbs-up">
</div>

<div class='form-group'>
<input type="checkbox" class='checkboxpicker'   data-off-label="false" data-on-label="false" data-off-icon-cls="fa fa-thumbs-down" data-on-icon-cls="fa fa-thumbs-up">
</div>



<div class='form-group'>
<input type="checkbox" class='' id='t1' >
</div>

<br>
<p class="childFilter">html code</p>
<pre>
	
&lt;div class='form-group'>
			&lt;input type='checkbox' class='checkboxpicker' value='off' data-group-cls="btn-group-sm">	
&lt;/div>

&lt;div class='form-group'>
&lt;input type="checkbox" class='checkboxpicker'  data-off-icon-cls="fa fa-thumbs-down" data-on-icon-cls="fa fa-thumbs-up">
&lt;/div>

&lt;div class='form-group'>
&lt;input type="checkbox" class='checkboxpicker'   data-off-label="false" data-on-label="false" data-off-icon-cls="fa fa-thumbs-down" data-on-icon-cls="fa fa-thumbs-up">
&lt;/div>


&lt;div class='form-group'>
&lt;input type="checkbox" class='' id='t1' >
&lt;/div>	
	
	
</pre>
<br>

<pre>
&lt;script>

$(document).ready(function(){
	$('.checkboxpicker').checkboxpicker();
	
	
	$('#t1').checkboxpicker({
	  html: true,
	  offLabel: '&lt;span class="fas fa-minus-square"> ',
	  onLabel: '&lt;span class="fas fa-plus-square"> '
	});
	
	$('#t1').prop('checked',true);
	
});
&lt;/script>
</pre>

</div>

</div>


<script>

$(document).ready(function(){
	$('.checkboxpicker').checkboxpicker();
	
	
	$('#t1').checkboxpicker({
	  html: true,
	  offLabel: '<span class="fas fa-minus-square"> ',
	  onLabel: '<span class="fas fa-plus-square"> '
	});
	
	$('#t1').prop('checked',true);
	
});
</script>