<?php $connect=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connect,"crawler");
if(!$connect)
{
	echo mysqli_error();
}
if(!$db)
{
	echo mysqli_error();
}
?>