<?php
if (isset($_POST['export_data'])) {

    // Initialize variables
    $export_data = unserialize($_POST['export_data']);

    if (is_array($export_data) && !empty($export_data)) {
        // Set filename for download
        $filename = "bookings.csv";

        // Open file pointer
        $file = fopen($filename, "w");

        // Check if file pointer is valid
        if ($file === false) {
            echo "Error: Unable to create file.";
            exit();
        }

        // Write CSV headers
        fputcsv($file, array("Booking ID", "Customer ID", "Movie Title", "Food & Beverage", "Date", "Seats", "Hall", "Total Price"));

        // Write data rows
        foreach ($export_data as $line) {
            fputcsv($file, $line);
        }

        // Close file pointer
        fclose($file);

        // Download CSV file
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=" . $filename);
        header("Content-Type: application/csv");
        header("Content-Length: " . filesize($filename));

        // Read the file and output to the browser
        readfile($filename);

        // Delete the file after download
        unlink($filename);
        exit();

    } else {
        echo "Error: No data to export.";
        exit();
    }
} else {
    echo "Error: Export data not received.";
    exit();
}

