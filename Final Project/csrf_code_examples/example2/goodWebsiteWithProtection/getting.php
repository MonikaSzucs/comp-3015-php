<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    // $_SESSION['posted'] = true;
    // $_SESSION['data'] = $_POST['data'];
    if (!empty($_POST['token'])) {
        if (hash_equals($_SESSION['token'], $_POST['token'])) {
            //die('Form posted successfully.');
            unset($_SESSION["token"]);
            $_SESSION['posted'] = true;
            $_SESSION['data'] = $_POST['data'];
            die("Post successfully submitted");
        } else {
            die("invaid CSRF token");
        }
    } else {
        die("CSRF token not found");
    }
}

// header("Location: index.php");
// or
die("form posted successfully");