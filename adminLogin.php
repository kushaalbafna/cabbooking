<?php
echo"<head>
	<title>VCab</title>
	<link rel='stylesheet' type='text/css' href='style.css'>
	
</head>
<body>

	<div class='header'>
		<a href='#' style='text-decoration: none;font-size: 35px;color: red;'>VCABS</a>
		<div class='header-one'>
		  <a href='http://localhost/cab/admin.html'>Login</a>
        </div>
    </div>
	<style>
p{
  background-image: url('http://localhost/cab/8.jpg');
}
</style>
</body>";
$userID=$_POST["userID"];
$password=$_POST["password"];
if($userID='admin' && $password=='admin@123')
{
header("location:http://localhost/cab/adminDriverVerification.php");
}
else
{
echo "<p style='margin-top:0%;font-size:25;font-family:serif;color:blue'><br><br>USER ID / PASSWORD INCORRECT<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p>";	
}
?>