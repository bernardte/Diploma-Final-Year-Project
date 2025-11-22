<?php
// connect to the database
include 'dbh.inc.php';

//Upload
if(isset($_POST['upload'])){
    $movieTitle = $_POST['name'];
    $showTime = $_POST['showTime'];
    $showDate = $_POST['showDate'];
    $hall = $_POST['hall'];

    $sql = "INSERT INTO show_time  VALUES('NULL', '$movieTitle', '$showTime', '$showDate', '$hall');";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>alert('New Record Added');</script>";
        echo "<script>document.location.href='Admin_schedule_adjust.php'</script>;";
    }else{
        echo "<script>alert('Failed to add new record');</script>";
    }
}

// delete execution
if(isset($_GET['showId'])){
    $sql = "DELETE FROM show_time WHERE showId = {$_GET['showId']}";
    $result = mysqli_query($conn, $sql);
    if($result && mysqli_affected_rows($conn) > 0){
        echo '<script>alert("Deleted successfully"); document.location.href= "Admin_schedule_adjust.php";</script>';
    } else {
        echo '<script>alert("Delete unsuccessfully"); document.location.href= "Admin_schedule_adjust.php";</script>';
    }
}
