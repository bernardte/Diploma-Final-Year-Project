<?php
require_once 'dbh.inc.php';

// check if the usersId parameter is set
if (isset($_GET['usersId'])) {
    $id = $_GET['usersId'];
    $sql = "DELETE FROM customers WHERE usersId = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Data deleted successfully');</script>";
        echo "<script>document.location.href='Admin_users_adjust.php';</script>";
    } else {
        echo "<script>alert('Failed to delete data');</script>";
        echo "<script>document.location.href='Admin_users_adjust.php';</script>";
    }
}

