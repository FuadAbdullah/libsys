<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Borrowing Details</title>
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

  <!-- =======================================================
  * Template Name: Eterna - v2.1.0
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Borrowing Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-title">
          <h2>Borrowing Details</h2>
        </div>

        
        <div class="row">
        <?php
            session_start();

            //Step 1 - Establish connection
            //Step 2 - Handling connection error
            include('conn1.php');
            
            //Borrowing
            $sqlBorrowing = 'SELECT *
                             FROM borrowing_t
                             WHERE cl_id = "'. $_SESSION['id'].'"';

            $borrowing = mysqli_query($conn1, $sqlBorrowing);

            for($i = 0; $i<mysqli_num_rows($borrowing); $i++) {
                $book_borrowing = mysqli_fetch_array($borrowing);

                //Book Name
                $sqlBookTitle = 'SELECT bk_title, bk_priority
                                FROM book_t
                                WHERE bk_id = ' . $book_borrowing['bk_id'];
                $getBookTitle =  mysqli_query($conn1, $sqlBookTitle);
                $book_title = mysqli_fetch_array($getBookTitle);

                if ($book_borrowing["br_returning_date"] == NULL) {
                //Date Difference
                $datetime1 = date_create($book_borrowing['br_date']);
                $datetime2 = date_create(date('Y-m-d'));
                $datetime3 = date_create($book_borrowing['br_due_date']);

                $interval = date_diff($datetime1, $datetime2);
                $interval2 = date_diff($datetime2, $datetime3);

                $duration = $interval2->format('%R%a');
                $daysPassed = $interval->format('%R%a');

                //Priority - Duration in Days
                if ($book_title['bk_priority'] == 1){
                  $period = 14;
                } elseif ($book_title['bk_priority'] == 2){
                  $period = 10;
                } elseif ($book_title['bk_priority'] == 3){
                  $period = 7;
                } elseif ($book_title['bk_priority'] == 4){
                  $period = 5;
                } elseif ($book_title['bk_priority'] == 5){
                  $period = 3;
                }

                if ($duration <= 0){
                  //Remove Negative/Positive
                  $duration = $interval2->format('%a');

                  //Fine Calculation - 1 day = RM0.20
                  $fine = $duration * 0.20;

                  echo '<div class="col-lg-6">
                          <div class="testimonial-item" style="padding: 25px;">
                              <h3>'. $book_title['bk_title'] .'</h3>
                              <p>
                                <section class="skills" style="padding: 0px;">
                                  <div class="skills-content">  
                                    <div class="progress" style="padding-top: 20px;">
                                      <span class="skill">Overdue by '. $duration .' days<i class="val">Fine Pending : RM'. sprintf('%.2f', $fine) .'</i></span>
                                      <div class="progress-bar-wrap">
                                      <div class="progress-bar" style="background-color: red;" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </div>
                                  </div>
                                </section>
                              </p>
                          </div>
                        </div>';
                } elseif($duration > 0){
                  //Remove Negative/Positive
                  $duration = $interval2->format('%a');
                  $daysPassed = $interval->format('%a');
                  $remaining = ($interval->days / $period) * 100;

                  echo '<div class="col-lg-6">
                          <div class="testimonial-item" style="padding: 25px;">
                              <h3>'. $book_title['bk_title'] .'</h3>
                              <p>
                                <section class="skills" style="padding: 0px;">
                                  <div class="skills-content">  
                                    <div class="progress" style="padding-top: 20px;">
                                      <span class="skill">'. $duration .' days remaining<i class="val">Due Date : '. $datetime3->format('d-m-Y') .'</i></span>
                                      <div class="progress-bar-wrap">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="'. $remaining .'" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </div>
                                  </div>
                                </section>
                              </p>
                          </div>
                        </div>';
                  }
                }
            }

          $sql = 'SELECT * FROM borrowing_t  WHERE (br_returning_date IS NOT NULL) AND (cl_id = '. $_SESSION['id'] .') ORDER BY br_returning_date DESC';
					$results = mysqli_query($conn1, $sql);
					//echo $sql;
					if(mysqli_num_rows($results)>0){
						echo '
            </div>
            <div class="row" style="margin-top: 25px;">
            <br>
            <div class="tableData" style="margin-left: 20px; margin-right: 20px;">
            <div class="section-title" data-aos="fade-up">
							<h3 text-align="center">Returned</h3>
						  </div>';
						echo '<div class="tabular">
							<center><table border="1|0">
								<tr>
									<th>Borrow ID</th>
									<th>Book Name</th>
									<th>Borrowing Date</th>
									<th>Due Date</th>
									<th>Return Date</th>
									<th>Feedback</th>
									<th>Fine</th>
								</tr>';

					for($i=0; $i<mysqli_num_rows($results); $i++){
						$row = mysqli_fetch_assoc($results);
            
            //Book Name
            $sqlBookName = 'SELECT bk_title
                            FROM book_t
                            WHERE bk_id = ' . $row['bk_id'];
            $getBookName =  mysqli_query($conn1, $sqlBookName);
            $book_name = mysqli_fetch_array($getBookName);

						echo '<tr>';
						echo '<td>'.$row['br_id'].'</td>';
						echo '<td>'.$book_name['bk_title'].'</td>';
						echo '<td>'.$row['br_date'].'</td>';
						echo '<td>'.$row['br_due_date'].'</td>';
						echo '<td>'.$row['br_returning_date'].'</td>';
						echo '<td>'.$row['br_feedback'].'</td>';
						echo '<td>'.$row['br_fine'].'</td>';
						echo '</tr>';
					}
					echo '</table></center>
						</div>
          </div>';
				}

				else 
					echo '<center><h3>NO DATA EXISTS</h3></center>';
        ?>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->

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

<!-- REFERENCES

DelftStack, 2020. Show a Number to Two Decimal Places in PHP. [Online] 
Available at: https://www.delftstack.com/howto/php/how-to-show-a-number-to-two-decimal-places-in-php/
[Accessed 10 February 2021].

GeeksForGeeks, 2018. How to convert a string into number in PHP?. [Online] 
Available at: https://www.geeksforgeeks.org/how-to-convert-a-string-into-number-in-php/#:~:text=Strings%20in%20PHP%20can%20be%20converted%20to%20numbers,is%20used%20to%20convert%20string%20into%20a%20number.
[Accessed 10 February 2021].

Stack Overflow, 2014. PHP: get int from date diff [closed]. [Online] 
Available at: https://stackoverflow.com/questions/18563444/php-get-int-from-date-diff
[Accessed 11 February 2021].

W3docs, n.a.. How to Convert DateTime to String in PHP. [Online] 
Available at: https://www.w3docs.com/snippets/php/how-to-convert-datetime-to-string-in-php.html
[Accessed 10 February 2021].

-->