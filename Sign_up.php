<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starlight Cinema Login Page</title>
    <link rel="stylesheet" href="CSS/Sign_up.css">
</head>
<body>
    <div class="form-container">
        <form action="Sign_up.inc.php" method="POST">
            <div class="title"><p>Starlight Cinema</p></div>
            <div class="user_register"><p>User Register</p></div>
            <div class="sign_up_form">
                <label for="First Name" class="type-email-password-FirstName-LastName">Full Name:</label>
                <input type="text" name="name" placeholder="First Name">
                <label for="Last Name" class="type-email-password-FirstName-LastName">User ID:</label>
                <input type="text" name="uid" placeholder="User ID">
                <label for="email" class="type-email-password-FirstName-LastName"> Email: </label>
                <input type="text"  name="email" placeholder="Email">
                <label for="password" class="type-email-password-FirstName-LastName">Password: </label>
                <input type="password" name="pwd" placeholder="Password">
                <label for="password" class="type-email-password-FirstName-LastName">Repeat Password: </label>
                <input type="password" name="pwdrepeat" placeholder="Repeat Password..."/>
            </div>

            <div class="submit_button_account_exist">
                <input type="submit" class="submit_button" value="Sign Up" name="submit">
                <a href="Login.php">Have Account Exist</a>
            </div>
        </form>
    </div>
</body>
</html>