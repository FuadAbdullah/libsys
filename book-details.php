<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Book Details</title>
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
          <li><a href="catalogue.php">Catalogue</a></li>
          <li>Book Details</li>
        </ol>
        <h2>Book Details</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row">

          <div class="col-lg-8">
            <?php
                //Step 1 - Check if $_GET has value
                if (!isset($_GET['bk_id'])){
                  echo "<script>
                          alert('This book does not exist or has been removed. You will be redirected to the catalogue page.');
                          window.location.href = 'catalogue.php';
                        </script>";
                }
                
                //Step 2 - Establish connection
                //Step 3 - Handling connection error
                include('conn1.php');
            
                //Step 4 - Execute SQL query
                $sql = 'SELECT *
                        FROM book_t
                        WHERE bk_id = '. $_GET['bk_id'];
                        
                $results = mysqli_query($conn1, $sql);
                $book_info = mysqli_fetch_assoc($results);

                if (mysqli_num_rows($results) < 1){
                  echo "<script>
                          alert('This book does not exist or has been removed. You will be redirected to the catalogue page.');
                          window.location.href = 'catalogue.php';
                        </script>";
                }

                echo '
                <h2 class="portfolio-title">'. $book_info['bk_title'] .'</h2>
                <img src="assets/bk_cover/'. $book_info['bk_cover'] .'" class="img-fluid" alt="">'
              ?>
          </div>

          <div class="col-lg-4 portfolio-info">
            <h3>Book information</h3>
            <ul>
              <?php
                $sqlAuthor = 'SELECT *
                              FROM book_author_t
                              WHERE bk_id = '. $_GET['bk_id'];

                $authors = mysqli_query($conn1, $sqlAuthor);
                                
                echo'<li><strong>Author</strong>: ';
                  for($i = 0; $i < mysqli_num_rows($authors); $i++){
                      $authorName = mysqli_fetch_array($authors);
                      echo $authorName['bk_author_firstname'] . " " . $authorName['bk_author_lastname'];
                      if ($i + 1 < mysqli_num_rows($authors)){
                        echo ", ";
                      }
                  }
                echo '  
                </li>
                <li><strong>Publisher</strong>: '. $book_info['bk_publisher'] .'</li>
                <li><strong>Publish Date</strong>:'. $book_info['bk_publish_date'] .'</li>
                <li><strong>ISBN</strong>: '. $book_info['bk_serialno'] .'</li>
                <li><strong>Genre</strong>: <a href="catalogue.php?search_key='. $book_info['bk_genre'] .'">'. $book_info['bk_genre'] .'</a></li>
                <li><strong>Summary</strong>:</li>
            </ul>

            <p>
            '. $book_info['bk_summary'] .'
            </p>';

            if(isset($_SESSION['login'])) {
              if($_SESSION['logrole'] == 'librarian_t'){
                echo '<div class="books">
                <div class="sidebar">
                <div class="sidebar-item search-form" style="margin-bottom: 120px;">
                        <form style="border: none;">
                          <button type="button" style="height:35px; width:100%;" onclick="window.location.href=\'addBorrowing.php?bk_id='. $_GET['bk_id'] .'&bk_name='. $book_info['bk_title'] .'&bk_priority='. $book_info['bk_priority'] .'\'"><i class="icofont-read-book"></i> Add Borrowing</button>
                          <button type="button" style="height:35px; width:100%; margin-top: 45px" onclick="window.location.href=\'editBook.php?bk_id='. $_GET['bk_id'] .'\'"><i class="icofont-edit"></i> Edit Book</button>
                          <button type="button" style="height:35px; width:100%; margin-top: 90px; background-color: #dc3545;" onclick="window.location.href=\'deleteBook.php?bk_id='. $_GET['bk_id'] .'\'"><i class="icofont-ui-delete"></i> Delete Book</button>
                        </form>
                      </div>
                      </div>
                      </div>';
              }
            }
          ?>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

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