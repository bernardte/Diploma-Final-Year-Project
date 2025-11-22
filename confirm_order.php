<?php
session_start();
include 'dbh.inc.php'; // Include your database connection file

// Redirect to login page if useruid is not set in session
if (!isset($_SESSION['useruid'])) {
    header("Location: login.php");
    exit();
}

$usersUid = $_SESSION['useruid'];

// Initialize variables to avoid undefined errors
$movieImage = "";
$movieTitle = "";
$category = "";
$duration = "";
$dateString = "";
$hall = "";
$seats = [];

$usersUid = $_SESSION['useruid'];

// Query to retrieve userId from customers table
$sql = "SELECT usersId FROM customers WHERE usersUid = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $usersUid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result || mysqli_num_rows($result) <= 0) {
    die("Error: Unable to retrieve userId from session or database. " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
$userId = $row['usersId'];

// Check if userId exists in bookings table
$sql = "SELECT * FROM bookings WHERE userId = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result || mysqli_num_rows($result) <= 0) {
    // If no bookings for userId, insert initial entry
    $initialInsertSql = "INSERT INTO bookings (userId, totalSeatSelectionPrice, totalPrice) VALUES (?, 0, 0)";
    $initialInsertStmt = mysqli_prepare($conn, $initialInsertSql);
    mysqli_stmt_bind_param($initialInsertStmt, "i", $userId);
    
    if (!mysqli_stmt_execute($initialInsertStmt)) {
        die("Error: Unable to insert initial booking entry. " . mysqli_error($conn));
    }
    mysqli_stmt_close($initialInsertStmt);
}

// Retrieve movie and seat details if booking exists
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    // Retrieve necessary details
    $movieTitle = $row['movieTitle'];
    $date = $row['date'];
    $seatPrice = $row['totalSeatSelectionPrice'];
    
    // Check if seats are retrieved and decode them if not empty
    if (!empty($row['seats'])) {
        $seats = json_decode($row['seats'], true);
    }
    $numberOfSeats = count($seats);
    $totalSeatSelectionPrice = $row['totalSeatSelectionPrice'] / $numberOfSeats;
    $dateString = explode(",", $date);

    // Query to retrieve hall from show_time table based on movieTitle
    $query_hall = "SELECT * FROM show_time WHERE name = ?";
    $query_stmt = mysqli_prepare($conn, $query_hall);
    mysqli_stmt_bind_param($query_stmt, "s", $movieTitle);
    mysqli_stmt_execute($query_stmt);
    $query_result = mysqli_stmt_get_result($query_stmt);
    $hall_row = mysqli_fetch_assoc($query_result);

    if ($hall_row) {
        $hall = $hall_row["hall"];
    } else {
        die("Error: Hall information not found.");
    }
    mysqli_stmt_close($query_stmt);
}

// Calculate total price including seats and food items
$totalPrice = $seatPrice; // Initialize total price with seat price

// Query to retrieve image, category, and duration from now_showing_movie table based on totalSeatSelectionPrice
$sql = "SELECT * FROM now_showing_movie WHERE price = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "d", $totalSeatSelectionPrice);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $movieImage = $row['image'];
    $category = $row['category'];
    $duration = $row['duration'];
} else {
    die("Error: No movie details found for the specified price.");
}
mysqli_stmt_close($stmt);

// Retrieve cart items for the user
$cartItems = [];
$cartSql = "SELECT cart_id, cart_items FROM cart WHERE usersId = ?";
$cartStmt = mysqli_prepare($conn, $cartSql);
mysqli_stmt_bind_param($cartStmt, "i", $userId);
mysqli_stmt_execute($cartStmt);
$cartResult = mysqli_stmt_get_result($cartStmt);

if ($cartResult && mysqli_num_rows($cartResult) > 0) {
    $cartRow = mysqli_fetch_assoc($cartResult);
    $cartId = $cartRow['cart_id'];
    $cartItems = json_decode($cartRow['cart_items'], true);

    // Calculate total price of food items in cart
    foreach ($cartItems as $item) {
        $totalPrice += ($item['price'] * $item['quantity']); // Add each item's price multiplied by quantity to total price
    }

    // Update final booking entry with cart_id and totalPrice
    if ($cartId) {
        $finalUpdateSql = "UPDATE bookings SET cart_id = ?, totalPrice = ?, hall = ? WHERE userId = ?";
        $finalUpdateStmt = mysqli_prepare($conn, $finalUpdateSql);
        mysqli_stmt_bind_param($finalUpdateStmt, "idis", $cartId, $totalPrice, $hall, $userId);
        
        if (!mysqli_stmt_execute($finalUpdateStmt)) {
            die("Error: Unable to update final booking entry. " . mysqli_error($conn));
        }
        mysqli_stmt_close($finalUpdateStmt);
    } else {
        die("Error: No cart found for the user.");
    }
} else {
    die("Error: Unable to retrieve cart items for the user.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starlight Cinema</title>
    <link rel="stylesheet" href="CSS/confirm_order.css">
    <!-- Access to Awesome Icons website -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section>
        <img src='Image/<?php echo $movieImage ?>' alt='<?php echo $movieTitle ?>' class='movie-image' />
        <div class='movie-details'>
            <h1 class='movie-title'><?php echo $movieTitle ?></h1>
            <div class='label'>
                <span><?php echo $category ?></span>
                <span>|</span>
                <span><?php echo $duration ?> min</span>
            </div>
            <div class='description'>
                <div>
                    <div>Date & Time</div>
                    <p><?php echo isset($dateString[0]) && isset($dateString[1]) ? $dateString[0] . ", " . $dateString[1] : 'Date not available' ?></p>
                </div>
                <div>
                    <div>Hall</div>
                    <p>Hall <?php echo $hall ?></p>
                </div>
                <div>
                    <div>Seat(s)</div>
                    <p><?php echo !empty($seats) ? implode(", ", $seats) : 'No seats selected' ?></p>
                </div>
            </div>

            <hr>

            <div class='list'>
                <div class='header'>Tickets</div>
                <div class='seat-details'>
                    <p class='items'><?php echo !empty($seats) ? implode(", ", array_unique($seats)) : 'No seats selected' ?></p>
                    <p class='price'>RM <?php echo number_format($seatPrice, 2) ?></p>
                </div>

                <div class='header'>Food & Beverages</div>
                <div class='details'>
                    <?php if (!empty($cartItems)) : ?>
                        <?php foreach ($cartItems as $item) : ?>
                            <div class="item">
                                <p class='food-name'><?php echo $item['name'] . " ( x" . $item['quantity'] . " )" ?></p>
                                <p class='price'>RM <?php echo number_format($item['price'] * $item['quantity'], 2) ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No food items selected</p>
                    <?php endif; ?>
                </div>

                <div class='total'>
                    <p class='total-header'>Total</p>
                    <p class='price'>RM <?php echo number_format($totalPrice, 2) ?></p>
                </div>
            </div>
        </div>

        <div class='confirm-button'><a href='Order_history.php'>Confirm</a></div>
    </section>

</body>

</html>
