<?php


//     <form action="index.php" method="post">
//         <input type="hidden" value="default-page-state" name="reset">
//         <input type="submit" value="Clear Cookie">
//     </form>
// Handles deleting cookies
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['reset']) && $_POST['reset'] === 'default-page-state'
) {
    setcookie(
        name: 'theme',
        value: '',
        expires_or_options: time() - (60 * 60 * 24 * 365),
        domain: 'localhost'
    ); // expire the cookie.
    unset($_COOKIE['theme']); // ensure we also clear the theme in $_COOKIE
    $theme = 'dark'; // reset the colour
}

// Handles changing the colour
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['theme'])) {
    $theme = $_POST['theme'];
    setcookie(
        name: 'theme',
        value: $theme,
        secure: false,
        httponly: true,
    ); // https://www.php.net/manual/en/function.setcookie.php
} else {
    if (isset($_COOKIE['theme'])) {
        $theme = $_COOKIE['theme'];
    } else {
        $theme = 'dark'; // default to dark theme
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
        display: inline-block;
        padding: 5px;
    }
</style>