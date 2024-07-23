<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $_SESSION['posted'] = true;
    $_SESSION['data'] = $_POST['data'];
}

die("form posted successfully");