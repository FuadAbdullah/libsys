<?php

//Step 1 - Establish Connection
//Step 2 - Handling Connection error
include('conn1.php');

$br_id = $_POST['br_id'];
$br_fine = $_POST['br_fine'];

// To check if feedback is provided or not
if ($_POST['br_feedback'] == "Write the feedback here." || $_POST['br_feedback'] == ""){
    $br_feedback = "No feedback provided.";
} else {
    $br_feedback = $_POST['br_feedback'];
}

// To get today's date as return date
$return_date = date("Y-m-d");

$sql = 'UPDATE borrowing_t SET br_returning_date = "' . $return_date . '",
                        br_feedback = "' . $br_feedback . '",
                        br_fine = "' . $br_fine . '"
                        WHERE br_id = "' . $br_id . '"';

mysqli_query($conn1, $sql); //COMMENTED FOR DEBUGGING

echo '<script>alert("Book has been returned successfully!");</script>';

echo '<script>window.location.href="viewBorrowing.php";</script>';

?>