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
margin-left:43%;
margin-top:4%;
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
				<div class='header-one'>
		  <a href='http://localhost/cab/driverLoggedIn.php'>Other Rides</a>
        </div>
    </div>
	<style>

</style>
</body>";
$con=mysqli_connect("localhost","root","","vcabs");
if($con)
{
$id=$_POST["id"];
$status=$_POST["status"];

for($i=0;$i<count($id);$i++)
{
$query="update cabbooking set status='{$status[$i]}' where id={$id[$i]}";
mysqli_query($con,$query);
}
$query="select * from cabbooking where id={$id[0]}";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$riderName=$rs["riderName"];
$riderMobileNumber=$rs["riderMobileNumber"];
$status=$rs["status"];
}
if($status=='accept')
{
echo"<p style='margin-left:31%;font-size:30;font-family:serif;color:red'>RIDER NAME : ".$riderName."</p>";	
echo"<p style='margin-left:31%;font-size:30;font-family:serif;color:red'>RIDER MOBILE NUMBER : ".$riderMobileNumber."</p>";


echo"<form method='post' action='updateID.php'>
<p style='margin-left:45%;font-size:40;font-family:serif;color:blue'>RIDE ID</p>

<div class='username'>
     <input type='text' value='$id[0]' name='rid' style='width:30%;height:10%;margin-left:35%;border-radius:4px' required>
  </div>
 <div class='login'>
	 <button type='submit' name='startRide'>START RIDE</button>
  </div> </form>";
$number=$_SESSION["dUserID"];
$query="select * from driver where mobileNumber=$number";
$result=mysqli_query($con,$query);
if($result==True)
{
$rs=mysqli_fetch_assoc($result);
$driverName=$rs["name"];
$driverMobileNumber=$rs["mobileNumber"];
$cabNumber=$rs["cabNumber"];
}
$query="update cabbooking set cabNumber='{$cabNumber}',driverName='{$driverName}',driverMobileNumber={$driverMobileNumber} where id={$id[0]}";
mysqli_query($con,$query);
}
else
{
echo "<p style='margin-top:0%;font-size:35;font-family:serif;color:red;text-align:center'><br><br>REJECTED<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p>";	
}
}
echo"</div>";
?>
