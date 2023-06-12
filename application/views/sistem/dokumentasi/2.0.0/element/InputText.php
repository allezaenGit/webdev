
<div class="row ">

<div class="col-md-12 parentFilter">		

<h4  class="childFilter" style=" font-weight: bold;"># Input Text</h4>
<label class="label bg-gray childFilter">default</label>
<label class="label bg-gray childFilter">icon left</label>
<label class="label bg-gray childFilter">icon right</label>
<label class="label bg-gray childFilter">text area</label>
<label class="label bg-gray childFilter">password</label>

<br>
<br>
<p class="childFilter">sample :</p>	

<div class="form-group">
	<label class="control-label">Text</label>
	<input type="text" class="form-control focus-color">
</div>

<div class="form-group">
	<label class="control-label">Text Area</label>
	<textarea type="password" class="form-control focus-color"></textarea>
</div>


<div class="form-group">
	<label class="control-label">Pasword</label>
	<input type="password" class="form-control focus-color">
</div>


<div class="form-group">
	<label class="control-label">Format Money</label>
	<input type="text" class="form-control focus-color ybs-input-number">
</div>

<div class="form-group">
	<label class="control-label">Text with left icon</label>
	<div class="input-group">
	<div class="input-group-addon">
	<i class="fa fa-laptop"></i>
	</div>
	<input type="text" class="form-control focus-color">
	</div>
</div>

<div class="form-group">
	<label class="control-label">Text with right icon</label>
	<div class="input-group">
	<input type="text" class="form-control focus-color">
	<div class="input-group-addon">
	<i class="fa fa-clock-o"></i>
	</div>
	</div>
</div>

<br>
<p class="childFilter">html code for Standar Form</p>      
<pre>

&lt;div class="form-group">
	&lt;label class="control-label">Text&lt;/label>
	&lt;input type="text" class="form-control focus-color">
&lt;/div>



&lt;div class="form-group">
	&lt;label class="control-label">Text Area&lt;/label>
	&lt;textarea type="password" class="form-control focus-color">&lt;/textarea>
&lt;/div>



&lt;div class="form-group">
	&lt;label class="control-label">Pasword&lt;/label>
	&lt;input type="password" class="form-control focus-color">
&lt;/div>

&lt;div class="form-group">
	&lt;label class="control-label">Format Money&lt;/label>
	&lt;input type="text" class="form-control focus-color ybs-input-number">
&lt;/div>



&lt;div class="form-group">
	&lt;label class="control-label">Text with left icon&lt;/label>
	&lt;div class="input-group">
	&lt;div class="input-group-addon">
	&lt;i class="fa fa-laptop">&lt;/i>
	&lt;/div>
	&lt;input type="text" class="form-control focus-color">
	&lt;/div>
&lt;/div>



&lt;div class="form-group">
	&lt;label class="control-label">Text with right icon&lt;/label>
	&lt;div class="input-group">
	&lt;input type="text" class="form-control focus-color">
	&lt;div class="input-group-addon">
	&lt;i class="fa fa-clock-o">&lt;/i>
	&lt;/div>
	&lt;/div>
&lt;/div>
</pre>	


<br>


<p class="childFilter">html code for Horizontal Form</p>   
<pre>
&lt;div class="form-group">
	&lt;label class="col-sm-2 control-label">Text&lt;/label>
	&lt;div class="col-sm-10">
	&lt;input type="text" class="form-control focus-color">
	&lt;/div>
&lt;/div>



&lt;div class="form-group">
	&lt;label class="col-sm-2 control-label">Text Area&lt;/label>
	&lt;div class="col-sm-10">
	&lt;textarea type="password" class="form-control focus-color">&lt;/textarea>
	&lt;/div>	
&lt;/div>



&lt;div class="form-group">
	&lt;label class="col-sm-2 control-label">Pasword&lt;/label>
	&lt;div class="col-sm-10">
	&lt;input type="password" class="form-control focus-color">
	&lt;/div>
&lt;/div>

