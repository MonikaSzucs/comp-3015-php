<?php
// START SESSION
session_start();

// Generate Random token
$_SESSION['token'] = bin2hex(random_bytes(32));
print_r($_SESSION);

// Set Expiry (less time for hackers to get access to this token)
$_SESSION["token-expire"] = time() + 3600; // 1 hour from now
?>

<!Doctype>
<html>
    <head>
        <title>PHP CSRF Token</title>
        <style></style>
    </head>
    <body>
        <form method="POST" autocomplete="off" action="2-submit.php">
            <input type="hidden" name="token" value="<?=$_SESSION["token"]?>"/>
            <input type="text" name="test" required/>
            <input type="submit" value="Go!"/>
        </form>
    </body>
</html>