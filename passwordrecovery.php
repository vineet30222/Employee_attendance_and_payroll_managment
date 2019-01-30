<?php

$username=$_POST['username'];
$mobile=$_POST['mobile'];
$lastsalary=$_POST['lastsalary'];

echo $username;
echo $mobile;
echo $lastsalary;

include('dbcon.php');
$squery="SELECT * FROM `employee` WHERE `email`='$username' and`mobile`='$mobile' and`lastsalary`='$lastsalary' ;";
$srun=mysqli_query($con,$squery);
$srow=mysqli_fetch_row($srun);
if($srow<1){
	?>
	<script>
	alert('Incorrect credentials.'); 
	window.open('forgotpassword.php','_self');
	</script>
	<?php
}else{
	function unique_id($l = 8) {
			return substr(md5(uniqid(mt_rand(), true)), 0, $l);
			}
             $oldpassword=unique_id();
			 $email=$username;
			 $subject='Recovered Password';
			 $message='Hello  '.$email.',your new password is '.$oldpassword;
			
				if(mail($email,$subject,$message))
				{
					$password=base64_encode(strrev(md5($oldpassword)));
					$query="UPDATE `employee` SET `password`='$password' WHERE `email`='$email';";
					$run=mysqli_query($con,$query);
					?>
					<script>alert('New password sent on your e-mail');
					window.open('employeelogin.php','_self');
					</script>
					<?php
				}
				else
				{
					?>
					<script>
					alert('Something wrong, check your internet connection.');
					window.open('forgotpassword.php','_self');
					</script>
					<?php
				}
}

?>