<?php

include('conn1.php');

//GET the id of the book which is going to be deleted
//AUTHOR INFOS CAN BE FETCHED FROM THE BOOK ID

//DEBUG
$bk_id = $_GET['bk_id'];

//QUERY FOR BOOK DELETION
$sqlBook = 'DELETE FROM book_t WHERE bk_id = ' . $bk_id;

//FETCHING AUTHOR IDS FOR DELETION
$tempAuthor = mysqli_query($conn1, 'SELECT bk_author_id FROM book_author_t WHERE bk_id = ' . $bk_id);

//INCREMENTOR FOR AUTHOR ID ASSIGNMENT TO INDEXED ARRAY
$i = 0;

//CREATION OF AUTHOR ID INDEXED ARRAY TO STORE THE ASSIGNMENTS
$authorID = [];

//MAPPING EACH FETCHED AUTHOR IDS TO A READABLE INDEX ARRAY
//THEN DELETE THE RECORD STRAIGHTAWAY
while ($authorRow = mysqli_fetch_assoc($tempAuthor))
{
	$authorID[$i] = $authorRow['bk_author_id'];
	$sqlAuthor = 'DELETE FROM book_author_t WHERE bk_author_id = ' . $authorID[$i];
	mysqli_query($conn1, $sqlAuthor);
	$i++;
}	

//DELETING THE BOOK RECORD
mysqli_query($conn1, $sqlBook);

//CHECK IF THE SELECTED ROWS ARE DELETED
if (mysqli_affected_rows($conn1) < 0)
{
	echo '<script>alert("Failed to delete the book! Reloading page...");</script>';
	echo '<script>window.history.back();</script>';
}
else
{
	echo '<script>alert("Book is deleted! Redirecting to Catalogue...");</script>';
	echo '<script>window.location.href= "catalogue.php";</script>';
}




?>