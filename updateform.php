<?php

session_start();
if(!isset($_SESSION['adminid']))
{
	header('location:admin.php');
}
?>

<?php
include('dbcon.php');

$oldemail=$_GET['email'];

$sql="SELECT * FROM `employee` WHERE `email`='$oldemail';";
$run=mysqli_query($con,$sql);

$data=mysqli_fetch_assoc($run);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Employee Details</title>
	
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
	background-color: #48CFAD;
	padding: 10px;
}

	body
	{
		background-color: lightgrey;
	}
		
	</style>
</head>
<body>
<div class="admintitle" align="center">
<h1>Update Employee Details</h1>
<style>
.admintitle
{
background-color: #48CFAD;
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

<div align="center">
	<form action="updatedata.php?oldemail=<?php echo $oldemail; ?>" method="post" enctype="multipart/form-data">
		<table>
		<br/>
			<tr>
				<th>
  First name:<br></th>
  <th>
  <input type="text" name="firstname" placeholder="Enter first name" value="<?php echo $data['firstname']; ?>" required>
  <br></th></tr>
  <tr>
  	<th>
  Last name:<br></th>
 <th> <input type="text" name="lastname" placeholder="Enter last name" value="<?php echo $data['lastname']; ?>" required>
  <br></th>
</tr>

<br>

<tr>
  	<th>
 Date of birth:<br></th>
 <th> <input type="date" name="dob" value="<?php echo $data['DOB']; ?>" required>
  <br></th>
</tr>

<tr>
  	<th>
  Father's Name:<br></th>
 <th> <input type="text" name="fathername" placeholder="Enter father's name" value="<?php echo $data['fathername']; ?>" required>
  <br></th>
</tr>


<tr>
  	<th>
  Mobile:<br></th>
 <th> <input type="text" name="mobile" placeholder="Enter mobile number" value="<?php echo $data['mobile']; ?>" required>
  <br></th>
</tr>
 

 <tr>
  	<th>
  E-mail:<br></th>
 <th> <input type="email" name="email" placeholder="Enter email" value="<?php echo $data['email']; ?>" required>
  <br></th>
</tr>

<tr>
  	<th>
  Address:<br></th>
 <th> <input type="text" name="address" placeholder="Enter employee's address" value="<?php echo $data['address']; ?>" required>
  <br></th>
</tr>

<tr>
  	<th>
  Upload Photo:<br></th>
<td><input type="file" name="epimg" value="abc" required>
  <br></td>
</tr>
</table>
</div>

<div class="Job" align="center">
<table>
<h1> Job Details</h1>
<tr>
<th>
 Date of join:<br>
 </th>
 <th> <input type="date" name="doj" value="<?php echo $data['DOJ']; ?>" required>
</th>
</tr>


<tr>
  	<th>
 Posting:<br></th>
 <th> <input type="text" name="posting" placeholder="Employee's post" value="<?php echo $data['post']; ?>" required>
  <br></th>
</tr>
<br>
<br>
<br>
<br>
<tr>
	<th>
		<th>
<input class="btn" type="submit" value="UPDATE" name="addemployee">
</th>
</th>
</tr>
</table>
</div>
</form>
</body>
</html>



