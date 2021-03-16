<?php
include('conn1.php');

//Transferring variable from the form
$uid = $_POST['id'];
$adm_id = $_POST['adm_id'];
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
                
            $sql = 
                "UPDATE librarian_t SET
               lb_first_name = '" . $first_name .
                "',lb_last_name = '" . $last_name .
                "',lb_dob = '" . $dob .
                "',lb_gender = '" . $gender .
                "',lb_phone_number = '" . $phone_num .
                "',lb_email = '" . $email_address .
                "',lb_password = '" .$pass .
                "',lb_street = '" . $street .
                "',lb_city = '" . $city .
                "',lb_postcode = '" . $postcode .
                "',lb_state = '" . $state .
                 "',adm_id = '" . $adm_id .
                "' WHERE lb_id =" . $uid;

                

           
            
            if ($pass!= $cpassword){
                echo '<script>alert("Password and Confirm Password not match")</script>';

            }else {
                mysqli_query($conn1, $sql);
                if (mysqli_affected_rows($conn1)>0) {
                    
                    echo "<script>alert('UPDATE Succesfull!');</script>";

                    session_start();
                    if ($_SESSION['logrole'] == 'admin_t') {
                        echo ' <script>window.location.href="viewData.php"</script>';
                    }
        
                }else {
                     echo "<script>alert('UPDATE Failed!!!');</script>";
                        }
            }
?>