<?php


function setComments($conn) {
    if (isset($_POST['commentSubmit'])) {
        $usersId = $_POST['userId'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $movieTitle = $_POST['movie'];

        $sql = "INSERT INTO comments (usersId, date, message, movieTitle) VALUES ('$usersId', '$date', '$message', '$movieTitle')";
        $result = $conn->query($sql);
    }

}

function getComments($conn, $movieTitle) {
    $sql = "SELECT * FROM comments WHERE movieTitle = '$movieTitle'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $usersId = $row['usersId'];
        $sql2 = "SELECT * FROM customers WHERE usersId = '$usersId'";
        $result2 = $conn->query($sql2); 
        if ($row2 = $result2->fetch_assoc()) {
            echo "<div class='show_comment'>";
            echo "<span class='userId'>".$row2['usersUid']."</span>";
            echo "<span class='date'>".$row['date']."</span><br>";
            echo "<div class='message'>".nl2br($row['message'])."</div>";
            if (isset($_SESSION['userid'])) {
                if ($_SESSION['userid'] == $row2['usersId']) {
                    echo "<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
                        <input type='hidden' name='cid' value='".$row['cid']."'>
                        <input type='hidden' name='movieTitle' value='".$row['movieTitle']."'>
                        <button type='submit' name='commentDelete'>Delete</button>
                    </form>
                    
                    <form class='edit-form' method='POST' action='editcomment.php'>
                        <input type='hidden' name='movie' value='".$row['movieTitle']."'>
                        <input type='hidden' name='cid' value='".$row['cid']."'>
                        <input type='hidden' name='usersId' value='".$row['usersId']."'>
                        <input type='hidden' name='date' value='".$row['date']."'>
                        <input type='hidden' name='message' value='".$row['message']."'>
                        <button type='submit'>Edit</button>
                    </form>";
                }
            }
            echo "</div>";
            
        }
        
    }
    
}

function editComments($conn) {
    if (isset($_POST['commentSubmit'])) {
        $cid = $_POST['cid'];
        $usersId = $_POST['usersId'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $movie = $_POST['movie'];

        $sql = "UPDATE comments SET message='$message' WHERE cid='$cid'";
        $result = $conn->query($sql);
        header("Location: Review_page.php?movie=$movie");
        exit();
    }

}

function deleteComments($conn) {
    if (isset($_POST['commentDelete'])) {
        $cid = $_POST['cid'];
        $movie = $_POST['movieTitle'];

        $sql = "DELETE FROM comments WHERE cid='$cid'";
        $result = $conn->query($sql);
        header("Location: Review_page.php?movie=$movie");
        exit();
    }
}


function getLogin($conn) {
    if (isset($_POST['loginSubmit'])) {
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];

        $sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) == 1) {
            if ($row = $result->fetch_assoc()) {
                $_SESSION['id'] = $row['id'];
                header("Location: index.php?loginsuccess");
                exit();
            }
        }
        else {
            header("Location: index.php?loginfailed");
            exit();
        }
    }
     
}

function userLogout() {
    if (isset($_POST['logoutSubmit'])) {
        session_start();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}