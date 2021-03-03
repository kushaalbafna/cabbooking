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
		  <a href='http://localhost/cab/driverHistory.php'>Ride history</a>
		  <a href='http://localhost/cab/driverBalance.php'>Current Balance</a>
		  <a href='http://localhost/cab/driver.html'>Logout</a>
        </div>
    </div>
	
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
margin-top:4%;
font-size:15;
font-family:serif;
border-radius:10px;
height:8%;
width:15%;
}
</style>
</body>";
echo"<p style='margin-left:20%;font-size:30;font-family:serif;color:yellow'>Welcome ".$_SESSION["dName"].". You are logged in with mobile number ".$_SESSION["dUserID"]."</p>";
echo "<form method='post'>
<select name='currentLocation'><option value='r s puram'>R S PURAM</option><option value='town hall'>TOWN HALL</option><option value='gandhipuram'>GANDHIPURAM</option><option value='race course'>RACE COURSE</option><option value='kuniyamuthur'>KUNIYAMUTHUR</option></select>
<input type='submit' name='submit' value='CHANGE LOCATION'>
</form>";
echo"<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color:white}
th {
  background-color:red;
  color: white;
}
</style>
</head>";
?>
<?php
$con=mysqli_connect("localhost","root","","vcabs");
if($con)
{
$f=0;
$bool=0;
$currentLocation=$_SESSION["locality"];
$sql="select * from cabbooking where status='REJECT'";
$result=mysqli_query($con,$sql);
echo "<form method='post' action='rideAcceptedUpdate.php'>";
if(mysqli_num_rows($result)>0)
{
echo "<table border=1 cellpadding=1 cellspacing=1><tr><th>ID</th><th>RIDER NAME</th><th>RIDER MOBILE NUMBER</th><th>FROM</th><th>TO</th><th>STATUS</th></tr>";
while($rs=mysqli_fetch_assoc($result))
{
$lfrom=$rs["lfrom"];
if(isset($_POST["submit"]))
{
$currentLocation=$_POST["currentLocation"];
}
if(preg_match("/^[-a-zA-Z0-9,\s]*($currentLocation){1}[-a-zA-Z0-9,\s]*$/i",$lfrom))
{
$f=1;
$id=$rs["id"];
$riderName=$rs["riderName"];
$riderMobileNumber=$rs["riderMobileNumber"];
$lfrom=$rs["lfrom"];
$lto=$rs["lto"];
echo "<tr><td><input type='text' name='id[]' value={$id} required></td><td>{$riderName}</td><td>{$riderMobileNumber}</td><td>{$lfrom}</td><td>{$lto}</td><td><select name='status[]'><option value='reject'>REJECT</option><option value='accept'>ACCEPT</option></select></td></tr>";
$bool=$id[0];
break;
}
}
echo"<tr><td colspan=6>";
if($bool){
echo"<input type='submit' value='OK'>";
}
echo"</td></tr></table></form>";
}
if($f==0){
echo "<p style='margin-top:0%;font-size:30;font-family:serif;color:red;text-align:center'><br>NO RIDES FOUND!</p>";
}
}
echo"</div>";
?>