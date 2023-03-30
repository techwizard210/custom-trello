<?php

//  database connection 
require_once 'db_connection.php';

// Get the form data
$usecase_id = $_POST['usecase_id'];
$solution_title = $_POST['usecase_title'];
$business_opportunity = $_POST['business_opportunity'];
$market_potential = $_POST['market_potential'];
$scalability = $_POST['scalability'];
$technical_feasibility = $_POST['technical_feasibility'];
$roi = $_POST['roi'];

echo $usecase_id;
echo $solution_title;
echo $business_opportunity;
echo $market_potential;
echo $scalability;
echo $technical_feasibility;
echo $roi;

// Prepare the SQL statement to insert the data
$sql = "INSERT INTO evaluation (Usecase_ID, Solution_Title, Businees_Opportunity, Market_Potential, Scalability, Technical_Feasibility, ROI) VALUES ($usecase_id,'$solution_title','$business_opportunity','$market_potential','$scalability','$technical_feasibility','$roi')";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
mysqli_close($conn);

?>