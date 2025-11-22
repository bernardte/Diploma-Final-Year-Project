<?php
  session_start();
  // Check if user is logged in
  if (!isset($_SESSION['useruid'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: Admin_login.php");
    exit();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Upcomminge</title>    
    <link rel="stylesheet" href="CSS/Admin_panel.css"/>
    <link rel="stylesheet" href="CSS/Admin_movie_update.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
     integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
     integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <!-- sidebar -->
    <!-- CSS close  -->
    <div class ="sidebar close">
        <img src="Image/Admin Starlight Cinema logo.png" alt="logo" class="logo">
        <ul class="side-menu">
            <li><a href="Admin_panel.php"><i class="fa-solid fa-house"></i>Dashboard
            </a></li>
            <li class="active"><a href="Admin_movie_adjust.php"><i class="fa-solid fa-film"></i>Movie Update
            </a></li>
            <li><a href="Admin_schedule_adjust.php"><i class="fa-solid fa-clock"></i>Showtime Schedule
            </a></li>
            <li><a href="Admin_food_adjust.php"><i class="fa-solid fa-cart-shopping"></i>Food & Beverage
            </a></li>
            <li><a href="Admin_users_adjust.php"><i class="fa-solid fa-users"></i>Users
            </a></li>
            <li><a href="#"><i class="fa-solid fa-gear"></i>Settings
            </a></li>
        </ul>
        <ul class="side-menu">
            <li>
            <?php
                 if(isset($_SESSION["useruid"])){
                     echo "
                    <a href='Admin_logout.inc.php' class='logout'>        
                        <i class= 'fa-solid fa-right-from-bracket'></i>logout
                    </a>
                    ";
                }
            ?>
            </li>
        </ul>
    </div>

    <div class="content">
        <nav>
            <i class="fa-solid fa-bars"></i>
            <input type="checkbox" name="" id="theme-toggle" hidden>
            <label  for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notify">
                <i class="fa-solid fa-bell"></i>
                <span class="count">12</span>
            </a>

            <a href="Admin_panel.php" class="profile">
                 <img src="Image/Admin Starlight Cinema logo.png" alt="company logo">
            </a>
        </nav>
    </div>
  
  <!-- Update movie -->
  <?php
  require_once 'dbh.inc.php';

  // check the id parameter is set 
  if (isset($_GET['id'])) {
      // retrieve data from the database 
      $id = $_GET['id'];
      $sql = "SELECT * FROM upcoming_movie WHERE id = '$id'";
      $result = mysqli_query($conn, $sql);
      $data = mysqli_fetch_assoc($result);
  }

// Check if the update form is submitted
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $duration = $_POST['duration'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    // Update movie details in the database
    $sql = "UPDATE upcoming_movie SET name='$name', duration='$duration', category='$category', description='$description', image='$image' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Move uploaded file to the designated directory
        move_uploaded_file($_FILES['image']['tmp_name'], "Image/$image");
        echo "<script>alert('Data updated successfully');</script>";
        echo "<script>document.location.href='Admin_movie_upcoming.php';</script>";
    } else {
        echo "<script>alert('Failed to update data');</script>";
        echo "<script>document.location.href='Admin_movie_upcoming.php';</script>";
    }
}
?>
  <!-- multipart/form-data: allow users upload a file(in this case, an image) -->
  <form action="Admin_movie_upcoming_update.php" method="post" enctype="multipart/form-data">
    <table>
    <th>Edit Upcoming Movie</th>

        <tr>
          <td class="container">
            <label class="label-adjust" for="name">Movie Title:</label class="label-adjust">
            <input type="text" name="name" id="name" required value="<?php echo isset($data)? $data['name'] : '';?>">
          </td>
        </tr>
        <!-- Error cannot display when edit -->
        <tr>
          <td class="container">
            <label class="label-adjust" for="duration">Duration:</label class="label-adjust">
            <input type="text" name="duration" id="duration" required value="<?php echo isset($data)? $data['duration'] : '';?>">
          </td>
        </tr>

        <tr>
          <td class="container">
            <label class="label-adjust" for="category">Category:</label class="label-adjust">
            <input type="text" name="category" id="category" required value="<?php echo isset($data)? $data['category'] : '';?>"
          </td>
        </tr>


      <tr>
        <td class="container">
          <label class="label-adjust" for="description">Description:</label>
          <textarea name="description" id="description" required><?php echo isset($data)? $data['description'] : '';?></textarea>
        </td>
      </tr>

      <tr>
        <td class="container">
          <label class="label-adjust" for="image">Image:</label class="label-adjust">
          <input type="file" name="image" id="image" accept=".jpg,.jpeg,.png">
          <!-- Image/: the location accurate location that save the image path  -->
          <!-- check if the variable $data is set and not null, if it is set will return true -->
          <img src="Image/<?php echo isset($data)? $data['image']: '';?>" alt="current image">
        </td>
      </tr>

      <tr>
        <td class="container">
          <input type="hidden" name="id" value="<?php echo isset($data)? $data['id'] : '';?>">
          <button type="submit" name="update">Edit</button>
        </td>
      </tr>

    </table>
  </form>
      <script src="JS/Admin_panel.js"></script>
      <script src="JS/Admin_movie_adjust.js"></script>
</body>
</html>