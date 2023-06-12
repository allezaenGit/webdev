

<div class="row ">

<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<h4  class="childFilter" style=" font-weight: bold;"># Select2 Single Table</h4>
<label class="label bg-gray childFilter">select2</label>
<label class="label bg-gray childFilter">plugin</label>
<label class="label bg-gray childFilter">single table</label>


<br>
<br>
<p class="childFilter">sample : </p>	
<div class="form-group">
    <label class="control-label">Sample Golongan</label>
   
    <select   id="sample_golongan" class="form-control select2" style="width:100%" 
        data-table="sample_golongan" 
        data-show="golongan"  >
      
    </select>
   
</div>
<?= _js("select2Chain") ?>  
<script>
  $(function () {
      $('.select2').select2();
	   $('#sample_golongan').chainTo("");
  });
</script>

html & js code for Standar Form
<pre>
&lt;div class="form-group">
    &lt;label class="control-label">Sample Golongan&lt;/label>
   
    &lt;select   id="sample_golongan" name="sample_golongan" class="form-control select2" style="width:100%" 
				data-table="sample_golongan" 
				data-show="golongan"  
				data-selected=""
				>
    &lt;/select>
   
&lt;/div>

&lt;?= _js("select2Chain") ?> 

&lt;script>
	$(function () {
			$('.select2').select2();
			$('#sample_golongan').chainTo("");
	});
&lt;/script>

</pre>

html & js code for Horizontal Form
<pre>
&lt;div class="form-group"> 
&lt;label class="col-sm-2 control-label">Sample Golongan&lt;/label>
&lt;div class="col-sm-10">
	 &lt;select   id="sample_golongan" name="sample_golongan" class="form-control select2" style="width:100%" 
				data-table="sample_golongan" 
				data-show="golongan" 
				data-selected=""
				>
    &lt;/select>
&lt;/div>
&lt;/div>


&lt;?= _js("select2Chain") ?> 

&lt;script>
	$(function () {
			$('.select2').select2();
			$('#sample_golongan').chainTo("");
	});
&lt;/script>
</pre>

dan copy javascript & php :
<div class="callout callout-ybs-danger shadow">
    <h4><i class="fe fe-volume-2"></i> note :</h4>
    <div class="box-body table-responsive no-padding">
	<code>&lt;?= _js("select2Chain") ?>  </code><br>
	<code> $('.select2').select2(); </code><br>
      code ini hanya sekali saja di buat dalam sebuah form<br>
	  
    </div>
</div>



<br><br> <br><br>

</div>

</div>








<div class="row ">

<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<h4  class="childFilter" style=" font-weight: bold;"># Select2 Table One To Many</h4>
<label class="label bg-gray childFilter">select2</label>
<label class="label bg-gray childFilter">plugin</label>

<br>
<br>
<a href="javascript:void(0)" >
<img src="<?= base_url() ?>/images/dokumentasi/combobox_one_many_a.png" alt="One To Many" data-image="one to many" class="ybs-image-slider" style="height:180px">
</a>

<br>
<br>
<p class="childFilter">sample : </p>	
<div class="form-group">
    <label class="control-label">Sample Grup</label>
   
    <select   id="sample_grup" class="form-control select2" style="width:100%" 
        data-table="sample_grup" 
        data-show="grup"  >
      
    </select>
   
</div>

<div class="form-group">
    <label class="control-label">Sample SubGrup</label>
   
    <select   id="sample_subgrup" class="form-control select2" style="width:100%" 
        data-table="sample_subgrup" 
        data-show="subgrup"  
		data-foreign="id_grup" 
		>
      
    </select>
   
</div>

<div class="form-group">
    <label class="control-label">Sample Type</label>
   
    <select   id="sample_type" class="form-control select2" style="width:100%" 
        data-table="sample_type" 
        data-show="type"  
		data-foreign="id_subgrup" 
		>
      
    </select>
   
</div>

<script> 
 $(function () {
	   $('#sample_grup').chainTo("#sample_subgrup");
	   $('#sample_subgrup').chainTo("#sample_type");
  });
</script>



html code for Standar Form
<pre>
&lt;div class="form-group">
    &lt;label class="control-label">Sample Grup&lt;/label>
   
    &lt;select   id="sample_grup" name="sample_grup"  class="form-control select2" style="width:100%" 
				data-table="sample_grup" 
				data-show="grup" 
				data-selected=""	
				>
    &lt;/select>
   
&lt;/div>


