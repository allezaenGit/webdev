 <div class="row">
 
 <div class="col-md-12 col-xl-12">
 <div class="form-group">

                        <div >
							
                          <label class="selectgroup-item">
                            <input type="radio" name="icon-input" value="1" class="selectgroup-input" checked>
                            <span class="selectgroup-button selectgroup-button-icon" title="Setting Halaman Login"><i class="fe fe-shield" ></i></span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="icon-input" value="2" class="selectgroup-input">
                            <span class="selectgroup-button selectgroup-button-icon" title="Setting Halaman Utama"><i class="fe fe-home"></i></span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="icon-input" value="3" class="selectgroup-input">
                            <span class="selectgroup-button selectgroup-button-icon" title="Setting Login Style"><i class="fe fe-airplay"></i></span>
                          </label>
                        </div>
 </div>
 </div>
 	<div class="col-md-12 col-xl-12">
	<div class="callout callout-ybs-primary shadow panel-a" > 
		<a class="btn  btn-social btn-info shadow" href="javascript:void(0)" onclick="updateLoginSetting()" >
                <i class="fas fa-save"></i> Simpan Perubahan
        </a>
		
	</div>
	</div>
 
	<div class="col-md-12 col-xl-12">
	<div class="callout callout-ybs-primary shadow panel-a" > 
		<h4>Set Default Icon Title Bar</h4>
		<form id="form-logo-bar">
			<div class="form-group">
			
				<div class="custom-file">
				<input type="file" class="custom-file-input " id="inputfileTitle" name="file" >
				<label id="logo-title-name"class="custom-file-label form-control">Choose file</label>
				</div>
			</div>
						  
			<div class="form-group">
				<div class="text-center mb-6">
				<img id="logo-title" src="<?php echo base_url('api/Public_Access/get_logo_title_bar')?>" class="h-<?php echo $this->_appinfo['login_logo_size']?> fontlogo" alt="">
				</div>
			</div>

		 
		</form>
	</div>
	</div>
	
	<div class="col-md-12 col-xl-12">
	<div class="callout callout-ybs-primary shadow panel-a" > 


		<h4>Halaman Login</h4>
			<hr class="devider">
		
		 
		
		 
		 
		 <form id="form-login">
						<div class="form-group">
							<span><i class="fe fe-edit-3"></i></span><label>Text Title Bar </label>
							<input type="text" class="form-control focus-color text-blue data-sending" id="login_title_bar" name="login_title_bar" value="<?php echo $this->_appinfo['login_title_bar']?>">
						</div>
					
						
			
					  
						  <div class="form-group">
							<label>Logo Login</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input " id="inputfile" name="file" >
								<label id="logo-login-name"class="custom-file-label form-control">Choose file</label>
							</div>
						 
						  </div>
						  
						  <div class="form-group">
							<div class="text-center mb-6">
							<img id="logo-login" src="<?php echo base_url('api/Public_Access/get_logo_login')?>" class="h-<?php echo $this->_appinfo['login_logo_size']?> fontlogo" alt="">
							</div>
						  </div>

						  <div class="form-group">
							<label class="form-label">Size Logo range ( 1 - 9 )</label>
						  </div>
					  
					  <div class="input-group">
						<span class="input-group-addon" ><i class="glyphicon glyphicon-fullscreen" id="number-size-logo-login" > :  <?php echo $this->_appinfo['login_logo_size']?></i></span>
						<input id="login_logo_size" name="login_logo_size" type="range" class="form-control  data-sending" step="1" min="1" max="9" value="<?php echo $this->_appinfo['login_logo_size']?>">
					  </div>
					  
					  
					  <br>
					   <div class="form-group">
                            <span> <i class="fe fe-edit-3"></i> </span> <label>Title Box Login</label>
                            <input type="text" class="form-control focus-color text-blue data-sending" id="login_title_box" name="login_title_box" value="<?php echo $this->_appinfo['login_title_box']?>">
                       
                      </div>
					  
					  <div class="form-group">
                            <span ><i class="fe fe-edit-3"></i></span> <label>Label User</label>
                            <input type="text" class="form-control focus-color text-blue data-sending" id="login_label_user" name="login_label_user"  value="<?php echo $this->_appinfo['login_label_user']?>">
                      
                      </div>
					  
					   <div class="form-group">
                            <span><i class="fe fe-edit-3"></i></span><label>Label Password</label>
                            <input type="text" class="form-control focus-color text-blue data-sending" id="login_label_password" name="login_label_password" value="<?php echo $this->_appinfo['login_label_password']?>">
                        </div>
                     
					  
					   <div class="form-group">
                           <span><i class="fe fe-edit-3"></i></span><label>Label Button</label>
                            <input type="text" class="form-control focus-color text-blue data-sending" id="login_label_button" name="login_label_button" value="<?php echo $this->_appinfo['login_label_button']?>">
                      
                      </div>
		
					
		
		
		
		 </form>	

		
	</div>
	</div>
 
	<div class="col-md-12 col-xl-12">
	<div class="callout callout-ybs-primary shadow panel-a" > 
		<a class="btn  btn-social btn-info shadow" href="javascript:void(0)" onclick="updateLoginSetting()" >
                <i class="fas fa-save"></i> Simpan Perubahan
        </a>
		
	</div>
	</div>
	

