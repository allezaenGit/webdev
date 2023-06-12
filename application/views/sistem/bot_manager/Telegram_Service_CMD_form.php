<?php echo _css("emoji") ?>
 
<div class="row">
<div class="col-lg-6">
<!-- Horizontal Form -->
<div class="box box-info shadow" id="box-loading">
<div class="box-header with-border">
<h3 class="box-title">Register Bot</h3>
</div>

<form  id="form-a" >
<div class="box-body">
<input hidden class='data-sending' id='id' value='<?php if(isset($id))echo $id?>'>


					<div class="form-group">
						<label>SERVICE</label>
							<?php $v='';  if(isset($data)) $v = $data->id_service; 
								  echo create_cmb_database(array(	'id'			=>'id_service',
																	'name'			=>'id_service',
																	'table'			=>'sys_bot_telegram_service',
																	'field_show'	=>'name',
																	'primary_key'	=>'id', 
																	'selected'		=>$v,
																	'field_link'	=>'',
																	'class'			=>'custom-select data-sending')); 
						    ?> 
						
					</div>
					
					<div class="form-group">
						<label>COMMAND NAME</label>
						<input type='text' class='form-control data-sending focus-color'  id='name' name='name' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->name ?>' >
					</div>
					
					<div class="form-group">
						<label>DESCRIPTIONS</label>
						<input type='text' class='form-control data-sending focus-color'  id='descriptions' name='descriptions' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->descriptions ?>' >
						
					</div>
					
					<div class="form-group">
						<label>OUTPUT MESSAGE</label>
						<textarea type='text' class='form-control bg-dark text-white' rows="10"  id='message' name='message' placeholder='<?php echo $title->general->desc_required ?>' ><?php if(isset($data)) echo $data->message ?></textarea>
					</div>
					
					<div class="form-group">
						copy clipboard : <input  readonly type="text" id="copy-icon" value="" style="border:none; background-color:rgba(255,255,255,0);">
					</div>
					
					<div class='form-group' >		
	
					<div class="callout callout-ybs-danger shadow"  style="font-size:12px">
					<div class="box" id="testing-send" style="border-top:none">
					<h4>Test Output sebelum di simpan</h4>
					
							
					<div class='form-group' > 
											<label class='form-label'>TESTING  :</label> 
											<?php  
												  echo create_cmb_database(array(	'id'			=>'id_bot',
																					'name'			=>'id_bot',
																					'table'			=>'sys_bot_telegram_register',
																					'field_show'	=>'name',
																					'primary_key'	=>'id', 
																					'selected'		=>'',
																					'field_link'	=>'',
																					'class'			=>'custom-select')); 
											?> 
												<button id="btn-test" type='button' class='btn btn-primary btn-sm' ><i class="fa fa-paper-plane"></i> Test</button>	
					</div>
					</div>

					</div>				
					
					</div>

			
							 
	
	
	<div class="box-footer">
                <div class=" pull-right">
					<button id='btn-apply' type='button' class='btn btn-primary shadow'><i class='fe fe-check'></i> <?php echo $title->general->button_apply ?></button>	
					<button disabled='' id='btn-save' type='button' class='btn btn-primary shadow'><i class="fe fe-save"></i> <?php echo $title->general->button_save ?></button>	
					<button disabled='' id='btn-cancel' type='button' class='btn btn-primary shadow'> <?php echo $title->general->button_cancel ?></button>
					<a href='<?php echo $link_back ?>' id='btn-close' class='btn btn-primary shadow'> <?php echo $title->general->button_close ?></a>
				</div>
    </div>
	

</div>
</form>
</div>
</div>


<div class="col-lg-6">

