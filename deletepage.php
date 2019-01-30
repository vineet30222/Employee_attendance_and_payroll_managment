<?php

session_start();
if(!isset($_SESSION['adminid']))
{
	header('location:admin.php');
}
?>

<?php
include('dbcon.php');
	$email=$_GET['email'];	
	
	$qry="DELETE FROM `employee` WHERE `email`='$email';";
	
	$run=mysqli_query($con,$qry);
	
	$qry="SELECT * FROM `salarysummary` WHERE `email`='ashishg00485@gmail.com';";
	$run=mysqli_query($con,$qry);

	while($data=mysqli_fetch_assoc($run)){
	$id=$data['id'];
	$sql="DELETE FROM `salarysummary` WHERE `id`='$id';";
	mysqli_query($con,$sql);
	}
	
	if($run==true)
		
		{
			?>
			<script>
			alert('Employee details deleted');
			window.open('deleteemployee.php','_self');
			</script>
			<?php
		}
?>