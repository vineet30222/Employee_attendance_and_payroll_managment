<?php

session_start();
if(!isset($_SESSION['employeeid']))
{
	header('location:employeelogin.php');
}
?>






<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
<div class="admintitle" align="center">
<h1>Change Password</h1>
<style>
		form {
    border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
   
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
	border-radius: 25px;
    cursor: pointer;
    width: 250px;
}

/* Add a hover effect for buttons */
button:hover {
    opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
	
    width: 10%;
	max-width:250px;
	max-height:250px;
    border-radius: 50%;
}

/* Add padding to containers */
.container {
    padding: 16px;
}

/* The "Forgot password" text */
span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }
    .cancelbtn {
        width: 250px;
    }
}

img
{
  border-radius: 50%
}
.admintitle
{
background-color: #48CFAD;
color:#fff;
height:100px;
line-height:100px;
}


#button {
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
     border-radius:8px;
    font-size: 20px;
}

#button:hover {
    background-color: #ED5565; /* Green */
    color: white
  }

h1
{

		
			background-color: #48CFAD;
			text-align: center;
			color: white;
			padding: 10px;

    
    border-bottom: 6px solid red;
   
    font-size: 50px;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

body
{
	background-color: white;
}
</style>
</div>
<ul>
 <h4>
    <a href="employeedash.php"style="float:left; margin-left:30px; font-size:20p;color:white;text-decoration:none;margin-bottom: 13px;">HOME</a>
   <a href="logout.php" style="float:right;margin-right:30px;text-decoration:none;color:white;margin-bottom: 13px;">LOGOUT</a>
  </h4>
</ul>
<?php

$email=$_SESSION['employeeid'];

include('dbcon.php');
$qry="SELECT * FROM `employee` WHERE email='$email';";
	$run=mysqli_query($con,$qry);
	$data=mysqli_fetch_assoc($run)

?>


<form action="employeechangepassword.php" align="center" width ="50%" method="post" style="padding-top:50px;">
  <div class="imgcontainer">
    <img src="images/<?php echo $data['photo'] ;?>" alt="Avatar" class="avatar">
  </div>

  <div class="container" >
  <table align="center">
  <tr>
  <th>
    <label><b>Current Password : </b></label></th>
	<th>
    <input type="password" placeholder="Current Password" name="currentpassword" required>
</th>
</tr>
 <tr>
  <th>
    <label><b>New Password : </b></label></th>
	<th>
    <input type="password" placeholder="New Password" name="newpassword" required>
</th>
</tr>
<tr>
<th>
    <label><b>Confirm Password : </b></label></th>
	<th>
    <input type="password" placeholder="Confirm Password" name="confirmpassword" required>
</th>
</tr>
<th colspan="2">

    <button type="submit" name="change">Change Password</button></th>
	
  </div>

</form>

</body>
</html>

<?php

if(isset($_POST['change']))
{
	
	$currentpassword=$_POST['currentpassword'];
	$newpassword=$_POST['newpassword'];
	$confirmpassword=$_POST['confirmpassword'];
	$email=$_SESSION['employeeid'];
	include('dbcon.php');
	
	$qry="SELECT * FROM `employee` WHERE email='$email';";
	$run=mysqli_query($con,$qry);
	$data=mysqli_fetch_assoc($run);
	$dbpassword=$data['password'];
	
	$currentpassword=base64_encode(strrev(md5($currentpassword)));

	if($currentpassword==$dbpassword) {
		if($newpassword==$confirmpassword){
			
			$newpassword=base64_encode(strrev(md5($newpassword)));
			
			$sql="UPDATE `employee` SET `password` = '$newpassword' WHERE `employee`.`email` = '$email';";
			$run=mysqli_query($con,$sql);
			
			if($run){
				?>
				<script> 
				alert('Password successfully changed.'); 
				</script>
				<?php
			}else{
				?>
				<script> 
				alert('Process failed.'); 
				</script>
				<?php
			}
			
		}else
		{
			?>
				<script> 
				alert('New password and confirm password not matches.'); 
				</script>
				<?php
				
		}
		
	} else {
                ?>
				<script> 
				alert('Incorrect current password.'); 
				</script>
				<?php
				
          }
	
}
?>


