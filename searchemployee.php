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
	<title>Search An Employee</title>
	
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
<h1>Search Employee</h1>
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
<form action="searchemployee.php" method="post" enctype="multipart/form-data">
<tr>
<th>Enter Employee Name : </th>
<td><input type="text" name="firstname" placeholder="Enter first name" required="required"/><td>
<th>Enter Employee Post : </th>
<td><input type="text" name="post" placeholder="Enter post" required="required"/><td>
<td colspan="2"><input type="submit" name="update" value="Search"/><td>
</tr>
</form>
</table>


<table align="center" width="100%" border="1" style="margin-top:10px;">
<tr style="background-color:#000; color:#fff;">
<th>No</th>
<th>Employee Name</th>
<th>DOB</th>
<th>Father's Name</th>
<th>Mobile No</th>
<th>E-mail</th>
<th>Address</th>
<th>DOJ</th>
<th>Post</th>
<th>Profile</th>
</tr>
<?php
 if(isset($_POST['update']))
{
	include('dbcon.php');
	$firstname=$_POST['firstname'];
	$post=$_POST['post'];
	
	$qry="SELECT * FROM `employee` WHERE `post` LIKE '%$post%' AND `firstname` LIKE '%$firstname%';";
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
					<td><?php echo $data['DOB']; ?></td>
					<td><?php echo $data['fathername']; ?></td>
					<td><?php echo $data['mobile']; ?></td>
					<td><?php echo $data['email']; ?></td>
					<td><?php echo $data['address']; ?></td>
					<td><?php echo $data['DOJ']; ?></td>
					<td><?php echo $data['post']; ?></td>
					<td><img src="images/<?php echo $data['photo']; ?>" style="max-width:100px;max-height:100px;"></td>
				</tr> 
			<?php
		}
	}
	
}
?>
</table>




</body>
</html>


