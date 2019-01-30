<?php

session_start();
if(!isset($_SESSION['adminid']))
{
	header('location:admin.php');
}


$post=$_GET['post'];
include('dbcon.php');

$squery="SELECT *FROM `posts` WHERE `post`='$post';";
$srun=mysqli_query($con,$squery);
$sdata=mysqli_fetch_assoc($srun);
$ratio=$sdata['ratio']+1;

$query="UPDATE `posts` SET `ratio`='$ratio' WHERE `post`='$post';";
$run=mysqli_query($con,$query);
if($run==true)
{
	echo "Right";
}else{
	echo "Wrong";
}

?>