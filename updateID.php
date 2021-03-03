<?php

$con=mysqli_connect("localhost","root","","vcabs");
if($con)
{
$id=$_POST["rid"];	
$query="update rideid set id=$id where ref=1";
mysqli_query($con,$query);
header("location:http://localhost/cab/rideStatus.php");
}
?>