<div class="col-md-12 col-xl-12">
	<div  class="panel panel-danger panel-b" id="panel-form-utama">
		<div class="panel-heading">Halaman Utama</div>
		<div class="panel-body">	
		<form id= "form-utama">
			
					<div class="form-group">
							<span><i class="fe fe-edit-3"></i></span><label>Title Bar</label>
                            <input id="template_title_bar" name="template_title_bar" type="text" class="form-control focus-color data-sending" value="<?php echo $this->_appinfo['template_title_bar']?>">
                        
                    </div>
					  
					<div class="form-group">
							<span ><i class="fa fa-map-signs"></i></span><label>Title Menu</label>
							<input name="menu_title_mini" type="text" class="form-control focus-color data-sending" placeholder="text bold.." value="<?php echo $this->_appinfo['template_menu_title_mini']?>" ><span><input name="menu_title_long" type="text" class="form-control  focus-color data-sending" placeholder="text regular.." value="<?php echo $this->_appinfo['template_menu_title_long']?>"></span>
					
                    </div>  
					
					
					  
					  <div class="form-group">
					   <label>Footer Left</label>
                        <div class="input-icon">
							<textarea id="text-footer-left" name="template_footer_left" class="form-control bg-dark text-white data-sending" rows="3" ></textarea>
                        </div>
						<code class="text-danger">note : jangan menggunakan tanda  kutip satu <b> ' </b>  , dan jangan menggunakan enter </code>
                      </div>
					  
					  
					   <div class="form-group">
					   <label>Footer Right</label>
                        <div class="input-icon">
							<textarea id="text-footer-right" name="template_footer_right" class="form-control bg-dark text-white data-sending" rows="3" ></textarea>
                        </div>
						<code class="text-danger">note : jangan menggunakan tanda  kutip satu <b> ' </b>  , dan jangan menggunakan enter </code>
                      </div>
					  
					  <div class="form-group text-right">
					   <a href="javascript:void(0)" onclick="updateTemplateSetting()" class="btn btn-success">simpan</a>
                     </div>
		
		</form>			  
		</div>
	</div>	



</div>




<div class="col-md-12 col-xl-12">
	<div  class="panel panel-danger panel-c" id="panel-style-login">
		<div class="panel-heading">Style Login</div>
		<div class="panel-body">	
		<form id= "form-utama">
			
		  <div class="row gutters-sm">
					<?php foreach($styleLogin as $val){ ?>
							 <div class="col-6 col-sm-4">
                              <label class="imagecheck mb-4">
                                <input name="imagecheck" id="<?= $val ?>" type="checkbox" value="<?= $val ?>" class="imagecheck-input"  />
                                <figure class="imagecheck-figure">
                                  <img src="<?php echo base_url()?>images/login/<?= $val ?>.png" alt="file not found.." class="imagecheck-image">
                                </figure>
                              </label>
                            </div>
					
					<?php }?>
		  
                          <!--  <div class="col-6 col-sm-4">
                              <label class="imagecheck mb-4">
                                <input name="imagecheck" id="style1" type="checkbox" value="Style1" class="imagecheck-input"  />
                                <figure class="imagecheck-figure">
                                  <img src="<?php echo base_url()?>images/login/style1.png" alt="file not found.." class="imagecheck-image">
                                </figure>
                              </label>
                            </div>
                            <div class="col-6 col-sm-4">
                              <label class="imagecheck mb-4">
                                <input name="imagecheck" id="style2" type="checkbox" value="Style2" class="imagecheck-input" />
                                <figure class="imagecheck-figure">
                                  <img src="<?php echo base_url()?>images/login/style2.png" alt="file not found.." class="imagecheck-image">
                                </figure>
                              </label>
                            </div>
							 <div class="col-6 col-sm-4">
                              <label class="imagecheck mb-4">
                                <input name="imagecheck" id="style3" type="checkbox" value="Style3" class="imagecheck-input" />
                                <figure class="imagecheck-figure">
                                  <img src="<?php echo base_url()?>images/login/style3.png" alt="file not found.." class="imagecheck-image">
                                </figure>
                              </label>
                            </div>-->
							
							
                           
		</div>	
		
		
		</form>			  
		</div>
	</div>	



</div>
</div>


<script>
$('#text-footer-right').val('<?php echo $this->_appinfo['template_footer_right']?>');
$('#text-footer-left').val('<?php echo $this->_appinfo['template_footer_left']?>');
</script>



