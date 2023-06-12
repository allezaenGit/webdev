


<div class="row ">

<div class="col-md-12 parentFilter">		

<h4  class="childFilter"># SINGLE BUTTON</h4>
<label class="label bg-gray childFilter">default</label>
<label class="label bg-gray childFilter">primary</label>
<label class="label bg-gray childFilter">success shadow</label>
<label class="label bg-gray childFilter">danger shadow</label>
<label class="label bg-gray childFilter">warning shadow</label>
<label class="label bg-gray childFilter">info shadow</label>

<br>
<br>
sample :	
<br>	
<button type="button" class="btn btn-sm btn-default childFilter">Default</button>
<button type="button" class="btn btn-sm btn-primary childFilter">Primary</button>
<button type="button" class="btn btn-sm btn-success shadow childFilter">Success Shadow</button>
<button type="button" class="btn btn-sm btn-danger shadow childFilter">danger Shadow</button>
<button type="button" class="btn btn-sm btn-warning shadow childFilter">warning Shadow</button>
<button type="button" class="btn btn-sm btn-info shadow childFilter">info Shadow</button>
<br><br>

<pre>
<button type="button" class="btn btn-sm btn-default">Default</button>
<button type="button" class="btn btn-sm btn-primary">Primary</button>
<button type="button" class="btn btn-sm btn-success shadow">Success Shadow</button>
<button type="button" class="btn btn-sm btn-danger shadow">danger Shadow</button>
<button type="button" class="btn btn-sm btn-warning shadow">warning Shadow</button>
<button type="button" class="btn btn-sm btn-info shadow">info Shadow</button>
</pre>	


<br><br> <br><br>

</div>

</div>
      <!-- ./row -->
	 

<div class="row ">

<div class="col-md-12 parentFilter">		

<h4  class="childFilter"># SCRIPT ALERT MESSAGE + SOUND</h4>
<label class="label bg-gray childFilter">alert</label>
<label class="label bg-gray childFilter">Toast</label>
<label class="label bg-gray childFilter">sweet alert</label>
<label class="label bg-gray childFilter">default</label>
<label class="label bg-gray childFilter">primary</label>
<label class="label bg-gray childFilter">success shadow</label>
<label class="label bg-gray childFilter">danger shadow</label>
<label class="label bg-gray childFilter">warning shadow</label>
<label class="label bg-gray childFilter">info shadow</label>

<br>
<br>
sample alert default:	
<br>	
<button type="button" class="btn btn-sm btn-success shadow " onclick="message_success()"><i class="fe fe-check"> </i> Success Default</button>
<button type="button" class="btn btn-sm btn-warning shadow " onclick="message_warning()"><i class="fa fa-warning"> </i> Warning Default</button>
<button type="button" class="btn btn-sm btn-danger shadow " onclick="message_danger()"><i class="fe fe-alert-circle"> </i> Failed Default</button>
<br>
<br>
sample sweet alert default:	
<br>
<button type="button" class="btn btn-sm btn-success shadow " onclick="message_success_sweet_default()"><i class="fe fe-check"> </i> Success Sweet Alert Default</button>
<button type="button" class="btn btn-sm btn-warning shadow " onclick="message_warning_sweet_default()"><i class="fa fa-warning"> </i> Warning Sweet Alert Default</button>
<button type="button" class="btn btn-sm btn-danger shadow " onclick="message_error_sweet_default()"><i class="fe fe-alert-circle"> </i> Warning Sweet Alert Default</button>

<br>
<br>
sample sweet alert small:	
<br>
<button type="button" class="btn btn-sm btn-success shadow " onclick="message_success_sweet_small()"><i class="fe fe-check"> </i> Success Sweet Alert Small</button>
<button type="button" class="btn btn-sm btn-warning shadow " onclick="message_warning_sweet_small()"><i class="fe fe-check"> </i> Warning Sweet Alert Small</button>
<button type="button" class="btn btn-sm btn-danger shadow " onclick="message_error_sweet_small()"><i class="fe fe-check"> </i> Failed Sweet Alert Small</button>
<br>
<br>
sample sweet alert small top-left:	
<br>
<button type="button" class="btn btn-sm btn-success shadow " onclick="message_success_sweet_small('top-left')"><i class="fe fe-check"> </i> Success Sweet Alert Small top-left</button>
<button type="button" class="btn btn-sm btn-warning shadow " onclick="message_warning_sweet_small('top-left')"><i class="fe fe-check"> </i> Warning Sweet Alert Small top-left</button>
<button type="button" class="btn btn-sm btn-danger shadow " onclick="message_error_sweet_small('top-left')"><i class="fe fe-check"> </i> Failed Sweet Alert Small top-left</button>
<br>
<br>
sample sweet alert small top-right:	
<br>
<button type="button" class="btn btn-sm btn-success shadow " onclick="message_success_sweet_small('top-right')"><i class="fe fe-check"> </i> Success Sweet Alert Small top-right</button>
<button type="button" class="btn btn-sm btn-warning shadow " onclick="message_warning_sweet_small('top-right')"><i class="fe fe-check"> </i> Warning Sweet Alert Small top-right</button>
<button type="button" class="btn btn-sm btn-danger shadow " onclick="message_error_sweet_small('top-right')"><i class="fe fe-check"> </i> Failed Sweet Alert Small top-right</button>
<br>
<br>
sample sweet alert small bottom-right:	
<br>
<button type="button" class="btn btn-sm btn-success shadow " onclick="message_success_sweet_small('bottom-right')"><i class="fe fe-check"> </i> Success Sweet Alert Small bottom-right</button>
<button type="button" class="btn btn-sm btn-warning shadow " onclick="message_warning_sweet_small('bottom-right')"><i class="fe fe-check"> </i> Warning Sweet Alert Small bottom-right</button>
<button type="button" class="btn btn-sm btn-danger shadow " onclick="message_error_sweet_small('bottom-right')"><i class="fe fe-check"> </i> Failed Sweet Alert Small bottom-right</button>
<br>
<br>
sample sweet alert small bottom-left:	
<br>
<button type="button" class="btn btn-sm btn-success shadow " onclick="message_success_sweet_small('bottom-left')"><i class="fe fe-check"> </i> Success Sweet Alert Small bottom-left</button>
<button type="button" class="btn btn-sm btn-warning shadow " onclick="message_warning_sweet_small('bottom-left')"><i class="fe fe-check"> </i> Warning Sweet Alert Small bottom-left</button>
<button type="button" class="btn btn-sm btn-danger shadow " onclick="message_error_sweet_small('bottom-left')"><i class="fe fe-check"> </i> Failed Sweet Alert Small bottom-left</button>
<br>
<br>
<script> 

    


	
 	function message_success() { 
		show_success_message("ini pesan Sukses"); 
		play_sound_success(); 
 	}; 


	
 	function message_warning() { 
		show_warning_message("ini pesan warning"); 
		play_sound_entered(); 
 	}; 

 	function message_danger() { 
		show_error_message("ini pesan error"); 
		play_sound_failed(); 
 	}; 

	

	function message_success_sweet_default(){
		show_success_message("Ini pesan Sukses !",true); 
		play_sound_success(); 
	}
	
	function message_warning_sweet_default(){
		show_warning_message("Ini pesan warning !",true); 
		play_sound_entered(); 
	}
	
	function message_error_sweet_default(){
		show_error_message("Ini pesan Error !",true); 
		play_sound_failed(); 
	}		

	function message_success_sweet_small(newPosition){
		show_success_message("Ini pesan Sukses !",true,{size:"small",position:newPosition}); 
		play_sound_success(); 
	}
	
	function message_warning_sweet_small(newPosition){
		show_warning_message("Ini pesan warning !",true,{size:"small",position:newPosition}); 
		play_sound_entered(); 
	}
	
	function message_error_sweet_small(newPosition){
		show_error_message("Ini pesan Error !",true,{size:"small",position:newPosition}); 
		play_sound_failed(); 
	}		
	
	

