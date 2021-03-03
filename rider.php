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
		  <a href='rider.html'>Login</a>
        </div>
    </div>
	<style>

</style>
</body>";
$name=$_POST["name"];
$mobileNumber=$_POST["mobileNumber"];
$password=$_POST["password"];
$con=mysqli_connect("localhost","root","","vcabs");
if($con)
{
$query="create table rider(id int auto_increment,name varchar(20) not null,mobileNumber bigint(20),password varchar(20) not null,primary key(id))";
mysqli_query($con,$query);
$query="insert into rider(name,mobileNumber,password) values('{$name}',{$mobileNumber},'{$password}')";
if(mysqli_query($con,$query))
{
echo "<p style='margin-top:0%;font-size:40;font-family:serif;color:red;text-align:center'><br><br>SignedUp Successfully!</p>";
}
else
{
echo "<p style='margin-top:0%;font-size:40;font-family:serif;color:red;text-align:center'><br><br>Already SignedUp,<br>Try to Login!</p>";
}
}
echo"</div>";
?>