<!DOCTYPE html>
<html>
<head>
  <title>LibSys - Borrowing</title>

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

    div#feedback {
      margin: auto;
      width: 50%;
      padding: 10px;
    }

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

</head>
<body>
    <div>
     <?php
     session_start();
     //Connection to Database
     include("conn1.php"); //link conn.php info here

      //Account
      if(!isset($_GET['br_id'])) {
        echo "<script>
        alert('A Borrowing Record has not been selected. Please select a borrowing record first');
        window.history.back();
        </script>";
      }

      $br_id = $_GET['br_id'];
      $br_fine = $_GET['br_fine'];
      
     ?>
    <form method="POST" role="form" class="php-email-form" action="returnBorrowingCode.php">
      <div id="feedback">
        <h2>Give us your feedback on the book!</h2>
        <hr>
        <br>
        <div>
          <textarea class="form-control" name = "br_feedback" id="feedback" style="width: 550px; height: 200px;" >Write the feedback here.</textarea>
        </div>
        <br>
        <input type="hidden" value="<?php echo $br_id;?>" name="br_id" />
        <input type="hidden" value="<?php echo $br_fine;?>" name="br_fine" />
        <button type="submit" value="Return" onclick="agreeTnC()">Submit</button>
      </div>
    </form>
  </div>
  <script>
    function agreeTnC(){
      alert("By clicking this button, I testify to this book being returned and the fine has been paid, where applicable")
    }
  
  </script>
  
</body>
</html>