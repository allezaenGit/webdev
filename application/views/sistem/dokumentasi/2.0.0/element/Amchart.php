
<?= _js("amchart4")?> 
<b>Untuk Dokumentasi Lengkap Kunjungi situs resmi AmChart</b><br>
<a href=" https://www.amcharts.com/demos/"> https://www.amcharts.com/demos/</a>

<br>
<br>

<!--############--> 
<div class="row ">
<div class="col-md-12 parentFilter">		

<h4  class="childFilter"># PIE CHART</h4>
<label class="label bg-gray childFilter">amCharts</label>
<label class="label bg-gray childFilter">Pie Chart</label>


<br>
<br>
	
<br>	
<!--Pie chart-->
<div class="row">
<div class="col-md-12">
    <div class="panel panel-lte shadow">
    <div class="panel-heading lte-heading-primary">Pie Chart</div>
    <div class="panel-body">
    <div id="chartdiv"  style="height:500px; min-height:250px;width: 100%;"></div>
    </div>
  </div>
</div>    
</div> 	
	
	
<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
 am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.PieChart);

// Add data
chart.data = [ {
  "country": "Lithuania",
  "litres": 501.9
}, {
  "country": "Czechia",
  "litres": 301.9
}, {
  "country": "Ireland",
  "litres": 201.1
}, {
  "country": "Germany",
  "litres": 165.8
}, {
  "country": "Australia",
  "litres": 139.9
}, {
  "country": "Austria",
  "litres": 128.3
}, {
  "country": "UK",
  "litres": 99
}
];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

chart.hiddenState.properties.radius = am4core.percent(0);


}); // end am4core.ready()
</script>

<br><br>


javascript :
<div class="callout callout-ybs-danger shadow">
    <h4><i class="fe fe-volume-2"></i> note :</h4>
    <div class="box-body table-responsive no-padding">
	<code>&lt;?= _js("amchart4") ?>  </code><br>
      code ini hanya sekali saja di buat dalam sebuah form<br>
	  jika di form belum ada code ini..maka silahkan copy code dibawah <i class="fa fa-arrow-circle-down"></i>
    </div>
</div>

<pre>
&lt;?= _js("amchart4") ?>
</pre>

<pre>
&lt;!--Pie chart-->
&lt;div class="row">
&lt;div class="col-md-12">
    &lt;div class="panel panel-lte shadow">
    &lt;div class="panel-heading lte-heading-primary">Pie Chart&lt;/div>
    &lt;div class="panel-body">
    &lt;div id="chartdiv"  style="height:500px; min-height:250px;width: 100%;">&lt;/div>
    &lt;/div>
  &lt;/div>
&lt;/div>    
&lt;/div> 	
	
	
&lt;!-- Chart code -->
&lt;script>
am4core.ready(function() {

// Themes begin
 am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.PieChart);

// Add data
chart.data = [ {
  "country": "Lithuania",
  "litres": 501.9
}, {
  "country": "Czechia",
  "litres": 301.9
}, {
  "country": "Ireland",
  "litres": 201.1
}, {
  "country": "Germany",
  "litres": 165.8
}, {
  "country": "Australia",
  "litres": 139.9
}, {
  "country": "Austria",
  "litres": 128.3
}, {
  "country": "UK",
  "litres": 99
}
];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

chart.hiddenState.properties.radius = am4core.percent(0);


}); // end am4core.ready()
&lt;/script>



</pre>	


<br><br> <br><br>

</div>

</div>


<!--############--> 
<div class="row ">
<div class="col-md-12 parentFilter">		

<h4  class="childFilter"># 3D PIE CHART</h4>
<label class="label bg-gray childFilter">amCharts</label>
<label class="label bg-gray childFilter">3D Pie Chart</label>


<br>
<br>
	
