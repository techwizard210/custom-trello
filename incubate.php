<?php
// incubate.php

require_once 'db_connection.php'; // Add the database connection file

                       
    $usecase_id = $_POST['usecase_id_input']; 
    echo $usecase_id;
    echo $usecase_id;
    echo $usecase_id;

    // Update the database
    $sql = "UPDATE usecase SET UC_Status = 'Incubated' WHERE Usecase_ID = '$usecase_id'";


    if ($conn->query($sql) === TRUE) {
        echo 'Success: Use case ' . $usecase_id . ' has been incubated.';
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }
    
    $conn->close(); // Close the database connection

 
?>