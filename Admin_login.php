<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starlight Cinema Login Page</title>
    <link rel="stylesheet" href="CSS/Login.css">
</head>
<body>
    <form action="Admin_login.inc.php" method="POST">
        <h1>Starlight Cinema</h1>
        <label for="email" class="type-email-password-FirstName-LastName"> Username: </label>
        <input type="text" id="email" name="uid" placeholder="Username" >

        <label for="password" class="type-email-password-FirstName-LastName">Password: </label>
        <input type="password" id="password" name="pwd" placeholder="Password" >
        
        <input type="submit" class="submit-button" value="Login" name="submit">

        <div>New Admin? &nbsp;<a href="Admin_sign_up.php">Register Now</a></div>
    </form>
</body>
</html>