</script>
<br><br>

<pre>
&lt;!-- Alert Default -->
&lt;button type="button" class="btn btn-sm btn-success shadow " onclick="message_success()">&lt;i class="fe fe-check"> &lt;/i> Success&lt;/button>

&lt;button type="button" class="btn btn-sm btn-warning shadow " onclick="message_warning()">&lt;i class="fa fa-warning"> &lt;/i> Warning&lt;/button>

&lt;button type="button" class="btn btn-sm btn-danger shadow " onclick="message_danger()">&lt;i class="fe fe-alert-circle"> &lt;/i> Failed&lt;/button>

&lt;script> 
 	function message_success() { 
		show_success_message("ini pesan Sukses"); 
		play_sound_success(); 
 	}; 

 	function message_warning() { 
		show_warning_message("ini pesan warning"); 
		play_sound_entered(); 
 	}; 

 	function message_danger() { 
		show_error_message("ini pesan error"); 
		play_sound_failed(); 
 	}; 

&lt;/script>

&lt;!-- /.Alert Default -->
</pre>	
<br>
<pre>
&lt;!-- Sweet Alert Default -->
&lt;button type="button" class="btn btn-sm btn-success shadow " onclick="message_success_sweet_default()">&lt;i class="fe fe-check"> &lt;/i> Success Sweet Alert Default&lt;/button>

&lt;button type="button" class="btn btn-sm btn-warning shadow " onclick="message_warning_sweet_default()">&lt;i class="fa fa-warning"> &lt;/i> Warning Sweet Alert Default&lt;/button>

&lt;button type="button" class="btn btn-sm btn-danger shadow " onclick="message_error_sweet_default()">&lt;i class="fe fe-alert-circle"> &lt;/i> Warning Sweet Alert Default&lt;/button>

&lt;script> 
 	function message_success_sweet_default(){
		show_success_message("Ini pesan Sukses !",true); 
		play_sound_success(); 
	}
	
	function message_warning_sweet_default(){
		show_warning_message("Ini pesan warning !",true); 
		play_sound_entered(); 
	}
	
	function message_error_sweet_default(){
		show_error_message("Ini pesan Error !",true); 
		play_sound_failed(); 
	}	
&lt;/script>

&lt;!-- /.Sweet Alert Default -->
</pre>	

<br>
<pre>
&lt;!-- Sweet Alert Small Center -->
&lt;button type="button" class="btn btn-sm btn-success shadow " onclick="message_success_sweet_small()">&lt;i class="fe fe-check"> &lt;/i> Success Sweet Alert Small&lt;/button>

&lt;button type="button" class="btn btn-sm btn-warning shadow " onclick="message_warning_sweet_small()">&lt;i class="fe fe-check"> &lt;/i> Warning Sweet Alert Small&lt;/button>

&lt;button type="button" class="btn btn-sm btn-danger shadow " onclick="message_error_sweet_small()">&lt;i class="fe fe-check"> &lt;/i> Failed Sweet Alert Small&lt;/button>
&lt;!-- ./ Sweet Alert Small Center -->



&lt;!-- Sweet Alert Small Top Left -->
&lt;button type="button" class="btn btn-sm btn-success shadow " onclick="message_success_sweet_small('top-left')">&lt;i class="fe fe-check"> &lt;/i> Success Sweet Alert Small top-left&lt;/button>

&lt;button type="button" class="btn btn-sm btn-warning shadow " onclick="message_warning_sweet_small('top-left')">&lt;i class="fe fe-check"> &lt;/i> Warning Sweet Alert Small top-left&lt;/button>

&lt;button type="button" class="btn btn-sm btn-danger shadow " onclick="message_error_sweet_small('top-left')">&lt;i class="fe fe-check"> &lt;/i> Failed Sweet Alert Small top-left&lt;/button>
&lt;!-- ./ Sweet Alert Small Top Left -->



&lt;!-- Sweet Alert Small Top right -->
&lt;button type="button" class="btn btn-sm btn-success shadow " onclick="message_success_sweet_small('top-right')">&lt;i class="fe fe-check"> &lt;/i> Success Sweet Alert Small top-right&lt;/button>