<br>	
<!--3D Pie chart-->
<div class="row">
<div class="col-md-12">
    <div class="panel panel-lte shadow">
    <div class="panel-heading lte-heading-primary">3D Pie Chart</div>
    <div class="panel-body">
    <div id="chart3DPie"  style="height:500px; min-height:250px;width: 100%;"></div>
    </div>
  </div>
</div>    
</div> 	
	
<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chart3DPie", am4charts.PieChart3D);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.legend = new am4charts.Legend();

chart.data = [
  {
    country: "Lithuania",
    litres: 501.9
  },
  {
    country: "Czech Republic",
    litres: 301.9
  },
  {
    country: "Ireland",
    litres: 201.1
  },
  {
    country: "Germany",
    litres: 165.8
  },
  {
    country: "Australia",
    litres: 139.9
  },
  {
    country: "Austria",
    litres: 128.3
  },
  {
    country: "UK",
    litres: 99
  },
  {
    country: "Belgium",
    litres: 60
  },
  {
    country: "The Netherlands",
    litres: 50
  }
];

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "litres";
series.dataFields.category = "country";

}); // end am4core.ready()
</script>	


<br><br>


javascript :
<div class="callout callout-ybs-danger shadow">
    <h4><i class="fe fe-volume-2"></i> note :</h4>
    <div class="box-body table-responsive no-padding">
	<code>&lt;?= _js("amchart4") ?>  </code><br>
      code ini hanya sekali saja di buat dalam sebuah form<br>
	  jika di form belum ada code ini..maka silahkan copy code dibawah <i class="fa fa-arrow-circle-down"></i>
    </div>
</div>

<pre>
&lt;?= _js("amchart4") ?>
</pre>

<pre>
&lt;!--3D Pie chart-->
&lt;div class="row">
&lt;div class="col-md-12">
    &lt;div class="panel panel-lte shadow">
    &lt;div class="panel-heading lte-heading-primary">3D Pie Chart&lt;/div>
    &lt;div class="panel-body">
    &lt;div id="chart3DPie"  style="height:500px; min-height:250px;width: 100%;">&lt;/div>
    &lt;/div>
  &lt;/div>
&lt;/div>    
&lt;/div> 	
	
&lt;!-- Chart code -->
&lt;script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chart3DPie", am4charts.PieChart3D);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.legend = new am4charts.Legend();

chart.data = [
  {
    country: "Lithuania",
    litres: 501.9
  },
  {
    country: "Czech Republic",
    litres: 301.9
  },
  {
    country: "Ireland",
    litres: 201.1
  },
  {
    country: "Germany",
    litres: 165.8
  },
  {
    country: "Australia",
    litres: 139.9
  },
  {
    country: "Austria",
    litres: 128.3
  },
  {
    country: "UK",
    litres: 99
  },
  {
    country: "Belgium",
    litres: 60
  },
  {
    country: "The Netherlands",
    litres: 50
  }
];

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "litres";
series.dataFields.category = "country";

}); // end am4core.ready()
&lt;/script>	


</pre>	


<br><br> <br><br>

</div>

</div>
   


   
   
   
   
   
<!--############--> 
<div class="row ">

<div class="col-md-12 parentFilter">		

<h4  class="childFilter"># 3D Column Chart</h4>
<label class="label bg-gray childFilter">amCharts</label>
<label class="label bg-gray childFilter">Column Chart</label>
<label class="label bg-gray childFilter">Bar Chart</label>
<label class="label bg-gray childFilter">3D Chart</label>

<br>
<br>
	
<br>	
<!--3D Column Chart-->
<div class="row">
<div class="col-md-12">
    <div class="panel panel-lte shadow">
    <div class="panel-heading lte-heading-primary">3D Column Chart</div>
    <div class="panel-body">
    <div id="chart3DColumn"  style="height:500px; min-height:250px;width: 100%;"></div>
    </div>
  </div>
</div>    
</div> 	
	
<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chart3DColumn", am4charts.XYChart3D);

