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
		  <a href='rider.html'>Login</a>
        </div>
    </div>

</body>";
$con=mysqli_connect("localhost","root","","vcabs");
if($con)
{
$userID=$_POST["userID"];
$_SESSION["rUserID"] = $userID;
$password=$_POST["password"];
$sql="select * from rider where mobileNumber={$userID} ";
$result=mysqli_query($con,$sql);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$originalPassword=$rs["password"];
$name=$rs["name"];
$_SESSION["rName"] = $name;
if($originalPassword==$password && $password!="")
{
header("location:http://localhost/cab/riderLoggedIn.php");
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