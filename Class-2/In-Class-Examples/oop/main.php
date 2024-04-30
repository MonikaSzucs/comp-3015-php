<?php

require_once 'User.php';

$users = [
    new User('Chris'),
    new User('Dave'),
    new User('Sam'),
];

$encodedUsers = json_encode($users, JSON_PRETTY_PRINT);

file_put_contents('users.json', $encodedUsers);

$result = file_get_contents('users.json');
var_dump($result);