<div class="box box-danger collapsed-box shadow">
    <div class="box-header with-border">
        <h3 class="box-title">List emoji, click n paste</h3>
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </button>
        </div>
    </div>
    <div class="box-body">
						<div class="col-12">
						
						 <div class="nav-tabs-custom" >
							<ul class="nav nav-tabs pull-right">
							  <li class="active"><a href="#tab_1-1" data-toggle="tab">People</a></li>
							  <li><a href="#tab_2-2" data-toggle="tab">Nature</a></li>
							  <li><a href="#tab_3-2" data-toggle="tab">Food & Drink</a></li>
							  <li><a href="#tab_4-2" data-toggle="tab">Activity</a></li>
							  <li><a href="#tab_5-2" data-toggle="tab">Travel & Places</a></li>
							  <li><a href="#tab_6-2" data-toggle="tab">Objects</a></li>
								<li><a href="#tab_7-2" data-toggle="tab">Symbol</a></li>
								<li><a href="#tab_8-2" data-toggle="tab">Flag</a></li>
							 
							</ul>
							<div class="tab-content" style=" overflow-y: scroll;height:500px">
							  <div class="tab-pane active" id="tab_1-1">
										<div class="icons-list-wrap">
										  <ul class="icons-list">
											
											
											
											<?php for($x=0;$x<291; $x++) {
													$cname = str_replace("{{emo:","",$emo[$x]->desc);	
													$cname = str_replace("}}","",$cname);
											?> 		
													<li class="icons-list-item"><button class="btn btn-copy emo emo-<?= $cname ?>" title="<?= $emo[$x]->desc?>" ></button></li>
											
											<?php }?>
											
											<li></li>
											<li></li>
											<li></li>
											<li></li>
											<li></li>
											<li></li>
											
										  </ul>
										</div>
							  </div>
							  <!-- /.tab-pane -->
							  <div class="tab-pane" id="tab_2-2">
										<div class="icons-list-wrap">
											  <ul class="icons-list">
												
												
												
												<?php for($x=291;$x<450; $x++) {
														$cname = str_replace("{{emo:","",$emo[$x]->desc);	
														$cname = str_replace("}}","",$cname);
												?> 		
														<li class="icons-list-item"><button class="btn btn-copy emo emo-<?= $cname ?>" title="<?= $emo[$x]->desc?>" ></button></li>
												
												<?php }?>
												
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												
											  </ul>
											</div>
							  </div>
							  <!-- /.tab-pane -->
							  <div class="tab-pane" id="tab_3-2">
											<div class="icons-list-wrap">
											  <ul class="icons-list">
												
												
												
												<?php for($x=450;$x<536; $x++) {
														$cname = str_replace("{{emo:","",$emo[$x]->desc);	
														$cname = str_replace("}}","",$cname);
												?> 		
														<li class="icons-list-item"><button class="btn btn-copy emo emo-<?= $cname ?>" title="<?= $emo[$x]->desc?>" ></button></li>
												
												<?php }?>
												
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												
											  </ul>
											</div>
							  </div>
							  
							   <div class="tab-pane" id="tab_4-2">
											<div class="icons-list-wrap">
											  <ul class="icons-list">
												
												
												
												<?php for($x=536;$x<616; $x++) {
														$cname = str_replace("{{emo:","",$emo[$x]->desc);	
														$cname = str_replace("}}","",$cname);
												?> 		
														<li class="icons-list-item"><button class="btn btn-copy emo emo-<?= $cname ?>" title="<?= $emo[$x]->desc?>" ></button></li>
												
												<?php }?>
												
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												
											  </ul>
											</div>
							  </div>
							  
							   <div class="tab-pane" id="tab_5-2">
											<div class="icons-list-wrap">
											  <ul class="icons-list">
												
												
												
												<?php for($x=616;$x<735; $x++) {
														$cname = str_replace("{{emo:","",$emo[$x]->desc);	
														$cname = str_replace("}}","",$cname);
												?> 		
														<li class="icons-list-item"><button class="btn btn-copy emo emo-<?= $cname ?>" title="<?= $emo[$x]->desc?>" ></button></li>
												
												<?php }?>
												
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												
											  </ul>
											</div>
							  </div>
							  
							   <div class="tab-pane" id="tab_6-2">
											<div class="icons-list-wrap">
											  <ul class="icons-list">
												
												
												
												<?php for($x=735;$x<908; $x++) {
														$cname = str_replace("{{emo:","",$emo[$x]->desc);	
														$cname = str_replace("}}","",$cname);
												?> 		
														<li class="icons-list-item"><button class="btn btn-copy emo emo-<?= $cname ?>" title="<?= $emo[$x]->desc?>" ></button></li>
												
												<?php }?>
												
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												
											  </ul>
											</div>
							  </div>
							  
							   <div class="tab-pane" id="tab_7-2">
									<div class="icons-list-wrap">
											  <ul class="icons-list">
												
												
												
												<?php for($x=908;$x<1180; $x++) {
														$cname = str_replace("{{emo:","",$emo[$x]->desc);	
														$cname = str_replace("}}","",$cname);
												?> 		
														<li class="icons-list-item"><button class="btn btn-copy emo emo-<?= $cname ?>" title="<?= $emo[$x]->desc?>" ></button></li>
												
												<?php }?>
												
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												
											  </ul>
											</div>
							  </div>
							  
							  <div class="tab-pane" id="tab_8-2">
									<div class="icons-list-wrap">
											  <ul class="icons-list">
												
												
												
												<?php for($x=1180;$x<1432; $x++) {
														$cname = str_replace("{{emo:","",$emo[$x]->desc);	
														$cname = str_replace("}}","",$cname);
												?> 		
														<li class="icons-list-item"><button class="btn btn-copy emo emo-<?= $cname ?>" title="<?= $emo[$x]->desc?>" ></button></li>
												
												<?php }?>
												
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												<li></li>
												
											  </ul>
											</div>
							  </div>
							  
							  <!-- /.tab-pane -->
							</div>
							<!-- /.tab-content -->
						  </div>
						  <!-- nav-tabs-custom -->
						
						
						
                       
                      </div>
	  
	  
					
					

	  
	  
    </div>
  
