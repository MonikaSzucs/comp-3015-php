<?php

$name = 'Chris';

// ex 1.
// if ($name) {
//     echo 'The user is authenticated' . PHP_EOL;
// } else {
//     echo 'The user is not authenticated' . PHP_EOL;
// }

// ex 2.
echo $name
    ? "The user is authenticated and has name $name" . PHP_EOL
    : 'The user is not authenticated' . PHP_EOL;
