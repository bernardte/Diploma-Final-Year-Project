<?php
    session_start();
    include "dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/booking_index_page.css" />
    <link rel="stylesheet" href="CSS/Homepage.css">
</head>

<body>
    <header>
        <a href="Homepage.php" class="logo">
            <img src="Image/Starlight Cinema logo.png" class="web_logo" />
        </a>
        <!--Menu icons -->
        <div id="menu-icon"><i class="fa-solid fa-bars"></i></div>
            <!--Navigation Bar-->
            <ul class="navbar">
                <li><a href="Homepage.php">Home</a></li>
                <li><a href="Movie_now_showing.php">Movie</a></li>
                <li><a href="Food_and_Beverages.php">Food & Beverage</a></li>
                <li><a href="Review_index_page.php">Review</a></li>
                <li><a href="Order_history.php">History</a></li>
            </ul>
            <!--Sign In button-->
            <?php
            if (isset($_SESSION["useruid"])) {
                echo "<div class='btn-scale'>
                    <a href='Logout.inc.php' class='btn'><i class='fa-solid fa-user'></i>".$_SESSION['useruid']."</a>
                </div>";
            } 
            else {
                echo "<div class='btn-scale'>
                    <a href='Login.php' class='btn'><i class='fa-solid fa-user'></i>sign in</a>
                </div>";
            }
                
            ?>
            
    </header>

    <section class="movie-image-container">
        <?php
        $movieTitle = $_GET['movie'];
        $sql = "SELECT * FROM now_showing_movie WHERE name='$movieTitle'";
        $result = mysqli_query($conn, $sql);    
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        echo "<img src='Image/".$row['image']."' alt='".$row['image']."' class='index-image'/>";
        echo "<h1 class='movie-title'>".$row['name']."</h1>";
        echo "<div class='label'>
                <span>".$row['category']."</span>
                <span>|</span>
                <span>".$row['duration']." min</span>
            </div> ";
        
        ?>
    </section>

    <hr>
    <div class="timings">
            <h2>Select Date & Time</h2>
            <div class="dates">
                <?php
                $sql2 = "SELECT * FROM show_time WHERE name='$name'";
                $result2 = mysqli_query($conn, $sql2);
                $increment = 0;    
                $lastDate = "";
                echo "<form method='POST' action='Movie_seat.php'>";
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $time = $row2['showTime'];
                    $date = $row2['showDate'];
                    $increment += 1;
                    if ($date === $lastDate) {
                        echo "<input type='radio' name='dateTime' id='t".$increment."' value='".$time.",".$date."'/>
                        <label for='t".$increment."' class='time'>".$time."</label>";
                    } else {
                        // echo "<br>";
                        echo "<h3>".$date."</h3>";
                        echo "<input type='radio' name='dateTime' id='t".$increment."' value='".$time.",".$date."'/>
                        <label for='t".$increment."' class='time'>".$time."</label>";
                        $lastDate = $date;
                    }
                    
                }
                echo "<input type='hidden' name='price' value='".$row['price']."'/>";
                echo "<input type='hidden' name='movie' value='".$name."'/>";
                echo "<div class='align'><button type='submit' class='submit-button'>Next</button></div>";
                echo "</form>";
                ?>

            </div>
          
    </div>

    <!-- <hr> -->
    <!-- <h2 class="section-title">Select Time</h2> -->
       
        <!-- <div class="times">
            <input type="radio" name="time" id="t1" checked/>
            <label for="t1" class="time">11:00</label>
            <input type="radio" name="time" id="t2" />
            <label for="t2" class="time">14:30</label>
            <input type="radio" name="time" id="t3" />
            <label for="t3" class="time">18:00</label>
            <input type="radio" name="time" id="t4" />
            <label for="t4" class="time">21:30</label>
        </div> -->
    

    <!-- Footer -->
    <footer>
        <div class="footer-info">
            <div class="footer-width-about">
                <h2>About Us</h2>
                <p>With over a decade of operational expertise, Starlight Cinemas is dedicated to delivering the 
                    finest medium-sized cinema experience for our cherished customers. Whether you're here for the 
                    latest blockbuster or a timeless classic, we promise exceptional screenings, comfortable seating, 
                    and superior service. Thank you for choosing Starlight Cinemas — we strive to ensure your best cinematic 
                    experience with us. For inquiries or business collaborations, contact us via below link.
                     
                    
                </p>

                <div class="social-media">
                    <ul>
                        <li><a href="" target="_blank"></a><i class="fa-regular fa-envelope"></i></li>
                        <li><a href="" target="_blank"></a><i class="fa-brands fa-facebook"></i></li>
                        <li><a href="" target="_blank"></a><i class="fa-brands fa-instagram"></i></li>
                        <li><a href="" target="_blank"></a><i class="fa-brands fa-x-twitter"></i></li>
                        <li><a href="" target="_blank"></a><i class="fa-brands fa-tiktok"></i></li>
                    </ul>
                </div>
            </div>

            <div class="footer-width-link">
                <h2>Quick Link</h2>
                <div class="navbar">
                    <ul>
                        <li><a href="Homepage.php">Home</a></li>
                        <li><a href="Movie_now_showing.php">Movie</a></li>
                        <li><a href="Food_and_Beverages.php">Food & Beverage</a></li>
                        <li><a href="Review_index_page.php">Review</a></li>
                        <li><a href="Order_history.php">History</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-width-contact">
                <h2>Address</h2>
                <ul>
                    <li>
                        <span><i class="fa-solid fa-map-pin"></i></span>
                        <p>
                            8-20, Level 8, 1st Avenue Mall, 182, Jalan Magazine, 10300 George Town, Penang
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <div id="copyright">
            <p>&#169; Starlight Cinema All Right Reserved.</p>
        </div>
    </footer>

    <script src="JS/booking_index_page.js"></script>
    <script src="JS/Homepage.js"></script>
</body>
</html>