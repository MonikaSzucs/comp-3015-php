<?php
session_start();

if(isset($_SESSION['email'])) {
    session_unset();
}
// session_destroy();

// header('Location: index.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>

<body>
    This is the index page. From here, the user can either register or login.
    <div>
        <a href="login.php">Login</a>
    </div>

    <div>
        <a href="register.php">Register</a>
    </div>
</body>

</html>