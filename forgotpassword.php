


<html>
<head>
	<title>Welcome</title>
	<style type="text/css">
		form {
    border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], 
input[type=password],input[type=number],input[type=email] {
    
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

<form action="passwordrecovery.php" align="center" width ="50%" method="post">
  <div class="imgcontainer">
    <img src="User_login_man_profile_account.png" alt="Avatar" class="avatar">
  </div>

  <div class="container" >
  <table align="center">
  <tr>
  <th>
    <label><b>Username : </b></label></th>
	<th>
    <input type="email" placeholder="Enter Username" name="username" required>
</th>
</tr>
<tr>
<th>
    <label><b>Mobile No. : </b></label></th>
	<th>
    <input type="text" placeholder="Registered Mobile Number" name="mobile" required>
</th>
</tr>
<tr>
<th>
    <label><b>Last Month's Salary : </b></label></th>
	<th>
    <input type="number" placeholder="Your Last Month's Salary" name="lastsalary" required>
</th>
</tr>
<th colspan="2">

    <button type="submit" name="recover">Recover Password</button></th>
	
  </div>
<tr>
<th colspan="2">
  <div class="container" style="none">
    <button type="button" class="cancelbtn"><a href="employeelogin.php" style="color:#fff; text-decoration:none;">Cancel</a></button>
    
  </div>
  </th>
  </tr>
</form>

</body>
</html>