// Add data
chart.data = [{
  "country": "USA",
  "visits": 4025
}, {
  "country": "China",
  "visits": 1882
}, {
  "country": "Japan",
  "visits": 1809
}, {
  "country": "Germany",
  "visits": 1322
}, {
  "country": "UK",
  "visits": 1122
}, {
  "country": "France",
  "visits": 1114
}, {
  "country": "India",
  "visits": 984
}, {
  "country": "Spain",
  "visits": 711
}, {
  "country": "Netherlands",
  "visits": 665
}, {
  "country": "Russia",
  "visits": 580
}, {
  "country": "South Korea",
  "visits": 443
}, {
  "country": "Canada",
  "visits": 441
}, {
  "country": "Brazil",
  "visits": 395
}, {
  "country": "Italy",
  "visits": 386
}, {
  "country": "Australia",
  "visits": 384
}, {
  "country": "Taiwan",
  "visits": 338
}, {
  "country": "Poland",
  "visits": 328
}];

// Create axes
let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.labels.template.rotation = 270;
categoryAxis.renderer.labels.template.hideOversized = false;
categoryAxis.renderer.minGridDistance = 20;
categoryAxis.renderer.labels.template.horizontalCenter = "right";
categoryAxis.renderer.labels.template.verticalCenter = "middle";
categoryAxis.tooltip.label.rotation = 270;
categoryAxis.tooltip.label.horizontalCenter = "right";
categoryAxis.tooltip.label.verticalCenter = "middle";

let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.title.text = "Countries";
valueAxis.title.fontWeight = "bold";

// Create series
var series = chart.series.push(new am4charts.ColumnSeries3D());
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
series.name = "Visits";
series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;
columnTemplate.stroke = am4core.color("#FFFFFF");

columnTemplate.adapter.add("fill", function(fill, target) {
  return chart.colors.getIndex(target.dataItem.index);
})

columnTemplate.adapter.add("stroke", function(stroke, target) {
  return chart.colors.getIndex(target.dataItem.index);
})

chart.cursor = new am4charts.XYCursor();
chart.cursor.lineX.strokeOpacity = 0;
chart.cursor.lineY.strokeOpacity = 0;

}); // end am4core.ready()
</script>


<br><br>


javascript :
<div class="callout callout-ybs-danger shadow">
    <h4><i class="fe fe-volume-2"></i> note :</h4>
    <div class="box-body table-responsive no-padding">
	<code>&lt;?= _js("amchart4") ?>  </code><br>
      code ini hanya sekali saja di buat dalam sebuah form<br>
	  jika di form belum ada code ini..maka silahkan copy code dibawah <i class="fa fa-arrow-circle-down"></i>
    </div>
</div>

<pre>
&lt;?= _js("amchart4") ?>
</pre>

<pre>
&lt;!--3D Column Chart-->
&lt;div class="row">
&lt;div class="col-md-12">
    &lt;div class="panel panel-lte shadow">
    &lt;div class="panel-heading lte-heading-primary">3D Column Chart&lt;/div>
    &lt;div class="panel-body">
    &lt;div id="chart3DColumn"  style="height:500px; min-height:250px;width: 100%;">&lt;/div>
    &lt;/div>
  &lt;/div>
&lt;/div>    
&lt;/div> 	
	
&lt;!-- Chart code -->
&lt;script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chart3DColumn", am4charts.XYChart3D);

// Add data
chart.data = [{
  "country": "USA",
  "visits": 4025
}, {
  "country": "China",
  "visits": 1882
}, {
  "country": "Japan",
  "visits": 1809
}, {
  "country": "Germany",
  "visits": 1322
}, {
  "country": "UK",
  "visits": 1122
}, {
  "country": "France",
  "visits": 1114
}, {
  "country": "India",
  "visits": 984
}, {
  "country": "Spain",
  "visits": 711
}, {
  "country": "Netherlands",
  "visits": 665
}, {
  "country": "Russia",
  "visits": 580
}, {
  "country": "South Korea",
  "visits": 443
}, {
  "country": "Canada",
  "visits": 441
}, {
  "country": "Brazil",
  "visits": 395
}, {
  "country": "Italy",
  "visits": 386
}, {
  "country": "Australia",
  "visits": 384
}, {
  "country": "Taiwan",
  "visits": 338
}, {
  "country": "Poland",
  "visits": 328
}];

