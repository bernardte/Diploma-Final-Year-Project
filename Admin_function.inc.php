<?php

//login
function emptyInputLogin($username, $pwd) {
    $result;

    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function loginUser($conn, $username, $pwd) {
    $uidExists = UidExist($conn, $username, $username);

    if ($uidExists === false) {
        header("location: Admin_login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);
    if ($checkPwd === false) {
        header("location: Admin_login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: Admin_panel.php?successlogin");
        exit();
    }
}


//Register
function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) {
    $result;

    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function invalidUid($username) {
    $result;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function invalidEmail($email) {
    $result;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function pwdMatch($pwd, $pwdrepeat) {
    $result;

    if ($pwd !== $pwdrepeat) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function UidExist($conn, $username) {
    $sql = "SELECT * FROM customers WHERE usersUid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: Admin_sign_up.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO customers (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: Admin_sign_up.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: Admin_login.php?error=none");
    exit();
}
