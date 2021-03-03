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
		  <a href='http://localhost/cab/vhome.html'>Logout</a>
        </div>
    </div>
</body>";
$con=mysqli_connect("localhost","root","","vcabs");
if($con)
{
$mobileNumber=$_POST["mobileNumber"];
$verified=$_POST["verified"];
for($i=0;$i<count($mobileNumber);$i++)
{
$query="update driver set verified='{$verified[$i]}' where mobileNumber={$mobileNumber[$i]}";
mysqli_query($con,$query);
}
$result=mysqli_query($con,$query);
echo "<p style='margin-top:0%;font-size:35;font-family:serif;color:red;text-align:center'><br><br>UPDATED</p>";
}
echo"</div>";
?>