&lt;button type="button" class="btn btn-sm btn-warning shadow " onclick="message_warning_sweet_small('top-right')">&lt;i class="fe fe-check"> &lt;/i> Warning Sweet Alert Small top-right&lt;/button>

&lt;button type="button" class="btn btn-sm btn-danger shadow " onclick="message_error_sweet_small('top-right')">&lt;i class="fe fe-check"> &lt;/i> Failed Sweet Alert Small top-right&lt;/button>
&lt;!-- ./ Sweet Alert Small Top right -->


&lt;!-- Sweet Alert Small Bottom right -->
&lt;button type="button" class="btn btn-sm btn-success shadow " onclick="message_success_sweet_small('bottom-right')">&lt;i class="fe fe-check"> &lt;/i> Success Sweet Alert Small bottom-right&lt;/button>

&lt;button type="button" class="btn btn-sm btn-warning shadow " onclick="message_warning_sweet_small('bottom-right')">&lt;i class="fe fe-check"> &lt;/i> Warning Sweet Alert Small bottom-right&lt;/button>

&lt;button type="button" class="btn btn-sm btn-danger shadow " onclick="message_error_sweet_small('bottom-right')">&lt;i class="fe fe-check"> &lt;/i> Failed Sweet Alert Small bottom-right&lt;/button>
&lt;!-- ./ Sweet Alert Small Bottom right -->


&lt;!-- Sweet Alert Small Bottom left -->
&lt;button type="button" class="btn btn-sm btn-success shadow " onclick="message_success_sweet_small('bottom-left')">&lt;i class="fe fe-check"> &lt;/i> Success Sweet Alert Small bottom-left&lt;/button>

&lt;button type="button" class="btn btn-sm btn-warning shadow " onclick="message_warning_sweet_small('bottom-left')">&lt;i class="fe fe-check"> &lt;/i> Warning Sweet Alert Small bottom-left&lt;/button>

&lt;button type="button" class="btn btn-sm btn-danger shadow " onclick="message_error_sweet_small('bottom-left')">&lt;i class="fe fe-check"> &lt;/i> Failed Sweet Alert Small bottom-left&lt;/button>
&lt;!-- ./ Sweet Alert Small Bottom left -->


&lt;!-- / JANGAN LUPA COPY CODE INI..-->
&lt;script> 
 	function message_success_sweet_small(newPosition){
		show_success_message("Ini pesan Sukses !",true,{size:"small",position:newPosition}); 
		play_sound_success(); 
	}
	
	function message_warning_sweet_small(newPosition){
		show_warning_message("Ini pesan warning !",true,{size:"small",position:newPosition}); 
		play_sound_entered(); 
	}
	
	function message_error_sweet_small(newPosition){
		show_error_message("Ini pesan Error !",true,{size:"small",position:newPosition}); 
		play_sound_failed(); 
	}		
&lt;/script>


</pre>	

<br><br> <br><br>

</div>

</div>




<div class="row ">

<div class="col-md-12 parentFilter">		

<h4  class="childFilter"># SCRIPT SOUND</h4>
<label class="label bg-gray childFilter">alert</label>
<label class="label bg-gray childFilter">default</label>
<label class="label bg-gray childFilter">primary</label>
<label class="label bg-gray childFilter">success shadow</label>
<label class="label bg-gray childFilter">danger shadow</label>
<label class="label bg-gray childFilter">warning shadow</label>
<label class="label bg-gray childFilter">info shadow</label>

<br>
<br>
sample :	
<br>	
<button type="button" class="btn btn-sm btn-success shadow " onclick="start_sound_success()"><i class="fe fe-check"> </i> Sound Success</button>
<button type="button" class="btn btn-sm btn-danger shadow " onclick="start_sound_failed()"><i class="fe fe-alert-circle"> </i> Sound Failed</button>
<button type="button" class="btn btn-sm btn-primary shadow " onclick="start_sound_apply()"><i class="fe fe-check"> </i> Sound Apply</button>
<button type="button" class="btn btn-sm btn-primary shadow " onclick="start_sound_entered()"><i class="fa fa-mouse-pointer"> </i> Sound Entered</button>
<button type="button" class="btn btn-sm btn-primary shadow " onclick="start_sound_click()"><i class="fa fa-hand-o-up"> </i> Sound Clik</button>
<script> 
 	function start_sound_success() { 
		play_sound_success(); 
 	}; 

 	function start_sound_failed() { 
		play_sound_failed(); 
 	}; 

 	function start_sound_apply() { 
		play_sound_apply(); 
 	}; 

 	function start_sound_entered() { 
		play_sound_entered(); 
 	}; 

 	function start_sound_click() { 
		play_sound_click(); 
 	}; 

</script>
<br><br>

<pre>
&lt;button type="button" class="btn btn-sm btn-success shadow " onclick="start_sound_success()">&lt;i class="fe fe-check"> &lt;/i> Sound Success&lt;/button>
&lt;button type="button" class="btn btn-sm btn-danger shadow " onclick="start_sound_failed()">&lt;i class="fe fe-alert-circle"> &lt;/i> Sound Failed&lt;/button>
&lt;button type="button" class="btn btn-sm btn-primary shadow " onclick="start_sound_apply()">&lt;i class="fe fe-check"> &lt;/i> Sound Apply&lt;/button>
&lt;button type="button" class="btn btn-sm btn-primary shadow " onclick="start_sound_entered()">&lt;i class="fa fa-mouse-pointer"> &lt;/i> Sound Entered&lt;/button>
&lt;button type="button" class="btn btn-sm btn-primary shadow " onclick="start_sound_click()">&lt;i class="fa fa-hand-o-up"> &lt;/i> Sound Clik&lt;/button>
&lt;script> 
 	function start_sound_success() { 
		play_sound_success(); 
 	}; 

 	function start_sound_failed() { 
		play_sound_failed(); 
 	}; 

 	function start_sound_apply() { 
		play_sound_apply(); 
 	}; 

 	function start_sound_entered() { 
		play_sound_entered(); 
 	}; 

 	function start_sound_click() { 
		play_sound_click(); 
 	}; 

