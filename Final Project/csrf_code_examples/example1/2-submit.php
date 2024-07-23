<?php
// start sesssion
session_start();

// CHECK token must be set
if (!isset($_POST['token']) || !isset($_SESSION["token"])) {
    exit("Token not set");
}

// Check validate token - cross sites as long as bad websites cannot get a hold of the token
if ($_POST['token'] == $_SESSION['token']) {
    // check expiry
    if(time() >= $_SESSION["token-expire"]) {
        exit("Token expired. Reload the form.");
    }

    echo "Ok"; // proceed form submission
    unset($_SESSION['token']);
    unset($_SESSION['token-expire']);
} else {
    exit("Invalid token");
}