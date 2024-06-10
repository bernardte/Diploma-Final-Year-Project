<?php
    date_default_timezone_set('Asia/Kuala_Lumpur');
    include 'dbh.inc.php';
    include 'comments.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="CSS/Review_page.css">
</head>

<body>
    <?php
    $cid = $_POST['cid'];
    $usersId = $_POST['usersId'];
    $date = $_POST['date'];
    $message = $_POST['message'];
    $movie = $_POST['movie'];

    echo "<div class='edit-page'>";
    echo "<h2 class='text'>Edit your comment</h2>";
    echo "<form class='edit-field' method='POST' action='".editComments($conn)."'>
        <input type='hidden' name='cid' value='".$cid."'>
        <input type='hidden' name='usersId' value='".$usersId."'>
        <input type='hidden' name='date' value='".$date."'>
        <input type='hidden' name='movie' value='".$movie."'>
        <textarea class='usercomment' name='message'/>".$message."</textarea><br>
        <button type='submit' name='commentSubmit'>Edit</button>
    </form>";
    echo "</div>";

    ?>

    <!-- link to custom JS -->
    <script src="JS/Edit_comment.js"></script>
</body>
</html>