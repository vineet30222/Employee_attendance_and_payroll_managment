<?php

session_start();
if(!isset($_SESSION['adminid']))
{
	header('location:admin.php');
}


$email=$_GET['email'];
include('dbcon.php');
$squery="SELECT * FROM `employee` WHERE `email`='$email';";
$srun=mysqli_query($con,$squery);
$sdata=mysqli_fetch_assoc($srun);
$lastsalary=$sdata['payment'];
$name=$sdata['firstname']." ".$sdata['lastname'];
date_default_timezone_set('Asia/Kolkata');
$paymentdate=date("Y-m-d");
$time=date("h:i:s");
$amorpm=date("A");

$query="UPDATE `employee` SET `days`='0',`payment`='0',`lastsalary`='$lastsalary' WHERE `email`='$email' ;";
$run=mysqli_query($con,$query);

$sql="INSERT INTO `salarysummary` (`name`, `email`, `salary`, `salarydate`, `salarytime`, `amorpm`) 
VALUES ('$name', '$email', '$lastsalary', '$paymentdate', '$time', '$amorpm')";
$srun=mysqli_query($con,$sql);


header('location:payemployee.php');
?>