&lt;/script>
</pre>	


<br><br> <br><br>

</div>

</div>



	 
<div class="row">
<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<br>
<h4  class="childFilter" style=" font-weight: bold;"># FORM BUTTON</h4>
<label class="label bg-gray childFilter">apply</label>
<label class="label bg-gray childFilter">simpan</label>
<label class="label bg-gray childFilter">batal</label>
<label class="label bg-gray childFilter">keluar</label>


<br>
<br>

sample :
<br>
<div class="box-footer">
<div class="pull-right">
	<button id='btn-apply' type='button' class='btn btn-primary shadow '><i class='fe fe-check childFilter'>Apply</i></button>	
	<button disabled='' id='btn-save' type='button' class='btn btn-primary shadow'><i class="fe fe-save childFilter">Simpan</i></button>	
	<button disabled='' id='btn-cancel' type='button' class='btn btn-primary shadow childFilter'>Batal</button>
	<a href='<?php echo $link_back ?>' id='btn-close' class='btn btn-primary shadow childFilter'>Keluar</a>
</div>
</div>
<br>
<pre>
&lt;div class="box-footer">
&lt;div class=" pull-right">
	&lt;button id='btn-apply' type='button' class='btn btn-primary shadow'>&lt;i class='fe fe-check'>&lt;/i>Apply&lt;/button>	
	&lt;button disabled='' id='btn-save' type='button' class='btn btn-primary shadow'>&lt;i class="fe fe-save">&lt;/i>Simpan&lt;/button>	
	&lt;button disabled='' id='btn-cancel' type='button' class='btn btn-primary shadow'> Batal&lt;/button>
	&lt;a href='' id='btn-close' class='btn btn-primary shadow'> Keluar&lt;/a>
&lt;/div>
&lt;/div>
</pre>

<br><br> <br><br>

</div>

</div>
      <!-- ./row -->	  
	  

     



<div class="row">
<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<br>
<h4  class="childFilter" style=" font-weight: bold;"># BUTTON BLOCK</h4>
<label class="label bg-gray childFilter">.btn-block</label>
<label class="label bg-gray childFilter">.btn-block .btn-flat</label>
<label class="label bg-gray childFilter">.btn-block .btn-sm</label>



<br>
<br>  	  
sample :	
<br>
<button type="button" class="btn btn-default btn-block childFilter">.btn-block</button>
<button type="button" class="btn btn-default btn-block btn-flat childFilter">.btn-block .btn-flat</button>
<button type="button" class="btn btn-default btn-block btn-sm childFilter">.btn-block .btn-sm</button>
<br>

<pre>
<button type="button" class="btn btn-default btn-block">.btn-block</button>
<button type="button" class="btn btn-default btn-block btn-flat">.btn-block .btn-flat</button>
<button type="button" class="btn btn-default btn-block btn-sm">.btn-block .btn-sm</button>
</pre>	

<br><br> <br><br>
 </div>
</div>          
			

       

<div class="row">
<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<br>
<h4  class="childFilter" style=" font-weight: bold;"># BUTTON GROUP</h4>
<label class="label bg-gray childFilter">align</label>
<label class="label bg-gray childFilter">left</label>
<label class="label bg-gray childFilter">middle</label>
<label class="label bg-gray childFilter">right</label>
<label class="label bg-gray childFilter">dropdown</label>
<label class="label bg-gray childFilter">icons</label>
<label class="label bg-gray childFilter">flat</label>
<label class="label bg-gray childFilter">horizontal</label>
<label class="label bg-gray childFilter">combobox</label>
<br>
<br>      	  
sample :	
<br>

<div class="btn-group ">
<button type="button" class="btn btn-default childFilter">Left</button>
<button type="button" class="btn btn-default childFilter">Middle</button>
<button type="button" class="btn btn-default childFilter">Right</button>
</div>
<br>

<pre>
<div class="btn-group">
<button type="button" class="btn btn-default">Left</button>
<button type="button" class="btn btn-default">Middle</button>
<button type="button" class="btn btn-default">Right</button>
</div>
</pre>
	
<br><br>
<!-- end sample -->

<!-- sample -->
sample :	
<br>
<div class="btn-group">
<button type="button" class="btn btn-default"><i class="fa fa-align-left"></i></button>
<button type="button" class="btn btn-default"><i class="fa fa-align-center"></i></button>
<button type="button" class="btn btn-default"><i class="fa fa-align-right"></i></button>
</div>
<br>

<pre>
<div class="btn-group">
<button type="button" class="btn btn-default"><i class="fa fa-align-left"></i></button>
<button type="button" class="btn btn-default"><i class="fa fa-align-center"></i></button>
<button type="button" class="btn btn-default"><i class="fa fa-align-right"></i></button>
</div>
</pre>


<!-- end sample -->

	
<!-- sample -->
<br>     	  
sample :	
<br>

<div class="btn-group">
<button type="button" class="btn btn-default btn-flat"><i class="fa fa-align-left"></i></button>
<button type="button" class="btn btn-default btn-flat"><i class="fa fa-align-center"></i></button>
<button type="button" class="btn btn-default btn-flat"><i class="fa fa-align-right"></i></button>
</div>
<br>

<pre>

<div class="btn-group">
<button type="button" class="btn btn-default btn-flat"><i class="fa fa-align-left"></i></button>
<button type="button" class="btn btn-default btn-flat"><i class="fa fa-align-center"></i></button>
<button type="button" class="btn btn-default btn-flat"><i class="fa fa-align-right"></i></button>
</div>

</pre>	
<br><br>
<!-- end sample -->


<!-- sample -->
<br>     	  
sample :	
<br>

