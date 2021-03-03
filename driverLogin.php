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

	<div class='header'>
		<a href='#' style='text-decoration: none;font-size: 35px;color: red;'>VCABS</a>
		<div class='header-one'>
		  <a href='driver.html'>Login</a>
        </div>
    </div>
</body>";
$con=mysqli_connect("localhost","root","","vcabs");
if($con)
{
$userID=$_POST["userID"];
$_SESSION["dUserID"] = $userID;
$password=$_POST["password"];
$sql="select * from driver where mobileNumber={$userID} ";
$result=mysqli_query($con,$sql);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$originalPassword=$rs["password"];
$name=$rs["name"];
$locality=$rs["locality"];
$_SESSION["dName"] = $name;
$_SESSION["locality"] = $locality;
$verified=$rs["verified"];
if($originalPassword==$password && $verified=='yes')
{
header("location:http://localhost/cab/driverLoggedIn.php");
}
else if($originalPassword==$password && $verified=='no')
{
echo "<p style='margin-top:0%;font-size:35;font-family:serif;color:red;text-align:center'><br><br>NOT VERIFIED BY ADMIN, TRY LATER!</p>";		
}
else
{
echo "<p style='margin-top:0%;font-size:35;font-family:serif;color:red;text-align:center'><br><br>USER ID / PASSWORD INCORRECT</p>";	
}
}
else
{
echo "<p style='margin-top:0%;font-size:35;font-family:serif;color:red;text-align:center'><br><br>USER ID / PASSWORD INCORRECT</p>";	
}
}
echo"</div>";
?>