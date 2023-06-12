<?= _css("chartjs") ?>

<?= _js("chartjs") ?>





<div class="row ">

<div class="col-md-12 parentFilter">		

<h4  class="childFilter"># PIE CHART</h4>
<label class="label bg-gray childFilter">Chart JS</label>
<label class="label bg-gray childFilter">Pie Chart</label>


<br>
<br>
	
<br>	
<!--area chart-->
<div class="row">
<div class="col-md-12">
sample :
    <div class="panel panel-lte shadow">
		<div class="panel-heading lte-heading-primary">Pie Chart</div>
		<div class="panel-body">
		 <canvas id="pieChart" style="height:250px; min-height:250px"></canvas>
		</div>
	</div>
</div>		
</div>		
	
	<button id="randomizeData">Randomize Data</button>
	<button id="addDataset">Add Dataset</button>
	<button id="removeDataset">Remove Dataset</button>
	
<script>
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Red',
					'Orange',
					'Yellow',
					'Green',
					'Blue'
				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>

<br><br>


javascript :
<div class="callout callout-ybs-danger shadow">
    <h4><i class="fe fe-volume-2"></i> note :</h4>
    <div class="box-body table-responsive no-padding">
	<code>&lt;?= _css("chartjs") ?>  </code><br>
	<code>&lt;?= _js("chartjs") ?>  </code><br>
      code ini hanya sekali saja di buat dalam sebuah form<br>
	  jika di form belum ada code ini..maka silahkan copy code dibawah <i class="fa fa-arrow-circle-down"></i>
    </div>
</div>

<pre>
&lt;?= _css("chartjs") ?>
&lt;?= _js("chartjs") ?>
</pre>

<pre>
&lt;div class="row">
&lt;div class="col-md-12">
    &lt;div class="panel panel-lte shadow">
		&lt;div class="panel-heading lte-heading-primary">Pie Chart&lt;/div>
		&lt;div class="panel-body">
		 &lt;canvas id="pieChart" style="height:250px; min-height:250px">&lt;/canvas>
		&lt;/div>
	&lt;/div>
&lt;/div>		
&lt;/div>		
	
	&lt;button id="randomizeData">Randomize Data&lt;/button>
	&lt;button id="addDataset">Add Dataset&lt;/button>
	&lt;button id="removeDataset">Remove Dataset&lt;/button>	
	
&lt;script>
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Red',
					'Orange',
					'Yellow',
					'Green',
					'Blue'
				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('pieChart').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	&lt;/script>



</pre>	


<br><br> <br><br>

</div>

</div>
      <!-- ./row -->
	  
	  
<div class="row ">

<div class="col-md-12 parentFilter">		

<h4  class="childFilter"># Line Chart</h4>
<label class="label bg-gray childFilter">Chart JS</label>
<label class="label bg-gray childFilter">Line Chart</label>


<br>
	
<br>	
<div class="row">
<div class="col-md-12">
sample :
    <div class="panel panel-lte shadow">
		<div class="panel-heading lte-heading-warning">Line Chart</div>
		<div class="panel-body">
		 <canvas id="canvasLine" style="height:250px; min-height:250px"></canvas>
		</div>
	</div>
</div>		
</div>		
	
	<button id="randomizeDataLine">Randomize Data</button>

	<script>
	var randomScalingFactorLine = function() {
		return Math.ceil(Math.random() * 10.0) * Math.pow(10, Math.ceil(Math.random() * 5));
	};

	var configLine = {
		type: 'line',
		data: {
			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			datasets: [{
				label: 'My First dataset',
				backgroundColor: window.chartColors.red,
				borderColor: window.chartColors.red,
				fill: false,
				data: [
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine()
				],
			}, {
				label: 'My Second dataset',
				backgroundColor: window.chartColors.blue,
				borderColor: window.chartColors.blue,
				fill: false,
				data: [
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine()
				],
			}]
		},
		options: {
			responsive: true,
			title: {
				display: true,
				text: 'Chart.js Line Chart - Logarithmic'
			},
			scales: {
				xAxes: [{
					display: true,
				}],
				yAxes: [{
					display: true,
					type: 'logarithmic',
				}]
			}
		}
	};

	window.onload = function() {
		var ctx = document.getElementById('pieChart').getContext('2d');
			window.myPie = new Chart(ctx, config);
			
		let ctxLine = document.getElementById('canvasLine').getContext('2d');
		window.myLine = new Chart(ctxLine, configLine);
	};

	document.getElementById('randomizeDataLine').addEventListener('click', function() {
		configLine.data.datasets.forEach(function(dataset) {
			dataset.data = dataset.data.map(function() {
				return randomScalingFactorLine();
			});

		});

		window.myLine.update();
	});
	</script>

