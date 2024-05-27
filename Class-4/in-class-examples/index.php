<?php 

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'grant') {
        $_SESSION['access_granted'] = true;
        header('Location: new.php');
    } else {
        $_SESSION = [];
        session_destroy();
        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Main Page</title>
    </head>

    <body>
        <form action="index.php" method="POST">
            <input type="hidden" value="grant" name="action">
            <input type="submit" value="Grant me access">
        </form>
        <form action="index.php" method="POST">
            <input type="hidden" value="revoke" name="action">
            <input type="submit" value="Revoke access!">
        </form>

        <?php
            if (isset($_SESSION['access_granted']) && $_SESSION['access_granted'] === true) {
                echo 'Access Granted';
            } else {
                echo (isset($_SESSION['error_message'])) ? $_SESSION['error_message'] : 'no access';
                unset($_SESSION['error_message']);
            }
        ?>
    </body>
</html>