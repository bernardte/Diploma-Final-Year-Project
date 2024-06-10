<?php
// include SQL database.
    include 'dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Admin_panel.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Dashboard</title>
</head>
<body>
    <!-- sidebar -->
    <!-- CSS close  -->
    <div class ="sidebar close">
        <img src="Image/Starlight Cinema logo.png" alt="logo" class="logo">
        <ul class="side-menu">
            <li class="active"><a href="Admin_panel.php"><i class="fa-solid fa-house"></i>Dashboard
            </a></li>
            <li><a href="Admin_movie_adjust.php"><i class="fa-solid fa-film"></i>Movie Update
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

    <!-- Main Content -->
    <div class="content">
        <!-- navbar -->
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
        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1 class="active">Dashboard</h1>
                </div>
                <a href="#" class="report">
                    <i class="fa-solid fa-cloud-arrow-down"></i>
                    <span>Download CSV</span>
                </a>
            </div>

            <!-- Insights -->
        <ul class="insight">
           <li><i class="fa-regular fa-calendar"></i>
           <span class="info">
                <h3> 1,074</h3>
                <p>Paid Order</p>
           </span>
           </li>
           <li><i class="fa-solid fa-eye"></i>
            <span class="info">
                <!-- calculate the total of viewers from database -->
                <?php
                $dash_category_query = "SELECT * FROM customers;";
                $dash_category_query_run = mysqli_query($conn, $dash_category_query);
                if($total_viewers = mysqli_num_rows( $dash_category_query_run))
                {
                    echo '<h3>'.$total_viewers.'</h3>';
                }
                else{
                    echo '<h3>0</h3>';
                }
                ?>
                
                <p>Viewers</p>
           </span>
           </li>
           <li><i class="fa-solid fa-chart-line"></i>
           <span class="info">
               <h3> 14,721</h3>
               <p>Searches</p>
          </span>
          </li>
          <li><i class="fa-solid fa-dollar-sign"></i>
          <span class="info">
              <h3> $6,472</h3>
              <p>Total Sales</p>
         </span>
        </li>
        </ul>
        <!-- End of Insight -->
        </main>
    </div>
    <script src="JS/Admin_panel.js"></script>
</body>
</html>