<div class="btn-group">
	<button type="button" class="btn btn-default">1</button>
	<button type="button" class="btn btn-default">2</button>

	<div class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	<span class="caret"></span>
	</button>

	<ul class="dropdown-menu">
	<li><a href="#">Dropdown link</a></li>
	<li><a href="#">Dropdown link</a></li>
	</ul>

</div>
</div>

<br>code :	<br>			
<pre>

<!--Dropdown-->
<div class="btn-group">
	<button type="button" class="btn btn-default">1</button>
	<button type="button" class="btn btn-default">2</button>

	<div class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	<span class="caret"></span>
	</button>

	<ul class="dropdown-menu">
	<li><a href="#">Dropdown link</a></li>
	<li><a href="#">Dropdown link</a></li>
	</ul>

</div>
</div>
<!-- END -->
					
</pre>
	  
<br>
<br>
              <table class="table table-bordered">
                <tr>
                  <th>Button</th>
                  <th>Icons</th>
                  <th>Flat</th>
                  <th>Dropdown</th>
                </tr>
                <!-- Default -->
                <tr>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default">Left</button>
                      <button type="button" class="btn btn-default">Middle</button>
                      <button type="button" class="btn btn-default">Right</button>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default"><i class="fa fa-align-left"></i></button>
                      <button type="button" class="btn btn-default"><i class="fa fa-align-center"></i></button>
                      <button type="button" class="btn btn-default"><i class="fa fa-align-right"></i></button>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default btn-flat"><i class="fa fa-align-left"></i></button>
                      <button type="button" class="btn btn-default btn-flat"><i class="fa fa-align-center"></i></button>
                      <button type="button" class="btn btn-default btn-flat"><i class="fa fa-align-right"></i></button>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default">1</button>
                      <button type="button" class="btn btn-default">2</button>

                      <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Dropdown link</a></li>
                          <li><a href="#">Dropdown link</a></li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <!-- ./default -->
                <!-- Info -->
                <tr>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-info">Left</button>
                      <button type="button" class="btn btn-info">Middle</button>
                      <button type="button" class="btn btn-info">Right</button>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-info"><i class="fa fa-align-left"></i></button>
                      <button type="button" class="btn btn-info"><i class="fa fa-align-center"></i></button>
                      <button type="button" class="btn btn-info"><i class="fa fa-align-right"></i></button>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-info btn-flat"><i class="fa fa-align-left"></i></button>
                      <button type="button" class="btn btn-info btn-flat"><i class="fa fa-align-center"></i></button>
                      <button type="button" class="btn btn-info btn-flat"><i class="fa fa-align-right"></i></button>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-info">1</button>
                      <button type="button" class="btn btn-info">2</button>

                      <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Dropdown link</a></li>
                          <li><a href="#">Dropdown link</a></li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <!-- /. info -->
                <!-- /.danger -->
                <tr>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-danger">Left</button>
                      <button type="button" class="btn btn-danger">Middle</button>
                      <button type="button" class="btn btn-danger">Right</button>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-danger"><i class="fa fa-align-left"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-align-center"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-align-right"></i></button>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-danger btn-flat"><i class="fa fa-align-left"></i></button>
                      <button type="button" class="btn btn-danger btn-flat"><i class="fa fa-align-center"></i></button>
                      <button type="button" class="btn btn-danger btn-flat"><i class="fa fa-align-right"></i></button>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-danger">1</button>
                      <button type="button" class="btn btn-danger">2</button>

                      <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Dropdown link</a></li>
                          <li><a href="#">Dropdown link</a></li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <!-- /.danger -->
                <!-- warning -->
                <tr>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-warning">Left</button>
                      <button type="button" class="btn btn-warning">Middle</button>
                      <button type="button" class="btn btn-warning">Right</button>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-warning"><i class="fa fa-align-left"></i></button>
                      <button type="button" class="btn btn-warning"><i class="fa fa-align-center"></i></button>
                      <button type="button" class="btn btn-warning"><i class="fa fa-align-right"></i></button>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-warning btn-flat"><i class="fa fa-align-left"></i></button>
                      <button type="button" class="btn btn-warning btn-flat"><i class="fa fa-align-center"></i></button>
                      <button type="button" class="btn btn-warning btn-flat"><i class="fa fa-align-right"></i></button>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-warning">1</button>
                      <button type="button" class="btn btn-warning">2</button>

                      <div class="btn-group">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Dropdown link</a></li>
                          <li><a href="#">Dropdown link</a></li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <!-- /.warning -->
                <!-- success -->
                <tr>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-success">Left</button>
                      <button type="button" class="btn btn-success">Middle</button>
                      <button type="button" class="btn btn-success">Right</button>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-success"><i class="fa fa-align-left"></i></button>
                      <button type="button" class="btn btn-success"><i class="fa fa-align-center"></i></button>
                      <button type="button" class="btn btn-success"><i class="fa fa-align-right"></i></button>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-success btn-flat"><i class="fa fa-align-left"></i></button>
                      <button type="button" class="btn btn-success btn-flat"><i class="fa fa-align-center"></i></button>
                      <button type="button" class="btn btn-success btn-flat"><i class="fa fa-align-right"></i></button>
                    </div>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-success">1</button>
                      <button type="button" class="btn btn-success">2</button>

                      <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Dropdown link</a></li>
                          <li><a href="#">Dropdown link</a></li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <!-- /.success -->
              </table>.
<br><br> <br><br>
</div>
</div>
          <!-- /.box -->



    





<div class="row">
<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<br>
<h4  class="childFilter" style=" font-weight: bold;"># BUTTON SPLIT</h4>
<label class="label bg-gray childFilter">action</label>
<label class="label bg-gray childFilter">link</label>
<label class="label bg-gray childFilter">another action</label>
<label class="label bg-gray childFilter">dropdown</label>
<label class="label bg-gray childFilter">horizontal</label>
<label class="label bg-gray childFilter">combobox</label>


<br>
<br>      	  
sample :	
<br>
<div class="btn-group">
                  <button type="button" class="btn btn-default">Action</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
</div>
<br><br>
<pre>
<div class="btn-group">
                  <button type="button" class="btn btn-default">Action</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
