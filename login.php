<?php 

$logrole = $_POST['logrole'];
$logEmail = $_POST['logEmail'];
$logpass = $_POST['logpass'];

session_start();

	include("conn1.php");

	if (mysqli_connect_error()){
		die('Connection ERROR');
	}



if (isset($_POST['logEmail'])) {
	
if ($logrole =='client_t') {
	$sql = 'SELECT * FROM '.$logrole.' WHERE cl_email = "'.$logEmail.'" AND cl_password = "'.$logpass.'"';
	$logid = "cl_id";
	$logEmail = "cl_email";
	$loguname = "cl_first_name";
	$loginfo = mysqli_query($conn1, $sql);
}
elseif ($logrole == 'librarian_t') {
	$sql = 'SELECT * FROM '.$logrole.' WHERE lb_email = "'.$logEmail.'" AND lb_password = "'.$logpass.'"';
	$logid = "lb_id";
	$logEmail = "lb_email";
	$loguname = "lb_first_name";
	$loginfo = mysqli_query($conn1, $sql);
}

elseif ($logrole == 'admin_t') {
	$sql = 'SELECT * FROM '.$logrole.' WHERE adm_email = "'.$logEmail.'" AND adm_password = "'.$logpass.'"';
	$logid = "adm_id";
	$logEmail = "adm_email";
	$loguname = "adm_first_name";
	$loginfo = mysqli_query($conn1, $sql);
}
}

echo "<script>alert($sql)</script>";

	if (mysqli_num_rows($loginfo)==1){
		$row = mysqli_fetch_assoc($loginfo);
		$_SESSION['email'] = $row[$logEmail];
		$_SESSION['logrole'] = $logrole;
		$_SESSION['id'] = $row[$logid];
		$_SESSION['login'] = $row[$loguname];
		echo '<script>window.location.href="index.php"</script>';
	}
	else{
		echo "<script>alert('Incorrect username or password entered. Please try again.')</script>";
		//echo '<script>window.location.href="login.html"</script>';
	}

	

	

 ?>