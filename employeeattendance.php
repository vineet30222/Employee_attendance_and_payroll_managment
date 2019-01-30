<?php
session_start();
$email=$_SESSION['employeeid'];


include('dbcon.php');
$query="SELECT * FROM `employee` WHERE `employee`.`lastattendance`<`employee`.`newattendance` and `email`='$email';";
$run=mysqli_query($con,$query);
$rows=mysqli_num_rows($run);
if($rows<1){
	header('location:employeedash.php');
}else{
$data=mysqli_fetch_assoc($run);
$days=$data['days']+1;
$posting=$data['post'];

$postqry="SELECT * FROM `posts` WHERE `post`='$posting';";
$postrun=mysqli_query($con,$postqry);
$postdata=mysqli_fetch_assoc($postrun);
$ratio=$postdata['ratio'];


$payment=$days*$ratio;


if($run==true){
	
	date_default_timezone_set('Asia/Kolkata');
	$lastattendance=date("Y-m-d");
	$newattendance=new DateTime( $lastattendance );
	$newattendance = $newattendance->modify( '+1 day' ); 
	$newattendance=$newattendance->format("Y-m-d");
	$time=date("h:i:s");
	$amorpm=date("A");
	
	
	$query="UPDATE `employee` SET  `days`='$days', `payment`='$payment', `lastattendance` = '$lastattendance', `attendancetime`= '$time', `amorpm`='$amorpm', `newattendance` = '$newattendance' WHERE `employee`.`email` = '$email';";
	$run=mysqli_query($con,$query);
	
	
	header('location:employeedash.php');
	
}else{
	header('location:employeedash.php');
}
}
?>