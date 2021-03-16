<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Catalogue</title>
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
  <?php
    session_start();
    //Step 1 - Establish connection
    //Step 2 - Handling connection error
    include('conn1.php');

    //Step 3 - Execute SQL query
    $sql = 'SELECT *
            FROM book_t';
            
    $results = mysqli_query($conn1, $sql);
    ?>

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
              //Book Genre
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
          <li><a href="courses.php">Catalogue</a></li>
        </ol>
        <h2><a href="catalogue.php">Catalogue</a></h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="books" class="books">
      <div class="container">

        <div class="row">

          <div class="col-lg-4">

            <div class="sidebar">

            <?php
              if(isset($_SESSION['login'])) {
                if($_SESSION['logrole'] == 'librarian_t'){
                  echo '<div class="sidebar-item search-form" style="margin-bottom: 65px;">
                          <form style="border: none;">
                            <button type="button" style="height:35px; width:100%;" onclick="addBook()"><i class="icofont-plus-circle"></i> Add New Book</button>
                          </form>
                        </div>';
                }
              }
            ?>

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form method="GET">
                  <input type = "text" name = "search_key"/>
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>

              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Genre</h3>
              <div class="sidebar-item tags">
                <ul>
                  <?php
                    //Book Genre
                    $sqlGenre = 'SELECT DISTINCT bk_genre
                                 FROM book_t';

                    $book_genre = mysqli_query($conn1, $sqlGenre);

                    for($i = 0; $i<mysqli_num_rows($book_genre); $i++) {
                      $genre = mysqli_fetch_array($book_genre);
                      echo '<li><a href="?search_key='. $genre['bk_genre'] .'">'. $genre['bk_genre'] .'</a></li>';
                    }
                  ?>
                </ul>

              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

          <div class="col-lg-8 entries">
            
<!-- ======= Services Section ======= -->
<section id="services" class="services">
  <div class="container">
    <div class="row">
      <?php
        //Books that match search criteria
          if (isset($_GET['search_key'])){

            $sqlsearch = 'SELECT *
                          FROM book_t
                          WHERE bk_title LIKE "%' . $_GET['search_key'] . '%"
                          OR bk_genre LIKE "%'. $_GET['search_key'] .'%"' ;

            $search = mysqli_query($conn1, $sqlsearch);

            if(mysqli_num_rows($search) > 0) {
              for($i = 0; $i<mysqli_num_rows($search); $i++) {
                $row2 = mysqli_fetch_array($search);
                echo '<div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                          <a href="book-details.php?bk_id='. $row2['bk_id'] .'"><img class="card-img-top" src="assets/bk_cover/'. $row2['bk_cover'] .'" alt="'. $row2['bk_cover'] .'"></a>
                          <div class="card-body">
                            <h4 class="card-title">
                              <a href="book-details.php?bk_id='. $row2['bk_id'] .'">'. $row2['bk_title'] .'</a>
                            </h4>
                            <h5>'. $row2['bk_genre'] .'</h5>
                            <p class="card-text">'. substr($row2['bk_summary'], 0, 60) .'...</p>
                          </div>
                        </div>
                      </div>';
              }
            }
            mysqli_free_result($search);    
          }
      
        //Display Available Books
          else{
            for($i = 0; $i<mysqli_num_rows($results); $i++) {
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
            
            /*
            DaniWeb, 2007. Passing a value via href - php. [Online]
            Available at: https://www.daniweb.com/programming/web-development/threads/86365/passing-a-value-via-href-php
            [Accessed 5 October 2020].
            */
            mysqli_free_result($results);  
          }

        mysqli_close($conn1);
      ?>
    </div>

  </div>
</section><!-- End Services Section -->

          </div><!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

<script>
  function addBook(){
    window.location.href = 'addBook.php';
  }
</script>

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