</div>
</pre>



            
            <div class="box-body">
              <!-- Split button -->
              <p>Normal split buttons:</p>

              <div class="margin">
                <div class="btn-group">
                  <button type="button" class="btn btn-default">Action</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-info">Action</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-danger">Action</button>
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-success">Action</button>
                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-warning">Action</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
              </div>
			  
			  
			  
              <!-- flat split buttons -->
              <p>Flat split buttons:</p>

              <div class="margin">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-flat">Action</button>
                  <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-info btn-flat">Action</button>
                  <button type="button" class="btn btn-info btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-danger btn-flat">Action</button>
                  <button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-flat">Action</button>
                  <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-warning btn-flat">Action</button>
                  <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
              </div>
			
            </div>
            <!-- /.box-body -->







 <br><br> <br><br>
</div>
</div>







       
       
         






 


<div class="row">
<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<br>
<h4  class="childFilter" style=" font-weight: bold;"># Social Buttons</h4>
<label class="label bg-gray childFilter">social buttons</label>
<label class="label bg-gray childFilter">Sign in with Bitbucket</label>
<label class="label bg-gray childFilter">link</label>
<label class="label bg-gray childFilter">another action</label>
<label class="label bg-gray childFilter">bitbucket</label>
<label class="label bg-gray childFilter">facebook</label>
<label class="label bg-gray childFilter">flickr</label>
<label class="label bg-gray childFilter">foursquare</label>
<label class="label bg-gray childFilter">github</label>
<label class="label bg-gray childFilter">google</label>
<label class="label bg-gray childFilter">instagram</label>
<label class="label bg-gray childFilter">linkedin</label>
<label class="label bg-gray childFilter">tumblr</label>
<label class="label bg-gray childFilter">twitter</label>
<label class="label bg-gray childFilter">vk</label>

<br>
<br>      	  
sample :	
<br>

<a class="btn btn-block btn-social btn-bitbucket">
    <i class="fa fa-bitbucket"></i> Sign in with Bitbucket
</a>




<br><br>
<pre>
<a class="btn btn-block btn-social btn-bitbucket">
    <i class="fa fa-bitbucket"></i> Sign in with Bitbucket
</a>

</pre>


<br>     	  
sample :	
<br>
<div class="text-left">
	<a class="btn btn-social-icon btn-bitbucket"><i class="fa fa-bitbucket"></i></a>
	<a class="btn btn-social-icon btn-dropbox"><i class="fa fa-dropbox"></i></a>
	<a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
	<a class="btn btn-social-icon btn-flickr"><i class="fa fa-flickr"></i></a>
	<a class="btn btn-social-icon btn-foursquare"><i class="fa fa-foursquare"></i></a>
	<a class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a>
	<a class="btn btn-social-icon btn-google"><i class="fa fa-google-plus"></i></a>
	<a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
	<a class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
	<a class="btn btn-social-icon btn-tumblr"><i class="fa fa-tumblr"></i></a>
	<a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
	<a class="btn btn-social-icon btn-vk"><i class="fa fa-vk"></i></a>
</div>
				
<br><br>
<pre>
<div class="text-left">
	<a class="btn btn-social-icon btn-bitbucket"><i class="fa fa-bitbucket"></i></a>
	<a class="btn btn-social-icon btn-dropbox"><i class="fa fa-dropbox"></i></a>
	<a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
	<a class="btn btn-social-icon btn-flickr"><i class="fa fa-flickr"></i></a>
	<a class="btn btn-social-icon btn-foursquare"><i class="fa fa-foursquare"></i></a>
	<a class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a>
	<a class="btn btn-social-icon btn-google"><i class="fa fa-google-plus"></i></a>
	<a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
	<a class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
	<a class="btn btn-social-icon btn-tumblr"><i class="fa fa-tumblr"></i></a>
	<a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
	<a class="btn btn-social-icon btn-vk"><i class="fa fa-vk"></i></a>
</div>
</pre>



<br>     	  
sample :	
<br>
<a class="btn btn-block btn-social btn-bitbucket">
<i class="fa fa-bitbucket"></i> Sign in with Bitbucket
</a>

<a class="btn btn-block btn-social btn-dropbox">
<i class="fa fa-dropbox"></i> Sign in with Dropbox
</a>

<a class="btn btn-block btn-social btn-facebook">
<i class="fa fa-facebook"></i> Sign in with Facebook
</a>

<a class="btn btn-block btn-social btn-flickr">
<i class="fa fa-flickr"></i> Sign in with Flickr
</a>

<a class="btn btn-block btn-social btn-foursquare">
<i class="fa fa-foursquare"></i> Sign in with Foursquare
</a>

<a class="btn btn-block btn-social btn-github">
<i class="fa fa-github"></i> Sign in with GitHub
</a>

<a class="btn btn-block btn-social btn-google">
<i class="fa fa-google-plus"></i> Sign in with Google
</a>

<a class="btn btn-block btn-social btn-instagram">
<i class="fa fa-instagram"></i> Sign in with Instagram
</a>

<a class="btn btn-block btn-social btn-linkedin">
<i class="fa fa-linkedin"></i> Sign in with LinkedIn
</a>

<a class="btn btn-block btn-social btn-tumblr">
<i class="fa fa-tumblr"></i> Sign in with Tumblr
</a>

<a class="btn btn-block btn-social btn-twitter">
<i class="fa fa-twitter"></i> Sign in with Twitter
</a>

<a class="btn btn-block btn-social btn-vk">
<i class="fa fa-vk"></i> Sign in with VK
</a>

<br><br>
<pre>
<a class="btn btn-block btn-social btn-bitbucket">
<i class="fa fa-bitbucket"></i> Sign in with Bitbucket
</a>

<a class="btn btn-block btn-social btn-dropbox">
<i class="fa fa-dropbox"></i> Sign in with Dropbox
</a>

<a class="btn btn-block btn-social btn-facebook">
<i class="fa fa-facebook"></i> Sign in with Facebook
</a>

