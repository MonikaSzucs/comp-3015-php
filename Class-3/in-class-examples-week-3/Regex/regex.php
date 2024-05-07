<?php
//  /            -       opening delimiter, see: https://www.php.net/manual/en/regexp.reference.delimiters.php
//  \d           -       digit
//  {4}          -       4 of the preceeding token
//  [a-zA-Z]     -       any lower or uppercase letter
//  {4}          -       4 of the preceeding token
//  $            -       matches the end of the string (string must end with the preceeding token)
// /             -       closing delimiter for the Perl Compatible Regular Expression (PCRE) pattern

$pattern = "/^\d{4}[a-zA-Z]{4}$/";
$subject = "1234ABCD";

// See: https://www.php.net/manual/en/function.preg-match.php
// Perform a regular expression match
// Return 1 (which is truthy) if $pattern matches $subject, 0 (falsey) if it does not match
if (preg_match($pattern, $subject)) {
    echo "$subject matches \"$pattern\"" . PHP_EOL;
} else {
    echo "$subject does NOT match \"$pattern\"" . PHP_EOL;
}
