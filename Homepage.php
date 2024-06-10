<?php
    session_start();

    // include QR code file
    include_once 'phpqrcode/qrlib.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starlight Cinema</title>
    <link rel="stylesheet" href="CSS/Homepage.css">
    <!--access to awesome Icons website-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
                <li><a href="Homepage.php" class="home-active">Home</a></li>
                <li><a href="Movie_now_showing.php">Movie</a></li>
                <li><a href="Food_and_Beverages.php">Food & Beverage</a></li>
                <li><a href="Review_index_page.php">Rate and Review</a></li>
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

    <main>
        
    </main>


    <section class="home swiper" id="home">
             <!-- Swiper -->
            <div class="swiper-wrapper">
                <!-- Box 1 -->
                <div class="swiper-slide container">
                    <img src="Image/Deadpool_slider.jpg" class="image-slider" alt="Deadpool">
                    <div class="home-text">
                        <span>Marvel Universe</span>
                        <h1>Deadpool <br/> & Wolverine</h1>
                        <a href="" class="btn">Book Now</a>
                        <a href=""><i class="fa-regular fa-circle-play"></i></a>
                    </div>
                </div>

                <!-- Box 2 -->
                <div class="swiper-slide container">
                    <img src="Image/Kung Fu Panda 4_slider.jpg" class="image-slider" alt="Kung Fu Panda 4">
                    <div class="home-text">
                        <h1>Kung Fu Panda <br/>4</h1>
                        <a href="" class="btn">Book Now</a>
                        <a href=""><i class="fa-regular fa-circle-play"></i></a>
                    </div>
                </div>

                <!-- Box 3 -->
                <div class="swiper-slide container">
                    <img src="Image/Evil Dead Rise movie_slider.jpg" class="image-slider" alt="Evil Dead Rise">
                    <div class="home-text">
                        <span>Evil Dead Rise</span>
                        <h1>Dawn <br/> of <br/> Evil </h1>
                        <a href="" class="btn">Book Now</a>
                        <a href=""><i class="fa-regular fa-circle-play"></i></a>
                    </div>
                </div>

                <!-- Box 4 -->
                <div class="swiper-slide container">
                    <img src="Image/Quantumiania_slider.jpg" class="image-slider" alt="Marvels Antman: Quantumania">
                    <div class="home-text">
                        <span>Marvels Universe</span>
                        <h1>Antman: <br/> Quantumania</h1>
                        <a href="" class="btn">Book Now</a>
                        <a href=""><i class="fa-regular fa-circle-play"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="swiper-pagination"></div>
    </section>

    <!-- Movies -->
    <section class="movies" id="movies">
        <h2 class="heading">Now Showing</h2>
        <!-- Movies Container -->
        <div class="movies-container-1">
            <!-- Movie Card 1 -->
            <div class="movie-card">
                <img src="Image/Evil Dead Rise movie.jpg" alt="Evil Dead Rise" class="card-image">
                    <div class="movie-title">
                        <h3>Evil Dead Rise</h3>
                        <span><i class="fa-solid fa-bookmark"></i> Horror</span>
                        <span><br/><i class="fa-solid fa-clock"></i> 175 min</span>
                        <span><br/><i class="fa-solid fa-language"></i> ENG</span>
                        <span><br/><i class="fa-solid fa-closed-captioning"></i> ENG</span>
                        <div class="movie-card-btn"><br/>Book Now</div>
                    </div>   
            </div>

            <!-- Movie Card 2 -->
            <div class="movie-card">
                <img src="Image/Evil Dead Rise movie.jpg" alt="Evil Dead Rise" class="card-image">
                    <div class="movie-title">
                        <h3>Evil Dead Rise</h3>
                        <span><i class="fa-solid fa-bookmark"></i> Horror</span>
                        <span><br/><i class="fa-solid fa-clock"></i> 175 min</span>
                        <span><br/><i class="fa-solid fa-language"></i> ENG</span>
                        <span><br/><i class="fa-solid fa-closed-captioning"></i> ENG</span>
                        <div class="movie-card-btn"><br/>Book Now</div>
                    </div>   
            </div>

            <!-- Movie Card 3 -->
            <div class="movie-card">
                <img src="Image/Evil Dead Rise movie.jpg" alt="Evil Dead Rise" class="card-image">
                    <div class="movie-title">
                        <h3>Evil Dead Rise</h3>
                        <span><i class="fa-solid fa-bookmark"></i> Horror</span>
                        <span><br/><i class="fa-solid fa-clock"></i> 175 min</span>
                        <span><br/><i class="fa-solid fa-language"></i> ENG</span>
                        <span><br/><i class="fa-solid fa-closed-captioning"></i> ENG</span>
                        <div class="movie-card-btn"><br/>Book Now</div>
                    </div>   
            </div>

            <!-- Movie Card 4 -->
            <div class="movie-card">
                <img src="Image/Evil Dead Rise movie.jpg" alt="Evil Dead Rise" class="card-image">
                    <div class="movie-title">
                        <h3>Evil Dead Rise</h3>
                        <span><i class="fa-solid fa-bookmark"></i> Horror</span>
                        <span><br/><i class="fa-solid fa-clock"></i> 175 min</span>
                        <span><br/><i class="fa-solid fa-language"></i> ENG</span>
                        <span><br/><i class="fa-solid fa-closed-captioning"></i> ENG</span>
                        <div class="movie-card-btn"><br/>Book Now</div>
                    </div>   
            </div>
        </div>
    </section>

    <!-- Comming Soon Movies -->
    <section class="comming" id="comming">
        <h2 class="heading">Coming Soon</h2>
        <!-- Movie Container 2 -->
        <div class="movie-container-2">
            <!-- Box 1 -->
            <div class="box">
                    <div class="box-img">
                        <img src="Image/Ghost Busters movie.jpg" alt="Ghost Busters">
                    </div>
                    <h2 class="heading"></h2>
                    <h3>Ghost Buster</h3>
                    <span><i class="fa-solid fa-bookmark"></i> Horror&nbsp;| </span>
                    <span><i class="fa-solid fa-clock"></i> 135 min</span>
                    
            </div>

             <!-- Box 2 -->
             <div class="box">
                <div class="box-img">
                    <img src="Image/Ghost Busters movie.jpg" alt="Ghost Busters">
                </div>
                <h2 class="heading"></h2>
                <h3>Ghost Buster</h3>
                <span><i class="fa-solid fa-bookmark"></i> Adventure&nbsp;|</span>
                <span><i class="fa-solid fa-clock"></i> 135 min</span>
            </div>

             <!-- Box 3 -->
             <div class="box">
                <div class="box-img">
                    <img src="Image/Mission Impossible movie.jpg" alt="Mission Impossible">
                </div>
                <h2 class="heading"></h2>
                <h3>Mission Impossible</h3>
                <span><i class="fa-solid fa-bookmark"></i> Action &nbsp;|</span>
                <span><i class="fa-solid fa-clock"></i> 165 min</span>
            </div>

             <!-- Box 4 -->
             <div class="box">
                <div class="box-img">
                    <img src="Image/Ghost Busters movie.jpg" alt="Ghost Busters">
                </div>
                <h2 class="heading"></h2>
                <h3>Ghost Buster</h3>
                <span><i class="fa-solid fa-bookmark"></i> Horror&nbsp;|</span>
                <span><i class="fa-solid fa-clock"></i> 135 min</span>
            </div>

            <!-- Box 5 -->
            <div class="box">
                <div class="box-img">
                    <img src="Image/Ghost Busters movie.jpg" alt="Ghost Busters">
                </div>
                <h2 class="heading"></h2>
                <h3>Ghost Buster</h3>
                <span><i class="fa-solid fa-bookmark"></i> Horror&nbsp;|</span>
                <span><i class="fa-solid fa-clock"></i> 135 min</span>
            </div>

             <!-- Box 6 -->
             <div class="box">
                <div class="box-img">
                    <img src="Image/Ghost Busters movie.jpg" alt="Ghost Busters">
                </div>
                <h2 class="heading"></h2>
                <h3>Ghost Buster</h3>
                <span><i class="fa-solid fa-bookmark"></i> Horror&nbsp;|</span>
                <span><i class="fa-solid fa-clock"></i> 135 min</span>
            </div>

             <!-- Box 7 -->
             <div class="box">
                <div class="box-img">
                    <img src="Image/Ghost Busters movie.jpg" alt="Ghost Busters">
                </div>
                <h2 class="heading"></h2>
                <h3>Ghost Buster</h3>
                <span><i class="fa-solid fa-bookmark"></i> Horror&nbsp;|</span>
                <span><i class="fa-solid fa-clock"></i> 135 min</span>
            </div>

             <!-- Box 8 -->
             <div class="box">
                <div class="box-img">
                    <img src="Image/Ghost Busters movie.jpg" alt="Ghost Busters">
                </div>
                <h2 class="heading"></h2>
                <h3>Ghost Buster</h3>
                <span><i class="fa-solid fa-bookmark"></i> Horror&nbsp;|</span>
                <span><i class="fa-solid fa-clock"></i> 135 min</span>
            </div>
        </div>
    </section>

    <!-- Footer -->
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
                        <li><a href="Homepage.php">Home</a></li>
                        <li><a href="">Movie</a></li>
                        <li><a href="">Food & Beverage</a></li>
                        <li><a href="">Rate and Review</a></li>
                        <li><a href="">History</a></li>
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

     <!-- Swiper JS -->
     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
     <!--Link To Custom JS-->
     <script src="JS/Homepage.js"></script>

</body>
</html>