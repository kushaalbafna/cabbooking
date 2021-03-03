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
		  <a href='http://localhost/cab/recharge.html'>Recharge</a>
		  <a href='http://localhost/cab/riderBalance.php'>Current Balance</a>
		  <a href='http://localhost/cab/riderHistory.php'>Ride history</a>
		  <a href='http://localhost/cab/rider.html'>Logout</a>
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
background-color:red;
margin-left:43%;
margin-top:4%;
font-size:15;
font-family:serif;
border-radius:10px;
height:8%;
width:15%;
}
</style>
</body>";
echo"<p style='margin-left:20%;font-size:30;font-family:serif;color:yellow'>Welcome ".$_SESSION["rName"]."! You are logged in with mobile number ".$_SESSION["rUserID"]."</p>";
$mobileNumber=$_SESSION["rUserID"];
echo"<p style='margin-left:43%;font-size:40;font-family:serif;color:red'>Book a cab</p>";
$con=mysqli_connect("localhost","root","","vcabs");
if($con)
{		
$query="select rWallet from rider where mobileNumber=$mobileNumber";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$rWallet=$rs["rWallet"];
}
}
if($rWallet<130)
{
echo "<p style='margin-top:0%;font-size:25;font-family:serif;color:yellow;background-color:red;text-align:center'>Please recharge to continue booking!</p>";		
}
else
{	
echo"<form method='post' action='cabBooking.php'>
<p style='margin-left:35%'>From</p>
<div class='username'>
     <input type='text' placeholder='pickup location' name='from'  style='width:30%;height:10%;margin-left:35%;border-radius:4px' required>
  </div>
<p style='margin-left:35%'>To</p>
<div class='username'>
     <input type='text' placeholder='drop location' name='to'  style='width:30%;height:10%;margin-left:35%;border-radius:4px' required>
  </div>
  
<div class='login'>
	 <button type='submit' name='ok' value='OK'>OK</button>
  </div>
</form>";
}
echo"</div>";
?>