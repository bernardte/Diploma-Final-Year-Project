<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) !== false) {
        header("location: Sign_up.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: Sign_up.php?error=invalidUid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: Sign_up.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdrepeat) !== false) {
        header("location: Sign_up.php?error=passworddontmatch");
        exit();
    }
    if (UidExist($conn, $username, $email) !== false) {
        header("location: Sign_up.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);


}
else {
    header("location: Sign_up.php");
    exit();
}