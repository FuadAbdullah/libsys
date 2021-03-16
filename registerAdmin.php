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

//Default Admin Value
//$adminID = '1';

/*
if ($pass!= $cpassword){
	echo '<script>alert("Password and Confirm Password not match!")</script>';
	echo '<script>window.location.href="registeradmient.html"</script>';
}
*/

include("conn1.php");

$sql = "INSERT INTO `admin_t`(`adm_first_name`, `adm_last_name`, adm_dob, `adm_gender`, `adm_phone_number`, `adm_email`, `adm_password`, `adm_street`, `adm_city`, `adm_postcode`, `adm_state`) VALUES ('".$first_name."', '".$last_name."','".$dob."','".$gender."','".$phone_num."','".$email_address."','".$pass."','".$street."', '".$city."', '".$postcode."', '".$state."')";


if ($pass!= $cpassword){
	echo '<script>alert("Password and Confirm Password not match")</script>';
} else {

	mysqli_query($conn1, $sql);

	if (mysqli_affected_rows($conn1)>0) {

		echo "<script>alert('Adding Succesfull!');</script>";
		echo '<script>window.location.href= "viewData.php";</script>';
	}else
		echo "<script>alert('Adding Failed!!!');</script>";
	}



mysqli_close($conn1);



?>