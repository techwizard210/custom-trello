<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="itloe.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body
  style="background: linear-gradient(to bottom right, #3b3a78 21%, #b94d98 100%); height: 100vh; position: relative; margin-top: 100px">
  <div class="con">
    <div class="column-wrapper">
      <div class="column">
        <div class="title-wrapper">
          <div>
            <h1>Screaning</h1>
            <!-- <span class="glyphicon glyphicon-option-horizontal" style="font-size:"></span> -->
          </div>
          <span class="count-num"></span>
        </div>

        <h6>ideas</h6>
        <div class="list">
          <?php
          require_once 'db_connection.php';

          // Query the database for all ideas
          $sql = "SELECT Idea_SN, Idea_Title FROM idea_deck";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Output each idea as a draggable item
            while ($row = $result->fetch_assoc()) {
              $idea_title = $row["Idea_Title"];
              $idea_sn = $row["Idea_SN"];
              echo '<div class="item" draggable="true" data-idea-sn="' . $idea_sn . '"><span class="red-text">' . $idea_sn . '</span>' . $idea_title . '</div>';
            }
          } else {
            echo "No ideas found.";
          }
          ?>
        </div>
      </div>
    </div>
    <div class="column-wrapper">
      <div class="column" style="background: #d199e9">
        <div class="title-wrapper">
          <h1>Selected</h1>
          <span class="count-num"></span>
        </div>
        <h6>Use Cases</h6>
        <div class="list">
          <?php
          require_once 'db_connection.php';

          // Query the database for all use cases
          $sql = "SELECT Usecase_ID, Solution_Title, Idea_SN FROM usecase WHERE UC_Status = 'Selected'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Output each use case as a draggable item
            while ($row = $result->fetch_assoc()) {
              $usecase_title = $row["Solution_Title"];
              $usecase_id = $row["Usecase_ID"];
              $idea_sn = $row["Idea_SN"];
              echo '<div class="item selected" draggable="true" data-usecase-id="' . $usecase_id . '"><span class="red-text">' . $usecase_id . '</span>' . $usecase_title . '</div>';
            }
          } else {
            echo "No use cases found.";
          }


          ?>
        </div>

      </div>
    </div>
    <div class="column-wrapper">
      <div class="column" style="background: #a4dda3">
        <div class="title-wrapper">
          <h1>Selected Rank</h1>
          <span class="count-num"></span>
        </div>
        <h6>Use Cases Rank</h6>
        <div class="list">
          <?php
          require_once 'db_connection.php';

          // Query the database for all use cases
          $sql = "SELECT Usecase_ID, Solution_Title, Score FROM evaluation ORDER BY Score DESC ";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Output each use case as a draggable item
            while ($row = $result->fetch_assoc()) {
              $solution_title = $row["Solution_Title"];
              $usecase_id = $row["Usecase_ID"];
              $score = $row["Score"];

              echo '<div class="item ranked" draggable="true" data-ranked-usecase-id="' . $usecase_id . '"><span class="red-text"> ' . $score . '</span>' . $solution_title . '   </div>';
            }
          } else {
            echo "No use cases have been ranked.";
          }


          ?>
        </div>
      </div>
    </div>
    <div class="column-wrapper">
      <div class="column" style="background: #9695f3">
        <div class="title-wrapper" style="margin-bottom: 20px">
          <h1>Incubated</h1>
          <span class="count-num"></span>
        </div>
        <div class="list">
          <?php
          require_once 'db_connection.php';

          // Query the database for all use cases
          $sql = "SELECT * FROM usecase WHERE UC_Status = 'Incubated'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Output each use case as a draggable item
            while ($row = $result->fetch_assoc()) {
              $usecase_id = $row["Usecase_ID"];
              $usecase_title = $row["Solution_Title"];
              $department = $row["Department"];
              $rol = $row["ROL"];
              $room = $row["Room"];
              $starting_date = $row["Starting_Date"];
              $ending_date = $row["Ending_Date"];
              $duration_in_days = $row["Duration_in_days"];
              $remaining_in_days = $row["Remaining_in_days"];
              $us_status = $row["UC_Status"];
              $remark = $row["Remark"];
              $idea_sn = $row["Idea_SN"];
              $startup_id = $row["startup_ID"];

              echo '<div class="item Incubated" draggable="true" data-usecase-ranked-id="' . $usecase_id . '"><span class="red-text"> ' . $usecase_id . '</span>' . $usecase_title . '   </div>';
            }
          } else {
            echo "No Incubated use cases have been found.";
          }


          ?>
        </div>
      </div>
    </div>
    <div class="column-wrapper">
      <div class="column" style="background: #f99d9d">
        <div class="title-wrapper" style="margin-bottom: 20px">
          <h1>Graduated</h1>
          <span class="count-num"></span>
        </div>
        <div class="list">
          <?php
          require_once 'db_connection.php';

          // Query the database for all use cases
          $sql = "SELECT * FROM usecase WHERE UC_Status = 'Graduated'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Output each use case as a draggable item
            while ($row = $result->fetch_assoc()) {
              $usecase_id = $row["Usecase_ID"];
              $usecase_title = $row["Solution_Title"];
              $department = $row["Department"];
              $rol = $row["ROL"];
              $room = $row["Room"];
              $starting_date = $row["Starting_Date"];
              $ending_date = $row["Ending_Date"];
              $duration_in_days = $row["Duration_in_days"];
              $remaining_in_days = $row["Remaining_in_days"];
              $us_status = $row["UC_Status"];
              $remark = $row["Remark"];
              $idea_sn = $row["Idea_SN"];
              $startup_id = $row["startup_ID"];

              echo '<div class="item Graduated" draggable="true" data-usecase-Graduated-id="' . $usecase_id . '"><span class="red-text"> ' . $usecase_id . '</span>' . $usecase_title . '    </div>';
            }
          } else {
            echo "No Graduated use cases have been found.";
          }

          $conn->close();
          ?>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="modal">
    <link rel="stylesheet" type="text/css" href="popup2.css">
    <div class="modal-content animate">
      <h2>Use Case Title : <span id="usecase_title"></span></h2>
      <h3>Use Case ID : <span id="usecase_id"></span></h3>
      <h2 style="font-size: 23px">Please rank the use case </h2>
      <title>Ranking Form</title>

      <div class="pop-form-container">
        <form method="post" action="submit_ranking.php" style="margin-bottom: 10px">
          <input type="hidden" name="usecase_id" value="" id="usecase_id_input">
          <input type="hidden" name="usecase_title" value="" id="usecase_title_input">
          <label for="business_opportunity">Business Opportunity:</label>
          <select id="business_opportunity" name="business_opportunity" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>

          <label for="market_potential">Market Potential:</label>
          <select id="market_potential" name="market_potential" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>

          <label for="scalability">Scalability:</label>
          <select id="scalability" name="scalability" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>

          <label for="technical_feasibility">Technical Feasibility:</label>
          <select id="technical_feasibility" name="technical_feasibility" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>

          <label for="roi">ROI:</label>
          <select id="roi" name="roi" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>

          <input type="submit" value="Submit">
        </form>
      </div>
      <div class="modal-btn">
        <button class="button close-button">close </button>
      </div>
    </div>
  </div>

  <div class="modal-2" id="modal-2">
    <link rel="stylesheet" type="text/css" href="popup1.css">
    <div class="modal-content animate">
      <h2>Idea Title : <span id="idea-title"></span></h2>
      <h3>Idea SN : <span id="idea-sn"></span></h3>
      <p>If you want to add this idea as a use case, please click <a href="#" id="usecase-link">HERE</a></p>
      <div class="modal-btn">
        <button class="button close-button2">close </button>
      </div>
    </div>
  </div>

  <div class="modal-3" id="modal-3">
    <div class="modal-content animate">
      <title>Incubate this Use Case by clicking here</title>
      <link rel="stylesheet" type="text/css" href="popup3.css">
      <h2>Use Case Title : <span id="usecase_title"></span></h2>
      <h3>Use Case ID : <span id="usecase_id"></span></h3>

      <form method="post" action="incubate.php" style="margin-bottom: 10px">
        <input type="hidden" name="usecase_id_input" value="" id="usecase_id_input">
        <input type="submit" value="Incubate">
      </form>
      <div class="modal-btn">
        <button class="button close-button3">close </button>
      </div>
    </div>
  </div>

  <div class="modal-4" id="modal-4">
    <div class="modal-content animate">
      <title>Graduate this Use Case by clicking here</title>
      <link rel="stylesheet" type="text/css" href="popup4.css">
      <h2>Use Case Title : <span id="usecase_title"></span></h2>
      <h3>Use Case ID : <span id="usecase_id"></span></h3>
      <form method="post" action="Graduate.php" style="margin-bottom: 10px">
        <input type="hidden" name="usecase_id" value="" id="usecase_id_input">
        <input type="submit" value="Graduate">
      </form>
      <div class="modal-btn">
        <button class="button close-button4">close </button>
      </div>
    </div>
  </div>
  <style>
    .animate {
      -webkit-animation: animatezoom 0.3s;
      animation: animatezoom 0.3s
    }

    @-webkit-keyframes animatezoom {
      from {
        -webkit-transform: scale(0)
      }

      to {
        -webkit-transform: scale(1)
      }
    }

    @keyframes animatezoom {
      from {
        transform: scale(0)
      }

      to {
        transform: scale(1)
      }
    }
  </style>
  <script>
    // Define the columns, items, and counts as arrays
    const modal = document.querySelector('#modal');
    const modal2 = document.querySelector('#modal-2');
    const modal3 = document.querySelector('#modal-3');
    const modal4 = document.querySelector('#modal-4');
    const closeModal = document.querySelector('.close-button');
    const closeModal2 = document.querySelector('.close-button2');
    const closeModal3 = document.querySelector('.close-button3');
    const closeModal4 = document.querySelector('.close-button4');
    const columns = document.querySelectorAll('.list');
    const items = document.querySelectorAll('.item');
    const counts = document.querySelectorAll('.title-wrapper');

    // Add event listeners to the items
    items.forEach(item => {
      item.addEventListener('dragstart', dragStart);
      item.addEventListener('dragend', dragEnd);
      item.addEventListener('click', (e) => {
        openModalFunction(e.target); // Pass the target element to the function
      });
      // item.addEventListener('onmousedown', mouseDown);
      // item.addEventListener('onmouseUp', mouseUp);
    });

    // Add event listeners to the columns
    columns.forEach(column => {
      column.addEventListener('dragover', dragOver);
      column.addEventListener('dragenter', dragEnter);
      column.addEventListener('dragleave', dragLeave);
      column.addEventListener('drop', dragDrop);
    });

    // Modify the openModalFunction
    function openModalFunction(target) {
      const parentColumn = target.closest('.column');
      const parentColumnTitle = parentColumn.querySelector('h1').textContent;

      if (parentColumnTitle === 'Screaning') {
        const ideaSn = target.dataset.ideaSn; // Get the value of data-idea-sn
        const ideaText = target.textContent.trim(); // Get the text content of the item
        const ideaTitle = ideaText.split(ideaSn)[0].trim(); // Extract the idea title
        const ideaSnSpan = document.querySelector('#idea-sn');
        const ideaTitleSpan = document.querySelector('#idea-title');
        ideaSnSpan.textContent = ideaSn; // Set the idea_sn value in the modal
        ideaTitleSpan.textContent = ideaTitle; // Set the idea_title value in the modal
        const usecaseLink = document.querySelector('#usecase-link');
        usecaseLink.href = `addUseCase.html?ideaSn=${ideaSn}`;

        modal2.style.display = 'block';
      } else if (parentColumnTitle === 'Selected') {
        const usecaseId = target.dataset.usecaseId; // Get the value of data-usecase-id
        const usecaseText = target.textContent.trim(); // Get the text content of the item
        const usecaseTitle = usecaseText.split(usecaseId)[0]; // Extract the use case title
        const usecaseIdSpan = document.querySelector('#usecase_id');
        const usecaseTitleSpan = document.querySelector('#usecase_title');
        usecaseIdSpan.textContent = usecaseId; // Set the usecase_id value in the modal
        usecaseTitleSpan.textContent = usecaseTitle; // Set the usecase_title value in the modal

        const usecaseIdInput = document.querySelector('#usecase_id_input');
        const usecaseTitleInput = document.querySelector('#usecase_title_input');
        usecaseIdInput.value = usecaseId; // Set the usecase_id value in the hidden input
        usecaseTitleInput.value = usecaseTitle; // Set the usecase_title value in the hidden input

        modal.style.transition = 'all 2s ease-out';
        modal.style.display = 'block';
      } else if (parentColumnTitle === 'Selected Rank') {
        const usecaseId = target.dataset.rankedUsecaseId; // Get the value of data-ranked-usecase-id
        const usecaseText = target.textContent.trim(); // Get the text content of the item
        const usecaseTitle = usecaseText.split(usecaseId)[0].trim(); // Extract the use case title
        const usecaseIdSpan = document.querySelector('#modal-3 #usecase_id');
        const usecaseTitleSpan = document.querySelector('#modal-3 #usecase_title');
        usecaseIdSpan.textContent = usecaseId; // Set the usecase_id value in the modal
        usecaseTitleSpan.textContent = usecaseTitle; // Set the usecase_title value in the modal

        const usecaseIdInput = document.querySelector('#modal-3 #usecase_id_input'); // Add this line
        usecaseIdInput.value = usecaseId; // Set the usecase_id value in the hidden input // Add this line

        modal3.style.transition = 'all 2s ease-out';
        modal3.style.display = 'block';
      } else if (parentColumnTitle === 'Incubated') {
        const usecaseId = target.dataset.usecaseRankedId; // Get the value of data-usecase-incubated-id
        const usecaseText = target.textContent.trim(); // Get the text content of the item
        const usecaseTitle = usecaseText.split(usecaseId)[0].trim(); // Extract the use case title
        const usecaseIdSpan = document.querySelector('#modal-4 #usecase_id');
        const usecaseTitleSpan = document.querySelector('#modal-4 #usecase_title');
        usecaseIdSpan.textContent = usecaseId; // Set the usecase_id value in the modal
        usecaseTitleSpan.textContent = usecaseTitle; // Set the usecase_title value in the modal

        const usecaseIdInput = document.querySelector('#modal-4 #usecase_id_input'); // Add this line
        usecaseIdInput.value = usecaseId; // Set the usecase_id value in the hidden input // Add this line
        modal4.style.transition = 'all 2s ease-out';
        modal4.style.display = 'block';

      }
    }
    // Add event listener to close button
    closeModal.addEventListener('click', () => {
      modal.style.display = 'none';
    });

    // Add event listener to close button 2
    closeModal2.addEventListener('click', () => {
      modal2.style.display = 'none';
    });

    // Add event listener to close button 3
    closeModal3.addEventListener('click', () => {
      modal3.style.display = 'none';
    });

    // Add event listener to close button 4
    closeModal4.addEventListener('click', () => {
      modal4.style.display = 'none';
    });

    window.onclick = function (event) {
      if (event.target == modal)
        modal.style.display = 'none';
      if (event.target == modal2)
        modal2.style.display = 'none';
      if (event.target == modal3)
        modal3.style.display = 'none';
      if (event.target == modal4)
        modal4.style.display = 'none';
    }

    // Define the drag and drop functions
    let dragItem = null;
    function dragStart() {
      dragItem = this;
      setTimeout(() => this.classList.add('invisible'), 0);
    }

    function dragEnd() {
      this.classList.remove('invisible');
      dragItem = null;
    }

    function dragOver(e) {
      e.preventDefault();
      this.classList.add('drag-over');
    }

    function dragEnter(e) {
      e.preventDefault();
      this.classList.add('drag-over');
    }

    function dragLeave() {
      this.classList.remove('drag-over');
    }

    function dragDrop() {
      this.classList.remove('drag-over');
      this.appendChild(dragItem);

      updateCounts();
    }

    // Define the updateCounts function
    function updateCounts() {
      counts.forEach(count => {
        const column = count.parentElement;
        const countValue = column.querySelectorAll('.item').length;
        count.children[1].innerHTML = countValue;
      });
    }

    // Call the updateCounts function to initialize the count
    updateCounts();

  </script>
</body>

</html>