// Create axes
let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.labels.template.rotation = 270;
categoryAxis.renderer.labels.template.hideOversized = false;
categoryAxis.renderer.minGridDistance = 20;
categoryAxis.renderer.labels.template.horizontalCenter = "right";
categoryAxis.renderer.labels.template.verticalCenter = "middle";
categoryAxis.tooltip.label.rotation = 270;
categoryAxis.tooltip.label.horizontalCenter = "right";
categoryAxis.tooltip.label.verticalCenter = "middle";

let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.title.text = "Countries";
valueAxis.title.fontWeight = "bold";

// Create series
var series = chart.series.push(new am4charts.ColumnSeries3D());
series.dataFields.valueY = "visits";
series.dataFields.categoryX = "country";
series.name = "Visits";
series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;
columnTemplate.stroke = am4core.color("#FFFFFF");

columnTemplate.adapter.add("fill", function(fill, target) {
  return chart.colors.getIndex(target.dataItem.index);
})

columnTemplate.adapter.add("stroke", function(stroke, target) {
  return chart.colors.getIndex(target.dataItem.index);
})

chart.cursor = new am4charts.XYCursor();
chart.cursor.lineX.strokeOpacity = 0;
chart.cursor.lineY.strokeOpacity = 0;

}); // end am4core.ready()
&lt;/script>


</pre>	


<br><br> <br><br>

</div>

</div>





<!--############--> 
<div class="row ">

<div class="col-md-12 parentFilter">		

<h4  class="childFilter"># Column chart with images on top</h4>
<label class="label bg-gray childFilter">amCharts</label>
<label class="label bg-gray childFilter">Column Chart</label>
<label class="label bg-gray childFilter">image on top Chart</label>
<label class="label bg-gray childFilter">bar Chart</label>

<br>
<br>
	
<br>	
<!--3D Column Chart-->
<div class="row">
<div class="col-md-12">
    <div class="panel panel-lte shadow">
    <div class="panel-heading lte-heading-primary">3D Column chart with images on top</div>
    <div class="panel-body">
    <div id="chartImage"  style="height:500px; min-height:250px;width: 100%;"></div>
    </div>
  </div>
</div>    
</div> 	

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_dataviz);
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartImage", am4charts.XYChart);

// Add data
chart.data = [{
    "name": "John",
    "points": 35654,
    "color": chart.colors.next(),
    "bullet": "https://www.amcharts.com/lib/images/faces/A04.png"
}, {
    "name": "Damon",
    "points": 65456,
    "color": chart.colors.next(),
    "bullet": "https://www.amcharts.com/lib/images/faces/C02.png"
}, {
    "name": "Patrick",
    "points": 45724,
    "color": chart.colors.next(),
    "bullet": "https://www.amcharts.com/lib/images/faces/D02.png"
}, {
    "name": "Mark",
    "points": 13654,
    "color": chart.colors.next(),
    "bullet": "https://www.amcharts.com/lib/images/faces/E01.png"
}];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "name";
categoryAxis.renderer.grid.template.disabled = true;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.inside = true;
categoryAxis.renderer.labels.template.fill = am4core.color("#fff");
categoryAxis.renderer.labels.template.fontSize = 20;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.grid.template.strokeDasharray = "4,4";
valueAxis.renderer.labels.template.disabled = true;
valueAxis.min = 0;

// Do not crop bullets
chart.maskBullets = false;

