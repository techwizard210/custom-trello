<!DOCTYPE html>
<html>
<head>
  <title>Idea Deck Table</title>
  
  <style>
  /*<ink rel="stylesheet" href="style2.css">*/
    /* Set the background color for the body */
body {
  background-color: #f8f8f8;
  

}

/* Set the font style for the header */
h1 {
  font-size: 36px;
  font-weight: bold;
  text-align: center;
  margin-top: 50px;
  color: #0171ce;
}

/* Set the font style for the table headers */
th {
  background-color: #1c1c1c;
  color: #fff;
  font-weight: bold;
  padding: 12px 15px;
  text-align: center;
}

/* Set the font style for the table cells */
td {
  background-color: #fff;
  color: #333;
  padding: 12px 15px;
  text-align: center;
}

/* Set the hover effect for the table rows */
tr:hover {
  background-color: #f2f2f2;
}

/* Set the modal style */
.modal {
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
  z-index: 1;
}

/* Set the modal content style */
.modal-content {
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
  padding: 20px;
  max-width: 600px;
  text-align: center;
}

/* Set the button style */
.button {
  background-color: #1c1c1c;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 15px;
  font-size: 16px;
  cursor: pointer;
  margin-top: 20px;
}

/* Set the close button style */
#closeModal {
  background-color: #ccc;
  color: #333;
  border: none;
  border-radius: 5px;
  padding: 10px 15px;
  font-size: 16px;
  cursor: pointer;
  margin-top: 20px;
}
/* CSS code for Idea Deck Table */
table#ideasTable {
  border-collapse: collapse;
  width: 80%;
  margin: auto;
  border: 2px solid black;
  border-radius: 900px; /* Add this line to round the corners */
}

#ideasTable th, #ideasTable td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

#ideasTable th {
  background-color: #4CAF50;
  color: white;
}
  </style>
</head>
<body>
  <h1>Idea Deck Table</h1>
  <table  id="ideasTable">
    <tr>
      <th>Idea SN</th>
      <th>Idea Title</th>
      <th>Login ID</th>
      <th>Problem Description</th>
      <th>Solution Description</th>
      <th>Resources Requirement</th>
    </tr>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "loe";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch all data from idea_deck table
    $sql = "SELECT * FROM idea_deck";
    $result = $conn->query($sql);

    // Display the fetched data in a table format
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr id='" . $row["Idea_SN"] . "'><td>" . $row["Idea_SN"]. "</td><td>" . $row["Idea_Title"]. "</td><td>" . $row["Login_ID"]. "</td><td>" . $row["Problem_Description"]. "</td><td>" . $row["Solution_Description"]. "</td><td>" . $row["Resources_Requirement"]. "</td></tr>";
      }
    } else {
      echo "<tr><td colspan='6'>0 results</td></tr>";
    }

    // Close connection
    $conn->close();
  //  session_start();

    // Set the variable
   // $_SESSION['idea_SN'] = $row;
    ?>
  </table>

  <!-- JavaScript code to handle the click event and display the popup modal -->
  <script>
    // Function to create and display the popup modal
    function displayPopupModal(ideaSN) {
     // Create the modal element
    const modal = document.createElement('div');
    modal.classList.add('modal');

    // Create the modal content
    const modalContent = document.createElement('div');
    modalContent.classList.add('modal-content');
    modalContent.innerHTML = `
      <h2>${ideaSN}</h2>
      
      <p>To add this idea as a Use case click    <form action="addUseCase.html?Idea_SN=${ideaSN}" method="post">
      <button type="submit" class="button">Add UseCase</button>
      </form>
      
      <button id="closeModal">Close</button>
      
    `;

    // Add the modal content to the modal element
    modal.appendChild(modalContent);

    // Add the modal element to the page
    document.body.appendChild(modal);

    // Add event listener to close the modal when clicked outside of it
    modal.addEventListener('click', (event) => {
      if (event.target === modal) {
        closeModal();
      }
    });

    // Add event listener to close the modal when close button is clicked
    const closeButton = modal.querySelector('#closeModal');
    closeButton.addEventListener('click', closeModal);

    // Function to close the modal
    function closeModal() {
      document.body.removeChild(modal);
    }
  }

  // Get the table element
  const table = document.getElementById('ideasTable');

  // Add a click event listener to the table
  table.addEventListener('click', (event) => {
    // Get the clicked row
    const clickedRow = event.target.closest('tr');

    // Get the Idea SN of the clicked row
    const ideaSN = clickedRow.querySelector('td:first-child').textContent;

    // Call a function to create and display the popup modal
    displayPopupModal(ideaSN);
  });
</script>
</body>
</html>