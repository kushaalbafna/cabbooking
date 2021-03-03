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
		  <a href='driver.html'>Login</a>
        </div>
    </div>
	<style>

</style>
</body>";
$name=$_POST["name"];
$cabNumber=$_POST["cabNumber"];
$mobileNumber=$_POST["mobileNumber"];
$locality=$_POST["locality"];
$password=$_POST["password"];
$con=mysqli_connect("localhost","root","","vcabs");
if($con)
{
$query="insert into driver(name,cabNumber,mobileNumber,locality,password) values('{$name}','{$cabNumber}',{$mobileNumber},'{$locality}','{$password}')";
if(mysqli_query($con,$query))
{
echo "<p style='margin-top:0%;font-size:40;font-family:serif;color:red;text-align:center'><br><br>SignedUp Successfully!</p>";
}
else
{
echo "<p style='margin-top:0%;font-size:40;font-family:serif;color:red;text-align:center'><br><br>Already SignedUp, Try to Login!</p>";
}
}
echo"</div>";
?>