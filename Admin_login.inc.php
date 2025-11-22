<?php

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'Admin_function.inc.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: Admin_login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
}
else {
    header("location: Admin_panel.php");
    exit();
}