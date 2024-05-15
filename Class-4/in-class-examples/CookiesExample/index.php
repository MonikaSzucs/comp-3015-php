<?php

// handles delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' 
&& isset($_POST['reset']) 
&& $_POST['reset'] === 'default-page-state') {
    setcookie('theme', '', time() - (60 * 60 * 24 *365)); // expirey set to time in past
    unset($_COOKIE['theme']);
    $theme = 'dark';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['theme'])) {
    $theme = $_POST['theme'];
    setcookie('theme', $theme, time() + 60 * 60 * 24); // https://www.php.net/manual/en/function.setcookie.php
} else {
    if (isset($_COOKIE['theme'])) {
        $theme = $_COOKIE['theme'];
    } else {
        $theme = 'light'; // default to dark theme if there isn't a cookie
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookies Example</title>
</head>

<body <?php echo isset($theme) ? "class=$theme" : "class='dark'" ?>>
    <form action="index.php" method="post">
        <div>
            <label>
                Light:
                <input type="radio" value="light" name="theme" <?php echo $theme === 'light' ? "checked='checked'" : '' ?>>
            </label>
        </div>
        <div>
            <label>
                Dark:
                <input type="radio" value="dark" name="theme" <?php echo $theme === 'dark' ? "checked='checked'" : '' ?>>
            </label>
        </div>
        <input type="submit" value="Change" class="submit-btn">
    </form>

    <form action="index.php" method="post">
        <input type="hidden" value="default-page-state" name="reset">
        <input type="submit" value="Clear Cookie">
    </form>
</body>

</html>

<style>
    .dark {
        background-color: slategray;
    }

    .light {
        background-color: lightblue;
    }

    .submit-btn {
        margin-top: 5px;
        padding: 5px;
    }
</style>