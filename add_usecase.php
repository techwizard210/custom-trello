<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loe";
$ideaSN = $_POST['Idea_SN'];


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define variables and set to empty values
$solution_title = $department = $rol = $room = $starting_date = $ending_date = $uc_status = $remark = "";

// Process form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $solution_title = $_POST["Solution_Title"];
  $department = $_POST["Department"];
  $rol = $_POST["ROL"];
  $room = $_POST["Room"];
  $starting_date = $_POST["Starting_Date"];
  $ending_date = $_POST["Ending_Date"];
  $uc_status = $_POST["UC_Status"];
  $remark = $_POST["Remark"];
 
  session_start();

  // Get the variable
  //$idea_SN = $_SESSION['idea_SN'];
  echo "The value of ideaSN is: " . $ideaSN;
  // Calculate duration days and remaining days
  // $duration_days = round((strtotime($ending_date) - strtotime($starting_date)) / (60 * 60 * 24));
  // $remaining_days = round((strtotime($ending_date) - strtotime(date('Y-m-d'))) / (60 * 60 * 24));
  
  // Prepare SQL statement
  $sql = "INSERT INTO usecase (Solution_Title, Department, ROL, Room, Starting_Date, Ending_Date, UC_Status, Remark, Idea_SN)
          VALUES ('$solution_title', '$department', '$rol', '$room', '$starting_date', '$ending_date', '$uc_status', '$remark','$ideaSN')";

  // Execute SQL statement
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  // Close connection
  mysqli_close($conn);
}
?>