<?php
$con=mysqli_connect("localhost","root","","vcabs");
if($con){
$query="create table distance(lfrom varchar(20),lto varchar(20),kms int)";
echo $query;
mysqli_query($con,$query);
$file=$_FILES["distance"]["tmp_name"];
$fh=fopen($file,"r");
while(!feof($fh))
{
$row=fgetcsv($fh);
$from=$row[0];
$to=$row[1];
$kms=$row[2];
$query="insert into distance(lfrom,lto,kms) values('{$from}','{$to}',{$kms})";
echo $query;
mysqli_query($con,$query);
}
}
?>