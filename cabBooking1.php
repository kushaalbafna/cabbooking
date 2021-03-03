<?php
session_start();
?>
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
<div style='background-image:url('http://localhost/cab/8.jpg');'>
	<div class='header'>
		<a href='#' style='text-decoration: none;font-size: 35px;color: red;'>VCABS</a>
		<div class='header-one'>
		  <a href='cancel.php'>Cancel Ride</a>
        </div>
    </div>
	
<style>
div.avatar{
margin-left:47%;
margin-top:5%;
}
div.username{
margin-top:0%;
font-size:25;
font-family:serif;
}
div.password{
margin-top:0%;
font-size:25;
font-family:serif;
}
button{
text-align:center;
color:white;
background-color:#0074D9;
margin-left:43%;
margin-top:0%;
font-size:15;
font-family:serif;
border-radius:10px;
height:8%;
width:15%;
}
</style>
</div>
</body>";
$name=$_SESSION["rName"];
$mobileNumber=$_SESSION["rUserID"];
$from=$_SESSION["from"];
$to=$_SESSION["to"];
echo "<p style='margin-top:0%;font-size:50;font-family:serif;color:red;text-align:center'><br><br>waiting for cab!</p>";	
$con=mysqli_connect("localhost","root","","vcabs");
if($con)
{		
$query="select id from rideid where ref=1";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$id=$rs["id"];
}
$query="select id from cabbooking where riderName='{$name}' and riderMobileNumber={$mobileNumber} and lfrom='{$from}' and lto='{$to}' and status='accept'";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$rid=$rs["id"];
}
if($id!=0 && $id==$rid)
{
header("location:http://localhost/cab/rideDetails.php");
}
}
echo"</div>";
?>