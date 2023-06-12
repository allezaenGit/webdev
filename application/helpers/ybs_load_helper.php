<?php



function _css($plugin){
	$ar = explode(',',$plugin);
	$result ='';
	foreach($ar as $key){
		switch($key){
			case 'ybs' :
				$result .= '<link rel="stylesheet" href="'.base_url().'assets/back-end/ybs-core/ybs.css">';
				break;	
			case 'datatables' :
				$result .= '<link rel="stylesheet" href="'.base_url().'assets/back-end/plugins/DataTablesResponsive/datatables.min.css">';
		
				break;

			case 'datepicker':
				$result .= '<link rel="stylesheet" href="'.base_url().'assets/back-end/bower_components/bootstrap-daterangepicker/daterangepicker.css">
							<link rel="stylesheet" href="'.base_url().'assets/back-end/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
							<link rel="stylesheet" href="'.base_url().'assets/back-end/plugins/timepicker/bootstrap-timepicker.min.css">
							<link rel="stylesheet" href="'.base_url().'assets/back-end/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
							';
				break;
				
			case 'dropzone':	
				$result .= '<link rel="stylesheet" href="'.base_url().'assets/back-end/plugins/dropzone/dropzone.css">';
				break;
			
			case 'selectize':	
				$result .='';
				break;
			
			case 'b3':
				$result .='';
				break;	
			case 'b3-cdn':
				$result .='<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">';
				break;
				
			case 'editor-summernote':
				$result .='<link rel="stylesheet" href="'.base_url().'assets/back-end/plugins/summernote/summernote-bs4.css">';
				break;	
			case 'chartjs' :
				$result .='<link rel="stylesheet" href="'.base_url().'assets/back-end/plugins/chart.js/Chart.min.css">';
				break;
			case 'emoji' :			
				$result .='<link rel="stylesheet" href="'.base_url().'assets/back-end/ybs-core/sprites/emoji.css">';
				break;
			case "map-leaflet" :
				$result .=' <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>';
				$result .=' <link rel="stylesheet" href="'.base_url().'assets/back-end/plugins/Leaflet.markercluster-1.4.1/dist/MarkerCluster.css" />';
				$result .=' <link rel="stylesheet" href="'.base_url().'assets/back-end/plugins/Leaflet.markercluster-1.4.1/dist/MarkerCluster.Default.css" />';
			break;	
	
			
		}
		
	}
	

	return $result;
}

