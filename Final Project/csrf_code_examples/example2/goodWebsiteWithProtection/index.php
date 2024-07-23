<?php
    session_start();
    if(empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
    $token = $_SESSION['token'];
?>

<!DOCTYPE html>
<html>
    <header>

    </header>
    <body>
        <form action="getting.php" method="POST">
            <input type="text" name="data"/>
            <input type="submit" value="submit form"/>
            <input type="hidden" name="token" value="<?php echo $token;?>"/>
        </form>
    </body>
</html>