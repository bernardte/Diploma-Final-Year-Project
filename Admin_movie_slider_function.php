<?php
// cannot upload the image to the database and category and description switch place when output

// upload movie image
// connect to the database
include 'dbh.inc.php';
    // if user press the upload button
    if(isset($_POST['upload'])){
    // get the name and image from the form
    $name = $_POST['name'];
    $img = $_FILES['image']['name'];
    // Using SQL INSERT statement to add new row of the image and name to the table
    $insert = "INSERT INTO movie_slider VALUES('Null', '$name' ,'$img')";
    // execute SQL query and store the result to the $conn
    if(mysqli_query($conn,$insert)){
        /* 
         Move the uploaded image file from a temporary location to a folder named 'Image'
         using the 'movie_uploaded_file' function
         */
        move_uploaded_file($_FILES['image']['tmp_name'],"Image/$img");
        echo "<script>alert('Image has successfully uploaded to folder');</script>";
        echo "<script>document.location.href='Admin_movie_slider.php'</script>;";
    }else{
        echo "<script>alert('Failed to upload image');</script>";
    }
}

// delete execution
if(isset($_GET['id'])){
    $sql = "DELETE FROM movie_slider WHERE id = {$_GET['id']}";
    $result = mysqli_query($conn, $sql);
    if($result && mysqli_affected_rows($conn) > 0){
        echo '<script>alert("Deleted successfully"); document.location.href= "Admin_movie_slider.php";</script>';
    } else {
        echo '<script>alert("Delete unsuccessfully"); document.location.href= "Admin_movie_slider.php";</script>';
    }
}

