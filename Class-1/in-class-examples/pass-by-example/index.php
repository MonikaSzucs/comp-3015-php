<?php

//echo 'Example 1. double function: ' . PHP_EOL;

// everything will be passed by value in php
// What happens when we change the argument to: int &$x

//function double(int &$x): int { // this is if you want to update the values address
function double(int $x): int {
	return $x *= 2;
}

$value = 10;
$result = double($value);
echo "The \$value = $value, while the \$result = $result" . PHP_EOL . PHP_EOL;


echo 'Example 2. half function: ' . PHP_EOL;
$values = [ // # F00A0C
	1, 2, 3
];

//$temp = $values;
// What happens when we change the argument to: array &$values
function half(array $values): array {
	for ($i = 0; $i < count($values); $i++) {
		$values[$i] /= 2; // eqiv. to eg. $values[$i] = $values[$i] / 2;
	}
	return $values;
}
$halvedValues = half($values);
echo '$halvedValues is:' . PHP_EOL;
print_r($halvedValues); // see https://www.php.net/manual/en/function.print-r.php

echo '$values is:' . PHP_EOL;
print_r($values);
// For anyone who has done some C/C++ programming:
// The functionality above is different from languages such as
// C or C++, where passing an array to a function is equivalent to
// passing in a pointer to the first element of the array.
// In PHP, a copy of the array is made and passed to the function
// by default, unless we explicitly use '&' to specify pass-by-reference.