<br><br>


javascript :
<div class="callout callout-ybs-danger shadow">
    <h4><i class="fe fe-volume-2"></i> note :</h4>
    <div class="box-body table-responsive no-padding">
	<code>&lt;?= _css("chartjs") ?>  </code><br>
	<code>&lt;?= _js("chartjs") ?>  </code><br>
      code ini hanya sekali saja di buat dalam sebuah form<br>
	  jika di form belum ada code ini..maka silahkan copy code dibawah <i class="fa fa-arrow-circle-down"></i>
    </div>
</div>

<pre>
&lt;?= _css("chartjs") ?>
&lt;?= _js("chartjs") ?>
</pre>

<pre>
&lt;div class="row">
&lt;div class="col-md-12">
    &lt;div class="panel panel-lte shadow">
		&lt;div class="panel-heading lte-heading-warning">Line Chart&lt;/div>
		&lt;div class="panel-body">
		 &lt;canvas id="canvasLine" style="height:250px; min-height:250px">&lt;/canvas>
		&lt;/div>
	&lt;/div>
&lt;/div>		
&lt;/div>		
	
&lt;button id="randomizeDataLine">Randomize Data&lt;/button>

	&lt;script>
	var randomScalingFactorLine = function() {
		return Math.ceil(Math.random() * 10.0) * Math.pow(10, Math.ceil(Math.random() * 5));
	};

	var configLine = {
		type: 'line',
		data: {
			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			datasets: [{
				label: 'My First dataset',
				backgroundColor: window.chartColors.red,
				borderColor: window.chartColors.red,
				fill: false,
				data: [
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine()
				],
			}, {
				label: 'My Second dataset',
				backgroundColor: window.chartColors.blue,
				borderColor: window.chartColors.blue,
				fill: false,
				data: [
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine(),
					randomScalingFactorLine()
				],
			}]
		},
		options: {
			responsive: true,
			title: {
				display: true,
				text: 'Chart.js Line Chart - Logarithmic'
			},
			scales: {
				xAxes: [{
					display: true,
				}],
				yAxes: [{
					display: true,
					type: 'logarithmic',
				}]
			}
		}
	};

	window.onload = function() {
		
		let ctxLine = document.getElementById('canvasLine').getContext('2d');
		window.myLine = new Chart(ctxLine, configLine);
	};

	document.getElementById('randomizeDataLine').addEventListener('click', function() {
		configLine.data.datasets.forEach(function(dataset) {
			dataset.data = dataset.data.map(function() {
				return randomScalingFactorLine();
			});

		});

		window.myLine.update();
	});
	&lt;/script>



</pre>	


<br><br> <br><br>

</div>

</div>
      <!-- ./row -->	



	  
<div class="row ">

<div class="col-md-12 parentFilter">		

<h4  class="childFilter"># Bar Chart</h4>
<label class="label bg-gray childFilter">Chart JS</label>
<label class="label bg-gray childFilter">Bar Chart</label>


<br>
	
<br>	
<div class="row">
<div class="col-md-12">
sample :
    <div class="panel panel-lte shadow">
		<div class="panel-heading lte-heading-success">Bar Chart</div>
		<div class="panel-body">
		 <canvas id="barChart" style="height:250px; min-height:250px"></canvas>
		</div>
	</div>
</div>		
</div>		
	
	

<script> 
//---bar chart---// 
		var areaChartData = {
			  labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			  datasets: [
				{
					  	label               : 'Digital Goods',
					  	backgroundColor     : 'rgba(60,141,188,0.9)',
						borderColor         : 'rgba(60,141,188,0.8)',
		  				pointRadius          : false,
		  				pointColor          : '#3b8bba',
		  				pointStrokeColor    : 'rgba(60,141,188,1)',
		  				pointHighlightFill  : '#fff',
		  				pointHighlightStroke: 'rgba(60,141,188,1)',
		  				data                : [28, 48, 40, 19, 86, 27, 90]
				},
				{
		  				label               : 'Electronics',
		  				backgroundColor     : 'rgba(210, 214, 222, 1)',
		  				borderColor         : 'rgba(210, 214, 222, 1)',
		  				pointRadius         : false,
		  				pointColor          : 'rgba(210, 214, 222, 1)',
		  				pointStrokeColor    : '#c1c7d1',
		  				pointHighlightFill  : '#fff',
		  				pointHighlightStroke: 'rgba(220,220,220,1)',
		  				data                : [65, 59, 80, 81, 56, 55, 40]
				},
	  					]
	 		}

		var barChartCanvas = $('#barChart').get(0).getContext('2d')
	var barChartData = jQuery.extend(true, {}, areaChartData)
	var temp0 = areaChartData.datasets[0]
	var temp1 = areaChartData.datasets[1]
	barChartData.datasets[0] = temp1
	barChartData.datasets[1] = temp0

	var barChartOptions = {
	  responsive              : true,
	  maintainAspectRatio     : false,
	  datasetFill             : false
	}

	var barChart = new Chart(barChartCanvas, {
	  type: 'bar', 
	  data: barChartData,
	  options: barChartOptions
	})
