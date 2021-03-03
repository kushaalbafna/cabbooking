<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  
  background-image: url('http://localhost/cab/8.jpg');

 
  height: 100%; 

  
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
</head>




</html>
<?php
session_start();
?>
<?php
echo"<div class='bg'>";
echo"<head>
	<title>VCab</title>
	<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>

	<div class='header'>
		<a href='#' style='text-decoration: none;font-size: 35px;color: red;'>VCABS</a>
				<div class='header-one'>
		  <a href='http://localhost/cab/driverLoggedIn.php'>Other Rides</a>
        </div>
    </div>
	<style>
</style>
</body>";
echo"<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color:white}
th {
  background-color:red;
  color: white;
}
</style>
</head>";
$con=mysqli_connect("localhost","root","","vcabs");
if($con)
{
$mobileNumber=$_SESSION["dUserID"];
$sql="select * from cabbooking where driverMobileNumber=$mobileNumber";
$result=mysqli_query($con,$sql);
//echo "<form method='post' action='rideAcceptedUpdate.php'>";
echo"<br>";

if(mysqli_num_rows($result)>0)
{
echo "<table border=1 cellpadding=1 cellspacing=1><tr><th>RIDE ID</th><th>RIDER NAME</th><th>RIDER MOBILE NUMBER</th><th>FROM</th><th>TO</th><th>STATUS</th><th>CAB NUMBER</th><th>DRIVER NAME</th><th>DRIVER MOBILE NUMBER</th><th>FARE</th></tr>";		
while($rs=mysqli_fetch_assoc($result))
{

$id=$rs["id"];
$riderName=$rs["riderName"];
$riderMobileNumber=$rs["riderMobileNumber"];
$lfrom=$rs["lfrom"];
$lto=$rs["lto"];
$status=$rs["status"];
$cabNumber=$rs["cabNumber"];
$driverName=$rs["driverName"];
$driverMobileNumber=$rs["driverMobileNumber"];
$fare=$rs["fare"];
echo "<tr><td>{$id}</td><td>{$riderName}</td><td>{$riderMobileNumber}</td><td>{$lfrom}</td>
<td>{$lto}</td><td>{$status}</td><td>{$cabNumber}</td><td>{$driverName}</td><td>{$driverMobileNumber}</td>
<td>{$fare}</td>";
}
echo"</tr></table>";
}
else
{
	echo"<p style='margin-top:0%;font-size:50;font-family:serif;color:red;text-align:center'><br><br>No ride history found!</p>";
}
}
echo"</div>";
?>