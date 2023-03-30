<?php
// incubate.php
require_once 'db_connection.php'; // Add the database connection file

$usecase_id = $_POST['usecase_id']; 
    echo $usecase_id;
    echo $usecase_id;
    echo $usecase_id;
    // TODO: Add your code to update the database here

  
$sql = "UPDATE usecase SET UC_Status = 'Graduated' WHERE Usecase_ID = '$usecase_id'";

if ($conn->query($sql) === TRUE) {
    echo 'Success: Use case ' . $usecase_id . ' has been Graduated.';
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close(); 
?>

