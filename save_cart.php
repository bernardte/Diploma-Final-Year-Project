<?php
include 'dbh.inc.php';

// Retrieve data from the 'php://input' stream
$data = file_get_contents('php://input');
$data = json_decode($data, true);

// Check if the retrieved data is an array
if (is_array($data)) {
    // Assume all items in $data belong to the same user
    if (count($data) > 0) {
        $usersId = $data[0]['usersId'];

        // Check if usersId exists in customers table 
        $check_user_query = "SELECT usersId FROM customers WHERE usersId = ?";
        $check_user_stmt = mysqli_prepare($conn, $check_user_query);
        mysqli_stmt_bind_param($check_user_stmt, "i", $usersId);
        mysqli_stmt_execute($check_user_stmt);
        mysqli_stmt_store_result($check_user_stmt);

        if (mysqli_stmt_num_rows($check_user_stmt) == 0) {
            echo "Error: usersId $usersId does not exist in customers table.<br>";
            mysqli_stmt_close($check_user_stmt);
            exit;
        }
        mysqli_stmt_close($check_user_stmt);

        // Retrieve existing cart items for the user
        $cart_items_query = "SELECT cart_items FROM cart WHERE usersId = ?";
        $cart_items_stmt = mysqli_prepare($conn, $cart_items_query);
        mysqli_stmt_bind_param($cart_items_stmt, "i", $usersId);
        mysqli_stmt_execute($cart_items_stmt);
        $result = mysqli_stmt_get_result($cart_items_stmt);

        // Initialize cart_items array
        $cart_items = [];
        if ($row = mysqli_fetch_assoc($result)) {
            $cart_items = json_decode($row['cart_items'], true);
        }
        mysqli_stmt_close($cart_items_stmt);

        // Update cart items with the new data
        foreach ($data as $item) {
            // Debugging: output the current item
            echo "Processing item: ";
            print_r($item);
            echo "<br>";

            // Check for required keys
            if (!isset($item['foodName']) || !isset($item['price']) || !isset($item['quantity']) || !isset($item['imagePath'])) {
                echo "Error: Missing required keys in item: ";
                print_r($item);
                echo "<br>";
                continue;
            }

            $name = $item['foodName'];
            $price = $item['price'];
            $quantity = $item['quantity'];
            $image = $item['imagePath'];

            // Check if the item already exists in the cart
            $item_exists = false;

            foreach ($cart_items as &$cart_item) {
                if ($cart_item['name'] === $name) {
                    // Update the quantity and other details if the item exists
                    $cart_item['price'] = $price;
                    $cart_item['quantity'] = $quantity;
                    $cart_item['image'] = $image;
                    $item_exists = true;
                    break;
                }
            }
            if (!$item_exists) {
                // Add the new item to the cart items array
                $cart_items[] = [
                    'name' => $name,
                    'price' => $price,
                    'quantity' => $quantity,
                    'image' => $image
                ];
            }
        }

        // Convert the cart items array to JSON format
        $cart_items_json = json_encode($cart_items);

        // Prepare SQL statement to insert/update the cart table
        $insert_query = "INSERT INTO cart (usersId, cart_items) VALUES (?, ?) ON DUPLICATE KEY UPDATE cart_items = ?";
        $insert_stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($insert_stmt, "iss", $usersId, $cart_items_json, $cart_items_json);

        if (mysqli_stmt_execute($insert_stmt)) {
            echo "Data inserted/updated successfully<br>";
        } else {
            echo "Error inserting/updating data: " . mysqli_stmt_error($insert_stmt) . "<br>";
        }
        mysqli_stmt_close($insert_stmt);

        // Get the cart ID for updating the bookings table
        $cart_id_query = "SELECT cart_id FROM cart WHERE usersId = ?";
        $cart_id_stmt = mysqli_prepare($conn, $cart_id_query);
        mysqli_stmt_bind_param($cart_id_stmt, "i", $usersId);
        mysqli_stmt_execute($cart_id_stmt);
        $cart_id_result = mysqli_stmt_get_result($cart_id_stmt);
        $cart_id_row = mysqli_fetch_assoc($cart_id_result);
        $cart_id = $cart_id_row['cart_id'];
        mysqli_stmt_close($cart_id_stmt);

        // Update statement for bookings table
        $update_query = "UPDATE bookings SET cart_id = ?, cart_items = ? WHERE userId = ?";
        $update_stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($update_stmt, "isi", $cart_id, $cart_items_json, $usersId);

        if (mysqli_stmt_execute($update_stmt)) {
            echo "Bookings table updated successfully<br>";
        } else {
            echo "Error updating bookings table: " . mysqli_stmt_error($update_stmt) . "<br>";
        }
        mysqli_stmt_close($update_stmt);
    }
} else {
    echo "Your data is not an array<br>";
}

