<?php
include('conn1.php');

//Transferring variable from the form
$uid = $_POST['id'];
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
                "UPDATE admin_t SET
               adm_first_name = '" . $first_name .
                "',adm_last_name = '" . $last_name .
                "',adm_dob = '" . $dob .
                "',adm_gender = '" . $gender .
                "',adm_phone_number = '" . $phone_num .
                "',adm_email = '" . $email_address .
                "',adm_password = '" .$pass .
                "',adm_street = '" . $street .
                "',adm_city = '" . $city .
                "',adm_postcode = '" . $postcode .
                "',adm_state = '" . $state .
                "' WHERE adm_id =" . $uid;

                

           
            
            if ($pass!= $cpassword){
                echo '<script>alert("Password and Confirm Password not match")</script>';

            }else {
                mysqli_query($conn1, $sql);
                if (mysqli_affected_rows($conn1)>0) {
                    
                    echo "<script>alert('UPDATE Succesfull!');</script>";

                    echo ' <script>window.location.href="viewData.php"</script>';
        
                }else {
                     echo "<script>alert('UPDATE Failed!!!');</script>";
                        }
            }
?>