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
	
</head>
<body>
<div class="admintitle" align="center">
<h1>Employee Dashboard</h1>
<style>


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
   <a href="admindash.php" style="float:left; margin-left:30px;text-decoration:none;color:white;margin-bottom: 13px;">HOME</a>
   <a href="logout.php" style="float:right;margin-right:30px;text-decoration:none;color:white;margin-bottom: 13px;">LOGOUT</a>
  </h4>
</ul>

 <table width="80%" align="center" style="padding-top: 50px;">
      <tr>
        <th>
  <img src="adding1.png" height="256px" width="256px"></th>

<th>
 <img src="avatar1.png" height="256px" width="256px"></th>

 <th>
<img src="deletestaff1.png" height="256px" width="256px"></th>

<tr>
<th>

      <button type="button" id="button" onclick="window.location.href='addemployee.php'"  >Add Employee </button>
</th>

<th>
   <button type="button" id="button" onclick="window.location.href='updateemployee.php'"  >Update Employee </button></th>
<th>
  <button type="button" id="button" onclick="window.location.href='deleteemployee.php'"  >Delete Employee </button></th>




 </tr>

  
</table>

</body>
</html>