</div>


<div class="box box-danger collapsed-box shadow">
    <div class="box-header with-border">
        <h3 class="box-title">List code inject, click n paste</h3>
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </button>
        </div>
    </div>
    <div class="box-body" style=" height: 400px;overflow-y: auto;">
		<!--table-->
	
		<table class="table table-bordered">
                 <tr>
                  <th style="width: 10px">#</th>
                  <th style="text-align:center">Code</th>
                  <th>Descriptions</th>
                 </tr>
				
                <tr>
                  <td>1.</td>
                  <td><button class="btn btn-block btn-copy shadow" title="{{first_name}}" ><i class="fa fa-vcard"></i>&nbsp; First Name</button></td>
                  <td>
					<p>Menampilkan nama awal , dari user chat</p>
                  </td>
                
                </tr>
				
				 <tr>
                  <td>2.</td>
                  <td><button class="btn btn-block btn-success btn-copy shadow" title="{{last_name}}" ><i class="fa fa-vcard"></i>&nbsp; Last Name</button></td>
                  <td>
					<p>Menampilkan nama akhir , dari user chat</p>
                  </td>
                </tr>
				
				 <tr>
                  <td>3.</td>
                  <td><button class="btn btn-block btn-primary btn-copy shadow " title="{{date}}" ><i class="fa fa-calendar"></i>&nbsp; Date</button></td>
                  <td>
					<p>Menampilkan tanggal sekarang, format dd MM YYYY</p>
                  </td>
                </tr>
				
				 <tr>
                  <td>4.</td>
                  <td><button class="btn btn-block btn-info btn-copy shadow" title="{{date_time}}" ><i class="fa fa-calendar"></i>&nbsp; Date Time</button></td>
                  <td>
					<p>Menampilkan tanggal sekarang, format dd MM YYYY  H:i:s</p>
                  </td>
                </tr>
				
				 <tr>
                  <td>5.</td>
                  <td><button class="btn btn-block btn-danger btn-copy shadow" title="{{time}}" ><i class="fa fa-hourglass-half"></i>&nbsp; Time</button></td>
                  <td>
					<p>Menampilkan waktu sekarang, format H:i:s</p>
					
                  </td>
                </tr>
				
				 <tr>
                  <td>6.</td>
                  <td><button class="btn btn-block btn-default btn-copy shadow" title="{{img:https://your/path/image}}" ><i class="fa fa-photo"></i>&nbsp; Url Image</button></td>
                  <td>
					<p>Menampilkan Image berdasarkan Url..</p>
					<p style="color:red">note: hanya dapat menampilkan 1 Image saja</p>
                  </td>
                </tr>
				
				
				
				
				
               
              </table>
	
				
	
	
		<!--./table-->	
	  
    </div>
  
</div>




<div class="callout callout-ybs-danger" style="font-size:12px">
<h4>Harap di perhatikan</h4>
</div>

<div class="callout callout-ybs-info" style="font-size:12px">


