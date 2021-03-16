<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LibSys</title>
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
  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php"><span>LibSys</span></a><a href="index.php"><img src="assets/img/favicon.png" alt="" class="img-fluid"></a></h1>
      </div>

      <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="drop-down"><a href="catalogue.php">Books</a>
          <ul>
            <?php
              session_start();
              //Step 1 - Establish connection
              //Step 2 - Handling connection error
              include('conn1.php');

              //Book Genre
              $sqlGenre = 'SELECT DISTINCT bk_genre
                           FROM book_t';

              $book_parent = mysqli_query($conn1, $sqlGenre);

              for($i = 0; $i<mysqli_num_rows($book_parent); $i++) {
                $category = mysqli_fetch_array($book_parent);
                echo '<li class="drop-down"><a href="http://localhost/LibSys/catalogue.php?search_key='. $category['bk_genre'] .'">'. $category['bk_genre'] .'</a>
                    </li>';
                }
            ?>
          </ul>
        </li>  
      
        <li class="drop-down"><a href="">About</a>
          <ul>
            <li><a href="team.php">Team</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </li>

        <li><a href="index.php">Home</a></li>

        <?php
          //Account
           if(isset($_SESSION['login'])) {
            echo "<li><a href='account.php'>". $_SESSION['login'] ."'s Account</a></li>";
          } else {
            echo "<li><a href='login.html'>Login/Register</a></li>";
          }
        ?>

      </ul>
    </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url(assets/img/slide/slide-1.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>LibSys</span></h2>
                <p class="animate__animated animate__fadeInUp">A platform made specially to enhance your wonderful journey in using the libary. Enjoy all the features available! We are proud to have you on board!!</p>
                <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url(assets/img/slide/slide-2.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated fanimate__adeInDown">About <span>Us</span></h2>
                <p class="animate__animated animate__fadeInUp">The team that created the platform had a vision of revolutionising the way <strong>WE HUMANS</strong> use and experience library like never before. Do check the details of the members out! Our main aim is to enhance people experience comapre to traditional way of borrowing and accessing books in the library.</p>
                <a href="team.php" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url(assets/img/slide/slide-3.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Quotes <span>of the DAY</span></h2>
                <p class="animate__animated animate__fadeInUp">
                  <!-- quotes of the day section, https://www.google.com.my/amp/s/www.daniweb.com/programming/web-development/threads/242957/random-quote-of-the-day/amp. -->
                <?php
                function RandomQuoteByInterval($Time, $Quotes){
                $Time = intval($Time);
                $Items = count($Quotes);
                $QuotesIndex = ($Time % $Items);
                return $Quotes[$QuotesIndex];
                }

                $Day = date('z'); 
 
                // use 'm'; for every month
                // use 'h'; for every hour
                // use 'i'; for every minute
                // use 'z'; for every day
 
                $RandomQuotes1 = array(
                                       'A book a day keeps the ingnorance away',
                                       'Learn from your mistakes and grow from it',
                                       'Fight! Never giveup. If you do not fight you cannot win',
                                       'I LOVE BOOKS',
                                       'An knowleadgable person could stop world hunger, so read your books!',
                                       'Life might be short, but that does not mean you should not live life to the fullest',
                                       'Love brings peace while hatred brings destruction',
                                       'Whether you’re sad, you’re a mess, or you’ve hit rock bottom, you still have TO PLAY! That’s how people like us survive',
                                       'Maybe there is only a dark road up ahead. But you still have to believe and keep going. Believe that the stars will light your path, even a little bit',
                                       'Pain changes people',
                                       'Sometimes you just have to accept the fact that some people only enter your life as a temporary happiness',

                                        );
                print RandomQuoteByInterval($Day, $RandomQuotes1);
                ?> 
                </p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="icon-box">
              <i class="icofont-book-alt"></i>
              <h3><a href="catalogue.php">Books</a></h3>
              <p>The platform provide dozens of books for you to explore. So dont wait any further and join us now!</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="icofont-team"></i>
              <h3><a href="team.php">Team</a></h3>
              <p>Let's get to know the "Team" that has been working for this <strong>AMAZING</strong> platform</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="icofont-live-support"></i>
              <h3><a href="contact.php">Contact</a></h3>
              <p>Feel free to contact us for any inquiries!</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Featured Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>View Books</h2>
        </div>

        <div class="row">
          <?php 
          //Step 3 - Execute SQL query
          $sql = 'SELECT *
                  FROM book_t';
          $results = mysqli_query($conn1, $sql);
          //Counts section Registered users
          $sql1 = 'SELECT COUNT(DISTINCT cl_id)
                  FROM client_t';
          $results1 = mysqli_query($conn1, $sql1);
          $row2 = mysqli_fetch_array($results1);
          $total = $row2[0];
          //Counts section Number of books
          $sql2 = 'SELECT COUNT(DISTINCT bk_id)
                  FROM book_t';
          $results2 = mysqli_query($conn1, $sql2);
          $row3 = mysqli_fetch_array($results2);
          $total2 = $row3[0];
          //Counts section Number of books borrowed 
          $sql3 = 'SELECT COUNT(br_id)
                  FROM borrowing_t';
          $results3 = mysqli_query($conn1, $sql3);
          $row4 = mysqli_fetch_array($results3);
          $total3 = $row4[0];
          //Counts section book feedback
          $sql4 = 'SELECT COUNT(DISTINCT br_feedback)
                  FROM borrowing_t';
          $results4 = mysqli_query($conn1, $sql4);
          $row5 = mysqli_fetch_array($results4);
          $total4 = $row5[0];

          //Display Available Books
            for($i = 0; $i<3; $i++) {
              $row = mysqli_fetch_array($results);
              echo '<div class="col-lg-4 col-md-6 mb-4">
                      <div class="card h-100">
                        <a href="book-details.php?bk_id='. $row['bk_id'] .'"><img class="card-img-top" src="assets/bk_cover/'. $row['bk_cover'] .'" alt="'. $row['bk_cover'] .'"></a>
                        <div class="card-body">
                          <h4 class="card-title">
                            <a href="book-details.php?bk_id='. $row['bk_id'] .'">'. $row['bk_title'] .'</a>
                          </h4>
                          <h5>'. $row['bk_genre'] .'</h5>
                          <p class="card-text">'. substr($row['bk_summary'], 0, 60) .'...</p>
                        </div>
                      </div>
                    </div>';
            }        
          ?>
        </div>
        
        <a href="catalogue.php"><p align="right">View more books ></p></a>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-simple-smile"></i>
              <span data-toggle="counter-up"><?php echo $total?></span>
              <p><strong>Registered Client</strong></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-book"></i>
              <span data-toggle="counter-up"><?php echo $total2 ?></span>
              <p><strong>Books</strong> available in the Library</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-users-alt-2"></i>
              <span data-toggle="counter-up"><?php echo $total3 ?></span>
              <p><strong>Books Borrowed</strong> by our clients as they enjoy the seamless feature</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-data"></i>
              <span data-toggle="counter-up"><?php echo $total4?></span>
              <p><strong>Feedbacks</strong> received from the books borrowed by the clients</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Counts Section -->

  </main><!-- End #main -->

<!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Bukit Jalil, Technology Park Malaysia <br>
              Kuala Lumpur, 56000<br>
              Malaysia <br><br>
              <strong>Phone:</strong> <a href="mailto:info@tixedu.com">+60 013-306 2691</a> <br>
              <strong>Email:</strong> <a href="tel:+60133092691">info@LibSys.com</a> <br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About LibSys</h3>
            <p>LibSys is a library platform for users to explore books available in the library and provides smooth library experience like never before.</p>
            <div class="social-links mt-3">
              <a href="https://twitter.com/tixedu" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/tixedu/" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.linkedin.com/company/tix-education-specialists" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Eterna</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

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