<?php

//W-What are you doing here, step-sis! This is editBook.php's back-end.
//I am here to fix what you didn't

//Connection to Database
include("conn1.php"); //link conn.php info here

//TODO: Create a feature to load a specific book into the fields via book id

//FOR DEBUG PURPOSE: CUSTOM BOOK ID
$bk_id = $_GET['bk_id'];
$bk_idf = sprintf('%05d', $bk_id);

$sqlBook = 'SELECT * FROM book_t WHERE bk_id = ' . $bk_id;  
$sqlAuthor = 'SELECT * FROM book_author_t WHERE bk_id =' . $bk_id;

$fetchBook = mysqli_query($conn1, $sqlBook);
$fetchAuthor = mysqli_query($conn1, $sqlAuthor);

//This code might not be necessary once viewBook.php is implemented

if (mysqli_num_rows($fetchBook) <= 0 && mysqli_num_rows($fetchAuthor) <= 0)
{
	echo '<script>alert("A problem occurred while fetching the book information. Please try again later.");</script>';
	//For debugging purpose: redirects to google.com
    die('<script>window.location.href = "https://www.google.com";</script>');

}

$bookInfo = array();

//Mapping fetched rows into an associative array container
$bookRow = mysqli_fetch_assoc($fetchBook);

$bk_title = $bookRow['bk_title'];
$bk_genre = $bookRow['bk_genre'];
$bk_cover = $bookRow['bk_cover'];
$bk_summary = $bookRow['bk_summary'];
$bk_quantity = $bookRow['bk_quantity'];
$bk_serialno = $bookRow['bk_serialno'];
$bk_priority = $bookRow['bk_priority'];
$bk_publisher = $bookRow['bk_publisher'];
$bk_publish_date = $bookRow['bk_publish_date'];

//Number of author store
$authorNum = 0;

//Incrementor for author rowA loader
$inc = 0;

//Declaring array to store multiple authors info
$bk_author_id = array();
$bk_author_firstname = array();
$bk_author_lastname = array();

//This code is to handle multiple author's row count in front end

$amountAuthor = mysqli_num_rows($fetchAuthor); 

//Check if there are multiple rows of authors
//This is to inform the system that there are multiple actors for the same book

if (mysqli_num_rows($fetchAuthor) != 1)
{
	$manyAuthor = true;
	while ($authorRow = mysqli_fetch_assoc($fetchAuthor))
	{
		$authorNum++;
		$rowA[] = $authorRow;
	}
	foreach($rowA as $row){
		$bk_author_id[$inc] = $row['bk_author_id'];
		$bk_author_firstname[$inc] = $row['bk_author_firstname'];
		$bk_author_lastname[$inc] = $row['bk_author_lastname'];
		$inc++;
	}
}
else
{
	$manyAuthor = false;
	$authorNum = 1;
	$authorRow = mysqli_fetch_assoc($fetchAuthor);
	$bk_author_id[0] = $authorRow['bk_author_id'];
	$bk_author_firstname[0] = $authorRow['bk_author_firstname'];
	$bk_author_lastname[0] = $authorRow['bk_author_lastname'];
}

mysqli_close($conn1);

?>