<p style="font-size:12px">		
Command merupakan perintah yang akan di berikan kepada bot telegram anda. <br><br>ketika penggunaan
telegram mengetik/menekan Command pada BOT anda maka secara otomatis server akan mengirimkan OUTPUT MESSAGE.
</p>					 
<ol style="font-size:12px">
<li>"COMMAND NAME" tidak  boleh menggunakan spasi</li>
<li>"COMMAND NAME" max 20 karakter & huruf kecil</li>
<li>"DESCRIPTIONS" max 100 karakter</li>
<li>"OUTPUT MESSAGE" bertipe html, <br> penulisan hanya  dapat menggunakan tag-tag berikut</li>
<pre>
&lt;b>bold&lt;/b>,
&lt;strong>bold&lt;/strong>
&lt;i>italic&lt;/i>, &lt;em>italic&lt;/em>
&lt;a href='http://www.example.com/'>inline URL&lt;/a>
&lt;a href='tg://user?id=123456789'>inline mention of a user&lt;/a>
&lt;code>inline fixed-width code&lt;/code>
&lt;pre>pre-formatted fixed-width code block&lt;/pre>
							
Hanya tag yang disebutkan di atas yang didukung saat ini.
Tag tidak boleh bersarang.
Semua <,> dan & simbol yang bukan bagian dari tag atau entitas HTML harus diganti dengan entitas HTML yang sesuai.
</pre>	
untuk lebih jelasnya dapat melihat link  berikut :
<a style="color:blue" href="https://core.telegram.org/bots/api#html-style">format api telegram </a><br><br>
</ol>
					


</div>

<div class="callout callout-ybs-danger" style="font-size:12px">

							<h4>Contoh penggunaan </h4>
							<b>COMMAND NAME 	:</b> <br>
							info_sistem<br>
							<br>
							<b>DESCRIPTIONS	:</b> <br>
							Mengecek Sistem Terbaru<br>
							<br>
							<b>OUTPUT MESSAGE  :</b> <br>
							&lt;b><b>TERIMA KASIH ATAS PERTANYAAN ANDA</b>&lt;/b><br>
							&lt;code> saat ini anda menggunakan ybs sistem 1.0.11 &lt;/code>
</div>


</div>		
</div>









</div>







<script>var page_version="1.0.12"</script>

<script> 


$(document).ready(function(){
	
	
})

	
$('.data-sending').keydown(function(e){
	remove_message();

});

</script>

<script>


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
$("#btn-test").click(function(){
	test_output();
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

	
	start_loading_in("#box-loading");
	
	var data = get_dataSending('form-a');
	
	
	
	<?php
	/* complite json format */
	/* ybs_dataSending(array); */
	?>
	send_data = ybs_dataSending(data);
	
	var msg_val = $("#message").val();
	var pdata = get_post_format("message",msg_val);
	send_data  =  send_data + "&"+pdata;

	var a = new ybsRequest();
	a.process('<?php echo $link_save?>',send_data,'POST');
	a.onAfterSuccess = function(){
			cancel();
	}
	a.onBeforeFailed = function(){
			cancel();
	}
	
	a.onComplite = function(){
		stop_loading_in("#box-loading");
	}
}


function test_output(){
	
	start_loading_in("#testing-send");
	
	var data = get_dataSending('form-a');
	var bot  = get_json_format("id_bot",$("#id_bot").val());
	
	data.push(bot);

	send_data = ybs_dataSending(data);
	
	var msg_val = $("#message").val();
	var pdata = get_post_format("message",msg_val);
	
	
	
	send_data  =  send_data + "&"+pdata;
	
	var a = new ybsRequest();
	a.process('<?php echo $link_test?>',send_data,'POST');
	a.onAfterSuccess = function(){
			cancel();
	}
	a.onBeforeFailed = function(){
			cancel();
	}
	a.onComplite = function(){
		stop_loading_in("#testing-send");
	}
}



$(".btn-copy").click(function(){
	
	var icn = $(this).attr("title");
	$("#copy-icon").val(icn);
	
	
	var copyText = document.getElementById("copy-icon");
	copyText.select();
	copyText.setSelectionRange(0, 99999);
	document.execCommand("copy");
	show_success_message("Copy to Clipboard : " +copyText.value);
	
});
 

</script>

