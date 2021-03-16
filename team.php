<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LibSys - Team</title>
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

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Team</li>
        </ol>
        <h2>Team</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/team/team-1.jpg" alt="">
              <h4>Muhammad Danish Bin Mansor</h4>
              <span>Chief Executive Officer</span>
              <p>
                Nicknamed Kacang, Danish is well known for his trading skills and driving a Myvi, he is an entrepreneur with big ambitions
              </p>
              <div class="social">
                <a href="https://twitter.com/bedicine_"><i class="icofont-twitter"></i></a>
                <a href="https://www.facebook.com/danish.mansor.773/"><i class="icofont-facebook"></i></a>
                <a href="https://www.instagram.com/danish.mansor/"><i class="icofont-instagram"></i></a>
                <a href="https://www.linkedin.com/in/muhammad-danish-bin-mansor-3b1a48187/"><i class="icofont-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/team/team-2.jpg" alt="">
              <h4>Johari Idzman Bin Dzulkarnain</h4>
              <span>Product Manager</span>
              <p>
                Johari likes to sit on a watch because he is always "on time". He is a strong advocate and believer of the power of free educaton
              </p>
              <div class="social">
                <a href="https://www.facebook.com/profile.php?id=100004719644702"><i class="icofont-facebook"></i></a>
                <a href="https://www.instagram.com/johariidzman/"><i class="icofont-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/team/team-3.jpg" alt="">
              <h4>Kishen Shanthan A/L Jegathes</h4>
              <span>Chief Technology Officer</span>
              <p>
                Kishen often has bad memory, short attention span and most importantly, a below average IQ. Which is why he helps out in the project so others don't turn out like him
              </p>
              <div class="social">
                <a href="https://twitter.com/Fortress_35?s=20"><i class="icofont-twitter"></i></a>
                <a href="https://www.facebook.com/K15H3N"><i class="icofont-facebook"></i></a>
                <a href="https://www.instagram.com/ki_shawnnn/"><i class="icofont-instagram"></i></a>
                <a href="https://www.linkedin.com/in/ksjegathes/"><i class="icofont-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/team/team-4.jpg" alt="" class=>
              <h4>Muhammad Fuad Bin Abdullah</h4>
              <span>Chief Financial Officer</span>
              <p>
                Fuad loves to experiment out his Raspberry Pi 4 and do CCNA as module, absolute genius with his text to speech bash scripting
              </p>
              <div class="social">
                <a href="https://www.facebook.com/fuadboonliang"><i class="icofont-facebook"></i></a>
                <a href="https://www.instagram.com/fuadnuimani/"><i class="icofont-instagram"></i></a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

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