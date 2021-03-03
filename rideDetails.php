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
margin-left:40%;
margin-top:0%;
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
				
    </div>
	<style>

</style>
</body>";
$con=mysqli_connect("localhost","root","","vcabs");
if($con)
{
$query="select id from rideid where ref=1";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$id=$rs["id"];
$_SESSION["rid"]=$id;
}

$query="select * from cabbooking where id=$id";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$driverName=$rs["driverName"];
$driverMobileNumber=$rs["driverMobileNumber"];
$cabNumber=$rs["cabNumber"];
}
echo"<p style='margin-left:38%;font-size:30;font-family:serif;color:blue'>YOUR RIDE DETAILS</p>";
echo"<p style='margin-left:28%;font-size:30;font-family:serif;color:yellow'>YOUR RIDING IN CAB NUMBER : ".$cabNumber."</p>";
echo"<p style='margin-left:28%;font-size:30;font-family:serif;color:yellow'>DRIVER NAME : ".$driverName."</p>";
echo"<p style='margin-left:28%;font-size:30;font-family:serif;color:yellow'>DRIVER MOBILE NUMBER : ".$driverMobileNumber."</p>";



$query="select * from cabbooking where id=$id";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$lfrom=$rs["lfrom"];
$lto=$rs["lto"];
}
if(preg_match("/^[-a-zA-Z0-9,\s]*(race course){1}[-a-zA-Z0-9,\s]*$/i",$lfrom))
	{
		$lfrom='race course';
	}
if(preg_match("/^[-a-zA-Z0-9,\s]*(gandhipuram){1}[-a-zA-Z0-9,\s]*$/i",$lfrom))
	{
		$lfrom='gandhipuram';
	}
if(preg_match("/^[-a-zA-Z0-9,\s]*(r s puram){1}[-a-zA-Z0-9,\s]*$/i",$lfrom))
	{
		$lfrom='r s puram';
	}
if(preg_match("/^[-a-zA-Z0-9,\s]*(kuniyamuthur){1}[-a-zA-Z0-9,\s]*$/i",$lfrom))
	{
		$lfrom='kuniyamuthur';
	}
if(preg_match("/^[-a-zA-Z0-9,\s]*(town hall){1}[-a-zA-Z0-9,\s]*$/i",$lfrom))
	{
		$lfrom='town hall';
	}	

if(preg_match("/^[-a-zA-Z0-9,\s]*(race course){1}[-a-zA-Z0-9,\s]*$/i",$lto))
	{
		$lto='race course';
	}
if(preg_match("/^[-a-zA-Z0-9,\s]*(gandhipuram){1}[-a-zA-Z0-9,\s]*$/i",$lto))
	{
		$lto='gandhipuram';
	}
if(preg_match("/^[-a-zA-Z0-9,\s]*(r s puram){1}[-a-zA-Z0-9,\s]*$/i",$lto))
	{
		$lto='r s puram';
	}
if(preg_match("/^[-a-zA-Z0-9,\s]*(kuniyamuthur){1}[-a-zA-Z0-9,\s]*$/i",$lto))
	{
		$lto='kuniyamuthur';
	}
if(preg_match("/^[-a-zA-Z0-9,\s]*(town hall){1}[-a-zA-Z0-9,\s]*$/i",$lto))
	{
		$lto='town hall';
	}	
$query="select kms from distance where lfrom='{$lfrom}' and lto='{$lto}'";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$kms=$rs["kms"];
if($kms!=0)
{
$fare=50+(($kms-3)*10);
}
echo"<p style='margin-left:38%;font-size:40;font-family:verdana;color:yellow'>Fare = Rs ".$fare."</p>";
$_SESSION["fare"]=$fare;
}
echo"<form method='post' action='endRide.php'>
<div class='login'>
	 <button type='submit'>END RIDE</button>
  </div>

</form>";
}
echo"</div>";
?>