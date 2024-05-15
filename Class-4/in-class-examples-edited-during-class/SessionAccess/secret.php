<?php
session_start();
$secret = "0987654321";

if (!isset($_SESSION['access_granted']) || $_SESSION['access_granted'] == false) {
    $_SESSION['error_message'] = 'You do not have access to the secret.php page.';
    header('Location: index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Page</title>
</head>

<body>
    <?= "The secret is: $secret" ?>
</body>

</html>