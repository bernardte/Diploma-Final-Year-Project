<?php
include 'dbh.inc.php'; // Include your database connection script

// Query to retrieve products from database
$sql = "SELECT image, foodName, price FROM food";
$result = mysqli_query($conn, $sql);

// Check if there are results
if (mysqli_num_rows($result) > 0) {
    $products = array();
    while ($row = mysqli_fetch_assoc($result)) {
        // Assuming 'images' field contains relative paths or URLs to images
        $row['imagePath'] = "Image/" . $row['image']; // Adjust as per your actual path
        $products[] = $row;
    }
    echo json_encode($products);
} else {
    echo json_encode(array()); // Return an empty array if no products found
}

mysqli_close($conn);

