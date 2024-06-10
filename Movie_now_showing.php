<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom Homepage CSS  -->
    <link rel="stylesheet" href="CSS/Homepage.css">
    <!-- Access to awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Link movie CSS -->
    <link rel="stylesheet" href="CSS/Movie.css">
    <title>Movies</title>
</head>
<body>
    <header>
        <a href="Homepage.php" class="logo">
            <i class="fa-solid fa-clapperboard"></i> Starlight Cinema
        </a>
        <!--Menu icons -->
        <div id="menu-icon"><i class="fa-solid fa-bars"></i></div>
            <!--Navigation Bar-->
            <ul class="navbar">
                <li><a href="Homepage.php">Home</a></li>
                <li><a href="Movie_now_showing.php" class="home-active">Movie</a></li>
                <li><a href="Food_and_Beverages.php">Food & Beverage</a></li>
                <li><a href="Review_index_page.php">Rate and Review</a></li>
                <li><a href="History.php">History</a></li>
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


<!-- Submenu -->
<section class="Submenu-container" >
    <ul class="navbar" id="submenu-alignment">
        <li><a href="Movie_now_showing.php" class="home-active">Now Showing</a></li>
        <li><a href="Movie_upcoming.php">Upcoming</a></li>
    </ul>
</section>

<!-- Movie Poster -->
<section class="content">
    <div class="movie-selection-container">
        <div class="movie-card-background-container">
            <div class="card">
                <img src="Image/Evil Dead Rise movie.jpg">
                <div class="info">
                    <span><h1>Evil Dead Rise</h1></span>
                    <span><p>A reunion between two estranged sisters gets cut short by the rise of flesh-possessing demons, 
                        thrusting them into a primal battle for survival as they face the most nightmarish version of 
                        family imaginable.
                    </p></span>
                    <a href="" class="movie-card-btn">Book Now</a>
                </div>
            </div>
            <div class="card">
                <img src="Image/Evil Dead Rise movie.jpg">
                <div class="info">
                    <span><h1>Evil Dead Rise</h1></span>
                    <span><p>A reunion between two estranged sisters gets cut short by the rise of flesh-possessing demons, 
                        thrusting them into a primal battle for survival as they face the most nightmarish version of 
                        family imaginable.
                    </p></span>
                    <a href="" class="movie-card-btn">Book Now</a>
                </div>
            </div>

            <div class="card">
                <img src="Image/Evil Dead Rise movie.jpg">
                <div class="info">
                    <span><h1>Evil Dead Rise</h1></span>
                    <span><p>A reunion between two estranged sisters gets cut short by the rise of flesh-possessing demons, 
                        thrusting them into a primal battle for survival as they face the most nightmarish version of 
                        family imaginable.
                    </p></span>
                    <a href="" class="movie-card-btn">Book Now</a>
                </div>
            </div>

            <div class="card">
                <img src="Image/Evil Dead Rise movie.jpg">
                <div class="info">
                    <span><h1>Evil Dead Rise</h1></span>
                    <span><p>A reunion between two estranged sisters gets cut short by the rise of flesh-possessing demons, 
                        thrusting them into a primal battle for survival as they face the most nightmarish version of 
                        family imaginable.
                    </p></span>
                    <a href="" class="movie-card-btn">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Movie Description -->
<section>
    <h1>Movie Description</h1>
    <div class="movie-description-container">
            <img src="Image/Evil Dead Rise movie.jpg">
                <img src="Image/P18.png" class="classification-film">
                    <h2 class="text-header-2">Evil Dead Rise</h2>
                    <span><p class="text">A reunion between two estranged sisters gets cut short by the rise of flesh-possessing demons, 
                        thrusting them into a primal battle for survival as they face the most nightmarish version of 
                        family imaginable.
                    </p></span>
            <hr>

            <img src="Image/Evil Dead Rise movie.jpg">
                <img src="Image/P18.png" class="classification-film">
                    <h2 class="text-header-2">Evil Dead Rise</h2>
                    <div><p class="text">A reunion between two estranged sisters gets cut short by the rise of flesh-possessing demons, 
                        thrusting them into a primal battle for survival as they face the most nightmarish version of 
                        family imaginable.
                    </p>
            <hr>

            <img src="Image/Evil Dead Rise movie.jpg">
                <img src="Image/P18.png" class="classification-film">
                    <h2 class="text-header-2">Evil Dead Rise</h2>
                    <span><p class="text">A reunion between two estranged sisters gets cut short by the rise of flesh-possessing demons, 
                        thrusting them into a primal battle for survival as they face the most nightmarish version of 
                        family imaginable.
                    </p></span>
            <hr>

            <img src="Image/Evil Dead Rise movie.jpg">
                <img src="Image/P18.png" class="classification-film">
                    <span><h2 class="text-header-2">Evil Dead Rise</h2></span>
                    <span><p class="text">A reunion between two estranged sisters gets cut short by the rise of flesh-possessing demons, 
                        thrusting them into a primal battle for survival as they face the most nightmarish version of 
                        family imaginable.
                    </p></span>
    </div>
</section>

    <footer>
        <div class="footer-info">
            <div class="footer-width-about">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error, nam iure. Cumque,
                     ad optio? 
                    Itaque exercitationem dolor vero necessitatibus ratione ipsam provident rerum,
                     minima distinctio harum.
                     Blanditiis hic fuga eius.
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
                        <li><a href="#Homepage.html">Home</a></li>
                        <li><a href="#">Movie</a></li>
                        <li><a href="#">Food & Beverage</a></li>
                        <li><a href="#">Rate and Review</a></li>
                        <li><a href="#">History</a></li>
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
    <!-- Custom JS Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Custom JS Movie -->
    <script src="JS/Movie.js"></script>
    <!-- Hompage JS Swiper -->
    <script src="JS/Homepage.js"></script>
</body>
</html>