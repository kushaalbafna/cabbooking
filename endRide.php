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
		  <a href='http://localhost/cab/rider.html'>Logout</a>
        </div>
    </div>
	<style>

</style>
</body>";
$con=mysqli_connect("localhost","root","","vcabs");
if($con)
{
$query="update rideid set id=0 where ref=1";
mysqli_query($con,$query);	
$id=$_SESSION["rid"];
$fare=$_SESSION["fare"];
$query="update cabbooking set fare=$fare where id=$id";
mysqli_query($con,$query);
$query="select * from cabbooking where id=$id";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$driverMobileNumber=$rs["driverMobileNumber"];
$riderMobileNumber=$rs["riderMobileNumber"];
}
$query="select * from rider where mobileNumber=$riderMobileNumber";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$rWallet=$rs["rWallet"];
$dr=$rWallet-$fare;
}

$query="update rider set rWallet=$dr where mobileNumber=$riderMobileNumber";
mysqli_query($con,$query);

$query="select * from driver where mobileNumber=$driverMobileNumber";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$dWallet=$rs["dWallet"];
$cr=$dWallet+$fare;
}
$query="update driver set dWallet=$cr where mobileNumber=$driverMobileNumber";
mysqli_query($con,$query);
echo "<p style='margin-top:0%;font-size:35;font-family:serif;color:red;text-align:center'><br><br>THANK YOU FOR TRAVELLING IN VCABS!</p>";

}
echo"</div>";
?>