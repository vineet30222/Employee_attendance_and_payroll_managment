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
	<title>Payment Ratio</title>
	
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
<h1>Payment Ratio Table</h1>
<style>
input[type=number] {
   
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
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


<table align="center" width="80%" border="0" style="margin-top:80px;">
<tr style="background-color:#000; color:#fff;">
<th>No</th>
<th>Post</th>
<th>Payment per day</th>
<th>Updated Value</th>
<th>Update</th>
</tr>
<?php
	include('dbcon.php');
	
	$qry="SELECT * FROM `posts` ;";
	$run=mysqli_query($con,$qry);
	
	
	if(mysqli_num_rows($run)<1)
	{
		?>
		<tr align="center"><td colspan='5'>No Records Found</td></tr>
		<?php
	}
	else
	{
		$count=0;
		while($data=mysqli_fetch_assoc($run))
		{
			$count++;
			?>
			<form action="editpaymentratio.php?post=<?php echo $data['post']; ?>" method="post">
				<tr align="center">
					<td><b><?php echo $count ; ?></td>
					<td><b><?php echo $data['post']; ?></td>
					<td><b><?php echo $data['ratio']." $ / Day"; ?></td>
					<td><input type="number" name="<?php echo $data['post']; ?>" placeholder="Updated value"/></td>
					<td><button type="submit" name="update" style="margin-top:10px; margin-bottom:10px;"> Update</button></td>
				</tr> 
				</form>
			<?php
		}
	}
	
?>
</table>
</body>
</html>

<?php
 if(isset($_POST['update']))
{
	$post=$_GET['post'];
	$ratio=$_POST["$post"];
	include('dbcon.php');
	$query="UPDATE `posts` SET `ratio`='$ratio' WHERE `post`='$post';";
	$run=mysqli_query($con,$query);
	header('location:editpaymentratio.php');
}
?>