&lt;div class="form-group">
    &lt;label class="control-label">Sample SubGrup&lt;/label>
   
    &lt;select   id="sample_subgrup" name="sample_subgrup" class="form-control select2" style="width:100%" 
				data-table="sample_subgrup" 
				data-show="subgrup"  
				data-selected=""
				data-foreign="id_grup"
				
				>
    &lt;/select>
   
&lt;/div>


&lt;div class="form-group">
    &lt;label class="control-label">Sample Type&lt;/label>
   
    &lt;select   id="sample_type" name="sample_type" class="form-control select2" style="width:100%" 
				data-table="sample_type" 
				data-show="type"  
				data-selected=""
				data-foreign="id_subgrup"
				>
    &lt;/select>
   
&lt;/div>

&lt;?= _js("select2Chain") ?> 

&lt;script>
	$(function () {
			$('.select2').select2();
			$('#sample_grup').chainTo("#sample_subgrup");
			$('#sample_subgrup').chainTo("#sample_type");
	});
&lt;/script>



</pre>


html code for Horizontal Form
<pre>
&lt;div class="form-group"> 
&lt;label class="col-sm-2 control-label">Sample Grup&lt;/label>
&lt;div class="col-sm-10">
	 &lt;select id="sample_grup"  name="sample_grup" class="form-control select2" style="width:100%" 
				data-table="sample_grup" 
				data-show="grup"
				data-selected=""
				>
    &lt;/select>
&lt;/div>
&lt;/div>


&lt;div class="form-group"> 
&lt;label class="col-sm-2 control-label">Sample SubGrup&lt;/label>
&lt;div class="col-sm-10">
	 &lt;select id="sample_subgrup"  name="sample_subgrup" class="form-control select2" style="width:100%" 
				data-table="sample_subgrup" 
				data-show="subgrup"  
				data-selected=""
				data-foreign="id_grup" >
    &lt;/select>
&lt;/div>
&lt;/div>


&lt;div class="form-group"> 
&lt;label class="col-sm-2 control-label">Sample Type&lt;/label>
&lt;div class="col-sm-10">
	 &lt;select id="sample_type" name="sample_type" class="form-control select2" style="width:100%" 
				data-table="sample_type" 
				data-show="type" 
				data-selected=""				
				data-foreign="id_subgrup" >
    &lt;/select>
&lt;/div>
&lt;/div>


&lt;?= _js("select2Chain") ?> 

&lt;script>
	$(function () {
			$('.select2').select2();
			$('#sample_grup').chainTo("#sample_subgrup");
			$('#sample_subgrup').chainTo("#sample_type");
	});
&lt;/script>



</pre>


dan copy javascript & php :
<div class="callout callout-ybs-danger shadow">
    <h4><i class="fe fe-volume-2"></i> note :</h4>
    <div class="box-body table-responsive no-padding">
	<code>&lt;?= _js("select2Chain") ?>  </code><br>
	<code> $('.select2').select2(); </code><br>
      code ini hanya sekali saja di buat dalam sebuah form<br>
    </div>
</div>




<br><br> <br><br>

</div>

</div>







<div class="row ">

<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<h4  class="childFilter" style=" font-weight: bold;"># Select2 Table One To Many With Clause Where & Join</h4>
<label class="label bg-gray childFilter">select2</label>
<label class="label bg-gray childFilter">plugin</label>
<label class="label bg-gray childFilter">where</label>
<label class="label bg-gray childFilter">join table</label>
<label class="label bg-gray childFilter">hasOne</label>

<br>
<br>
<a href="javascript:void(0)" >
<img src="<?= base_url() ?>/images/dokumentasi/combobox_one_many_a.png" alt="One To Many" data-image="one to many" class="ybs-image-slider" style="height:180px">
</a>

<br>
<br>
<p class="childFilter">sample : </p>	
<div class="form-group">
    <label class="control-label">Sample Grup</label>
   
    <select   id="sample_grupB" class="form-control select2" style="width:100%" 
        data-table="sample_grup" 
        data-show="grup,nmuser,nmlevel"  
		data-where="status = 1"
		data-hasone="sys_user:sys_user.id=sample_grup.user_input,
					 sys_level:sys_level.id= sys_user.opt_level"		>
      
    </select>
   
</div>

<div class="form-group">
    <label class="control-label">Sample SubGrup</label>
   
    <select   id="sample_subgrupB" class="form-control select2" style="width:100%" 
        data-table="sample_subgrup" 
        data-show="subgrup"  
		data-foreign="id_grup" 
		data-where="status = 1"
		>
      
    </select>
   
