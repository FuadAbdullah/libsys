<?php

//W-What are you doing here, step-sis! This is editBook.php's back-end.

//Connection to Database
include("conn1.php"); //link conn.php info here
//include("funcblock.php");//calling functions scrapped idea to generate cover using 6 hex digit

$bk_id = $_POST['bk_id'];

/*
for($i=1; $i<=$_POST['bk_author_quantity']; $i++){
    $bk_author_id[$i] = $_POST['bk_author_id' . $i];
    $bk_author_firstname[$i] = $_POST['bk_author_firstname'. $i];
    $bk_author_lastname[$i] = $_POST['bk_author_lastname'. $i];
}
/
*/

//DEBUG
//echo $bk_id;
//print_r($bk_author_id);
//print_r($bk_author_firstname);
//print_r($bk_author_lastname);

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

if (isset($_FILES['bk_cover'])) {
    if ($_FILES['bk_cover']['error']!=0) {
       echo '<script>alert("No image inserted, uploading without image");</script>'; //previousy showed error when no image uploaded
    }
    //$title = titleGen(); scrapped idea. refer top
    $tmp = $_FILES['bk_cover']['tmp_name'];
    $dst = 'assets/bk_cover/'. $bk_id .'.jpg';
    move_uploaded_file($tmp, $dst);
}

$bk_summary = mysqli_real_escape_string($conn1, $_POST['bk_summary']);

//Step 3 - Execute the query
//[book_t]
/*$sql = "INSERT INTO book_t (bk_title, bk_genre, bk_cover, bk_summary, bk_quantity, bk_serialno, bk_priority, bk_publisher, bk_publish_date)
        VALUES ('". $bk_title ."', '". $bk_genre ."', '". $_POST['bk_title'] .".jpg', '". $bk_summary ."', '". $bk_quantity ."', '". $bk_serialno ."', '". $bk_priority ."', '". $bk_publisher ."', '". $bk_publish_date ."')";
*/
//SQL TO UPDATE THE SAME BOOK RECORD
$sql = 'UPDATE book_t SET bk_title = "' . $bk_title . '",
                          bk_genre = "' . $bk_genre . '",
                          bk_cover = "' . $bk_id . '.jpg",
                          bk_summary = "' . $bk_summary . '",
                          bk_quantity = "' . $bk_quantity . '",
                          bk_serialno = "' . $bk_serialno . '",
                          bk_priority = "' . $bk_priority . '",
                          bk_publisher = "' . $bk_publisher. '",
                          bk_publish_date = "' . $bk_publish_date . '"
        WHERE bk_id = "' . $bk_id . '"'; //HAVE TO CHANGE THIS TO GET[] INSTEAD ONCE READY

//DEBUG
//print($sql);
mysqli_query($conn1, $sql); //COMMENTED FOR DEBUGGING

/*$sqlAuthor = 'UPDATE book_author_t SET bk_author_firstname = "' . . '",
                                       bk_author_lastname = "' . . '"
              WHERE bk_id = "' . . '"';*/

//[book_author_t]
//Extra Book Authors
$bk_author_id = [];
$bk_author_firstname = [];
$bk_author_lastname = [];

/*DEPRECATED
//get bk_id
$sqlBK_ID = "SELECT bk_id
             FROM book_t
             ORDER BY bk_id DESC LIMIT 1";
*/

//$lastBK_ID = mysqli_query($conn1, $sqlBK_ID);
//$latestBK_ID = mysqli_fetch_array($lastBK_ID);

//DEBUG
//print_r($authorCount);
//print_r($_POST['bk_author_quantity']);

//THIS BLOCK IS TO HANDLE AUTHOR UPDATE CHECKED AGAINST THE PREVIOUS NUMBER OF AUTHORS authorCount 
//THE FIRST IF INDICATES THAT THERE ARE NO CHANGES IN NUMBER OF AUTHOR BUT THE INFORMATION MAY HAVE CHANGED
//THE SECOND IF REQUIRES EXPLICIT SEARCH FOR ADDITION OR REMOVAL OF AUTHORS AND PERFORM INSERT INTO/DELETE FROM ACCORDINGLY

//Just delete all the book authors & add them again
$sqlAuthor = 'DELETE FROM book_author_t WHERE bk_id =' . $bk_id;
mysqli_query($conn1,$sqlAuthor);

    if ($_POST['bk_author_quantity'] == 1)
    {
        $bk_author_firstname[0] = $_POST['bk_author_firstname1'];
        $bk_author_lastname[0] = $_POST['bk_author_lastname1'];

        $sqlAuthor = "INSERT INTO book_author_t (bk_author_firstname, bk_author_lastname, bk_id)
                      VALUES ('". $bk_author_firstname[0] ."', '". $bk_author_lastname[0] ."', '". $_POST['bk_id'] ."')";
        mysqli_query($conn1, $sqlAuthor);
    }
    else
    {
        //UPDATE MULTIPLE ROWS
        for($i=1; $i<=$_POST['bk_author_quantity']; $i++){
            $bk_author_firstname[$i] = $_POST['bk_author_firstname'. $i];
            $bk_author_lastname[$i] = $_POST['bk_author_lastname'. $i];

            $sqlAuthor = "INSERT INTO book_author_t (bk_author_firstname, bk_author_lastname, bk_id)
            VALUES ('". $bk_author_firstname[$i] ."', '". $bk_author_lastname[$i] ."', '". $_POST['bk_id'] ."')";
            mysqli_query($conn1, $sqlAuthor);
        }
    }

    echo '<script>window.location.href= "book-details.php?bk_id='. $_POST['bk_id'] .'";</script>';

/*
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
*/
?>