// Remove padding
chart.paddingBottom = 0;

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "points";
series.dataFields.categoryX = "name";
series.columns.template.propertyFields.fill = "color";
series.columns.template.propertyFields.stroke = "color";
series.columns.template.column.cornerRadiusTopLeft = 15;
series.columns.template.column.cornerRadiusTopRight = 15;
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/b]";

// Add bullets
var bullet = series.bullets.push(new am4charts.Bullet());
var image = bullet.createChild(am4core.Image);
image.horizontalCenter = "middle";
image.verticalCenter = "bottom";
image.dy = 20;
image.y = am4core.percent(100);
image.propertyFields.href = "bullet";
image.tooltipText = series.columns.template.tooltipText;
image.propertyFields.fill = "color";
image.filters.push(new am4core.DropShadowFilter());

}); // end am4core.ready()
</script>



<br><br>


javascript :
<div class="callout callout-ybs-danger shadow">
    <h4><i class="fe fe-volume-2"></i> note :</h4>
    <div class="box-body table-responsive no-padding">
	<code>&lt;?= _js("amchart4") ?>  </code><br>
      code ini hanya sekali saja di buat dalam sebuah form<br>
	  jika di form belum ada code ini..maka silahkan copy code dibawah <i class="fa fa-arrow-circle-down"></i>
    </div>
</div>

<pre>
&lt;?= _js("amchart4") ?>
</pre>

<pre>
&lt;!--3D Column Chart-->
&lt;div class="row">
&lt;div class="col-md-12">
    &lt;div class="panel panel-lte shadow">
    &lt;div class="panel-heading lte-heading-primary">3D Column chart with images on top&lt;/div>
    &lt;div class="panel-body">
    &lt;div id="chartImage"  style="height:500px; min-height:250px;width: 100%;">&lt;/div>
    &lt;/div>
  &lt;/div>
&lt;/div>    
&lt;/div> 	

&lt;!-- Chart code -->
&lt;script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_dataviz);
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartImage", am4charts.XYChart);

// Add data
chart.data = [{
    "name": "John",
    "points": 35654,
    "color": chart.colors.next(),
    "bullet": "https://www.amcharts.com/lib/images/faces/A04.png"
}, {
    "name": "Damon",
    "points": 65456,
    "color": chart.colors.next(),
    "bullet": "https://www.amcharts.com/lib/images/faces/C02.png"
}, {
    "name": "Patrick",
    "points": 45724,
    "color": chart.colors.next(),
    "bullet": "https://www.amcharts.com/lib/images/faces/D02.png"
}, {
    "name": "Mark",
    "points": 13654,
    "color": chart.colors.next(),
    "bullet": "https://www.amcharts.com/lib/images/faces/E01.png"
}];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "name";
categoryAxis.renderer.grid.template.disabled = true;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.inside = true;
categoryAxis.renderer.labels.template.fill = am4core.color("#fff");
categoryAxis.renderer.labels.template.fontSize = 20;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.grid.template.strokeDasharray = "4,4";
valueAxis.renderer.labels.template.disabled = true;
valueAxis.min = 0;

// Do not crop bullets
chart.maskBullets = false;

// Remove padding
chart.paddingBottom = 0;

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "points";
series.dataFields.categoryX = "name";
series.columns.template.propertyFields.fill = "color";
series.columns.template.propertyFields.stroke = "color";
series.columns.template.column.cornerRadiusTopLeft = 15;
series.columns.template.column.cornerRadiusTopRight = 15;
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/b]";

// Add bullets
var bullet = series.bullets.push(new am4charts.Bullet());
var image = bullet.createChild(am4core.Image);
image.horizontalCenter = "middle";
image.verticalCenter = "bottom";
image.dy = 20;
image.y = am4core.percent(100);
image.propertyFields.href = "bullet";
image.tooltipText = series.columns.template.tooltipText;
image.propertyFields.fill = "color";
image.filters.push(new am4core.DropShadowFilter());

}); // end am4core.ready()
&lt;/script>

</pre>	


<br><br> <br><br>

</div>

</div>