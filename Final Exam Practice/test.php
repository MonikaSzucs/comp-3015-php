<?php

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['password']) && isset($_GET['username'])) {
        $password = md5($_GET['password']);
        $username = $_GET['username'];
        $mysqli = new mysqli("loclhost", "root", "", "db_name_here", 3306);
        $mysqli->query("INSERT INTO users (username, password) VALUES ('{$username}', '{$password}')");
        header("Location: index.php?name=$username");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>C3015 Question</title>
    </head>
    <body>
        <form action="register.php" method="GET">
            <label for="username">Username:</label>
            <input id="username" type="text" name="username">
            <label for="password">Username:</label>
            <input id="password" type="text" name="password">
            <input type="submit" value="Register">
        </form>
    </body>
</html>