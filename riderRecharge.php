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
		  <a href='http://localhost/cab/riderRecharge.html'>Recharge other Rider's A/C</a>
		  <a href='http://localhost/cab/vhome.html'>Logout</a>
        </div>
    </div>
	<style>

</style>
</body>";
$amount=$_POST["amount"];
$mobileNumber=$_POST["mobileNumber"];
if(preg_match("/^[0-9]*$/",$amount))
{
$con=mysqli_connect("localhost","root","","vcabs");
if($con)	
{
$f=1;	
$query="select rWallet from rider where mobileNumber=$mobileNumber";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$rWallet=$rs["rWallet"];
}
if(is_null($rWallet))
{
echo "<p style='margin-top:0%;font-size:35;font-family:serif;color:red;text-align:center'><br><br>Rider's mobile number is invalid!</p>";	
$f=0;
}
if($f==1)
{ 	
$rWallet=$rWallet+$amount;
$query="update rider set rWallet=$rWallet where mobileNumber=$mobileNumber";
mysqli_query($con,$query);
echo "<p style='margin-top:0%;font-size:35;font-family:serif;color:red;text-align:center'><br><br>Recharged Rs ".$amount." to ".$mobileNumber."!</p>";
}
}
}
else
{
echo "<p style='margin-top:0%;font-size:35;font-family:serif;color:red;text-align:center'><br><br>Invalid Amount!</p>";		
}
echo"</div>";	
?>