<section class="content">

<div class="row">
<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<br>
<h4  class="childFilter" style=" font-weight: bold;"># Form Horizontal</h4>
<label class="label bg-gray childFilter">horizontal form</label>
<label class="label bg-gray childFilter">panel default</label>
<label class="label bg-gray childFilter">panel info</label>
<label class="label bg-gray childFilter">panel success</label>
<label class="label bg-gray childFilter">panel warning</label>
<label class="label bg-gray childFilter">panel danger</label>



<br>
<br>    
sample :	
<br><br>		
<!-- Horizontal Form -->
<div class="box box-info shadow"  id="box-loading">
<div class="box-header with-border">
<h3 class="box-title">Horizontal Form</h3>
</div>
<!-- /.box-header -->

<!-- form start -->
<form class="form-horizontal" id="form-a" method="POST" action="">

<!-- body -->
<div class="box-body">

	<!-- input email -->
	<div class="form-group">
	<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
	<div class="col-sm-10">
	<input type="email" class="form-control focus-color" id="inputEmail3" placeholder="Email" name="email">
	</div>
	</div>
	 
	<!-- input password --> 
	<div class="form-group">
	<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
	<div class="col-sm-10">
	<input type="password" class="form-control focus-color" id="inputPassword3" placeholder="Password" name="password">
	</div>
	</div>


	<!-- checkbox --> 
	<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
	<div class="checkbox">
	<label>
	<input type="checkbox"> Remember me
	</label>
	</div>
	</div>
	</div>
             
</div>
<!-- /.body -->

<!-- footer -->
<div class="box-footer">
	<div class=" pull-right">
	<button id="btn-apply" type="button" class="btn btn-primary shadow"><i class="fe fe-check"></i>Apply</button>  
	<button disabled="" id="btn-save" type="button" class="btn btn-primary shadow"><i class="fe fe-save"></i>Simpan</button>  
	<button disabled="" id="btn-cancel" type="button" class="btn btn-primary shadow"> Batal</button>
	<a href="" id="btn-close" class="btn btn-primary shadow"> Keluar</a>
	</div>
</div>
<!-- footer -->


</form>
</div>

<script>
$(':input').keydown(function(e){
	remove_message();
	switch(e.which){
		case 13 :
		if($(this).is("textarea"))return;
		apply();
		return false;
	}
});

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
	
	$(':input').attr('disabled',true);
	$('#btn-apply').attr('disabled',true);
	$('#btn-cancel').attr('disabled',false);
	$('#btn-save').attr('disabled',false);
	$('#btn-save').focus();
}
function cancel(){
	
	$(':input').attr('disabled',false);
	$('#btn-cancel').attr('disabled',true);
	$('#btn-save').attr('disabled',true);
	$('#btn-apply').attr('disabled',false);
	
}

