<?php
    include 'dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Admin_panel.css" />
    <link rel="stylesheet" href="CSS/Admin_movie_adjust.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Movie</title>
</head>

<body>
    <!-- sidebar -->
    <!-- CSS close  -->
    <div class="sidebar close">
        <img src="Image/Starlight Cinema logo.png" alt="logo" class="logo">
        <ul class="side-menu">
            <li><a href="Admin_panel.php"><i class="fa-solid fa-house"></i>Dashboard
                </a></li>
            <li class="active"><a href="Admin_movie_adjust.php"><i class="fa-solid fa-film"></i>Movie Update
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
                <a href="#" class="logout">
                    <i class="fa-solid fa-right-from-bracket"></i>logout

                </a>
            </li>
        </ul>
    </div>
    <!-- End of sidebar -->

    <!-- nav -->
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
    <!-- End of navbar -->

    <!-- Upload movie -->
    <form action="Admin_movie_function.php" method="post" enctype="multipart/form-data">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" required value="" placeholder="Image Name"><br />
        <label for="image">Image: </label>
        <input type="file" name="image" id="Image" accept=".jpg, .jpeg, .png"><br /><br />
        <button type="submit" name="upload">upload</button>
    </form>

    <!-- Table fetch data -->
    <div class= "bottom-data">
        <div>
            <div class="header">
                <h1>Movie</h1>
            </div>
            <table>
                <thead>
                    <tr class="row">
                        <th class="data">ID</th>
                        <th class="data">Movie Title</th>
                        <th class="data">Image</th>
                        <th class="data">Update</th>
                        <th class="data">Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Movie display -->
                    <?php
                    $sqlimage  = "SELECT * FROM movie";
                    $imageresult1 = mysqli_query($conn, $sqlimage);
                    while ($rows = mysqli_fetch_assoc($imageresult1)) {
                        echo "
                            <tr class='row'>
                            <td class='data'>" . $rows['id'] . "</td>
                            <td class='data'>" . $rows['name'] . "</td>
                            <td class = 'data'><img src = 'image/{$rows['image']}' width = '150px' height = '150px'/></td>
                            <td class = 'data'><a href='Admin_movie_update.php?id=$rows[id]'  class='btn'>Update</a></td>
                            <td class = 'data'><a href='Admin_movie_function.php?id=$rows[id]'  class='btn'>Delete</a></td>
                            </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </main>
    </div>
    <script src="JS/Admin_panel.js"></script>
  
</body>

</html>