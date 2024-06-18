<?php

// requiring in files to make this work
// require_once './app/src/User/User.php';
// require_once './app/src/Company/Company.php';

use App\Src\User\User as User;
use App\Src\Company\Company as Company;

// We can autoload manually using https://www.php.net/manual/en/function.spl-autoload-register.php
// The anonymous function registered to spl_autoload_register is called when PHP needs to access a class that has not been defined.
// For example: This is called `autoloading`

// callable is a type in php we can pass in a function to invoke at some point
// call this function if it calls a function it doesn't know 
spl_autoload_register(function($classToLoad) {
	echo 'Anonymous function registered to spl_autoload_register called for loading ' . $classToLoad . PHP_EOL . PHP_EOL;
    $filePath = __DIR__ . '/' . lcfirst(str_replace('\\', '/', $classToLoad)) . '.php';
	require $filePath;
});


$company = new Company(); // this pathway is the fully qualified class name - it doesn't know what it is
$user = new User();

$user->setEmail('chris@test.co');
$company->setName('Test Co.');

echo 'The email ' . $user->getEmail() . ' belongs to ' . $company->getName() . PHP_EOL;