&lt;div class="form-group">
	&lt;label class="col-sm-2 control-label">Format Money&lt;/label>
	&lt;div class="col-sm-10">
	&lt;input type="text" class="form-control focus-color ybs-input-number">
	&lt;/div>
&lt;/div>



&lt;div class="form-group">
	&lt;label class="col-sm-2 control-label">Text with left icon&lt;/label>
	&lt;div class="col-sm-10">
	&lt;div class="input-group">
	&lt;div class="input-group-addon">
	&lt;i class="fa fa-laptop">&lt;/i>
	&lt;/div>
	&lt;input type="text" class="form-control focus-color">
	&lt;/div>
	&lt;/div>
&lt;/div>



&lt;div class="form-group">
	&lt;label class="col-sm-2 control-label">Text with right icon&lt;/label>
	&lt;div class="col-sm-10">
	&lt;div class="input-group">
	&lt;input type="text" class="form-control focus-color">
	&lt;div class="input-group-addon">
	&lt;i class="fa fa-clock-o">&lt;/i>
	&lt;/div>
	&lt;/div>
	&lt;/div>
&lt;/div>
</pre>



<br><br> <br><br>

</div>

</div>
      <!-- ./row -->

<div class="row ">

<div class="col-md-12 parentFilter">		

<h4  class="childFilter" style=" font-weight: bold;"># Date & Time</h4>
<label class="label bg-gray childFilter">datepicker</label>
<label class="label bg-gray childFilter">timepicker</label>
<label class="label bg-gray childFilter">tanggal</label>
<label class="label bg-gray childFilter">jam</label>
<label class="label bg-gray childFilter">date</label>
<label class="label bg-gray childFilter">time</label>


<br>
<br>
<p class="childFilter">sample :</p>	

<?= _css('datepicker') ?>
<div class="form-group">
	<label class=" control-label">Date</label>

	
		<div class="input-group">
			<input id="tanggal" type="text" class="form-control datepicker">

			<div class="input-group-addon">
				<i class="fa fa-clock-o"></i>
			</div>
		</div>
	
</div>
	<br>				
<div class="form-group">
	<label class="control-label">Time</label>

	
		<div class="input-group">
			<input id="jam" type="text" class="form-control timepicker">

			<div class="input-group-addon">
			  <i class="fa fa-clock-o"></i>
			</div>
		</div>
	
</div>

<?= _js('datepicker') ?>

<script>
	$('#tanggal').datepicker({ 
			autoclose: true ,
			format:'d M yyyy',
	})
   $('#jam').timepicker({
		showMeridian: false,
		showSeconds:true,
    })
</script>
<p class="childFilter">html & js code for Vertical Form</p>   
<pre>
&lt;!-- load css datepicker & timepicker -->	
&lt;?= _css('datepicker') ?>


&lt;!-- tanggal -->	
&lt;div class="form-group">
	&lt;label class="control-label">Date&lt;/label>

	
		&lt;div class="input-group">
			&lt;input id="tanggal" type="text" class="form-control datepicker">

			&lt;div class="input-group-addon">
				&lt;i class="fa fa-clock-o">&lt;/i>
			&lt;/div>
		&lt;/div>
	
&lt;/div>
	&lt;!-- ./tanggal-->	

&lt;!-- jam -->		
&lt;div class="form-group">
	&lt;label class="control-label">Time&lt;/label>

	
		&lt;div class="input-group">
			&lt;input id="jam" type="text" class="form-control timepicker">

			&lt;div class="input-group-addon">
			  &lt;i class="fa fa-clock-o">&lt;/i>
			&lt;/div>
		&lt;/div>
	
&lt;/div>
&lt;!-- ./jam -->	

&lt;!-- load js datepicker & timepicker -->	
&lt;?= _js('datepicker') ?>


&lt;script>
	$('#tanggal').datepicker({ 
			autoclose: true ,
			format:'d M yyyy',
	})
   $('#jam').timepicker({
		showMeridian: false,
		showSeconds:true,
    })
&lt;/script>
</pre>
<br>

