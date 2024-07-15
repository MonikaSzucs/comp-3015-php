<?php

require_once 'User.php';

// $user = new User('Chris');
// $user2 = new User();

// var_dump($user);
// var_dump($user2);

$users = [
    new User('Chris'),
    new User('Dave'),
    new User('Sam'),
];

// function login(User $user) {
//     // ...
// }

// login(new User);

// json_encode needs to know hwo to look at user objects
// JSON_PRETTY_PRINT - these are flags that are optional parameters that make things look nicer in the json file/terminal
$encodedUsers = json_encode($users, JSON_PRETTY_PRINT);

file_put_contents('users.json', $encodedUsers);

$result = file_get_contents('users.json');
var_dump($result);

echo phpinfo();