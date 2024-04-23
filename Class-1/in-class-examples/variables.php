<?php

$age = 28; // integer
$name = "Dave"; // string
$employed = true; // boolean
$weightInLbs = 185.5; // floating point
$heightInInches = 75; // integer
$heightInFeet = $heightInInches / 12;

// echo used to output information
// can embed varaibles in the string
echo "$name is $age years old." . PHP_EOL; // platform independent way of doing a new line so its good for windows and MAC
echo "$name is $heightInFeet feet tall, and weighs $weightInLbs pounds." . PHP_EOL;

$jobTitle = 'Software dev';
// https://www.php.net/manual/en/function.isset.php
if (isset($jobTitle)) {
    echo "$name works as a $jobTitle" . PHP_EOL;
}