<p class="childFilter">html & js code for Horizontal Form</p>   
<pre>
&lt;!-- load css datepicker & timepicker -->	
&lt;?= _css('datepicker') ?>

&lt;!-- tanggal -->	
&lt;div class="form-group">
	&lt;label class="col-sm-2 control-label">Date&lt;/label>

	&lt;div class="col-sm-10">
		&lt;div class="input-group">
			&lt;input id="tanggal" type="text" class="form-control datepicker">

			&lt;div class="input-group-addon">
				&lt;i class="fa fa-clock-o">&lt;/i>
			&lt;/div>
		&lt;/div>
	&lt;/div>
&lt;/div>
	&lt;!-- ./tanggal-->	

&lt;!-- jam -->		
&lt;div class="form-group">
	&lt;label class="col-sm-2 control-label">Time&lt;/label>

	&lt;div class="col-sm-10">
		&lt;div class="input-group">
			&lt;input id="jam" type="text" class="form-control timepicker">

			&lt;div class="input-group-addon">
			  &lt;i class="fa fa-clock-o">&lt;/i>
			&lt;/div>
		&lt;/div>
	&lt;/div>
&lt;/div>
&lt;!-- ./jam -->	

&lt;!-- load js datepicker & timepicker -->	
&lt;?= _js('datepicker') ?>


&lt;script>
	$('#tanggal').datepicker({ 
			autoclose: true ,
			format:'d M yyyy',
	})
   $('#jam').timepicker({
		showMeridian: false,
		showSeconds:true,
    })
&lt;/script>

</pre>



<br><br> <br><br>

</div>

</div>
      <!-- ./row -->	  
	  

     

<div class="row">
<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<br>
<h4  class="childFilter" style=" font-weight: bold;"># WITH BUTTON ADDON</h4>
<label class="label bg-gray childFilter">action</label>
<label class="label bg-gray childFilter">link</label>
<label class="label bg-gray childFilter">another action</label>
<label class="label bg-gray childFilter">dropdown</label>
<label class="label bg-gray childFilter">combobox</label>



<br>
<br>      	  
sample :	
<br>
<!-- html sample -->

<div class="input-group">
<div class="input-group-btn">
	<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Action
	<span class="fa fa-caret-down"></span>
	</button>
	<ul class="dropdown-menu">
	<li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li class="divider"></li>
    <li><a href="#">Separated link</a></li>
    </ul>
</div>
<!-- /btn-group -->
 <input type="text" class="form-control focus-color">
</div>

<!-- end -->
<br>

<!-- code sample -->
<pre>
<div class="input-group">
<div class="input-group-btn">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action
	<span class="fa fa-caret-down"></span>
	</button>
	<ul class="dropdown-menu">
	<li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li class="divider"></li>
    <li><a href="#">Separated link</a></li>
    </ul>
</div>
<!-- /btn-group -->
 <input type="text" class="form-control">
</div>
</pre>
<!--end code sample -->


<!-- sample -->
<br>     	  
sample :	
<br>
<!-- html sample -->
<div class="input-group">
<div class="input-group-btn">
 <button type="button" class="btn btn-danger">Action</button>
</div>
<!-- /btn-group -->
<input type="text" class="form-control">
</div>

<!-- end -->
<br>

<!-- code sample -->
<pre>
<div class="input-group">
<div class="input-group-btn">
 <button type="button" class="btn btn-danger">Action</button>
</div>
<!-- /btn-group -->
<input type="text" class="form-control">
</div>


</pre>
<!--end code sample -->



<!-- sample -->
<br>     	  
sample :	
<br>
<!-- html sample -->
<div class="input-group">
	<input type="text" class="form-control">
	<span class="input-group-btn">
	<button type="button" class="btn btn-info btn-flat">Go!</button>
	</span>
</div>

<!-- end -->
<br>

<!-- code sample -->
<pre>
<div class="input-group">
	<input type="text" class="form-control">
	<span class="input-group-btn">
	<button type="button" class="btn btn-info btn-flat">Go!</button>
	</span>
</div>


</pre>
<!--end code sample -->


<br><br> <br><br>

</div>
</div>	  