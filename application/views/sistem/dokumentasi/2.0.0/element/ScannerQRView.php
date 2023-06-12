<div class="row ">

<div class="col-md-12 parentFilter">		

<h4  class="childFilter" style=" font-weight: bold;"># Scanner QRCode</h4>
<p> </p>
<label class="label bg-gray childFilter">scanner</label>
<label class="label bg-gray childFilter">qrcode</label>
<label class="label bg-gray childFilter">barcode</label>



<br>
<br>
<p class="childFilter">sample :</p>	

<div class="row">
<div class="col-lg-12">
	<div id="scanner">
	</div>
</div>
</div>
<?= _js('simpleScanner')?>
<script>

$('#scanner').scanner({
	onSuccess : function(qr,scan){
		show_success_message('your code is : ' + qr.code,true);	
	}
});


</script>

<br>

<pre>

&lt;div id="scanner">&lt;/div>


&lt;?= _js('simpleScanner')?>

&lt;script>
	$('#scanner').scanner({
		onSuccess : function(qr,scan){
			//qr.code ; -->get code qr
			//qr.imgData ; -->get Image Scan
			//scan.play() --> play scanner
			//scan.pause() --> pause scanner		
			//scan.stop() --> stop scanner	
			show_success_message('your code is : ' + qr.code,true);	
		}
		
	});
&lt;/script>
</pre>	


<br>

</div>

</div>
      <!-- ./row -->