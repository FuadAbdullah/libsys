<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Account</title>
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
    .account{
        height: 1000px;
    }

  </style>

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
            echo "<script>
            alert('You are not logged in. Please login first.');
            window.location.href = 'login.html';
          </script>";
          }
        ?>

      </ul>
    </nav><!-- .nav-menu -->

  </div>
</header><!-- End Header -->

  <main id="main">
    <!--Fixed Sidebar-->
      <nav>
        <ul class="account" id="account">
            <div class="icon-box">
              <div class="icon"><i class="icofont-ui-user"></i></div>
              <h4><a>Hello <?php echo $_SESSION['login']; ?></a></h4>
            </div>
          <li><a href="account.php">Account Settings</a></li>
          <?php
            if($_SESSION['logrole'] == 'client_t'){
              echo '<li><a href="#" onclick="borrowingDetailsClient(this)">View Borrowing Status</a></li>';
            }
            elseif($_SESSION['logrole'] == 'librarian_t'){
              echo '<li><a href="#" onclick="viewBorrowing(this)">View Borrowing</a></li>';
            }
            elseif($_SESSION['logrole'] == 'admin_t'){
              echo '<li><a href="#" onclick="userList(this)">User List</a></li>';
              echo '<li><a href="#" onclick="registerClient(this)">Register Client</a></li>';
              echo '<li><a href="#" onclick="registerLibrarian(this)">Register Librarian</a></li>';
              echo '<li><a href="#" onclick="registerAdmin(this)">Register Admin</a></li>';
              echo '<li><a href="#" onclick="viewStatistics(this)">View Statistics</a></li>';
            }
          ?>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </nav>

    <!-- ======= Content ======= -->
    <section class="account-content" id="account-content">
      <div class="container">
            
      <!-- ======= Breadcrumbs ======= -->
      <button class="sidebarbtn" id="sidebarbtn" onclick="closeNav()">&#x2718 Close Sidebar</button>
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Account</li>
          </ol>
          <h2 id="title">Account Settings</h2>

        </div>
      </section>
      <!-- End Breadcrumbs -->
    <section id="skills" class="skills">
    <div class="skills-content">

      <?php
      if($_SESSION['logrole'] == 'client_t'){
          echo '<iframe src="editClient.php" width="100%" height="750px" style="border:none;" id="myFrame"></iframe>';
        }
        elseif($_SESSION['logrole'] == 'librarian_t'){
          echo '<iframe src="editLibrarian.php" width="100%" height="750px" style="border:none;" id="myFrame"></iframe>';
        }
        elseif($_SESSION['logrole'] == 'admin_t'){
          echo '<iframe src="editAdmin.php" width="100%" height="750px" style="border:none;" id="myFrame"></iframe>';
        }
      ?>

      <script>
        function openNav() {
          document.getElementById("sidebarbtn").innerHTML = "&#x2718 Close Sidebar";
          document.getElementById("account").style.width = "225px";
          document.getElementById("account-content").style.left = "255px";
          document.getElementById("account-content").style.width = "75%";
          document.getElementById("sidebarbtn").setAttribute('onclick', 'closeNav()');
        }
        
        function closeNav() {
          document.getElementById("sidebarbtn").innerHTML = "&#9776; Open Sidebar";
          document.getElementById("account").style.width = "0";
          document.getElementById("account-content").style.left = "0";
          document.getElementById("account-content").style.width = "100%";
          document.getElementById("sidebarbtn").setAttribute('onclick', 'openNav()');
        }

        function borrowingDetailsClient(i){
          document.getElementById("title").innerHTML = "View Borrowing Status";
          document.getElementById("myFrame").src = "borrowingDetails.php";
        }

        function userList(i){
          document.getElementById("title").innerHTML = "User Details";
          document.getElementById("myFrame").src = "viewData.php";
        }

        function registerClient(i){
          document.getElementById("title").innerHTML = "Register Client";
          document.getElementById("myFrame").src = "registerClient.html";
        }

        function registerLibrarian(i){
          document.getElementById("title").innerHTML = "Register Librarian";
          document.getElementById("myFrame").src = "registerLibrarian.html";
        }

        function registerAdmin(i){
          document.getElementById("title").innerHTML = "Register Admin";
          document.getElementById("myFrame").src = "registerAdmin.html";
        }

        function viewStatistics(i){
          document.getElementById("title").innerHTML = "Statistics";
          document.getElementById("myFrame").src = "viewStatistics.php";
        }

        function viewBorrowing(i){
          document.getElementById("title").innerHTML = "Borrowing List";
          document.getElementById("myFrame").src = "viewBorrowing.php";
        }
      </script>

  </div>
  </section><!-- End Our Skills Section -->

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
</body>

</html>

<!-- REFERENCES

w3schools.com, n.a.. How TO - Collapse Sidebar. [Online] 
Available at: https://www.w3schools.com/howto/howto_js_collapse_sidebar.asp
[Accessed 2 February 2021].

Stack Overflow, 2014. Change onClick attribute with javascript. [Online] 
Available at: https://stackoverflow.com/questions/15097315/change-onclick-attribute-with-javascript
[Accessed 3 February 2021].
      -->