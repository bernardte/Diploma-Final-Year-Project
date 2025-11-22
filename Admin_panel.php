<?php
session_start();
include 'dbh.inc.php';

if (!isset($_SESSION['useruid'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: Admin_login.php");
    exit();
}

// Display welcome message only once per session
if (!isset($_SESSION['welcome_message_displayed'])) {
    $_SESSION['welcome_message_displayed'] = true;
    echo "<script>alert('Welcome back " . $_SESSION['useruid'] . "');</script>";
}

// Fetch bookings data including cart_items
$sql = "SELECT bookingId, userId, movieTitle, date, seats, hall, totalPrice, cart_items FROM bookings";
$result = mysqli_query($conn, $sql);

// Initialize array to store each booking record data fetched from database for export
$booking_arr = array();

// Initialize total price variable
$totalPrice = 0.0;

// Process each row fetched from the database
while ($rows = mysqli_fetch_array($result)) {

    // Decode cart_items if it exists
    if(isset($rows['cart_items'])){
        $cart_items = json_decode($rows['cart_items'], true);
    } else {
        $cart_items = [];
    }
    
    // Initialize variable to accumulate food names and quantities
    $food_items_str = '';

    // Extract food names and quantities
    foreach ($cart_items as $item) {
        $food_items_str .= $item['name'] . " (x" . $item['quantity'] . "), ";
    }

    // Trim trailing comma and space
    $food_items_str = rtrim($food_items_str, ', ');

    $totalPrice += floatval($rows['totalPrice']);

    // Add current row data to $booking_arr for CSV export
    $booking_arr[] = array(
        'Booking ID' => $rows['bookingId'],
        'Customers ID' => $rows['userId'],
        'Movie Title' => $rows['movieTitle'],
        'Food Items' => $food_items_str,
        'Date' => $rows['date'],
        'Seats' => $rows['seats'],
        'Hall' => $rows['hall'],
        'Total Price' => sprintf("%.2f", $rows['totalPrice']),
    );
}

// Total bookings count
$total_bookings = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Admin_panel.css"/>
    <link rel="stylesheet" href="CSS/Admin_bookings_adjust.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>Admin Dashboard</title>
</head>
<body>
<!-- sidebar -->
<div class="sidebar close">
    <img src="Image/Admin Starlight Cinema logo.png" alt="logo" class="logo">
    <ul class="side-menu">
        <li class="active"><a href="Admin_panel.php"><i class="fa-solid fa-house"></i>Dashboard</a></li>
        <li><a href="Admin_movie_adjust.php"><i class="fa-solid fa-film"></i>Movie Update</a></li>
        <li><a href="Admin_schedule_adjust.php"><i class="fa-solid fa-clock"></i>Showtime Schedule
        </a></li>
        <li><a href="Admin_food_adjust.php"><i class="fa-solid fa-cart-shopping"></i>Food & Beverage</a></li>
        <li><a href="Admin_users_adjust.php"><i class="fa-solid fa-users"></i>Users</a></li>
        <li><a href="#"><i class="fa-solid fa-gear"></i>Settings</a></li>
    </ul>
    <ul class="side-menu">
        <li>
            <?php
            if (isset($_SESSION["useruid"])) {
                echo "<a href='Admin_logout.inc.php' class='logout'><i class='fa-solid fa-right-from-bracket'></i>logout</a>";
            }
            ?>
        </li>
    </ul>
</div>
<!-- End of sidebar -->

<!-- Main Content -->
<div class="content">
    <!-- navbar -->
    <nav>
        <i class="fa-solid fa-bars"></i>
        <input type="checkbox" name="" id="theme-toggle" hidden>
        <label for="theme-toggle" class="theme-toggle"></label>
        <a href="#" class="notify">
            <i class="fa-solid fa-bell"></i>
            <span class="count">12</span>
        </a>
        <a href="Admin_panel.php" class="profile">
            <img src="Image/Admin Starlight Cinema logo.png" alt="company logo">
        </a>
    </nav>
    <!-- End of Navbar -->

    <main>
        <div class="header">
            <div class="left">
                <h1 class="active">Dashboard</h1>
            </div>
            <form action="download_csv_file.php" method="post">
                  <!-- Serialize(): is a PHP function that convert array into string representation -->
                 <!-- htmlentities(): is a function that convert special characters in the string to HTML entities
                  , which is necessary to prevent XSS attack.
                  -->
                <input type="hidden" name="export_data" value="<?= htmlentities(serialize($booking_arr)) ?>">
                <button type="submit" name="export_csv" class="report">
                    <i class="fa-solid fa-cloud-arrow-down"></i>
                    <span>Download CSV</span>
                </button>
            </form>
        </div>

        <!-- Insights -->
        <ul class="insight">
            <li><i class="fa-regular fa-calendar"></i>
                <span class="info">
                    <h3><?php echo $total_bookings; ?></h3>
                    <p>Total Bookings</p>
                </span>
            </li>
            <li><i class="fa-solid fa-eye"></i>
                <span class="info">
                <?php
                    $dash_category_query = "SELECT * FROM customers;";
                    $dash_category_query_run = mysqli_query($conn, $dash_category_query);
                    $total_viewers = mysqli_num_rows($dash_category_query_run);
                    echo '<h3>' . $total_viewers . '</h3>';
                ?>
                    <p>Total Users Available</p>
                </span>
            </li>
            <li><i class="fa-solid fa-chart-line"></i>
                <span class="info">
                <?php
                    $dash_category_query = "SELECT * FROM customers;";
                    $dash_category_query_run = mysqli_query($conn, $dash_category_query);
                    $total_viewers = mysqli_num_rows($dash_category_query_run);
                    echo '<h3>' . $total_viewers . '</h3>';
                ?>
                    <p>Total Visitors</p>
                </span>
            </li>
            <li><i class="fa-solid fa-dollar-sign"></i>
                <span class="info">
                    <h3> RM <?php echo sprintf("%.2f", $totalPrice); ?></h3>
                    <p>Total Revenue</p>
                </span>
            </li>
        </ul>
        <!-- End of Insight -->

        <!-- Table to display bookings data -->
        <div class="bottom-data">
            <div>
                <div class="header-title">
                    <h1>Bookings</h1>
                </div>
                <table>
                    <thead>
                        <tr class="row">
                            <th class="data">Booking ID</th>
                            <th class="data">Customers ID</th>
                            <th class="data">Movie Title</th>
                            <th class="data">Food And Beverage</th>
                            <th class="data">Date</th>
                            <th class="data">Seats</th>
                            <th class="data">Hall</th>
                            <th class="data">Total Price</th>
                            <th class="data">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Display each booking -->
                        <?php
                        mysqli_data_seek($result, 0); // Reset result pointer
                        while ($rows = mysqli_fetch_array($result)) {
                            // Decode cart_items if it exists
                            if(isset($rows['cart_items'])) {
                                $cart_items = json_decode($rows['cart_items'], true);
                            } else {
                                $cart_items = [];   
                            }

                            // Initialize variable to accumulate food names and quantities
                            $food_items_str = '';

                            // Extract food names and quantities
                            foreach ($cart_items as $item) {
                                $food_items_str = $food_items_str . $item['name'] . " ( x " . $item['quantity'] . " ), ";
                            }

                            // Trim trailing comma and space
                            $food_items_str = rtrim($food_items_str, ' , ');

                            echo "
                            <tr class='row'>
                                <td class='data'>" . $rows['bookingId'] . "</td>
                                <td class='data'>" . $rows['userId'] . "</td>
                                <td class='data'>" . $rows['movieTitle'] . "</td>
                                <td class='data'>" . $food_items_str . "</td>
                                <td class='data'>" . $rows['date'] . "</td>
                                <td class='data'>" . $rows['seats'] . "</td>
                                <td class='data'>" . $rows['hall'] . "</td>
                                <td class='data'> RM  " . sprintf("%.2f", $rows['totalPrice']) . "</td>
                                <td class='data'><a href='Admin_bookings_function.php?bookingId={$rows['bookingId']}' class='btn2'>Delete</a></td>
                            </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
<script src="JS/Admin_panel.js"></script>
</body>
</html>
