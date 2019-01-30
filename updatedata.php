<?php

session_start();
if(!isset($_SESSION['adminid']))
{
	header('location:admin.php');
}
?>

<?php
include('dbcon.php');
	
	$oldemail=$_GET['oldemail'];
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$dob=$_POST['dob'];
	$fathername=$_POST['fathername'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$doj=$_POST['doj'];
	$posting=$_POST['posting'];
	$imagename=$_FILES['epimg']['name'];
	$tempname=$_FILES['epimg']['tmp_name'];
	
	$mobileregex = "/^[6-9][0-9]{9}$/" ; 
	if(preg_match($mobileregex, $mobile) ) {
		
			function unique_id($l = 8) {
			return substr(md5(uniqid(mt_rand(), true)), 0, $l);
			}
             $oldpassword=unique_id();
			 $password=base64_encode(strrev(md5($oldpassword)));
			 $sql="UPDATE `employee` SET `email`='$email',`firstname`='$firstname',`lastname`='$lastname',`DOB`='$dob',`fathername`='$fathername',`mobile`='$mobile',`address`='$address',`DOJ`='$doj',`post`='$posting',`photo`='$imagename',`password`='$password' WHERE `email`='$oldemail';";
			 
			 
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
					<script>alert('Email sent.');
					window.open('updateform.php?email=<?php echo $email; ?>','_self');
					</script>
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
?>