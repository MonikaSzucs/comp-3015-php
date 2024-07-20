<html>
    <body>
        <?php
            if(isset($_COOKIE['user'])) {
                echo "The age of the user is " . $_COOKIE['user'];
            } else {
                echo 'the user is not set';
            }
        ?>
    </body>
</html>