<script>
$(".imagecheck-input").click(function (){
	$(".imagecheck-input").prop('checked',false);
	$(this).prop('checked',true);
	setLoginStyle($(this).val());
});


function setLoginStyle(value){
	var d  = get_json_format('login_style',value);
	data_sending  = ybs_dataSending([d]);
	var a= new ybsRequest();
	a.process("<?php echo $link_set_login_style?>",data_sending,"POST");
}


$(document).ready(function(){	
	clear_temp_upload();
	
	$(".panel-a").show();
	$(".panel-b").hide();
	$(".panel-c").hide();
	
	
	$(".selectgroup-input").change(function(){
			if($(this).val()=="1"){
				$(".panel-a").show();
				$(".panel-b").hide();
				$(".panel-c").hide();
				
			}else if($(this).val()=="2"){
				$(".panel-a").hide();
				$(".panel-b").show();
				$(".panel-c").hide();
				
			}else if($(this).val()=="3"){
				$(".panel-a").hide();
				$(".panel-b").hide();
				$(".panel-c").show();

			}
	});
	
	$('#inputfile').change(function(){
		prepare_logo_login();
	});
	
	$('#inputfileTitle').change(function(){
		prepare_logo_title();
	});
	
	
	$('#file-template-logo').change(function(){
		prepare_template_logo();
	});

	
	$("#login_logo_size").change(function(){
		var a = $("#login_logo_size").val();
		$("#number-size-logo-login").text( " : " + a);
		remove_class_h("#logo-login");
		$("#logo-login").addClass("h-"+a);
	});
	
	$("#template_logo_size").change(function(){
		var a = $("#template_logo_size").val();
		$("#number-size-logo-template").val(a);
		remove_class_h("#template_logo");
		$("#template_logo").addClass("h-"+a);
	});
	
	
	
	
	//style-login
	
	
	$.each($(".imagecheck-input"),function(){
		var style = "<?php echo $this->_appinfo['login_style']?>";
		if($(this).val()==style){
			$(this).prop("checked",true);
		}
	})
	
	
});

function remove_class_h(id){
	var x = 1;
	for(x=1;x<=9;x++){
		$(id).removeClass("h-"+x);
	}

}


var logo_login="";
var logo_login_ext="";
function prepare_logo_login(){
	var a = new ybsRequest();

	a.processUploadFile("form-login",'none',"false");
	a.onSuccess = function(data){

		$("#logo-login-name").text(data.orig_name);
		logo_login_ext=data.ext;
		logo_login=data.time_post;
		set_preview(logo_login,"#logo-login");
	}  
}

var logo_title_bar		="";
var logo_title_bar_ext	="";
function prepare_logo_title(){
	var a = new ybsRequest();
	a.processUploadFile("form-logo-bar",'none',"false");
	a.onSuccess = function(data){

		$("#logo-title-name").text(data.orig_name);
		logo_title_bar_ext=data.ext;
		logo_title_bar=data.time_post;
		set_preview(logo_title_bar,"#logo-title");
	}  
}




var template_logo_post="";
var ext_template_logo="";
function prepare_template_logo(){
	var a =new ybsRequest();
	//upload file ke folder temp
	a.processUploadFile("form-utama","none","false");
	a.onSuccess = function(data){
		$("#template_logo_name").text(data.orig_name);
		//mendapatkan extension file yg baru di upload
		ext_template_logo=data.ext;
		
		//menampilkan file yang baru di upload pada img
		template_logo_post=data.time_post;
		set_preview(template_logo_post,"#template_logo");
	} 
}


function set_preview(time_post,id_element){
	//menggunakan object dropzone_result untuk mengakses folder temp
	//berdasarkan timepost
	var a = new dropzone_result(time_post,'temp');
	a.onComplite = function(data){
		var b = JSON.parse(data.message);
		$.each(b,function(k,y){
			$(id_element).attr("src",y.link);
		})
	}
}

function updateLoginSetting(){
	var data = get_dataSending('form-login');
	var t = get_json_format('logo_login',logo_login);
	var ex = get_json_format('logo_login_ext',logo_login_ext);
	
	var t1 = get_json_format('logo_title_bar',logo_title_bar);
	var ex1 = get_json_format('logo_title_bar_ext',logo_title_bar_ext);
	
	data.push(t);
	data.push(ex);
	data.push(t1);
	data.push(ex1);
	data_sending = ybs_dataSending(data);
	var a = new ybsRequest();
	a.process("<?php echo $link_update_login_setting?>",data_sending,"POST");
}

function updateTemplateSetting(){
	var data = get_dataSending('form-utama');
	var t = get_json_format('template_logo',template_logo_post);
	var ex = get_json_format('ext',ext_template_logo);
	data.push(t);
	data.push(ex);
	data_sending = ybs_dataSending(data);
	var a = new ybsRequest();
	a.process("<?php echo $link_update_template_setting?>",data_sending,"POST");
}




</script>