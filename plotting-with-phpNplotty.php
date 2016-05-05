<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<title>Test PHP code</title>
</head>

<body>
<span>Mohammad Alam's PHP code for plotting a chart</span>
<div id="myDiv" style="width: 480px; height: 400px;"><!-- Plotly chart will be drawn inside this DIV --></div>

<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";
	$conn = new mysqli($servername, $username, $password,$dbname);
	if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT temp FROM temperature";	
	$result = mysqli_query($conn, $sql);
?>
  <script>
	tr1 = {
		y: [<?php
			while($row = mysqli_fetch_assoc($result)) {
				echo $row["temp"]. ",";
			} ?>],
		x: [<?php 
			for ($j=1; $j<mysqli_num_rows($result)+1; $j++) {
				echo $j . ",";
			} 
			?>],
		type: 'scatter' 	
	};
	var data = [ tr1 ];
	var layout = {
	  title:'Sample plot',
	  height: 400,
	  width: 480,
    	xaxis: {
    		title: 'Sample',
		},
		 yaxis: {
    		title: 'Temperature',
		}	
	};
	
	Plotly.newPlot('myDiv', data, layout);	
  </script>
</body>
</html>
