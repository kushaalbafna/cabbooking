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
echo"<div class='bg'>";
echo"<head>
	<title>VCab</title>
	<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>

	<div class='header'>
		<a href='#' style='text-decoration: none;font-size: 35px;color: red;'>VCABS</a>
		<div class='header-one'>
		  <a href='http://localhost/cab/riderRecharge.html'>Recharge Rider's A/C</a>
		  <a href='http://localhost/cab/vhome.html'>Logout</a>
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
$bool=0;
$sql="select * from driver where verified='no'";
$result=mysqli_query($con,$sql);
echo "<form method='post' action='driverVerifiedUpdate.php'>";

if(mysqli_num_rows($result)>0)
{
echo "<table border=1 cellpadding=1 cellspacing=1><tr><th>NAME</th><th>CAB NUMBER</th><th>MOBILE NUMBER</th><th>LOCALITY</th><th>VERIFIED</th></tr>";	
while($rs=mysqli_fetch_assoc($result))
{
$name=$rs["name"];
$cabNumber=$rs["cabNumber"];
$mobileNumber=$rs["mobileNumber"];
$locality=$rs["locality"];
echo "<tr><td>{$name}</td><td>{$cabNumber}</td><td><input type='text' name='mobileNumber[]' value={$mobileNumber}></td><td>{$locality}</td><td><select name='verified[]'><option value='no'>NO</option><option value='yes'>YES</option></select></td></tr>";
$bool=1;
}
}
echo"<tr><td colspan=6>";
if($bool)
{
echo"<input type='submit' value='OK'>";
}
echo"</td></tr></table></form>";
}
if($bool==0)
{
echo "<p style='margin-top:0%;font-size:35;font-family:serif;color:red;text-align:center'><br><br>NO RECORDS FOUND</p>";	

}
echo"</div>";
?>