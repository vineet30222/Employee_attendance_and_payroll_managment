<?php

include('dbcon.php');
$qry="SELECT * FROM `salarysummary` WHERE `email`='ashishg00485@gmail.com';";
$run=mysqli_query($con,$qry);

while($data=mysqli_fetch_assoc($run)){
	
	$id=$data['id'];
	$sql="DELETE FROM `salarysummary` WHERE `id`='$id';";
	
	
	if(mysqli_query($con,$sql)==true)
	echo "RIGHT<br>";
	else
	echo "WRONG<br>";

}



?>