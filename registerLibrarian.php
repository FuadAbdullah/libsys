<?php

//Transferring variable from the form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$phone_num = $_POST['phone_num'];
$email_address = $_POST['email'];
$pass = $_POST['input1'];
$cpassword = $_POST['confirmPass'];

//Address
$street = $_POST['street'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$state = $_POST['state'];

//Default lbin Value
$adminID = '1';

/*
if ($pass!= $cpassword){
	echo '<script>alert("Password and Confirm Password not match!")</script>';
	echo '<script>window.location.href="registerlbient.html"</script>';
}
*/

include("conn1.php");

$sql = "INSERT INTO `librarian_t`(`lb_first_name`, `lb_last_name`, lb_dob, `lb_gender`, `lb_phone_number`, `lb_email`, `lb_password`, `lb_street`, `lb_city`, `lb_postcode`, `lb_state`, `adm_id`) VALUES ('".$first_name."', '".$last_name."','".$dob."','".$gender."','".$phone_num."','".$email_address."','".$pass."','".$street."', '".$city."', '".$postcode."', '".$state."','".$adminID."')";

if ($pass!= $cpassword){
	echo '<script>alert("Password and Confirm Password not match")</script>';
} else {

	mysqli_query($conn1, $sql);

	if (mysqli_affected_rows($conn1)>0) {

		echo "<script>alert('Adding Succesfull!');</script>";
		echo '<script>window.location.href= "viewData.php";</script>';
	}else
		echo "<script>alert('Adding Failed!!!');</script>";
		echo '<script>window.history.back();</script>';
	}



mysqli_close($conn1);



?>