<a class="btn btn-block btn-social btn-flickr">
<i class="fa fa-flickr"></i> Sign in with Flickr
</a>

<a class="btn btn-block btn-social btn-foursquare">
<i class="fa fa-foursquare"></i> Sign in with Foursquare
</a>

<a class="btn btn-block btn-social btn-github">
<i class="fa fa-github"></i> Sign in with GitHub
</a>

<a class="btn btn-block btn-social btn-google">
<i class="fa fa-google-plus"></i> Sign in with Google
</a>

<a class="btn btn-block btn-social btn-instagram">
<i class="fa fa-instagram"></i> Sign in with Instagram
</a>

<a class="btn btn-block btn-social btn-linkedin">
<i class="fa fa-linkedin"></i> Sign in with LinkedIn
</a>

<a class="btn btn-block btn-social btn-tumblr">
<i class="fa fa-tumblr"></i> Sign in with Tumblr
</a>

<a class="btn btn-block btn-social btn-twitter">
<i class="fa fa-twitter"></i> Sign in with Twitter
</a>

<a class="btn btn-block btn-social btn-vk">
<i class="fa fa-vk"></i> Sign in with VK
</a>

</pre>

<br><br> <br><br>
</div>
</div>



<div class="row">
<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<br>
<h4  class="childFilter" style=" font-weight: bold;"># Application Buttons</h4>
<label class="label bg-gray childFilter">edit</label>
<label class="label bg-gray childFilter">play</label>
<label class="label bg-gray childFilter">pause</label>
<label class="label bg-gray childFilter">save</label>
<label class="label bg-gray childFilter">notification</label>
<label class="label bg-gray childFilter">icons</label>
<label class="label bg-gray childFilter">label</label>
<label class="label bg-gray childFilter">tag</label>

<br>
<br>      	  
sample :	
<br>
<div class="col-xl-12">
<div class="panel panel-lte">
<div class="panel-heading lte-heading-danger">Application Button</div>
<div class="panel-body">
		<a class="btn-lte3 btn-app text-black pointer">
			<i class="fas fa-edit"></i> Edit
		</a>
		
		<a class="btn-lte3 btn-app text-black pointer">
			<i class="fas fa-play"></i> Play
		</a>
		
		<a class="btn-lte3 btn-app text-black pointer">
			<i class="fas fa-pause"></i> Pause
		</a>
		
		<a class="btn-lte3 btn-app text-black pointer">
			<i class="fas fa-save"></i> Save
		</a>
		
		<a class="btn-lte3 btn-app text-black pointer">
			<span class="badge bg-yellow">3</span>
			<i class="fas fa-bullhorn"></i> Notifications
		</a>
		
		<a class="btn-lte3 btn-app text-black pointer">
			<span class="badge bg-orange">300</span>
			<i class="fas fa-barcode"></i> Products
		</a>
		
		<a class="btn-lte3 btn-app text-black pointer">
			<span class="badge bg-purple">891</span>
			<i class="fas fa-users"></i> Users
		</a>

		<a class="btn-lte3 btn-app text-black pointer">
			<span class="badge bg-teal">67</span>
			<i class="fas fa-inbox"></i> Orders
		</a>

		<a class="btn-lte3 btn-app text-black pointer">
			<span class="badge bg-blue">12</span>
			<i class="fas fa-envelope"></i> Inbox
		</a>
              
		<a class="btn-lte3 btn-app text-black pointer">
			<span class="badge bg-red">531</span>
			<i class="fas fa-heart"></i> Likes
		</a>
</div>
</div>
</div>



<br><br>
<pre>
<div class="col-xl-12">
<div class="panel panel-lte">
<div class="panel-heading lte-heading-danger">Application Button</div>
<div class="panel-body">
			<a class="btn-lte3 btn-app text-black pointer">
			<i class="fas fa-edit"></i> Edit
		</a>
		
		<a class="btn-lte3 btn-app text-black pointer">
			<i class="fas fa-play"></i> Play
		</a>
		
		<a class="btn-lte3 btn-app text-black pointer">
			<i class="fas fa-pause"></i> Pause
		</a>
		
		<a class="btn-lte3 btn-app text-black pointer">
			<i class="fas fa-save"></i> Save
		</a>
		
		<a class="btn-lte3 btn-app text-black pointer">
			<span class="badge bg-yellow">3</span>
			<i class="fas fa-bullhorn"></i> Notifications
		</a>
		
		<a class="btn-lte3 btn-app text-black pointer">
			<span class="badge bg-orange">300</span>
			<i class="fas fa-barcode"></i> Products
		</a>
		
		<a class="btn-lte3 btn-app text-black pointer">
			<span class="badge bg-purple">891</span>
			<i class="fas fa-users"></i> Users
		</a>

		<a class="btn-lte3 btn-app text-black pointer">
			<span class="badge bg-teal">67</span>
			<i class="fas fa-inbox"></i> Orders
		</a>

		<a class="btn-lte3 btn-app text-black pointer">
			<span class="badge bg-blue">12</span>
			<i class="fas fa-envelope"></i> Inbox
		</a>
              
		<a class="btn-lte3 btn-app text-black pointer">
			<span class="badge bg-red">531</span>
			<i class="fas fa-heart"></i> Likes
		</a>
</div>
</div>
</div>

</pre>
<br><br>
</div>
</div>




<div class="row">
<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<br>
<h4  class="childFilter" style=" font-weight: bold;"># Colors Button</h4>
<label class="label bg-gray childFilter">success</label>
<label class="label bg-gray childFilter">info</label>
<label class="label bg-gray childFilter">warning</label>
<label class="label bg-gray childFilter">danger</label>



<br>
<br>  
<p>Mix and match with various background colors. Use base class <code>.btn</code> and add any available
                <code>.bg-*</code> class</p>    	  