function _js($plugin){
	$ar = explode(',',$plugin);
	$result ='';
	
	foreach($ar as $key){
		switch($key){
			case 'ybs' :
				$result .= '<script src="'.base_url().'assets/back-end/ybs-core/ybs.js"></script>';
				break;
			case 'ybs-upload' :
				$result .= '<script src="'.base_url().'assets/back-end/ybs-core/upload-file/ybs-uploadfile.js"></script>';
				break;	
			case 'datatables' :
				$result .= '   
						<script src="'.base_url().'assets/back-end/plugins/DataTablesResponsive/datatables.min.js"></script>	
						<script src="'.base_url().'assets/back-end/plugins/DataTablesResponsive/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
						<script src="'.base_url().'assets/back-end/plugins/DataTablesResponsive/Buttons-1.5.2/js/dataTables.buttons.min.js"></script>
						<script src="'.base_url().'assets/back-end/plugins/DataTablesResponsive/Buttons-1.5.2/js/buttons.flash.min.js"></script>
						<script src="'.base_url().'assets/back-end/plugins/DataTablesResponsive/Buttons-1.5.2/js/buttons.html5.min.js"></script>
						<script src="'.base_url().'assets/back-end/plugins/DataTablesResponsive/Buttons-1.5.2/js/buttons.colVis.min.js"></script>
						
						';
				
				
				break;

			case 'datepicker' :
				$result .= '
							<script src="'.base_url().'assets/back-end/bower_components/moment/min/moment.min.js"></script>
							<script src="'.base_url().'assets/back-end/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
							<script src="'.base_url().'assets/back-end/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
							<script src="'.base_url().'assets/back-end/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
							<script src="'.base_url().'assets/back-end/plugins/timepicker/bootstrap-timepicker.min.js"></script>
							';
				break;	
			case 'dropzone' :
				$result .= '<script src="'.base_url().'assets/back-end/plugins/dropzone/dropzone.min.js"></script>';
				break;		
			case 'selectize' :
				$result .= '<script src="'.base_url().'assets/back-end/plugins/selectize/selectize.min.js"></script>';
				break;	
			case 'b3' :
				$result .= '';
				break;
			case 'b3-cdn' :
				$result .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
							<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>';
				break;		
			case 'editor-summernote' :
				$result .= '<script src="'.base_url().'assets/back-end/plugins/summernote/summernote-bs4.min.js"></script>';
				break;
			case 'chartjs' :
				$result .= '<script src="'.base_url().'assets/back-end/plugins/chart.js/Chart.min.js"></script>
							<script src="'.base_url().'assets/back-end/plugins/chart.js/chartjs-plugin-datalabels.min.js"></script>
							<script src="'.base_url().'assets/back-end/plugins/chart.js/util.js"></script>
							';
				break;	
			case 'text-mark' :
				$result .= '<script src="'.base_url().'assets/back-end/plugins/text-mark/jcfilter.min.js"></script>';
				break;	
			case 'select2Chain' :
				$result .= '<script src="'.base_url().'assets/back-end/ybs-core/select\select2Chain.js"></script>';
				break;
			case "map-leaflet" :
				$result .= '<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>';
				$result .= '<script src="'.base_url().'assets/back-end/plugins/Leaflet.markercluster-1.4.1/dist/leaflet.markercluster-src.js"></script>';
			break;
			case "amchart4" :
			
				$result .=' <script src="'.base_url().'assets/back-end/plugins/amcharts4/core.js"></script>';
				$result .=' <script src="'.base_url().'assets/back-end/plugins/amcharts4/charts.js"></script>';	
				$result .=' <script src="'.base_url().'assets/back-end/plugins/amcharts4/themes/dataviz.js"></script>';
				$result .=' <script src="'.base_url().'assets/back-end/plugins/amcharts4/themes/animated.js"></script>';
			break;	
			case "qrscannerWS" : //With Sample in main.js
				$result .=' <script src="'.base_url().'assets/back-end/plugins/webcodecamjs-master/js/qrcodelib.js"></script>';
				$result .=' <script src="'.base_url().'assets/back-end/plugins/webcodecamjs-master/js/filereader.js"></script>';
				$result .=' <script src="'.base_url().'assets/back-end/plugins/webcodecamjs-master/js/webcodecamjs.js"></script>';
				$result .=' <script src="'.base_url().'assets/back-end/plugins/webcodecamjs-master/js/main.js"></script>';
			break;
			case "qrscanner" : 
				$result .=' <script src="'.base_url().'assets/back-end/plugins/webcodecamjs-master/js/qrcodelib.js"></script>';
				$result .=' <script src="'.base_url().'assets/back-end/plugins/webcodecamjs-master/js/filereader.js"></script>';
				$result .=' <script src="'.base_url().'assets/back-end/plugins/webcodecamjs-master/js/webcodecamjs.js"></script>';
				//$result .=' <script src="'.base_url().'assets/back-end/plugins/webcodecamjs-master/js/main.js"></script>';
			break;
			case "simpleScanner" : 
				$result .=' <script src="'.base_url().'assets/back-end/plugins/webcodecamjs-master/js/qrcodelib.js"></script>';
				$result .=' <script src="'.base_url().'assets/back-end/plugins/webcodecamjs-master/js/filereader.js"></script>';
				$result .=' <script src="'.base_url().'assets/back-end/plugins/webcodecamjs-master/js/webcodecamjs.js"></script>';
				$result .=' <script src="'.base_url().'assets/back-end/ybs-core/qrcode/simpleScanner.js"></script>';
				//$result .=' <script src="'.base_url().'assets/back-end/plugins/webcodecamjs-master/js/main.js"></script>';
			break;
		}
	}
	
	return $result;
}


