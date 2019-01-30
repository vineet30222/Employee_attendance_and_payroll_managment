<?php

session_start();
if(isset($_SESSION['employeeid']))
{
	header('location:employeedash.php');
}
?>




<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<style type="text/css">
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
	</style>
</head>
<body>

<form action="employeelogin.php" align="center" width ="50%" method="post">
  <div class="imgcontainer">
    <img src="People_group_users_friends_man_user_vector.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" id="username">

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" id="password">

    <button type="submit" name="login">Login</button>
    <label>
      <input type="checkbox" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn"><a href="index.php" style="color:#fff; text-decoration:none;">Cancel</a></button>
    <span class="psw">Forgot <a href="forgotpassword.php">password?</a></span>
  </div>
</form>

</body>
</html>





<?php
if(isset($_COOKIE['employeeid']) and isset($_COOKIE['employeepassword'])){
	
	$user=$_COOKIE['employeeid'];
	$pass=$_COOKIE['employeepassword'];
	echo "<script>
	document.getElementById('username').value='$user';
	document.getElementById('password').value='$pass';
	</script>";
	
}
?>
<?php
include('dbcon.php');

if(isset($_POST['login']))
{
	$username=$_POST['uname'];
	$oldpassword=$_POST['pass'];
	$password=base64_encode(strrev(md5($oldpassword)));
	$qry="SELECT * FROM `employee` WHERE email='$username' and password='$password';";
	$run=mysqli_query($con,$qry);
	$row=mysqli_num_rows($run);
	
	if($row<1){
		?>
		<script>
		alert('Incorrect username or password');
		window.open('employeelogin.php','_self');
		</script>
		<?php
	}
	else
	{
		$data=mysqli_fetch_assoc($run);
		
		$employeeid=$data['email'];
		$_SESSION['employeeid']=$employeeid;
		
		if(isset($_POST['remember'])){
			
			setcookie('employeeid',$employeeid,time() + 3*24 * 3600);
			setcookie('employeepassword',$oldpassword,time() + 3*24 * 3600);
			
		}
		
		header('location:employeedash.php');
	}
}
?>
