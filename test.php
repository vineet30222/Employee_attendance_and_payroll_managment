<?php
date_default_timezone_set('Asia/Kolkata');
$date=date("h:i:s"); 
$amorpm=date("A");
echo $amorpm."<br>";
echo $date;
echo "<br>".date("Y-m-d")."<br>";

$email="testgamilforme@gmail.com";
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

echo $lastsalary."<br>";
echo $name."<br>";
echo $paymentdate."<br>";
echo $time."<br>";
echo $amorpm."<br>";


$sql="INSERT INTO `salarysummary` (`name`, `email`, `salary`, `salarydate`, `salarytime`, `amorpm`) 
VALUES ('$name', '$email', '$lastsalary', '$paymentdate', '$time', '$amorpm')";
$srun=mysqli_query($con,$sql);

if($srun==true)
	echo "Right";
else
	echo "<br>Wrong";

?>