</script>

<br><br>


javascript :
<div class="callout callout-ybs-danger shadow">
    <h4><i class="fe fe-volume-2"></i> note :</h4>
    <div class="box-body table-responsive no-padding">
	<code>&lt;?= _css("chartjs") ?>  </code><br>
	<code>&lt;?= _js("chartjs") ?>  </code><br>
      code ini hanya sekali saja di buat dalam sebuah form<br>
	  jika di form belum ada code ini..maka silahkan copy code dibawah <i class="fa fa-arrow-circle-down"></i>
    </div>
</div>


<pre>
&lt;?= _css("chartjs") ?>
&lt;?= _js("chartjs") ?>
</pre>

<pre>
&lt;div class="row">
&lt;div class="col-md-12">
sample :
    &lt;div class="panel panel-lte shadow">
		&lt;div class="panel-heading lte-heading-success">Bar Chart&lt;/div>
		&lt;div class="panel-body">
		 &lt;canvas id="barChart" style="height:250px; min-height:250px">&lt;/canvas>
		&lt;/div>
	&lt;/div>
&lt;/div>		
&lt;/div>


&lt;script> 
//---bar chart---// 
		var areaChartData = {
			  labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			  datasets: [
				{
					  	label               : 'Digital Goods',
					  	backgroundColor     : 'rgba(60,141,188,0.9)',
						borderColor         : 'rgba(60,141,188,0.8)',
		  				pointRadius          : false,
		  				pointColor          : '#3b8bba',
		  				pointStrokeColor    : 'rgba(60,141,188,1)',
		  				pointHighlightFill  : '#fff',
		  				pointHighlightStroke: 'rgba(60,141,188,1)',
		  				data                : [28, 48, 40, 19, 86, 27, 90]
				},
				{
		  				label               : 'Electronics',
		  				backgroundColor     : 'rgba(210, 214, 222, 1)',
		  				borderColor         : 'rgba(210, 214, 222, 1)',
		  				pointRadius         : false,
		  				pointColor          : 'rgba(210, 214, 222, 1)',
		  				pointStrokeColor    : '#c1c7d1',
		  				pointHighlightFill  : '#fff',
		  				pointHighlightStroke: 'rgba(220,220,220,1)',
		  				data                : [65, 59, 80, 81, 56, 55, 40]
				},
	  					]
	 		}

		var barChartCanvas = $('#barChart').get(0).getContext('2d')
	var barChartData = jQuery.extend(true, {}, areaChartData)
	var temp0 = areaChartData.datasets[0]
	var temp1 = areaChartData.datasets[1]
	barChartData.datasets[0] = temp1
	barChartData.datasets[1] = temp0

	var barChartOptions = {
	  responsive              : true,
	  maintainAspectRatio     : false,
	  datasetFill             : false
	}

	var barChart = new Chart(barChartCanvas, {
	  type: 'bar', 
	  data: barChartData,
	  options: barChartOptions
	})
&lt;/script>

</pre>	


<br><br> <br><br>

</div>

</div>
      <!-- ./row -->	


	  
<div class="row ">

<div class="col-md-12 parentFilter">		

<h4  class="childFilter"># Area Chart</h4>
<label class="label bg-gray childFilter">Chart JS</label>
<label class="label bg-gray childFilter">Area Chart</label>


<br>
	
<br>	
<div class="row">
<div class="col-md-12">
sample :
    <div class="panel panel-lte shadow">
		<div class="panel-heading lte-heading-success">Area Chart</div>
		<div class="panel-body">
		 <canvas id="areaChart" style="height:250px; min-height:250px"></canvas>
		</div>
	</div>
</div>		
</div>		
	
	

