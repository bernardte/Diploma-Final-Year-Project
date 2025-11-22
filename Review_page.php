<?php
    session_start();
    date_default_timezone_set('Asia/Kuala_Lumpur');
    include "comments.inc.php";
    include "dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate and Review</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom Homepage css  -->
    <link rel="stylesheet" href="CSS/Homepage.css">
    <!-- Custom Rate and Review css -->
    <link rel="stylesheet" href="CSS/Review_page.css"/>
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
                <li><a href="Review_index_page.php" class="home-active">Review</a></li>
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

    <section class="review">
        <div class="review-container">
            <div class="head"><h1><?php echo $_GET["movie"] ?></h1></div>
            <div class="review-text"> <p>We are glad to listen your review</p></div>
            <div class="commentbox">
                <div class="content">  
                    <?php
                    if (isset($_SESSION["userid"])) {
                        echo "<form method='POST' action='".setComments($conn)."'>";
                        echo "<input type='hidden' name='movie' value='".$_GET["movie"]."'>";
                        echo "<input type='hidden' name='userId' value='".$_SESSION['userid']."'>";
                        echo "<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>";
                        echo "<textarea placeholder='Comment here...' class='usercomment' name='message'></textarea>";
                        echo "<div class='submit-button'>
                            <button type='submit' id='Publish' name='commentSubmit'>Comment</button>
                            </div>";
                        echo "</form>";
                    }
                    else {
                        echo "You need to be logged in to comment!
                            <br><br>";
                    } 
                    ?> 
                    
                </div>
                <?php
                    getComments($conn, $_GET["movie"]);
                ?>
            </div>
        </div>
    </section> 

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

    <!-- Rate and review javascript custom -->
    <script src="JS/Review_page.js"></script>
    <script src="JS/Homepage.js"></script>
</body>
</html>