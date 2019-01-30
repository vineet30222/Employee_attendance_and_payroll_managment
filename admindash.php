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
	<title>Admin_Dashboard</title>
	
</head>
<body>
  
<div class="admintitle" align="center">
<h4>
<a href="logout.php" style="float:right;margin-right:30px; margin-top:70px; font-size:20px; text-decoration:none; color: white;">LOGOUT</a></h4>
<h1>ATTENDANCE AND PAYROLL SYSTEM</h1>
</div>
	<style type="text/css">
	.admintitle
{
background-color: orange;
color:#fff;

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
			
			text-align: center;
			color: White;
			padding-top: 50px;
    padding-right: 30px;
    padding-bottom: 50px;
    padding-left: 80px;
   
    background-color: #48CFAD;
     border-bottom: 6px black;
    font-size: 50px;


		}
		body
		{
			background-color: white;
		}
body {
    margin: 0;
}
h2{
  text-align: center;
  height: 50px;
  padding-top: 15px;
  background-color:#A6A7A616;
  color: red;
}


	</style>




  <h2>ADMINISTRATOR DASHBOARD</h2>
  
    <table width="80%" align="center" style="padding-top: 50px;">
      <tr>
        <th>
  <img src="employee1.png" height="225px" width="225px"></th>

<th>
 <img src="facilities.png" height="225px" width="225px"></th>

 <th>
<img src="dollarpay.png" height="230px" width="230px"></th>
<th>
<img src="search1.png" height="256px" width="256px"></th>

</tr>
<tr>
<th>

      <button type="button" id="button" onclick="window.location.href='employee.php'"  >Employee </button>
</th>

<th>
   <button type="button" id="button" onclick="window.location.href='adminattendance.php'"  >Attendance </button></th>
<th>
  <button type="button" id="button" onclick="window.location.href='payemployee.php'"  >Payroll </button></th>


<th>
  <button type="button" id="button" onclick="window.location.href='searchemployee.php'"  >Search</button></th>

 </tr>

  
</table>
</body>
</html>