<?php
session_start(); //start a new session or resume to existing one.
include 'dbh.inc.php';

// Check if usersUid is set in the session or is empty.
if (!isset($_SESSION['useruid']) || empty($_SESSION['useruid'])) {
    echo "Session variable usersUid is not set.";
    // Handle this situation (e.g., redirect to login page)
    header("Location: login.php");
    exit();// Stop further execution
    
}

//if the session variable 'useruid' is set, it mean userr is logged in
if(isset($_SESSION['useruid'])){
    $usersUid = $_SESSION['useruid'];//retrieve the value of the session variable and store in '$userUid' variable

    function getUsersId($conn, $usersUid){
        // Prepare SQL statement
        //Select the 'userId' column from the 'customers' table where the 'userUid' column matches the value of '$usersUid' 
        $sql = "SELECT usersId FROM customers WHERE usersUid = ?";
        $stmt = $conn->prepare($sql);//Prepare the SQL query using database connection

        if(!$stmt) {
            echo "Prepare statement error: " . $conn->error;
            return null;
        }

        // Bind parameter and execute statement
        //bind the '$usersUid' variable to the SQL query as a string parameter.
        $stmt->bind_param("s", $usersUid);
        $stmt->execute();

        // Bind result of the query to the '$usersId' variable.
        $stmt->bind_result($usersId);
        
        // Fetch and store the result
        $stmt->fetch();

        // Close statement
        $stmt->close();

        return $usersId;
    }

    // Call the function to retrieve usersId
    $usersId = getUsersId($conn, $usersUid);

    //if the 'userId' variable is null execute this if statement
    if($usersId == null){
        echo "No usersId fetched!";
    }
    //This line outputs an error message indicating that no user ID was fetched.
} else {
    echo "Session variable usersUid is not set.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--access to awesome Icons website-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
     integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Add to cart</title>
    <link rel="stylesheet" href="CSS/Add_to_cart.css">
    <script defer src="JS/Add_to_cart.js"></script>
    <script defer src="JS/Homepage.js"></script>
</head>
<body>

    <a href="Homepage.php" class="logo">
        <img src="Image/Admin Starlight Cinema logo.png" class="web_logo" />
    </a>
    
    <!--Navigation Bar-->
    <ul class="navbar">
        <li><a href="Homepage.php">Home</a></li>
        <li><a href="Movie_now_showing.php">Movie</a></li>
        <li><a href="Food_and_Beverages.php">Food & Beverage</a></li>
        <li><a href="Review_index_page.php">Rate and Review</a></li>
        <li><a href="Order_history.php">History</a></li>        
    </ul>

    <!-- If 'usersId' variable is set, or an empty string 
      is not set return the value of the '$usersId' -->
<input type="hidden" name="usersId" id ="usersId" value= "<?php echo isset($usersId) ? $usersId : ''; ?>" />
    <div class="container">
        <header>
            <h1>Food And Beverage</h1>
            <div class="cart">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="quantity">0</span>
            </div>
        </header>

        <div class="list"></div>

    </div>

    <div class="card">
        <h1>Cart</h1>
        <ul class="list-card"></ul>
        <div class="checkout">
           <a href="confirm_order.php"> <div class="total" onclick="callPHP(listCards)">0</div></a>
            <div class="close-cart">Close</div>
        </div>
    </div>

   
</body>
</html>
