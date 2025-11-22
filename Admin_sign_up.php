<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starlight Cinema Login Page</title>
    <link rel="stylesheet" href="CSS/Sign_up.css">
</head>
<body>
    <form action="Sign_up.inc.php" method="POST">
        <h1>Starlight Cinema</h1>
        <h2>Admin Register</h2>
        <label for="First Name" class="type-email-password-FirstName-LastName">Full Name:</label>
        <input type="text" name="name" placeholder="First Name">
        <label for="Last Name" class="type-email-password-FirstName-LastName">Username:</label>
        <input type="text" name="uid" placeholder="Username">
        <label for="email" class="type-email-password-FirstName-LastName"> Email: </label>
        <input type="text"  name="email" placeholder="Email">
        <label for="password" class="type-email-password-FirstName-LastName">Password: </label>
        <input type="password" name="pwd" placeholder="Password">
        <label for="password" class="type-email-password-FirstName-LastName">Repeat Password: </label>
        <input type="password" name="pwdrepeat" placeholder="Repeat Password..."/>
        <input type="submit" class="submit_button" value="Sign Up" name="submit">
        <div>Have Account Exist? <a href="Admin_login.php">Login now</a></div>
    </form>
    </div>
</body>
</html>