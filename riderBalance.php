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
		  <a href='http://localhost/cab/riderLoggedIn.php'>Book cab</a>
        </div>
    </div>
	<style>
</style>
</body>";
$mobileNumber=$_SESSION["rUserID"];
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
echo "<p style='margin-top:0%;font-size:50;font-family:serif;color:red;text-align:center'><br><br>Your current balance is Rs ".$rWallet."</p>";
echo"</div>";
?>