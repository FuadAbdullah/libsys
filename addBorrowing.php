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

    body{
        background: url('assets/img/slide/slide-2.jpg');
        background-size: cover;
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
      if(!isset($_GET['bk_id']) || !isset($_GET['bk_name']) || !isset($_GET['bk_priority'])) {
        echo "<script>
        alert('A Book has not been selected. Please select a book first');
        window.location.href = 'catalogue.php';
        </script>";
      }

      $bk_id = $_GET['bk_id'];
      $bk_name = $_GET['bk_name']; 
      
     ?>
      <div class="loginbox">
      <section id="contact" class="contact">
          <div class="container">
              
      <div class="col-lg-6">
        <button type="submit" onclick="window.history.back()" class="btnReturn">< Return to Book Page</button>
          <form method="POST" role="form" class="php-email-form" action="addBorrowingCode.php">
              <h1>Borrowing</h1>

              <div class="row">
                <div class="col-md-6 form-group">
                  <p>Book ID</p>
                  <input type = "text" class="form-control" name = "book_id" required ="true" id="name" maxlength="40" value="<?php echo $bk_id;?>" readonly/>                  
                  <div class="validate"></div>
                </div>
                
                <div class="col-md-6 form-group">
                  <p>Book Name</p>
                  <input type = "text" class="form-control" name = "bk_name" required ="true" id="name" value="<?php echo $bk_name;?>" readonly />                  
                  <div class="validate"></div>
                </div>
              </div>

             

              <div class="row"> 
                <div class="col-md-6 form-group">
                  <p>Date</p>
                  <input type = "Date" class="form-control" name = "br_date" required ="true" id="date" maxlength="40" placeholder="Date" readonly/>                  
                  <div class="validate"></div>

                  <?php
                  //Priority - Duration in Days
                  if ($_GET['bk_priority'] == 1){
                    $period = 14;
                  } elseif ($_GET['bk_priority'] == 2){
                    $period = 10;
                  } elseif ($_GET['bk_priority'] == 3){
                    $period = 7;
                  } elseif ($_GET['bk_priority'] == 4){
                    $period = 5;
                  } elseif ($_GET['bk_priority'] == 5){
                    $period = 3;
                  }

                  $datetime = new DateTime(date('Y-m-d')); //today's date
                  date_add($datetime, date_interval_create_from_date_string($period .' days'));
                  ?>                  

                </div>
                <div class="col-md-6 form-group">
                  <p>Due Date (Book Priority: <?php echo $_GET['bk_priority']; ?>)</p>
                  <input type = "Date" class="form-control" name = "br_due_date" required ="true" id="dueDate" maxlength="40" placeholder="Due Date" value="<?php echo date_format($datetime, 'Y-m-d');?>" readonly/>                  
                  <div class="validate"></div>
                </div>

                <!--Javascript to get the value of the current date and send it to textbox. PRAISE THE OMNISSIAH  AMACHINE-->
                   <script>
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();

                    today = yyyy + '-' + mm + '-' + dd;

                    document.getElementById("date").value = today;
                    document.getElementById("dueDate").min = today;

                  </script>                  
              </div>
        
              <div class="row">
                <h2 style="padding-left: 15px;">Client ID</h2>
                <div class="col-md-6 form-group">
                <input type = "text" class="form-control" name = "cl_id" required ="true" id="cl_id" maxlength="40" placeholder="Client ID" value=1 readonly/>

                  <div class="validate"></div>
                </div>
              </div>  
              
              <div class="row">
                <?php
                					$sql = 'SELECT * FROM client_t ORDER BY cl_first_name';
                          $results = mysqli_query($conn1, $sql);
                
                          if(mysqli_num_rows($results)>0){
                            echo '
                            <div class="tableData" style="margin-left: 20px; margin-right: 20px;">
                              <div class="section-title" data-aos="fade-up">
                              </div>';
                            echo '<div class="tabular">
                              <table border="1|0">
                                <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>DOB</th>
                                  <th>Gender</th>
                                  <th>Phone Number</th>
                                  <th>Email</th>
                                  <th>Select</th>
                                </tr>';
                
                          for($i=0; $i<mysqli_num_rows($results); $i++){
                            $row = mysqli_fetch_assoc($results);
                            echo '<tr>';
                            echo '<td>'.$row['cl_id'].'</td>';
                            echo '<td>'.$row['cl_first_name']." "
                                   .$row['cl_last_name']. '</td>';
                            echo '<td>'.$row['cl_dob'].'</td>';
                            echo '<td>'.$row['cl_gender'].'</td>';
                            echo '<td>'.$row['cl_phone_number'].'</td>';
                            echo '<td>'.$row['cl_email'].'</td>';
                            echo '<td><button type="button" id='.$row['cl_id'].' onclick="selectClient(this.id)">Select</button></td>';
                            echo '</tr>';
                          }
                          echo '</table>
                            </div>';
                        }
                ?>
              </div>
              
            <div class="row" style="margin: 25px;">
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message"></div>
              </div>
              <button type="reset" value="Reset">Reset</button>
              <button type="submit" value="Register" style="margin-left:10px;">Submit</button>

            </form>
          </div>
          </div>
      </div>
      </section>           
      </div>
  </div>

  <script>
    function selectClient(clicked_id){
      document.getElementById("cl_id").value = clicked_id;
    }
  </script>

</body>
</html>