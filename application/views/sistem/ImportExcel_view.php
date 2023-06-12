<div class="box box-info shadow"  id="box-loading1">
<div class="box-header with-border">
<h4>STEP 1# Download Template Database</h4>
				<div class="form-group"> 
				<br>	
					<label class="form-label">Pilih Table data base</label> 
					<select id="table-db" name='table_name' class="form-control data-sending select2 focus-color" style="width:100%"> 
					<option value="none">--pilih table--</option> 
					<?php foreach($table_list as $val){?>
						 <option value="<?php echo $val?>"><?php echo $val?></option> 
					<?php }?>
					</select> 
				</div>
<a id='dexcel' href="" class="btn btn-sm btn-info shadow">Download Template Excel</a>
<br><br><br>	
</div>
</div>			
<hr class ="devider">

<div class="box box-info shadow"  id="box-loading">
<div class="box-header with-border">

<form id="form-a" method='POST' action="<?= url('readExcel')?>">
 <!-- box input photo -->
<div class="form-group">
    <label class="control-label">STEP 2#  Import From Template Excel (.xls)</label><br>
	
	
     <div id="doc-upload" name="doc"></div>
</div>
	<input type="radio"   name="reset" value="false"> Add Data
	<input checked type="radio"  name="reset" value="true"> Reset Old Data	<br><br>
<!-- end box -->
<button type="button" onclick="read()" class="btn btn-sm btn-info shadow">Import Now !</button>

<?= br(10)?>
</form>
</div>
</div>
<?php echo  _js("ybs-upload,select2") ?>
<script>
	//
	
    $(document).ready(function(){
		$('#table-db').select2(); 
		
		
        $("#doc-upload").singleUpload({
            type    		: "document", //image | document | video | audio | all
            pathDest  		: "my-data/doc" ,
			preview 		: false,
			showLoadingIn	: "#box-loading",
        });
       
    })
  
  
    function read(){
		start_loading_in('#box-loading');
        $("#form-a").ybsRequest({
            onComplite :function(){
               $("doc-upload").reset();
			   stop_loading_in('#box-loading');
           }
        });
	}
	
	$('#dexcel').click(function(e) {
		start_loading_in('#box-loading1');
		e.preventDefault();  //stop the browser from following
		let table_name = $("#table-db").val();
		if(table_name=='none'){
			 show_error_message("Table belum di pilih !!");
			 stop_loading_in('#box-loading1');
			  play_sound_failed();
			return;
		}
		window.location.href = "<?= url('downloadTemplate/')?>" + table_name;
		setTimeout(() => {  stop_loading_in('#box-loading1'); }, 2000);
	});

  
</script>