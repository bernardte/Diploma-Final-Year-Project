<?php
include 'dbh.inc.php';

// delete execution
if(isset($_GET['bookingId'])){
    $sql = "DELETE FROM bookings WHERE bookingId = {$_GET['bookingId']}";
    $result = mysqli_query($conn, $sql);
    if($result && mysqli_affected_rows($conn) > 0){
        echo '<script>alert("Deleted successfully"); document.location.href= "Admin_panel.php";</script>';
    } else {
        echo '<script>alert("Delete unsuccessfully"); document.location.href= "Admin_panel.php";</script>';
    }
}
