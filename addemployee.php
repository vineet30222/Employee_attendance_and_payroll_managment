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
	<title>Add Employee</title>
	
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
		background-color: white;
	}
		
	</style>
</head>
<body>
<div class="admintitle" align="center">
<h4>
<h1>Add Employee</h1>

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
	<form action="addemployee.php" method="post" enctype="multipart/form-data">
		<table>
		<br/>
			<tr>
 <th> First name:<br></th>
  <th>
  <input type="text" name="firstname" placeholder="Enter first name" required>
  <br></th></tr>
  <tr>
  	<th>
  Last name:<br></th>
 <th> <input type="text" name="lastname" placeholder="Enter last name" required>
  <br></th>
</tr>

<br>

<tr>
  	<th>
 Date of birth:<br></th>
 <th> <input type="date" name="dob" required>
  <br></th>
</tr>

<tr>
  	<th>
  Father's Name:<br></th>
 <th> <input type="text" name="fathername" placeholder="Enter father's name" required>
  <br></th>
</tr>


<tr>
  	<th>
  Mobile:<br></th>
 <th> <input type="text" name="mobile" placeholder="Enter mobile number" required>
  <br></th>
</tr>
 

 <tr>
  	<th>
  E-mail:<br></th>
 <th> <input type="email" name="email" placeholder="Enter email" required>
  <br></th>
</tr>

<tr>
  	<th>
  Address:<br></th>
 <th> <input type="text" name="address" placeholder="Enter employee's address" required>
  <br></th>
</tr>

<tr>
  	<th>
  Upload Photo:<br></th>
<td><input type="file" name="epimg" required>
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
 <th> <input type="date" name="doj" required>
</th>
</tr>


<tr>
  	<th>
 Posting:<br></th>
 <th> <input type="text" name="posting" placeholder="Employee's post" required>
  <br></th>
</tr>
<br>
<br>
<br>
<br>
<tr>
	<th>
		<th>
<input class="btn" type="submit" value="ADD EMPLOYEE" name="addemployee">
</th>
</th>
</tr>
</table>
</div>
</form>
</body>
</html>

<?php

include('dbcon.php');

if(isset($_POST['addemployee']))
{
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$dob=$_POST['dob'];
	$fathername=$_POST['fathername'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$imagename=$_FILES['epimg']['name'];
	$tempname=$_FILES['epimg']['tmp_name'];
	$doj=$_POST['doj'];
	$posting=$_POST['posting'];
	
	$mobileregex = "/^[6-9][0-9]{9}$/" ; 
	if(preg_match($mobileregex, $mobile) ) {
		
			function unique_id($l = 8) {
			return substr(md5(uniqid(mt_rand(), true)), 0, $l);
			}
             $oldpassword=unique_id();
			 $password=base64_encode(strrev(md5($oldpassword)));
			 $sql="INSERT INTO `employee` (`email`, `firstname`, `lastname`, `DOB`, `fathername`, `mobile`, `address`, `DOJ`, `post`, `photo`, `password`, `days`, `payment`) 
			 VALUES ('$email', '$firstname', '$lastname', '$dob', '$fathername', '$mobile', '$address', '$doj', '$posting', '$imagename', '$password', '0', '0');";
			 
			$run=mysqli_query($con,$sql);
			
			if($run==true){
				
				$query="INSERT INTO `posts` (`post`, `ratio`) VALUES ('$posting', '1');";
				mysqli_query($con,$query);
				
				move_uploaded_file($tempname,"images/$imagename");
			
				$to=$email;
				$subject='Employee Details';
				$message='Your username is '.$email.' and your password is '.$oldpassword;
				
				if(mail($to,$subject,$message))
				{
					?>
					<script>alert('Email sent.');</script>
					<?php
				}
				else
				{
					?>
					<script>alert('Email not sent.');</script>
					<?php
				}
				
			}else{
			      ?>
				  <script>alert('Employee already registered with given email.');</script>
				  <?php
			}
			 
      } else {
                ?>
				<script> 
				alert('Enter 10 digit mobile number.'); 
				</script>
				<?php
				
          }
			
}
?>


