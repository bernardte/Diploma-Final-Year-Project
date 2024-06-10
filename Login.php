<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starlight Cinema Login Page</title>
    <link rel="stylesheet" href="CSS/Login.css">
</head>
<body>
    <form action="Login.inc.php" method="POST">
        <span>Starlight Cinema<br/></span>
        <div>
            <label for="email" class="type-email-password-FirstName-LastName"> Username: </label>
            <input type="text" id="email" name="uid" placeholder="Username" >
        </div>

        <div>
            <label for="password" class="type-email-password-FirstName-LastName">Password: </label>
            <input type="password" id="password" name="pwd" placeholder="Password" >
        </div>
        <input type="submit" id="submit-button" value="Login" name="submit">

        <p>New User ? &nbsp;<a href="Sign_up.php">Register Now</a></p>
    </form>
</body>
</html>