<?php
    //Connection to Database
    include("conn1.php"); //link conn.php info here
    //include("funcblock.php");//calling functions scrapped idea to generate cover using 6 hex digit

    $bk_title = mysqli_real_escape_string($conn1, $_POST['bk_title']);
    $bk_serialno = $_POST['bk_serialno'];
    
    //Other option
    if ($_POST['bk_genre'] == "other"){
        $bk_genre = $_POST['bk_genre_other'];
    } else{
        $bk_genre = $_POST['bk_genre'];
    }

    if ($_POST['bk_publisher'] == "other"){
        $bk_publisher = mysqli_real_escape_string($conn1, $_POST['bk_publisher_other']);
    } else{
        $bk_publisher = mysqli_real_escape_string($conn1, $_POST['bk_publisher']);
    }

    $bk_priority = $_POST['bk_priority'];
    $bk_publish_date = $_POST['bk_publish_date'];
    $bk_quantity = $_POST['bk_quantity'];

    $bk_summary = mysqli_real_escape_string($conn1, $_POST['bk_summary']);

    //Step 3 - Execute the query
    //[book_t]
    $sql = "INSERT INTO book_t (bk_title, bk_genre, bk_cover, bk_summary, bk_quantity, bk_serialno, bk_priority, bk_publisher, bk_publish_date)
            VALUES ('". $bk_title ."', '". $bk_genre ."', '.jpg', '". $bk_summary ."', '". $bk_quantity ."', '". $bk_serialno ."', '". $bk_priority ."', '". $bk_publisher ."', '". $bk_publish_date ."')";

    //print($sql);
    mysqli_query($conn1, $sql);

    //[book_author_t]
    //Extra Book Authors
    $bk_author_firstname = [];
    $bk_author_lastname = [];

    //get bk_id
    $sqlBK_ID = "SELECT bk_id
                 FROM book_t
                 ORDER BY bk_id DESC LIMIT 1";

    $lastBK_ID = mysqli_query($conn1, $sqlBK_ID);
    $latestBK_ID = mysqli_fetch_array($lastBK_ID);

    //Update book cover
    if (isset($_FILES['bk_cover'])) {
        if ($_FILES['bk_cover']['error']!=0) {
           echo '<script>alert("Error uploading image");</script>';
        }
        //$title = titleGen(); scrapped idea. refer top
        $tmp = $_FILES['bk_cover']['tmp_name'];
        $dst = 'assets/bk_cover/'. $latestBK_ID['bk_id'] .'.jpg';
        move_uploaded_file($tmp, $dst);
    }

    $sqlBK_COVER = "UPDATE book_t
                    SET bk_cover = '". $latestBK_ID['bk_id'] ."'
                    WHERE bk_id = '". $latestBK_ID['bk_id'] ."'";

    mysqli_query($conn1, $sqlBK_COVER);

    //Book Author
    if ($_POST['bk_author_quantity'] == 1) {
        $bk_author_firstname[0] = $_POST['bk_author_firstname1'];
        $bk_author_lastname[0] = $_POST['bk_author_lastname1'];

        $sqlAuthor = "INSERT INTO book_author_t (bk_author_firstname, bk_author_lastname, bk_id)
                      VALUES ('". $bk_author_firstname[0] ."', '". $bk_author_lastname[0] ."', '". $latestBK_ID['bk_id'] ."')";
        mysqli_query($conn1, $sqlAuthor);
    } else {
        for($i=1; $i<=$_POST['bk_author_quantity']; $i++){
            $bk_author_firstname[$i] = $_POST['bk_author_firstname'. $i];
            $bk_author_lastname[$i] = $_POST['bk_author_lastname'. $i];

            $sqlAuthor = "INSERT INTO book_author_t (bk_author_firstname, bk_author_lastname, bk_id)
                      VALUES ('". $bk_author_firstname[$i] ."', '". $bk_author_lastname[$i] ."', '". $latestBK_ID['bk_id'] ."')";
            mysqli_query($conn1, $sqlAuthor);
            }
    }

    if(mysqli_affected_rows($conn1)>0) {
        echo "<script>alert('Add SUCCESSFULL')</script>";
    }
    else {
        echo "<script>alert('Adding FAILED')</script>";
    }
    echo '<script>window.location.href= "addBook.php";</script>';

    //Step 5 - Close connection
    mysqli_close($conn1);
?>