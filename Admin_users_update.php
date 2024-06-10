<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin movie update</title>    
    <link rel="stylesheet" href="CSS/Admin_panel.css"/>
    <link rel="stylesheet" href="CSS/Admin_users_update.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
     integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
     integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>

    <!-- sidebar -->
    <!-- CSS close  -->
    <div class ="sidebar close">
        <img src="Image/Starlight Cinema logo.png" alt="logo" class="logo">
        <ul class="side-menu">
            <li><a href="Admin_panel.php"><i class="fa-solid fa-house"></i>Dashboard
            </a></li>
            <li><a href="Admin_movie_adjust.php"><i class="fa-solid fa-film"></i>Movie Update
            </a></li>
            <li><a href="Admin_food_adjust.php"><i class="fa-solid fa-cart-shopping"></i>Food & Beverage
            </a></li>
            <li class="active"><a href="Admin_users_adjust.php"><i class="fa-solid fa-users"></i>Users
            </a></li>
            <li><a href="#"><i class="fa-solid fa-gear"></i>Settings
            </a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
                    <i class="fa-solid fa-right-from-bracket"></i>logout
                    
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        <nav>
            <i class="fa-solid fa-bars"></i>
            <input type="checkbox" name="" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notify">
                <i class="fa-solid fa-bell"></i>
                <span class="count">12</span>
            </a>

            <a href="#" class="profile">
                <img src="Image/Starlight Cinema logo.png" alt="company logo">
            </a>
        </nav>
    </div>

<?php
// Update users
require_once 'dbh.inc.php';
// check the usersId parameter is set 
if (isset($_GET['usersId'])) {
    // retrieve data from the database 
    $id = $_GET['usersId'];
    $sql = "SELECT * FROM customers WHERE usersId = '$id'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
}

// check the if the user pressed update button will implement POST method
if (isset($_POST['update'])) {
    $id = $_POST['usersId'];
    $usersName = $_POST['usersName'];
    $usersEmail = $_POST['usersEmail'];
    $usersUid = $_POST['usersUid'];

// update to the database by selecting the the usersid
    $sql = "UPDATE customers SET usersName = '$usersName',  usersEmail = '$usersEmail', usersUid = '$usersUid'
            WHERE usersId = '$id';";
            
    $result = mysqli_query($conn, $sql);
    
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    } else {
        echo "<script>alert('Data updated successfully');</script>";
        echo "<script>document.location.href='Admin_users_adjust.php';</script>";
    }
}

?>

<!-- multipart/form-data: allow users upload a file(in this case, an image) -->
<form action="Admin_users_update.php" method="post" enctype="multipart/form-data">
  <table>
  <th>Users Update</th>
    <tr>
      <td class="container">
        <label class="label-adjust" for="usersName">Usersname:</label>
        <input type="text" name="usersName" id="usersName" required value="<?php echo isset($data)? $data['usersName'] : '';?>" placeholder="usersname..."/>
      </td>
    </tr>

    <tr>
      <td class="container">
        <label class="label-adjust" for="usersEmail">Users Email:</label>
        <input type="text" name="usersEmail" id="usersEmail" required value="<?php echo isset($data)? $data['usersEmail'] : '';?>" placeholder="Users Email..."/>
      </td>
    </tr>

    
    <tr>
      <td class="container">
        <label class="label-adjust" for="usersUid">UsersId:</label>
        <input type="text" name="usersUid" id="usersUid" required value="<?php echo isset($data)? $data['usersUid'] : '';?>" placeholder="UsersId..."/>
      </td>
    </tr>

    <tr>
      <td class="container">
        <input type="hidden" name="usersId" value="<?php echo isset($data)? $data['usersId'] : '';?>"/>
        <button type="submit" name="update">Update</button>
      </td>
    </tr>
  </table>

</form>
    <script src="JS/Admin_panel.js"></script>

</body>
</html>
