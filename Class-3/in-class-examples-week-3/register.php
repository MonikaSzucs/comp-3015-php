<?php 
// use POST so then the useranme and password doesn't show in browsers requests and 
// if you use POST it will be put in the body so no one will see it
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    $username = $_POST['username'];
    // set it on response not redirect user
    header('Location: dashboard.php?username=' . $username);
    exit; // current request is processed so app can exit and send response off to client
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>COMP 3015</title>
    </head>
    <body>
        <form action="register.php" method="post">
            <label>
                Username:
                <input type="text" name="username" placeholder="Your Username">
            </label>
            <label>
                Password:
                <input type="text" name="password" placeholder="Your Password">
            </label>
            <div>
                <input type="submit" value="Register">
            </div>
        </form>
    </body>
</html