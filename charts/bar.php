<?php
require_once('functions/initialise.php');

$query = select_all('dom_remittance');

$dataPoints = array(
	array("y" => 3373.64, "label" => "Zimbabwe" ),
	array("y" => 2435.94, "label" => "Tanzania" ),
	array("y" => 1842.55, "label" => "Zambia" ),
	array("y" => 1828.55, "label" => "South Africa" ),
	array("y" => 1539.99, "label" => "Botswana" )
	
/*$dataPoints = array( 
	array("y" => 3373.64, "label" => "Zimbabwe" ),
	array("y" => 2435.94, "label" => "Tanzania" ),
	array("y" => 1842.55, "label" => "Zambia" ),
	array("y" => 1828.55, "label" => "South Africa" ),
	array("y" => 1539.99, "label" => "Botswana" )*/
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainerBar", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Branch Performance (Sample)"
	},
	axisY: {
		title: "Transactions"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## tx",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainerBar" style="height: 200px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>