function simpan(){
	start_loading_in('#box-loading');
	
	$("#form-a").ybsRequest({
		append : {
			//yourIndexName: 'yourNewValue',
			
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



<br>
copy html code:
<pre>
&lt;!-- Horizontal Form -->
&lt;div class="box box-info shadow"  id="box-loading">
&lt;div class="box-header with-border">
&lt;h3 class="box-title">Horizontal Form&lt;/h3>
&lt;/div>
&lt;!-- /.box-header -->

&lt;!-- form start -->
&lt;form class="form-horizontal" id="form-a" method="POST" action="">

&lt;!-- body -->
&lt;div class="box-body">

	&lt;!-- input email -->
	&lt;div class="form-group">
	&lt;label for="inputEmail3" class="col-sm-2 control-label">Email&lt;/label>
	&lt;div class="col-sm-10">
	&lt;input type="email" class="form-control focus-color" id="inputEmail3" placeholder="Email" name="email">
	&lt;/div>
	&lt;/div>
	 
	&lt;!-- input password --> 
	&lt;div class="form-group">
	&lt;label for="inputPassword3" class="col-sm-2 control-label">Password&lt;/label>
	&lt;div class="col-sm-10">
	&lt;input type="password" class="form-control focus-color" id="inputPassword3" placeholder="Password" name="password">
	&lt;/div>
	&lt;/div>


	&lt;!-- checkbox --> 
	&lt;div class="form-group">
	&lt;div class="col-sm-offset-2 col-sm-10">
	&lt;div class="checkbox">
	&lt;label>
	&lt;input type="checkbox"> Remember me
	&lt;/label>
	&lt;/div>
	&lt;/div>
	&lt;/div>
             
&lt;/div>
&lt;!-- /.body -->

&lt;!-- footer -->
&lt;div class="box-footer">
	&lt;div class=" pull-right">
	&lt;button id="btn-apply" type="button" class="btn btn-primary shadow">&lt;i class="fe fe-check">&lt;/i>Apply&lt;/button>  
	&lt;button disabled="" id="btn-save" type="button" class="btn btn-primary shadow">&lt;i class="fe fe-save">&lt;/i>Simpan&lt;/button>  
	&lt;button disabled="" id="btn-cancel" type="button" class="btn btn-primary shadow"> Batal&lt;/button>
	&lt;a href="" id="btn-close" class="btn btn-primary shadow"> Keluar&lt;/a>
	&lt;/div>
&lt;/div>
&lt;!-- footer -->


&lt;/form>
&lt;/div>

</pre>

<br>
dan copy javascript code:
<pre>
&lt;script>
$(':input').keydown(function(e){
	remove_message();
	switch(e.which){
		case 13 :
		if($(this).is("textarea"))return;
		apply();
		return false;
	}
});

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
	
	$(':input').attr('disabled',true);
	$('#btn-apply').attr('disabled',true);
	$('#btn-cancel').attr('disabled',false);
	$('#btn-save').attr('disabled',false);
	$('#btn-save').focus();
}
function cancel(){
	
	$(':input').attr('disabled',false);
	$('#btn-cancel').attr('disabled',true);
	$('#btn-save').attr('disabled',true);
	$('#btn-apply').attr('disabled',false);
	
}

function simpan(){

	start_loading_in('#box-loading');
	
	$("#form-a").ybsRequest({
		
		append : {
			//yourIndexName: 'yourNewValue',
			
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






&lt;/script>

</pre>

<br><br><br><br>
</div>
</div>



<div class="row">
<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<br>
<h4  class="childFilter" style=" font-weight: bold;"># Form Vertical</h4>
<label class="label bg-gray childFilter">vertical form</label>
<label class="label bg-gray childFilter">panel default</label>
<label class="label bg-gray childFilter">panel info</label>
<label class="label bg-gray childFilter">panel success</label>
<label class="label bg-gray childFilter">panel warning</label>
<label class="label bg-gray childFilter">panel danger</label>



<br>
<br>    
sample :	
<br><br>		
<!-- Vertical Form -->
<div class="box box-info shadow"  id="box-loading">
<div class="box-header with-border">
<h3 class="box-title">Vertical Form</h3>
</div>
<!-- /.box-header -->

<!-- form start -->
<form class="" id="form-a" method="POST" action="">

<!-- body -->
<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control focus-color" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control  focus-color" id="exampleInputPassword1" placeholder="Password">
                </div>
              
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
<!-- /.body -->

<!-- footer -->
<div class="box-footer">
	<div class=" pull-right">
	<button id="btn-apply" type="button" class="btn btn-primary shadow"><i class="fe fe-check"></i>Apply</button>  
	<button disabled="" id="btn-save" type="button" class="btn btn-primary shadow"><i class="fe fe-save"></i>Simpan</button>  
	<button disabled="" id="btn-cancel" type="button" class="btn btn-primary shadow"> Batal</button>
	<a href="" id="btn-close" class="btn btn-primary shadow"> Keluar</a>
	</div>
</div>
<!-- footer -->


</form>
</div>

<script>
$(':input').keydown(function(e){
	remove_message();
	switch(e.which){
		case 13 :
		if($(this).is("textarea"))return;
		apply();
		return false;
	}
});

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
	
	$(':input').attr('disabled',true);
	$('#btn-apply').attr('disabled',true);
	$('#btn-cancel').attr('disabled',false);
	$('#btn-save').attr('disabled',false);
	$('#btn-save').focus();
}
function cancel(){
	
	$(':input').attr('disabled',false);
	$('#btn-cancel').attr('disabled',true);
	$('#btn-save').attr('disabled',true);
	$('#btn-apply').attr('disabled',false);
	
}

function simpan(){
	start_loading_in('#box-loading');
	
	$("#form-a").ybsRequest({
		
		append : {
			//yourIndexName: 'yourNewValue',
			
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



<br>
copy html code:
<pre>
&lt;!-- Vertical Form -->
&lt;div class="box box-info shadow"  id="box-loading">
&lt;div class="box-header with-border">
&lt;h3 class="box-title">Vertical Form&lt;/h3>
&lt;/div>
&lt;!-- /.box-header -->

&lt;!-- form start -->
&lt;form class="" id="form-a" method="POST" action="">

&lt;!-- body -->
&lt;div class="box-body">
                &lt;div class="form-group">
                  &lt;label for="exampleInputEmail1">Email address&lt;/label>
                  &lt;input type="email" class="form-control focus-color" id="exampleInputEmail1" placeholder="Enter email">
                &lt;/div>
                &lt;div class="form-group">
                  &lt;label for="exampleInputPassword1">Password&lt;/label>
                  &lt;input type="password" class="form-control  focus-color" id="exampleInputPassword1" placeholder="Password">
                &lt;/div>
              
                &lt;div class="checkbox">
                  &lt;label>
                    &lt;input type="checkbox"> Check me out
                  &lt;/label>
                &lt;/div>
              &lt;/div>
&lt;!-- /.body -->

&lt;!-- footer -->
&lt;div class="box-footer">
	&lt;div class=" pull-right">
	&lt;button id="btn-apply" type="button" class="btn btn-primary shadow">&lt;i class="fe fe-check">&lt;/i>Apply&lt;/button>  
	&lt;button disabled="" id="btn-save" type="button" class="btn btn-primary shadow">&lt;i class="fe fe-save">&lt;/i>Simpan&lt;/button>  
	&lt;button disabled="" id="btn-cancel" type="button" class="btn btn-primary shadow"> Batal&lt;/button>
	&lt;a href="" id="btn-close" class="btn btn-primary shadow"> Keluar&lt;/a>
	&lt;/div>
&lt;/div>
&lt;!-- footer -->

</pre>

<br>
dan copy javascript code:
<pre>
&lt;script>
$(':input').keydown(function(e){
	remove_message();
	switch(e.which){
		case 13 :
		if($(this).is("textarea"))return;
		apply();
		return false;
	}
});

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
	
	$(':input').attr('disabled',true);
	$('#btn-apply').attr('disabled',true);
	$('#btn-cancel').attr('disabled',false);
	$('#btn-save').attr('disabled',false);
	$('#btn-save').focus();
}
function cancel(){
	
	$(':input').attr('disabled',false);
	$('#btn-cancel').attr('disabled',true);
	$('#btn-save').attr('disabled',true);
	$('#btn-apply').attr('disabled',false);
	
}

function simpan(){

	start_loading_in('#box-loading');
	
	$("#form-a").ybsRequest({
		
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






&lt;/script>

</pre>

<br><br><br><br>
</div>
</div>






</section>
