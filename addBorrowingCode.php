<?php

//Transferring variable from the form

$bk_id = $_POST['book_id'];
$bk_name = $_POST['bk_name'];
$br_date = $_POST['br_date'];
$br_due_date =$_POST['br_due_date'];
$br_return_date = '2021-2-2';
$cl_id = $_POST['cl_id'];
$br_feedback = 'PLACEHOLDER';
$br_fine = '0';



include("conn1.php");

$sql = "INSERT INTO `borrowing_t`(`cl_id`, `bk_id`, `br_date`, `br_due_date`, `br_fine`) VALUES ('".$cl_id."','".$bk_id."','".$br_date."','".$br_due_date."','".$br_fine."')";





  mysqli_query($conn1, $sql);

  if (mysqli_affected_rows($conn1)>0) {

    echo "<script>alert('Adding Succesfull!');</script>";
    echo '<script>window.location.href= "catalogue.php";</script>';
  }else
    echo "<script>alert('Adding Failed!!!');</script>";
    echo $sql;



mysqli_close($conn1);



?>