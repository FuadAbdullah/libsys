<!DOCTYPE html>
<html>
<head>
  <title>LibSys - Add Book</title>

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
        background: url('assets/img/slide/slide-1.jpg');
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
   <div class="loginbox">
   <a href="catalogue.php"><button type="submit" class="btnReturn">< Return to Catalogue</button></a>
      <section id="contact" class="contact">
          <div class="container">
              
      <div class="col-lg-6">
          <form method="POST" role="form" class="php-email-form" action="addBookCode.php" enctype="multipart/form-data">
              <h1>Add New Book</h1>

              <div class="row"> 
                <div class="col-md-6 form-group">
                  <label>Book Title :</label>
                  <input type = "text" class="form-control" name = "bk_title" required ="true" id="name" maxlength="70" placeholder="Book Title" />                  
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <label>Serial Number :</label>
                  <input type = "tel" class="form-control" name = "bk_serialno" required ="true" maxlength="13" placeholder="Serial Number [10 or 13 digits]" pattern="[0-9]{10-13}" data-rule="minlen:10" data-msg="ISBN number must be either 10 or 13 digits"/>                  
                  <div class="validate"></div>
                </div>
              </div>

              <div class="row"> 
                <div class="col-md-6 form-group"  style="padding-top: 10px; padding-right: 10px;">
                  <label>Genre :</label>
                  <select name="bk_genre" required="true" placeholder="Genre"  class="form-control" onclick="otherGenre()" id="genreSelect">
                  <?php
                    //Step 1 - Establish connection
                    //Step 2 - Handling connection error
                    include('conn1.php');
                  
                    //Book Genre
                    $sqlGenre = 'SELECT DISTINCT bk_genre
                                FROM book_t
                                ORDER BY bk_genre';

                    $book_parent = mysqli_query($conn1, $sqlGenre);

                    for($i = 0; $i<mysqli_num_rows($book_parent); $i++) {
                      $category = mysqli_fetch_array($book_parent);
                      echo '<option value="'. $category['bk_genre'] .'">'. $category['bk_genre'] .'</option>';
                      }
                ?>
                    <option value='other'>Other</option>
                  </select>                  
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group" id="otherGenre" style="padding-top: 8px; padding-right: 10px;">
                                 
                </div>
              </div>

              <div class="row"> 
                <div class="col-md-6 form-group" style="padding-top: 10px; padding-right: 10px;">
                <label>Publisher :</label>
                  <select name="bk_publisher" required="true" placeholder="Publisher" class="form-control" onclick="otherPublisher()" id="publisherSelect">
                  <?php             
                    //Book Publisher
                    $sqlPublisher = 'SELECT DISTINCT bk_publisher
                                      FROM book_t
                                      ORDER BY bk_publisher';

                    $book_publisher = mysqli_query($conn1, $sqlPublisher);

                    for($i = 0; $i<mysqli_num_rows($book_publisher); $i++) {
                      $publisher = mysqli_fetch_array($book_publisher);
                      echo '<option value="'. $publisher['bk_publisher'] .'">'. $publisher['bk_publisher'] .'</option>';
                      }
                  ?>
                    <option value='other'>Other</option>
                  </select>                  
                </div>
                <div class="col-md-6 form-group" id="otherPublisher" style="padding-top: 8px; padding-right: 10px;">

                </div>
              </div>

              <div class="row"> 
                <div class="col-md-6 form-group" style="padding-top: 10px; padding-right: 10px;">
                  <label>Priority :</label>
                    <select name="bk_priority" required="true" class="form-control">
                      <option value="1">Purple [14 days borrowing duration]</option>
                      <option value="2">Indigo [10 days borrowing duration]</option>
                      <option value="3">Blue   [7 days borrowing duration]</option>
                      <option value="4">Green [5 days borrowing duration]</option>
                      <option value="5">Yellow [3 days borrowing duration]</option>
                    </select>  
                  </div>  
              <div class="col-md-6 form-group" style="padding-top: 10px; padding-right: 10px;">
                  <label>Publish Date :</label><input type = "Date" class="form-control" name = "bk_publish_date" required ="true" placeholder="Publish Date"/>                  
                  <div class="validate"></div>
                </div>
              </div>

              <div class="row"> 
                <div class="col-md-6 form-group">
                 <label>Quantity :</label>
                  <input type = "number" class="form-control" name = "bk_quantity" required ="true" placeholder="Quantity" max="999"/>                  
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <label>Book Cover :</label>
                  <input type = "file" name = "bk_cover" required ="true"/>                  
                  <div class="validate"></div>
                </div>
              </div>
              
               <div class="row">
                <div class="col-md-6 form-group">
                  <label>Summary :</label>
                  <textarea placeholder="Summary" maxlength="450" style="width:100%" name="bk_summary"></textarea>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                <h2 style="padding-left: 15px;">Book Author/s</h2>
              </div>
              <div class="col-md-6 form-group">
                 <label>Number of authors :</label>
                  <input type = "number" class="form-control" name = "bk_author_quantity" required ="true" id="noAuthor" placeholder="No. of Authors" onchange="addAuthor()" value=1 style="width: 68%; display: inline;" min="1"/>                  
                  <div class="validate"></div>
                </div>
              </div>

              <div class="row"> 
                <div class="col-md-6 form-group">
                  <label>Book Author First Name :</label>
                  <input type = "text" class="form-control" name = "bk_author_firstname1" required ="true" id="name" maxlength="40" placeholder="Book Author First Name" />                  
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <label>Book Author Last Name :</label>
                  <input type = "text" class="form-control" name = "bk_author_lastname1" required ="true" id="name" maxlength="40" placeholder="Book Author Last Name" />                  
                  <div class="validate"></div>
                </div>
              </div>

              <div class="row" id="extraAuthor">
                
              </div>
              
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message"></div>
              </div>
              <button type="reset" value="Reset">Reset</button>
              <button type="submit" value="Submit">Add</button>
            </form>
          </div>
      </div>
      </section>           
      </div>
  </div>

    <script>
      function otherGenre() {
        if (document.getElementById("genreSelect").value == "other"){
          document.getElementById("otherGenre").innerHTML = "<label>Other Genre :</label><input type = 'text' class='form-control' name = 'bk_genre_other' id='bk_genre' required ='true' maxlength='40' placeholder='Other Genre'/>";
        } else {
          document.getElementById("otherGenre").innerHTML = "";
        }
      }

      function otherPublisher() {
        if (document.getElementById("publisherSelect").value == "other"){
          document.getElementById("otherPublisher").innerHTML = "<label>Other Publisher :</label><input type = 'text' class='form-control' name = 'bk_publisher_other' id='bk_publisher' required ='true' maxlength='40' placeholder='Other Publisher'/>";
        } else {
          document.getElementById("otherPublisher").innerHTML = "";
        }
      }

      function addAuthor() {
        var noAuthor = document.getElementById("noAuthor").value;
        var authors = "";
        for(i=2; i<=noAuthor; i++){
          authors = authors + '<div class="col-md-6 form-group"> <label>Book Author ' + i + ' First Name :</label> <input type = "text" class="form-control" name = "bk_author_firstname' + i + '" required ="true" id="name" maxlength="40" placeholder="Book Author First Name" /><div class="validate"></div></div><div class="col-md-6 form-group"><label>Book Author ' + i + ' Last Name :</label><input type = "text" class="form-control" name = "bk_author_lastname' + i + '" required ="true" id="name" maxlength="40" placeholder="Book Author Last Name" /><div class="validate"></div></div>';
        }
        document.getElementById("extraAuthor").innerHTML = authors;
      }
    </script>

</body>
</html>