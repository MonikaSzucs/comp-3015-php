<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <title>article</title>
    </head>
    <body>
        <?php require_once 'layout/navigation.php' ?>

        <?php if(isset($_GET['username'])): ?>
            <?= htmlspecialchars($_GET['username']) ?>, welcome to the site
        <?php endif ?>
    </body>
</html>