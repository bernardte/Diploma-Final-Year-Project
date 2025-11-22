<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Seat</title>
    <link rel="stylesheet" href="CSS/Movie_seat.css">
</head>
<body>
    <?php
    session_start();
    include 'dbh.inc.php';

    // Check if usersUid is set in the session or is empty.
    if (!isset($_SESSION['useruid']) || empty($_SESSION['useruid'])) {
        echo "Session variable usersUid is not set.";
        header("location: ../Login.php");
        exit();
    }

    // Retrieve usersId from the database
    if (isset($_SESSION['useruid'])) {
        $usersUid = $_SESSION['useruid'];

        function getUsersId($conn, $usersUid) {
            $sql = "SELECT usersId FROM customers WHERE usersUid = ?";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                echo "Prepare statement error: " . $conn->error;
                return null;
            }

            $stmt->bind_param("s", $usersUid);
            $stmt->execute();
            $stmt->bind_result($usersId);
            $stmt->fetch();
            $stmt->close();

            return $usersId;
        }

        $usersId = getUsersId($conn, $usersUid);

        if ($usersId == null) {
            echo "No usersId fetched!";
        }
    }
    ?>

    <input type="hidden" name="usersId" id="usersId" value="<?php echo isset($usersId) ? $usersId : ''; ?>" />

    <div class="movie-container">
        <!-- <h2>Starlight Cinema</h2>
        <label>Select a Movie:</label> -->
        <?php
        $movieTitle = $_POST['movie'];
        $price = $_POST['price'];
        $dateTime = $_POST['dateTime'];
        echo "<input type='hidden' id='movie' value='".$movieTitle."'/>";
        echo "<input type='hidden' id='price' value='".$price."'/>";
        echo "<input type='hidden' id='date' value='".$dateTime."'/>";
        ?>
        <!-- <select id="movie">
      
        </select> -->
        <!-- <select id="date">
            <option value="0">Please Select Date</option>
            <option value="12 Jul Sun">12 Jul Sun</option>
            <option value="13 Jul Mon">13 Jul Mon</option>
            <option value="14 Jul Tue">14 Jul Tue</option>
            <option value="15 Jul Wed">15 Jul Wed</option>
            <option value="16 Jul Thu">16 Jul Thu</option>
            <option value="17 Jul Fri">17 Jul Fri</option>
            <option value="18 Jul Sat">18 Jul Sat</option>
        </select> -->
    </div>

    <ul class="showcase">
        <li>
            <div class="seat"></div>
            <small>Available</small>
        </li>
        <li>
            <div class="seat selected"></div>
            <small>Selected</small>
        </li>
        <li>
            <div class="seat occupied"></div>
            <small>Occupied</small>
        </li>
    </ul>

    <div class="container">
      <div class="screen"></div>

      <div class="row-alphabet">
        <div>A</div>
        <div>B</div>
        <div>C</div>
        <div>D</div>
        <div>E</div>
        <div>F</div>
        <div>G</div>
        <div>H</div>
      </div>

      <div class="row-numbers">
        <div>1</div>
        <div>2</div>
        <div>3</div>
        <div>4</div>
        <div>5</div>
        <div>6</div>
        <div>7</div>
        <div>8</div>
      </div>

      <div class="row">
        <div class="seat" data-seat="A1"></div>
        <div class="seat" data-seat="A2"></div>
        <div class="seat" data-seat="A3"></div>
        <div class="seat" data-seat="A4"></div>
        <div class="seat" data-seat="A5"></div>
        <div class="seat" data-seat="A6"></div>
        <div class="seat" data-seat="A7"></div>
        <div class="seat" data-seat="A8"></div>
      </div>

      <div class="row">
        <div class="seat" data-seat="B1"></div>
        <div class="seat" data-seat="B2"></div>
        <div class="seat" data-seat="B3"></div>
        <div class="seat" data-seat="B4"></div>
        <div class="seat" data-seat="B5"></div>
        <div class="seat" data-seat="B6"></div>
        <div class="seat" data-seat="B7"></div>
        <div class="seat" data-seat="B8"></div>
      </div>

      <div class="row">
        <div class="seat" data-seat="C1"></div>
        <div class="seat" data-seat="C2"></div>
        <div class="seat" data-seat="C3"></div>
        <div class="seat" data-seat="C4"></div>
        <div class="seat" data-seat="C5"></div>
        <div class="seat" data-seat="C6"></div>
        <div class="seat" data-seat="C7"></div>
        <div class="seat" data-seat="C8"></div>
      </div>

      <div class="row">
        <div class="seat" data-seat="D1"></div>
        <div class="seat" data-seat="D2"></div>
        <div class="seat" data-seat="D3"></div>
        <div class="seat" data-seat="D4"></div>
        <div class="seat" data-seat="D5"></div>
        <div class="seat" data-seat="D6"></div>
        <div class="seat" data-seat="D7"></div>
        <div class="seat" data-seat="D8"></div>
      </div>

      <div class="row">
        <div class="seat" data-seat="E1"></div>
        <div class="seat" data-seat="E2"></div>
        <div class="seat" data-seat="E3"></div>
        <div class="seat" data-seat="E4"></div>
        <div class="seat" data-seat="E5"></div>
        <div class="seat" data-seat="E6"></div>
        <div class="seat" data-seat="E7"></div>
        <div class="seat" data-seat="E8"></div>
      </div>

      <div class="row">
        <div class="seat" data-seat="F1"></div>
        <div class="seat" data-seat="F2"></div>
        <div class="seat" data-seat="F3"></div>
        <div class="seat" data-seat="F4"></div>
        <div class="seat" data-seat="F5"></div>
        <div class="seat" data-seat="F6"></div>
        <div class="seat" data-seat="F7"></div>
        <div class="seat" data-seat="F8"></div>
      </div>

      <div class="row">
        <div class="seat" data-seat="G1"></div>
        <div class="seat" data-seat="G2"></div>
        <div class="seat" data-seat="G3"></div>
        <div class="seat" data-seat="G4"></div>
        <div class="seat" data-seat="G5"></div>
        <div class="seat" data-seat="G6"></div>
        <div class="seat" data-seat="G7"></div>
        <div class="seat" data-seat="G8"></div>
      </div>
      
      <div class="row">
        <div class="seat" data-seat="H1"></div>
        <div class="seat" data-seat="H2"></div>
        <div class="seat" data-seat="H3"></div>
        <div class="seat" data-seat="H4"></div>
        <div class="seat" data-seat="H5"></div>
        <div class="seat" data-seat="H6"></div>
        <div class="seat" data-seat="H7"></div>
        <div class="seat" data-seat="H8"></div>
      </div>
    </div>


    <p class="text">
        You have selected <span id="count">0</span> movies for price of RM
        <span id="total">0</span>
    </p>

    <div class="btn"> 
        <a href="Add_to_cart.php">Proceed</a>
    </div>

    <script src="JS/Movie_seat.js"></script>
</body>
</html>
