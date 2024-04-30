<?php

require_once 'User.php';
require_once 'SuperUser.php';

$user = new User('1', 'chris@bcit.ca', '...password...');
$adminUser = new SuperUser('2', 'admin@bcit.ca', '...password...');

echo 'The email of the $user is: '. $user->getEmail() . PHP_EOL;
echo 'The email of the $adminUser is: ' . $adminUser->getEmail() . PHP_EOL;
$adminUser->inviteNewUser('example.email@gmail.com');
