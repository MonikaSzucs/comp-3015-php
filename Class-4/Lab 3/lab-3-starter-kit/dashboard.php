<?php

// After logging in with an email ending in "bcit.ca", the user should be redirected here.
// Show the user a greeting message containing their email

// No guest users should be able to access this! If a guest user makes an HTTP request to
// this page, redirect them to login.php.
session_start();


// if(isset($_SESSION['telephone'])) {
//     unset($_SESSION['telephone']);
// }

if (!isset($_SESSION['access_granted']) || $_SESSION['access_granted'] == false) {
    $_SESSION['error_message'] = 'You do not have access to the dashboard.php page.';
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">

    <div class="min-h-full flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div>
                This is only for authenticated users!
            </div>
            <div class="">
                <?php
                    print_r('Welcome ' . $_SESSION["email"]);
                ?>
            </div>
        </div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded h-10 my-10"><a href="logout.php">logout</a></button>
    </div>
</body>

</html>