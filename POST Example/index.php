<!DOCTYPE html>
<html>
    <?php require_once 'layout/header.php'?>
    <body>
        <?php require_once 'layout/navigation.php'?>
        <h2>Articles</h2>
        <h1>Home Page</h1>
        <form action="index.php" method="POST">
            Username: <input type="text" name="username">
            Password: <input type="password" name="password">
            <input type="submit" value="register">
        </form>
    </body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //var_dump($_POST);
        $username = $_POST['username'];
        header('Location: dashboard.php?username='. $username);
        exit;
    }

?>