<?php
$servername="localhost";
$username="root";
$password="";
$dbname="mca";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    echo"Connection Failure";
}
echo"Feedback Report"."<br>";
$temp="SELECT good FROM `feedback` ";
$result=mysqli_query($conn,$temp);
$row= mysqli_fetch_assoc($result);
//echo $row['good']."<br>";
$b=$row['good'];


$temp="SELECT poor FROM `feedback` ";
$result=mysqli_query($conn,$temp);
$row= mysqli_fetch_assoc($result);
//echo $row['poor']."<br>";
$a=$row['poor'];


$temp="SELECT excellent FROM `feedback` ";
$result=mysqli_query($conn,$temp);
$row= mysqli_fetch_assoc($result);
//echo $row['excellent']."<br>";
$c=$row['excellent'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" type="text/css" href="style1.css">
	<title></title>

</head>
<body>
<div class="myChart" 
id="myChart"  style="width:100%; max-width:600px; height:500px; padding-left: 30%;">
</div>




<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([
  ['Feedback', 'report'],
  ['Good',<?php echo $b ?>],
  ['Excellent',<?php echo $c ;?>],
  ['Poor',<?php echo $a ;?>] 
  
]);



var options = {
  title:'MRIIRS Feedback Report',
  is3D:true
};

var chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
</script>
</body>
</html>