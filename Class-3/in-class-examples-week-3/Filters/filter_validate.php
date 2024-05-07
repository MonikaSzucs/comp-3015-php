<?php

$email = 'christian_fenn@bcit.ca';

// https://www.php.net/manual/en/function.filter-var.php
// Filters a variable with a specified filter, in this case: FILTER_VALIDATE_EMAIL
// See: https://www.php.net/manual/en/filter.filters.validate.php
$validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
if ($validEmail) {
    echo "$email is valid!" . PHP_EOL;
} else {
    echo "$email is NOT valid" . PHP_EOL;
}

// Internally, regex is used:
// https://github.com/php/php-src/blob/2c4534a5b92cc4093dc282cbf384d756ef490dfc/ext/filter/logical_filters.c#L651
