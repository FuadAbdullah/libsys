<?php
session_start();
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

//Default Admin Value
$adminID = '1';

include("conn1.php");

$sql = "INSERT INTO `client_t`(`cl_first_name`, `cl_last_name`, cl_dob, `cl_gender`, `cl_phone_number`, `cl_email`, `cl_password`, `cl_street`, `cl_city`, `cl_postcode`, `cl_state`, `adm_id`) VALUES ('".$first_name."', '".$last_name."','".$dob."','".$gender."','".$phone_num."','".$email_address."','".$pass."','".$street."', '".$city."', '".$postcode."', '".$state."', '".$adminID."')";

if ($pass!= $cpassword){
	echo '<script>alert("Password and Confirm Password not match")</script>';
} else {

	mysqli_query($conn1, $sql);

	if (mysqli_affected_rows($conn1)>0) {

		echo "<script>alert('Adding Succesfull!');</script>";
		if(isset($_SESSION['login'])) {
			echo '<script>window.location.href= "viewData.php";</script>';
		} else{
			echo '<script>window.location.href= "login.html";</script>';
		}
	}else
		echo "<script>alert('Adding Failed!!!');</script>";
	}



mysqli_close($conn1);



?>