<script> 
//---area chart---// 
  		var areaChartCanvas = $('#areaChart').get(0).getContext('2d') 
			var areaChartData = {
			  labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			  datasets: [
				{
					  	label               : 'Digital Goods',
					  	backgroundColor     : 'rgba(60,141,188,0.9)',
						borderColor         : 'rgba(60,141,188,0.8)',
		  				pointRadius          : false,
		  				pointColor          : '#3b8bba',
		  				pointStrokeColor    : 'rgba(60,141,188,1)',
		  				pointHighlightFill  : '#fff',
		  				pointHighlightStroke: 'rgba(60,141,188,1)',
		  				data                : [28, 48, 40, 19, 86, 27, 90]
				},
				{
		  				label               : 'Electronics',
		  				backgroundColor     : 'rgba(210, 214, 222, 1)',
		  				borderColor         : 'rgba(210, 214, 222, 1)',
		  				pointRadius         : false,
		  				pointColor          : 'rgba(210, 214, 222, 1)',
		  				pointStrokeColor    : '#c1c7d1',
		  				pointHighlightFill  : '#fff',
		  				pointHighlightStroke: 'rgba(220,220,220,1)',
		  				data                : [65, 59, 80, 81, 56, 55, 40]
				},
	  					]
	 		}

			var areaChartOptions = {
	  			maintainAspectRatio : false,
	  			responsive : true,
	 			legend: {
				display: false
	  			},
	  			scales: {
				xAxes: [{
		  					gridLines : {
							display : false,
		  					}
						}],
				yAxes: [{
		  					gridLines : {
							display : false,
		  					}
						}]
	 					}
	 		}
	
		var areaChart       = new Chart(areaChartCanvas, {
	  		type: 'line',
	  		data: areaChartData,
	  		options: areaChartOptions
			})
	</script>

<br><br>


javascript :
<div class="callout callout-ybs-danger shadow">
    <h4><i class="fe fe-volume-2"></i> note :</h4>
    <div class="box-body table-responsive no-padding">
	<code>&lt;?= _css("chartjs") ?>  </code><br>
	<code>&lt;?= _js("chartjs") ?>  </code><br>
      code ini hanya sekali saja di buat dalam sebuah form<br>
	  jika di form belum ada code ini..maka silahkan copy code dibawah <i class="fa fa-arrow-circle-down"></i>
    </div>
</div>


<pre>
&lt;?= _css("chartjs") ?>
&lt;?= _js("chartjs") ?>
</pre>

<pre>
&lt;div class="row">
&lt;div class="col-md-12">
    &lt;div class="panel panel-lte shadow">
		&lt;div class="panel-heading lte-heading-success">Area Chart&lt;/div>
		&lt;div class="panel-body">
		 &lt;canvas id="areaChart" style="height:250px; min-height:250px">&lt;/canvas>
		&lt;/div>
	&lt;/div>
&lt;/div>		
&lt;/div>		
	
	

&lt;script> 
//---area chart---// 
  		var areaChartCanvas = $('#areaChart').get(0).getContext('2d') 
			var areaChartData = {
			  labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			  datasets: [
				{
					  	label               : 'Digital Goods',
					  	backgroundColor     : 'rgba(60,141,188,0.9)',
						borderColor         : 'rgba(60,141,188,0.8)',
		  				pointRadius          : false,
		  				pointColor          : '#3b8bba',
		  				pointStrokeColor    : 'rgba(60,141,188,1)',
		  				pointHighlightFill  : '#fff',
		  				pointHighlightStroke: 'rgba(60,141,188,1)',
		  				data                : [28, 48, 40, 19, 86, 27, 90]
				},
				{
		  				label               : 'Electronics',
		  				backgroundColor     : 'rgba(210, 214, 222, 1)',
		  				borderColor         : 'rgba(210, 214, 222, 1)',
		  				pointRadius         : false,
		  				pointColor          : 'rgba(210, 214, 222, 1)',
		  				pointStrokeColor    : '#c1c7d1',
		  				pointHighlightFill  : '#fff',
		  				pointHighlightStroke: 'rgba(220,220,220,1)',
		  				data                : [65, 59, 80, 81, 56, 55, 40]
				},
	  					]
	 		}

			var areaChartOptions = {
	  			maintainAspectRatio : false,
	  			responsive : true,
	 			legend: {
				display: false
	  			},
	  			scales: {
				xAxes: [{
		  					gridLines : {
							display : false,
		  					}
						}],
				yAxes: [{
		  					gridLines : {
							display : false,
		  					}
						}]
	 					}
	 		}
	
		var areaChart       = new Chart(areaChartCanvas, {
	  		type: 'line',
	  		data: areaChartData,
	  		options: areaChartOptions
			})
	&lt;/script>

</pre>	


<br><br> <br><br>

</div>

</div>
      <!-- ./row -->	  