sample :	
<br>
<p>
<button type="button" class="btn btn-sm btn-success margin">.btn .btn-sm .btn-success</button>
<button type="button" class="btn btn-sm btn-info margin">.btn .btn-sm .btn-info</button>
<button type="button" class="btn btn-sm btn-primary margin">.btn .btn-sm .btn-primary</button>
<button type="button" class="btn btn-sm btn-warning margin">.btn .btn-sm .btn-warning</button>
<button type="button" class="btn btn-sm btn-danger margin">.btn .btn-sm .btn-danger</button>
<button type="button" class="btn btn-sm bg-maroon margin">.btn .btn-sm .bg-maroon</button>
<button type="button" class="btn btn-sm bg-purple margin">.btn .btn-sm .bg-purple</button>
<button type="button" class="btn btn-sm bg-navy margin">.btn .btn-sm .bg-navy</button>
<button type="button" class="btn btn-sm bg-orange margin">.btn .btn-sm .bg-orange</button>
<button type="button" class="btn btn-sm bg-olive margin">.btn .btn-sm .bg-olive</button>
<p>
<br>
<br>
<pre>
<button type="button" class="btn btn-sm btn-success">.btn .btn-sm .btn-success</button>
<button type="button" class="btn btn-sm btn-info">.btn .btn-sm .btn-info</button>
<button type="button" class="btn btn-sm btn-primary">.btn .btn-sm .btn-primary</button>
<button type="button" class="btn btn-sm btn-warning">.btn .btn-sm .btn-warning</button>
<button type="button" class="btn btn-sm btn-danger">.btn .btn-sm .btn-danger</button>
<button type="button" class="btn btn-sm bg-maroon">.btn .btn-sm .bg-maroon</button>
<button type="button" class="btn btn-sm bg-purple">.btn .btn-sm .bg-purple</button>
<button type="button" class="btn btn-sm bg-navy">.btn .btn-sm .bg-navy</button>
<button type="button" class="btn btn-sm bg-orange">.btn .btn-sm .bg-orange</button>
<button type="button" class="btn btn-sm bg-olive">.btn .btn-sm .bg-olive</button>

</pre>

<br><br> <br><br>
</div>
</div>




<div class="row">
<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<br>
<h4  class="childFilter" style=" font-weight: bold;"># Style Button</h4>
<label class="label bg-gray childFilter">round</label>
<label class="label bg-gray childFilter">flat</label>
<label class="label bg-gray childFilter">icons</label>


<br>  
sample :
<br>
<p>	
<button type="button" class="btn btn-sm btn-success margin">round</button>
<button type="button" class="btn btn-sm btn-info btn-flat margin">flat</button>
<button type="button" class="btn btn-primary margin "><i class="fa fa-home"></i> Icons</button>
</p>
<br>
<pre>
<button type="button" class="btn btn-sm btn-success ">round</button>
<button type="button" class="btn btn-sm btn-success btn-flat ">flat</button>
<button type="button" class="btn btn-primary"><i class="fa fa-home"></i> Icons</button>
</pre>

<br><br> <br><br>
</div>
</div>



<div class="row">
<div class="col-md-12 parentFilter">		
<hr style="border-top:1px solid #d2d6de">
<br>
<h4  class="childFilter" style=" font-weight: bold;"># Vertical Button Group</h4>
<label class="label bg-gray childFilter">Top</label>
<label class="label bg-gray childFilter">Middle</label>
<label class="label bg-gray childFilter">Bottop</label>
<label class="label bg-gray childFilter">align</label>
<label class="label bg-gray childFilter">vertical</label>
<label class="label bg-gray childFilter">combobox</label>



<br>
<br>    
sample :	
<br>
<div class="btn-group-vertical">
	<button type="button" class="btn btn-default">Top</button>
	<button type="button" class="btn btn-default">Middle</button>
	<button type="button" class="btn btn-default">Bottom</button>
</div>

<div class="btn-group-vertical">
  <button type="button" class="btn btn-default"><i class="fa fa-align-left"></i></button>
  <button type="button" class="btn btn-default"><i class="fa fa-align-center"></i></button>
  <button type="button" class="btn btn-default"><i class="fa fa-align-right"></i></button>
</div>

<div class="btn-group-vertical">
  <button type="button" class="btn btn-flat"><i class="fa fa-align-left"></i></button>
  <button type="button" class="btn btn-flat"><i class="fa fa-align-center"></i></button>
  <button type="button" class="btn btn-flat"><i class="fa fa-align-right"></i></button>
</div>

<div class="btn-group-vertical">
<button type="button" class="btn btn-default">1</button>
<button type="button" class="btn btn-default">2</button>
<div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	<span class="caret"></span>
</button>
	<ul class="dropdown-menu">
	<li><a href="#">Dropdown link</a></li>
	<li><a href="#">Dropdown link</a></li>
	</ul>
</div>
</div>

<br>


<br>
<br>
<pre>
<div class="btn-group-vertical">
	<button type="button" class="btn btn-default">Top</button>
	<button type="button" class="btn btn-default">Middle</button>
	<button type="button" class="btn btn-default">Bottom</button>
</div>

<div class="btn-group-vertical">
	<button type="button" class="btn btn-default"><i class="fa fa-align-left"></i></button>
	<button type="button" class="btn btn-default"><i class="fa fa-align-center"></i></button>
	<button type="button" class="btn btn-default"><i class="fa fa-align-right"></i></button>
</div>

<div class="btn-group-vertical">
  <button type="button" class="btn btn-flat"><i class="fa fa-align-left"></i></button>
  <button type="button" class="btn btn-flat"><i class="fa fa-align-center"></i></button>
  <button type="button" class="btn btn-flat"><i class="fa fa-align-right"></i></button>
</div>

<div class="btn-group-vertical">
<button type="button" class="btn btn-default">1</button>
<button type="button" class="btn btn-default">2</button>
<div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	<span class="caret"></span>
</button>
	<ul class="dropdown-menu">
	<li><a href="#">Dropdown link</a></li>
	<li><a href="#">Dropdown link</a></li>
	</ul>
</div>
</div>

</pre>	


 </div>
</div>          
			
<br><br> <br><br>
<hr>     
<br><br>  










				