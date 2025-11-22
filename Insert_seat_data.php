<?php
include 'dbh.inc.php';

// Read JSON data from the request
$data = file_get_contents('php://input');

// Decode JSON data
$data = json_decode($data, true);

if (isset($data['seats'], $data['totalSeatSelectionPrice'], $data['date'], $data['usersId'], $data['movieTitle'])) {
    $seats = $data['seats'];
    $totalSeatSelectionPrice = $data['totalSeatSelectionPrice'];
    $date = $data['date'];
    $usersId = $data['usersId'];
    $movieTitle = $data['movieTitle'];

    // Convert seats array to JSON for storage
    $seatsJson = json_encode($seats);

    // Insert seat selection into the reservations table
    $sql = "INSERT INTO reservations (userId, seats, totalSeatSelectionPrice, date, movieTitle) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo json_encode(["status" => "error", "message" => "Prepare statement error: " . $conn->error]);
        exit();
    }

    // Bind parameters and execute the first insert statement
    $stmt->bind_param("isiss", $usersId, $seatsJson, $totalSeatSelectionPrice, $date, $movieTitle);
    $stmt->execute();

    // Check if the insert was successful
    if ($stmt->affected_rows > 0) {
        // Retrieve the last inserted ID from the reservations table
        $reservationId = $stmt->insert_id;

        // Insert data into the bookings table
        $sql1 = "INSERT INTO bookings (id, userId, movieTitle, date, seats, totalSeatSelectionPrice) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt1 = $conn->prepare($sql1);

        if (!$stmt1) {
            echo json_encode(["status" => "error", "message" => "Prepare statement error: " . $conn->error]);
            exit();
        }

        // Bind parameters and execute the second insert statement with the retrieved reservationId
        $stmt1->bind_param("iisssi", $reservationId, $usersId, $movieTitle, $date, $seatsJson, $totalSeatSelectionPrice);
        $stmt1->execute();

        if ($stmt1->affected_rows > 0) {
            // Optionally, update seats table to mark seats as 'occupied'
            $updateSeatsSql = "UPDATE seats SET status = 'occupied' WHERE seat_number IN ('" . implode("','", $seats) . "')";
            $conn->query($updateSeatsSql);

            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to insert data into bookings table"]);
        }

        $stmt1->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to insert data into reservations table"]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Incomplete data received"]);
}
?>
