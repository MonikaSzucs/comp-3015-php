<?php
setcookie("Monika", "", time() - 3600);
setcookie("user", "", time() - 3600);
$cookie_user = "user"; // Key 
$cookie_age = 30; // Value

setcookie($cookie_user, $cookie_age, time() + (86400 * 30), '/screens');
?>

<html>
    <body>
        <?php
            if(!isset($_COOKIE[$cookie_user])) {
                echo "Cookie name '" . $cookie_user . "' is not set";
            } else {
                echo "Cookie '" . $cookie_user . "' and '" . $cookie_age . "' is set";
                echo "Value is: ". $_COOKIE[$cookie_user];
            }
        ?>
    </body>
</html>