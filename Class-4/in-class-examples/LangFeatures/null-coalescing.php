<?php
// PHP 7.0 feature

// The two examples below are equivalent, try commenting out $_GET['username'] = 'Chris'; below

// null coalescing
$_GET['username'] = 'Chris';

// ex 1
$usernameOne = $_GET['username'] ?? 'Guest';
echo $usernameOne . PHP_EOL;

// ex 2
$usernameTwo = isset($_GET['username']) ? $_GET['username'] : 'Guest';
echo $usernameTwo . PHP_EOL;

// ex 3
if(isset($_GET['username'])) {
    $username = $_GET['username'];

} else {
    $username = 'guest';
}