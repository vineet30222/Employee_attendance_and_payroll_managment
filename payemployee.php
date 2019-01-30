<?php

session_start();
if(!isset($_SESSION['adminid']))
{
	header('location:admin.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pay An Employee</title>
	
	<style type="text/css">

	* {
    box-sizing: border-box;
}

.header {
    background-color: orange;
    padding: 20px;
    color: white;

    text-align: center;
}

.Job h1
{
	padding-top: 25px;
	color: white;
	background-color: orange;
	padding: 10px;
}

	body
	{
		background-color: white;
	}
		
	</style>
</head>
<body>
<div class="admintitle" align="center">
<h1>Pay An Employee</h1>
<style>
.admintitle
{
background-color: orange;
color:#fff;
height:100px;
line-height:100px;
}

h1
{

		
			background-color: #48CFAD;
			text-align: center;
			color: white;
			padding: 10px;

    
    border-bottom: 6px solid black;
    
    font-size: 50px;
}

.btn{
	background-color: #ffff99;
	border-radius: 10px;
	height:30px;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}
button {
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
     border-radius:8px;
    font-size: 20px;
}

button:hover {
    background-color: #ED5565; /* Green */
    color: white
  }
</style>
</div>
<div>
<ul>
<h4>
<a href="admindash.php"style="float:left; margin-left:30px; font-size:20p;color:white;text-decoration:none;margin-bottom: 13px;">HOME</a>
<a href="logout.php" style="float:right;margin-right:30px;font-size:20px;color:white;text-decoration:none;margin-bottom: 13px;">LOGOUT</a></h4>
</ul>
</div>
<table style="margin-top:20px;">
<form>
<tr>
<td><button type="button" onclick="window.location.href='editpaymentratio.php'"> Edit Payment Ratio </button></td>
</tr>
<tr>
<td><button type="button" style="margin-top:10px;" onclick="window.location.href='salarysummary.php'"> Salary Summary </button></td>
</tr>
</form>
</table>


<table align="center" width="100%" border="0" style="margin-top:10px; border:0px solid #48CFAD;">
<tr style="background-color:#000; color:#fff;">
<th>No</th>
<th>Employee Name</th>
<th>Username</th>
<th>Post</th>
<th>Total Attendance</th>
<th>Current Payment</th>
<th>Last Payment</th>
<th>Profile</th>
<th>Payment</th>
</tr>
<?php

	include('dbcon.php');
	
	$qry="SELECT * FROM `employee`;";
	$run=mysqli_query($con,$qry);
	
	
	if(mysqli_num_rows($run)<1)
	{
		?>
		<tr align="center"><td colspan='9'>No Records Found</td></tr>
		<?php
	}
	else
	{
		$count=0;
		while($data=mysqli_fetch_assoc($run))
		{
			$count++;
			?>
				<tr align="center">
					<td><?php echo $count ; ?></td>
					<td><?php echo $data['firstname'].' '.$data['lastname']; ?></td>
					<td><?php echo $data['email']; ?></td>
					<td><?php echo $data['post']; ?></td>
					<td><?php echo $data['days']." Days"; ?></td>
					<td><?php echo $data['payment']." $"; ?></td>
					<td><?php echo $data['lastsalary']." $"; ?></td>
					<td><img src="images/<?php echo $data['photo']; ?>" style="max-width:100px;max-height:100px;"></td>
					<td><button type="button" id="<?php  echo $data['email']; ?>" style="margin-top:30px;" onclick="window.location.href='payemployeepage.php?email=<?php echo $data['email']; ?>'">
					<?php
					if($data['days']==0){
						?>
						<script>
						document.getElementById("<?php echo $data['email']; ?>").disabled = true;
						</script>
						<?php
						echo "Payment Done";
					}else{
						echo "Make Payment";
					}
					?>
					</button></td>
				</tr> 
			<?php
		}
	}
	

?>
</table>




</body>
</html>


