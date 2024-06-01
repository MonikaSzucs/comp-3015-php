<?php

// After logging in with an email ending in "bcit.ca", the user should be redirected here.
// Show the user a greeting message containing their email

// No guest users should be able to access this! If a guest user makes an HTTP request to
// this page, redirect them to login.php.

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <div>
        This is only for authenticated users!
    </div>
</body>

</html>