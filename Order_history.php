<?php
require 'Qrcode/vendor/autoload.php';
include 'dbh.inc.php'; // Include your database connection script
session_start();

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\PngWriter;

// Redirect to login page if useruid is not set in session
if (!isset($_SESSION['useruid'])) {
    header("Location: login.php");
    exit();
}

$usersUid = $_SESSION['useruid'];

// Function to safely retrieve data from the database
function fetchData($conn, $sql) {
    $result = mysqli_query($conn, $sql);
    if (!$result || mysqli_num_rows($result) <= 0) {
        die("Error: " . mysqli_error($conn));
    }
    return mysqli_fetch_assoc($result);
}

// Query to retrieve userId from customers table
$sql = "SELECT usersId FROM customers WHERE usersUid = '$usersUid'";
$row = fetchData($conn, $sql);
$userId = $row['usersId'];

// Query to retrieve bookings for the user
$sql = "SELECT * FROM bookings WHERE userId = '$userId'";
$result = mysqli_query($conn, $sql);

// Ensure the qrcodes directory exists
$qrCodeDir = 'qrcodes';
if (!is_dir($qrCodeDir)) {
    mkdir($qrCodeDir, 0755, true);
}

// Loop through each booking and generate QR code
while ($row = mysqli_fetch_array($result)) {

    // Ensure $row['bookingId'] exists before using it
    if (!isset($row['bookingId'])) {
        continue; // Skip this iteration if bookingId is not set
    }

    $movieTitle = $row['movieTitle'];
    $date = $row['date'];
    $seatPrice = $row['totalSeatSelectionPrice'];
    $seats = json_decode($row['seats'], true);
    $numberOfSeats = count($seats);
    $totalPrice = $row['totalPrice'];
    $hall = $row['hall'];

    // Check if 'cart_items' is set and decode it if available
    if (isset($row['cart_items'])) {
        $foodItems = json_decode($row['cart_items'], true);
    } else {
        $foodItems = [];
    }

    // Prepare booking details for QR code
    $bookingDetails = [
        'Booking ID' => $row['bookingId'],
        'Movie Title' => $movieTitle,
        'Date' => date('M d, Y', strtotime($date)),
        'Seats' => implode(', ', $seats),
        'Seat Price RM' => $seatPrice,
        'Hall' => $hall,
        'Food Items' => [],
        'Total Price RM' => number_format($totalPrice, 2)
    ];

    // Add food items if available and filter out images
    if (!empty($foodItems)) {
        foreach ($foodItems as $item) {
            $filteredItem = [
                'name' => $item['name'],
                'quantity' => $item['quantity'],
                'price RM' => $item['price'] * $item['quantity']
            ];
            $bookingDetails['Food Items'][] = $filteredItem; // Append each food item to the Food Items array
        }
    }

    $bookingDetailsJson = json_encode($bookingDetails, );

    // Generate QR code
    $qrCode = Builder::create()
        ->encoding(new Encoding('UTF-8'))
        ->writer(new PngWriter())
        ->data($bookingDetailsJson) // Pass JSON encoded data
        ->size(200) // Adjust size if needed
        ->margin(0)
        ->build();

    // Save QR code as PNG file
    $qrCodePath = $qrCodeDir . '/qrcode_' . $userId . '_' . $row['bookingId'] . '.png';
    $qrCode->saveToFile($qrCodePath);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starlight Cinema - Booking Details</title>
    <link rel="stylesheet" href="CSS/Homepage.css">
    <!-- Access to Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<header>
    <a href="Homepage.php" class="logo">
        <img src="Image/Starlight Cinema logo.png" class="web_logo" />
    </a>
    <!-- Menu icons -->
    <div id="menu-icon"><i class="fa-solid fa-bars"></i></div>
    <!-- Navigation Bar -->
    <ul class="navbar">
        <li><a href="Homepage.php">Home</a></li>
        <li><a href="Movie_now_showing.php">Movie</a></li>
        <li><a href="Food_and_Beverages.php">Food & Beverage</a></li>
        <li><a href="Review_index_page.php">Review</a></li>
        <li><a href="Order_history.php" class="home-active">History</a></li>
    </ul>
    <!-- Sign In/Sign Out Button -->
    <?php
    if (isset($_SESSION["useruid"])) {
        echo "<div class='btn-scale'>
            <a href='Logout.inc.php' class='btn'><i class='fa-solid fa-user'></i>" . $_SESSION['useruid'] . "</a>
        </div>";
    } else {
        echo "<div class='btn-scale'>
            <a href='Login.php' class='btn'><i class='fa-solid fa-user'></i>Sign In</a>
        </div>";
    }
    ?>
</header>

<section class="order-history-container">
    <div class="order-history">
        
        <?php
        echo '<h2>Your Booking Details</h2>';

        // Reset result pointer to fetch data for display
        mysqli_data_seek($result, 0);
        while ($row = mysqli_fetch_array($result)) {
            $movieTitle = $row['movieTitle'];
            $date = $row['date'];
            $seatPrice = $row['totalSeatSelectionPrice'];
            $seats = json_decode($row['seats'], true);
            $numberOfSeats = count($seats);
            $totalPrice = $row['totalPrice'];
            $hall = $row['hall'];
            // Check if 'cart_items' is set and decode it if available
            if (isset($row['cart_items'])) {
                $foodItems = json_decode($row['cart_items'], true);
            } else {
                $foodItems = [];
            }
        ?>
   
        <div class="booking-container">  
            <div class="booking-details">
                <p>Movie Title: <?php echo $movieTitle; ?></p>
                <p>Date: <?php echo $date; ?></p>
                <p>Seats: <?php echo implode(', ', $seats); ?></p>
                <p>Number of Seats: <?php echo $numberOfSeats; ?></p>
                <p>Seat Price: RM <?php echo $seatPrice; ?></p>
                <p>Hall:&nbsp;&nbsp;<?php echo $hall; ?></p>
                
                <!-- Display Food Items -->
                <div class="food-items">
                    
                    <ul>
                        <?php foreach ($foodItems as $item) : ?>
                            <p>Food And Beverage:</p>
                            <li>
                                <p>Food Name: <?php echo $item['name']; ?></p>
                                <p>Food Quantity: <?php echo $item['quantity']; ?></p>
                                <p>Food Price: RM <?php echo sprintf("%.2f", $item['price'] * $item['quantity']); ?></p>
                            </li>
                        <?php endforeach; ?>
                        <p id="total-price">Total Price: RM <?php echo number_format($totalPrice, 2); ?></p>
                    </ul>
                </div>
                
            </div>
                <div class="qr-code">   
                    <img src="<?php echo $qrCodeDir . '/qrcode_' . $userId . '_' . $row['bookingId'] . '.png'; ?>" alt="QR Code"> 
                    <p><a href="<?php echo $qrCodeDir . '/qrcode_' . $userId . '_' . $row['bookingId'] . '.png'; ?>" 
                    download="qrcode_<?php echo $userId; ?>_<?php echo $row['bookingId']; ?>.png" class="btn-download">Download QR Code</a></p>
                    <?php } ?>
                </div> 
    </div>  
</section>

<!-- Footer -->
<footer>
    <div class="footer-info">
        <div class="footer-width-about">
            <h2>About Us</h2>
            <p>
                With over a decade of operational expertise, Starlight Cinemas is dedicated to delivering the finest medium-sized cinema experience for our 
                cherished customers. Whether you're here for the latest blockbuster or a timeless classic, we promise exceptional screenings, comfortable 
                seating, and superior service. Thank you for choosing Starlight Cinemas — we strive to ensure your best cinematic experience with us. 
                For inquiries or business collaborations, contact us via below link.
            </p>

            <div class="social-media">
                <ul>
                    <li><a href="" target="_blank"></a><i class="fa-regular fa-envelope"></i></li>
                    <li><a href="" target="_blank"></a><i class="fa-brands fa-facebook"></i></li>
                    <li><a href="" target="_blank"></a><i class="fa-brands fa-instagram"></i></li>
                    <li><a href="" target="_blank"></a><i class="fa-brands fa-x-twitter"></i></li>
                    <li><a href="" target="_blank"></a><i class="fa-brands fa-tiktok"></i></li>
                </ul>
            </div>
        </div>

        <div class="footer-width-link">
            <h2>Quick Link</h2>
            <div class="navbar">
                <ul>
                    <li><a href="Homepage.php">Home</a></li>
                    <li><a href="Movie_now_showing.php">Movie</a></li>
                    <li><a href="Food_and_Beverages.php">Food & Beverage</a></li>
                    <li><a href="Review_index_page.php">Review</a></li>
                    <li><a href="Order_history.php">History</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-width-contact">
            <h2>Address</h2>
            <ul>
                <li>
                    <span><i class="fa-solid fa-map-pin"></i></span>
                    <p>
                        8-20, Level 8, 1st Avenue Mall, 182, Jalan Magazine, 10300 George Town, Penang
                    </p>
                </li>
            </ul>
        </div>
    </div>
    <div id="copyright">
        <p>&#169; Starlight Cinema All Right Reserved.</p>
    </div>
</footer>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!--Link To Custom JS-->
<script src="JS/Homepage.js"></script>

</body>
</html>
