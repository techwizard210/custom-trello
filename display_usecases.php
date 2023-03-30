<!DOCTYPE html>
<html>
<head>
	<title>Usecase Table</title>
    <style>
  /* Define table styles */
  table {
    font-family: Arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
td, th {
border: 1px solid #ddd;
text-align: left;
padding: 8px;
}

th {
background-color: #4CAF50;
color: white;
}

/* Define hover effect */
tr:hover {
background-color: #f5f5f5;
cursor: pointer;
}
</style>

<script>
// Add click event listener to table rows
document.addEventListener("DOMContentLoaded", function() {
  var rows = document.querySelectorAll(".usecase-row");
  rows.forEach(function(row) {
    row.addEventListener("click", function() {
      // Get Usecase ID and Solution Title from row
      var usecaseId = row.dataset.id;
      var solutionTitle = row.dataset.title;
      // Display popup window with information
      window.alert("Usecase ID: " + usecaseId + "\nSolution Title: " + solutionTitle);
    });
  });
});
</script>
</head>
<body>
	<table>
        <tr class="usecase-row" data-id="<?php echo $row['Usecase_ID']; ?>" data-title="<?php echo $row['Solution_Title']; ?>">
			<th>Usecase ID</th>
			<th>Solution Title</th>
			<th>Department</th>
			<th>ROI $</th>
			<th>Room</th>
			<th>Starting Date</th>
			<th>Ending Date</th>
			<th>Duration (Days)</th>
			<th>Remaining (Days)</th>
			<th>Status</th>
			<th>Remark</th>
			<th>Idea SN</th>
			<th>Startup ID</th>
		</tr>
		<?php
		// Connect to database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "loe";

		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Select data from table
		$sql = "SELECT * FROM usecase";
		$result = $conn->query($sql);

		// Output data in table
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["Usecase_ID"] . "</td>";
				echo "<td>" . $row["Solution_Title"] . "</td>";
				echo "<td>" . $row["Department"] . "</td>";
				echo "<td>" . $row["ROL"] . "</td>";
				echo "<td>" . $row["Room"] . "</td>";
				echo "<td>" . $row["Starting_Date"] . "</td>";
				echo "<td>" . $row["Ending_Date"] . "</td>";
				echo "<td>" . $row["Duration_in_days"] . "</td>";
				echo "<td>" . $row["Remaining_in_days"] . "</td>";
				echo "<td>" . $row["UC_Status"] . "</td>";
				echo "<td>" . $row["Remark"] . "</td>";
				echo "<td>" . $row["Idea_SN"] . "</td>";
				echo "<td>" . $row["startup_ID"] . "</td>";
				echo "</tr>";
			}
		} else {
			echo "<tr><td colspan='13'>No data found</td></tr>";
		}
        
        
		$conn->close();
		?>
	</table>
    
</body>
</html>
