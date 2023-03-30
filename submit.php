<?php
$servername = "localhost";
$username = "root";
$password = "";
// $password = "Aramco@123";
$dbname = "loe";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Escape user inputs for security
$idea_title = mysqli_real_escape_string($conn, $_POST['title']);
$login_id = mysqli_real_escape_string($conn, $_POST['login']);
$problem_description = mysqli_real_escape_string($conn, $_POST['description']);
$solution_description = mysqli_real_escape_string($conn, $_POST['solution']);
$resources_requirement = mysqli_real_escape_string($conn, $_POST['resources']);

// Insert user inputs into database
$sql = "INSERT INTO idea_deck (Idea_Title, Login_ID, Problem_Description, Solution_Description, Resources_Requirement) 
        VALUES ('$idea_title', '$login_id', '$problem_description', '$solution_description', '$resources_requirement')";

if (mysqli_query($conn, $sql)) {
  echo "Record added successfully.";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
