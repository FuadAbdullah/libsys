<!DOCTYPE html>
<html>
<head>
  <title>LibSys - Edit Admin</title>

   <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style type="text/css">
    .col-lg-6{
        padding-top: 25px;
        max-width: 100%;
    }
    
    .btnReturn
    {
        border: none;
        outline: none;
        width: 270px;
        height: 40px;
        background: #3498DB;
        color: #fff;
        font-size: 18px;
        border-radius: 50px;
        margin-top: 15px;
        margin-left: 15px;
        margin-bottom: 50px;
    }

    button:hover
    {
        cursor: pointer;
        background: #2BA8E5;
        color: white;
    }

  </style>

  <?php
    include('conn1.php');

    session_start();
    if(isset($_GET['admin_id'])){
      $sql = 'SELECT * FROM admin_t WHERE adm_id='. $_GET['adm_id'];
    } else {
      $sql = 'SELECT * FROM admin_t WHERE adm_id="'.$_SESSION['id'].'"';
    }

    $result = mysqli_query($conn1, $sql);
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn1);
?>

</head>
<body>
    <div>
     
      <div class="loginbox">
      <section id="contact" class="contact">
          <div class="container">
              
      <div class="col-lg-6">
          <form method="POST" role="form" class="php-email-form" action="updateAdmin.php">
              <h1>Edit Admin Account</h1>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p>ID</p>
                  <input type = "text" class="form-control" name = "id" required ="true" id="id" maxlength="40" placeholder="ID" value = '<?php echo $row["adm_id"]?>' readonly/>                  
                  <div class="validate"></div>
                </div>
              </div>

              <div class="row"> 
                <div class="col-md-6 form-group">
                  <p>First Name</p>
                  <input type = "text" class="form-control" name = "first_name" required ="true" id="name" maxlength="40" placeholder="First Name" value = '<?php echo $row["adm_first_name"]?>'/>                  
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <p>Last Name</p>
                  <input type = "text" class="form-control" name = "last_name" required ="true" id="name" maxlength="40" placeholder="Last Name"value = '<?php echo $row["adm_last_name"]?>' />                  
                  <div class="validate"></div>
                </div>
              </div>

              <div class="row"> 
                <div class="col-md-6 form-group">
                  <p>Date of Birth</p>
                  <input type = "Date" class="form-control" name = "dob" required ="true" placeholder="Date of Birth" value = '<?php echo $row["adm_dob"]?>' />                  
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group" style="padding-top: 10px; padding-right: 10px;">
                  <label>Gender :</label>
                  <p></p>
                  <input type="radio" id="male" name="gender" value="male" <?php if($row['adm_gender']=='male') echo "checked = 'checked'"?>/>
                  <label for="male">Male</label>

                  <input type="radio" id="female" name="gender" value="female" <?php if($row['adm_gender']=='female') echo "checked = 'checked'"?>/>
                  <label for="female">Female</label>
                  

                </div>
              </div>

              <div class="row"> 
                <div class="col-md-6 form-group">
                  <p>Phone Number</p>
                  <input type = "tel" class="form-control" name = "phone_num" required ="true" placeholder="Phone Number (without dashes and country code)" maxlength="12" pattern="[0-9]{10-12}" data-rule="minlen:10" data-msg="The phone number must be between 10 to 12 digits" value ="<?php echo $row['adm_phone_number']?>"/>                 
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <p>E-Mail</p>
                  <input type = "email" class="form-control" name = "email" required ="true" id="email" maxlength="40" placeholder="E-mail" data-rule="email" data-msg="Please enter a valid email" value ="<?php echo $row['adm_email']?>" />                  
                  <div class="validate"></div>
                </div>
              </div>
              
              <div class="row"> 
                <div class="col-md-6 form-group">
                  <p>Password</p>
                  <input type = "password" class="form-control" name = "input1" required ="true" placeholder="Password" maxlength="40" data-rule="minlen:6" data-msg="Please enter at least 6 chars of password" value ="<?php echo $row['adm_password']?>"/>                  
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <p>Confirm Password</p>
                  <input type = "password" class="form-control" name = "confirmPass" required ="true" placeholder="Confirm Password" maxlength="40" data-rule="minlen:6" data-msg="Please enter at least 6 chars of password" value ="<?php echo $row['adm_password']?>"/>                  
                  <div class="validate"></div>
                </div>
              </div>
              
              <div class="row">
                <h2 style="padding-left: 15px;">Address</h2>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <p>Street</p>
                  <input type = "text" class="form-control" name = "street" required ="true" placeholder="Street" maxlength="40" value ="<?php echo $row['adm_street']?>"/>                  
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <p>City</p>
                  <input type = "text" class="form-control" name = "city" required ="true" placeholder="City" maxlength="40" value ="<?php echo $row['adm_city']?>"/>                  
                  <div class="validate"></div>
                </div>
              </div>

              <div class="row"> 
                <div class="col-md-6 form-group">
                  <p>Postcode</p>
                  <input type = "text" class="form-control" name = "postcode" required ="true" placeholder="Postcode [must be exactly 5 digits]" pattern="[0-9]{5}" maxlength="5" data-rule="minlen:5" data-msg="The postcode must be exactly 5 digits" value ="<?php echo $row['adm_postcode']?>"/>                  
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <p>State</p>
                  <input type = "text" class="form-control" name = "state" required ="true" placeholder="State" maxlength="30" value ="<?php echo $row['adm_state']?>"/>                  
                  <div class="validate"></div>
                </div>
              </div>
              
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message"></div>
              </div>
              <button type="reset" value="Reset">Reset</button>
              <button type="submit" value="Register">Update</button>
            </form>
          </div>
      </div>
      </section>           
      </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>