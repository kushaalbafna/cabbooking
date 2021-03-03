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
<div style='background-image:url('http://localhost/cab/8.jpg');'>
	<div class='header'>
		<a href='#' style='text-decoration: none;font-size: 35px;color: red;'>VCABS</a>
		
    </div>
	<style>

</style>	
<style>
div.avatar{
margin-left:47%;
margin-top:5%;
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
margin-top:0%;
font-size:15;
font-family:serif;
border-radius:10px;
height:8%;
width:15%;
}
</style>
</div>
</body>";
$name=$_SESSION["rName"];
$mobileNumber=$_SESSION["rUserID"];
$from=$_POST["from"];
$_SESSION["from"]=$from;
$to=$_POST["to"];
$_SESSION["to"]=$to;
if((preg_match("/^[-a-zA-Z0-9,\s]*(race course|gandhipuram|r s puram|kuniyamuthur|town hall){1}[-a-zA-Z0-9,\s]*$/i",$from))&&(preg_match("/^[-a-zA-Z0-9,\s]*(race course|gandhipuram|r s puram|kuniyamuthur|town hall)+[-a-zA-Z0-9,\s]*$/i",$to)))
{
$con=mysqli_connect("localhost","root","","vcabs");
if($con)
{		
$query="create table cabBooking(id int auto_increment,riderName varchar(20) not null,riderMobileNumber bigint(20),lfrom varchar(20) not null,lto varchar(20) not null,primary key(id))";
mysqli_query($con,$query);
$query="insert into cabbooking(riderName,riderMobileNumber,lfrom,lto) values('{$name}',{$mobileNumber},'{$from}','{$to}')";
mysqli_query($con,$query);
header("location:http://localhost/cab/cabBooking1.php");
}
}
else
{
echo "<br><br><br><br><br><br><br><br><br><p style='margin-top:0%;font-size:60;font-family:serif;color:blue;text-align:center'>No cabs found!<br><form action='rider.html'>
<div class='login'><button type='submit'>OK</button></div></form>";
}
echo"</div>";
?>