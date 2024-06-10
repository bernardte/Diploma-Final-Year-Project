<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starlight Cinema</title>
    <link rel="stylesheet" href="CSS/Food_And_Beverages.css">
    <!--access to awesome Icons website-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- header -->
    <header>
        <a href="Homepage.php" class="logo">
            <i class="fa-solid fa-clapperboard"></i> Starlight Cinema
        </a>
        <!--Menu icons -->
        <div id="menu-icon"><i class="fa-solid fa-bars"></i></div>
            <!--Navigation Bar-->
            <ul class="navbar">
                <li><a href="Homepage.php">Home</a></li>
                <li><a href="Movie_now_showing.php">Movie</a></li>
                <li><a href="Food_and_Beverages.php" class="home-active">Food & Beverage</a></li>
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

    <!-- menu bar -->
    <div class="menu-bar">
        <div class="menu">
            <h3>Menu</h3>        
        </div>
        <!-- cart -->
        <div class="cart">
            <h3>Cart</h3>
        </div>
    </div>

    <!-- food list -->
    <div class="food">
        <div class="food_image_container">
            <img src="Image/popcorn 1.jpg" class="food_image"/>          
        </div>
        <!-- food details -->
        <div class="food_details">
            <div>
                <!-- food name -->
                <h2 class="food_name">Caramel Popcorn Regular</h2>
            </div>
            <div class="food_price">
                <div class="price_tag">
                    <h4>Price :</h4>
                </div>
                <div class="currency">
                    <h3>RM</h3>
                </div>
                <div>
                    <!-- food price -->
                    <h3>12.00</h3>
                </div>               
            </div>
            <!-- quantity +/- -->
            <div class="quantity">
                <button class="minus">-</button>
                <input type="number" class="input-box" value="1" min="1" max="10" disabled>
                <button class="plus">+</button>
              </div>
        </div>
        <!-- add to cart -->
        <?php
            if (isset($_SESSION["useruid"])) {
                echo "<div class='add_to_cart'>+</div>";
            }
        ?>
        
    </div>

    <!-- food list -->
    <div class="food">
        <div class="food_image_container">
            <img src="Image/popcorn 1.jpg" class="food_image"/>          
        </div>
        <!-- food details -->
        <div class="food_details">
            <div>
                <!-- food name -->
                <h2 class="food_name">Caramel Popcorn Regular</h2>
            </div>
            <div class="food_price">
                <div class="price_tag">
                    <h4>Price :</h4>
                </div>
                <div class="currency">
                    <h3>RM</h3>
                </div>
                <div>
                    <!-- food price -->
                    <h3>12.00</h3>
                </div>               
            </div>
            <!-- quantity +/- -->
            <div class="quantity">
                <button class="minus">-</button>
                <input type="number" class="input-box" value="1" min="1" max="10" disabled>
                <button class="plus">+</button>
              </div>
        </div>
        <!-- add to cart -->
        <?php
            if (isset($_SESSION["useruid"])) {
                echo "<div class='add_to_cart'>+</div>";
            }
        ?>
    </div>

    <!-- food list -->
    <div class="food">
        <div class="food_image_container">
            <img src="Image/popcorn 1.jpg" class="food_image"/>          
        </div>
        <!-- food details -->
        <div class="food_details">
            <div>
                <!-- food name -->
                <h2 class="food_name">Caramel Popcorn Regular</h2>
            </div>
            <div class="food_price">
                <div class="price_tag">
                    <h4>Price :</h4>
                </div>
                <div class="currency">
                    <h3>RM</h3>
                </div>
                <div>
                    <!-- food price -->
                    <h3>12.00</h3>
                </div>               
            </div>
            <!-- quantity +/- -->
            <div class="quantity">
                <button class="minus">-</button>
                <input type="number" class="input-box" value="1" min="1" max="10" disabled>
                <button class="plus">+</button>
              </div>
        </div>
        <!-- add to cart -->
        <?php
            if (isset($_SESSION["useruid"])) {
                echo "<div class='add_to_cart'>+</div>";
            }
        ?>
    </div>

    <!-- food list -->
    <div class="food">
        <div class="food_image_container">
            <img src="Image/popcorn 1.jpg" class="food_image"/>          
        </div>
        <!-- food details -->
        <div class="food_details">
            <div>
                <!-- food name -->
                <h2 class="food_name">Caramel Popcorn Regular</h2>
            </div>
            <div class="food_price">
                <div class="price_tag">
                    <h4>Price :</h4>
                </div>
                <div class="currency">
                    <h3>RM</h3>
                </div>
                <div>
                    <!-- food price -->
                    <h3>12.00</h3>
                </div>               
            </div>
            <!-- quantity +/- -->
            <div class="quantity">
                <button class="minus">-</button>
                <input type="number" class="input-box" value="1" min="1" max="10" disabled>
                <button class="plus">+</button>
              </div>
        </div>
        <!-- add to cart -->
        <?php
            if (isset($_SESSION["useruid"])) {
                echo "<div class='add_to_cart'>+</div>";
            }
        ?>
    </div>

    <!-- food list -->
    <div class="food">
        <div class="food_image_container">
            <img src="Image/popcorn 1.jpg" class="food_image"/>          
        </div>
        <!-- food details -->
        <div class="food_details">
            <div>
                <!-- food name -->
                <h2 class="food_name">Caramel Popcorn Regular</h2>
            </div>
            <div class="food_price">
                <div class="price_tag">
                    <h4>Price :</h4>
                </div>
                <div class="currency">
                    <h3>RM</h3>
                </div>
                <div>
                    <!-- food price -->
                    <h3>12.00</h3>
                </div>               
            </div>
            <!-- quantity +/- -->
            <div class="quantity">
                <button class="minus">-</button>
                <input type="number" class="input-box" value="1" min="1" max="10" disabled>
                <button class="plus">+</button>
              </div>
        </div>
        <!-- add to cart -->
        <?php
            if (isset($_SESSION["useruid"])) {
                echo "<div class='add_to_cart'>+</div>";
            }
        ?>
    </div>

    <!-- footer -->
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
                        <li><a href="Homepage.html">Home</a></li>
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Link To Custom JS-->
    <script src="JS/Food_And_Beverages.js"></script>

</body>
</html>