</div>

<div class="form-group">
    <label class="control-label">Sample Type</label>
   
    <select   id="sample_typeB" class="form-control select2" style="width:100%" 
        data-table="sample_type" 
        data-show="type"  
		data-foreign="id_subgrup" 
		>
      
    </select>
   
</div>

<script> 
 $(function () {
	   $('#sample_grupB').chainTo("#sample_subgrupB");
	   $('#sample_subgrupB').chainTo("#sample_typeB");
  });
</script>



html code for Standar Form
<pre>
&lt;div class="form-group">
    &lt;label class="control-label">Sample Grup&lt;/label>
   
    &lt;select   id="sample_grup"  name="sample_grup" class="form-control select2" style="width:100%" 
				 data-table="sample_grup" 
				 data-show="grup,nmuser,nmlevel"  
				 data-selected=""
				 data-where="status = 1"
				 data-hasone="sys_user:sys_user.id=sample_grup.user_input,
				  			  sys_level:sys_level.id= sys_user.opt_level"		>
    &lt;/select>
   
&lt;/div>


&lt;div class="form-group">
    &lt;label class="control-label">Sample SubGrup&lt;/label>
   
    &lt;select   id="sample_subgrup" name="sample_subgrup" class="form-control select2" style="width:100%" 
				data-table="sample_subgrup" 
				data-show="subgrup"  
				data-selected=""
				data-where="status = 1"
				data-foreign="id_grup" >
    &lt;/select>
   
&lt;/div>


&lt;div class="form-group">
    &lt;label class="control-label">Sample Type&lt;/label>
   
    &lt;select   id="sample_type" name="sample_type" class="form-control select2" style="width:100%" 
				data-table="sample_type" 
				data-show="type"  
				data-selected=""
				data-foreign="id_subgrup" >
    &lt;/select>
   
&lt;/div>


&lt;?= _js("select2Chain") ?> 

&lt;script>
	$(function () {
			$('.select2').select2();
			$('#sample_grup').chainTo("#sample_subgrup");
			$('#sample_subgrup').chainTo("#sample_type");
	});
&lt;/script>


</pre>


html code for Horizontal Form
<pre>
&lt;div class="form-group"> 
&lt;label class="col-sm-2 control-label">Sample Grup&lt;/label>
&lt;div class="col-sm-10">
	  &lt;select   id="sample_grup" name="sample_grup" class="form-control select2" style="width:100%" 
				 data-table="sample_grup" 
				 data-show="grup,nmuser,nmlevel"  
				 data-selected=""
				 data-where="status = 1"
				 data-hasone="sys_user:sys_user.id=sample_grup.user_input,
				  			  sys_level:sys_level.id= sys_user.opt_level"		>
    &lt;/select>
&lt;/div>
&lt;/div>


&lt;div class="form-group"> 
&lt;label class="col-sm-2 control-label">Sample SubGrup&lt;/label>
&lt;div class="col-sm-10">
	 &lt;select id="sample_subgrup" name="sample_subgrup" class="form-control select2" style="width:100%" 
				data-table="sample_subgrup" 
				data-show="subgrup"  
				data-selected=""
				data-where="status = 1"
				data-foreign="id_grup" >
    &lt;/select>
&lt;/div>
&lt;/div>


&lt;div class="form-group"> 
&lt;label class="col-sm-2 control-label">Sample Type&lt;/label>
&lt;div class="col-sm-10">
	 &lt;select id="sample_type" name="sample_type"  class="form-control select2" style="width:100%" 
				data-table="sample_type" 
				data-show="type"  
				data-selected=""
				data-foreign="id_subgrup" >
    &lt;/select>
&lt;/div>
&lt;/div>



&lt;?= _js("select2Chain") ?> 

&lt;script>
	$(function () {
			$('.select2').select2();
			$('#sample_grup').chainTo("#sample_subgrup");
			$('#sample_subgrup').chainTo("#sample_type");
	});
&lt;/script>


</pre>


dan copy javascript & php :
<div class="callout callout-ybs-danger shadow">
    <h4><i class="fe fe-volume-2"></i> note :</h4>
    <div class="box-body table-responsive no-padding">
	<code>&lt;?= _js("select2Chain") ?>  </code><br>
	<code> $('.select2').select2(); </code><br>
      code ini hanya sekali saja di buat dalam sebuah form<br>
	 
    </div>
</div>



<br><br> <br><br>

</div>

</div>


