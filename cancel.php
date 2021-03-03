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
echo"
<style>
div.avatar{
margin-left:45%;
margin-top:3%;
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
margin-top:4%;
font-size:15;
font-family:serif;
border-radius:10px;
height:8%;
width:15%;
}

</style>";
echo"<head>
	<title>VCab</title>
	<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>

	<div class='header'>
		<a href='#' style='text-decoration: none;font-size: 35px;color: red;'>VCABS</a>
				<div class='header-one'>
		  <a href='http://localhost/cab/rider.html'>Logout</a>
        </div>
    </div>
	<style>

</style>
</body>";
$name=$_SESSION["rName"];
$mobileNumber=$_SESSION["rUserID"];
$from=$_SESSION["from"];
$to=$_SESSION["to"];
$con=mysqli_connect("localhost","root","","vcabs");
if($con)
{		
$query="select id from cabbooking where riderName='{$name}' and riderMobileNumber={$mobileNumber} and lfrom='{$from}' and lto='{$to}' and status='reject'";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$id=$rs["id"];
}
$query="select * from cabbooking where id=$id";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$riderMobileNumber=$rs["riderMobileNumber"];
}
$query="update cabbooking set fare=20 where id=$id";
mysqli_query($con,$query);
$query="select * from rider where mobileNumber=$riderMobileNumber";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$rWallet=$rs["rWallet"];
$rWallet=$rWallet-20;
}
$query="update rider set rWallet=$rWallet where mobileNumber=$riderMobileNumber";
mysqli_query($con,$query);
$query="update cabbooking set status='cancelled' where id=$id";
mysqli_query($con,$query);
echo "<p style='margin-top:0%;font-size:40;font-family:serif;color:red;text-align:center'><br><br>Your ride has been cancelled<br><br>Cancellation fee Rs 20 has been deducted from your Vwallet!</p>";
}
echo"</div>";
?>
