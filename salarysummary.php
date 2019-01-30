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
	<title>Salary Summary</title>
	
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
<h1>Salary summary of an employee</h1>
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
.button {
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
     border-radius:8px;
    font-size: 20px;
}

.button:hover {
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
<table align="center" style="margin-top:50px;">
<form action="salarysummary.php" method="post">
<tr>
<th>Employee username : </th>
<td><input type="text" name="username" placeholder="Enter username" required="required"/><td>
<td colspan="2"><input type="submit" name="search" value="Search" class="button"/><td>
</tr>
</form>
</table>


<table align="center" width="100%" border="1" style="margin-top:10px;">
<tr style="background-color:#000; color:#fff;">
<th>No</th>
<th>Employee Name</th>
<th>Username</th>
<th>Salary</th>
<th>Payment Date</th>
<th>Payment Time</th>
</tr>
<?php
 if(isset($_POST['search']))
{
	include('dbcon.php');
	$email=$_POST['username'];
	
	$qry="SELECT * FROM `salarysummary` WHERE `email`='$email';";
	$run=mysqli_query($con,$qry);
	
	
	if(mysqli_num_rows($run)<1)
	{
		?>
		<tr align="center"><td colspan='6'>No Records Found</td></tr>
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
					<td><?php echo $data['name']; ?></td>
					<td><?php echo $data['email']; ?></td>
					<td><?php echo $data['salary']." $"; ?></td>
					<td><?php echo $data['salarydate']; ?></td>
					<td><?php echo $data['salarytime']." ".$data['amorpm']; ?></td>
				</tr> 
			<?php
		}
	}
	
}
?>
</table>




</body>
</html>


