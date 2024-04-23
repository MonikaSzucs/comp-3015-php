<?php

// Optional content: filter, map, reduce.

$numbers = [10, -10, 50];

// https://www.php.net/manual/en/function.array-filter
// keep only the entries that meet the condition in the callback
$positiveNumbers = array_filter($numbers, function ($number) {
    return $number > 0;
});
echo "Filtered positive numbers:" . PHP_EOL;
print_r($positiveNumbers);

// https://www.php.net/manual/en/function.array-map
// apply this function to each entry in the array
$doubledValues = array_map(function ($number) {
    return $number * 2;
}, $positiveNumbers);

// Think of array_map as creating a of inputs to outputs using a function:
// eg.
// 10 -> fn(n) => n * 2 -> 20
// 50 -> fn(n) => n * 2 -> 100
echo "Mapped doubled values:" . PHP_EOL;
print_r($doubledValues);

// Reduce all entries to a single value using a function
// https://www.php.net/manual/en/function.array-reduce.php
$sum = array_reduce($doubledValues, function ($carry, $number) {
    $carry += $number;
    return $carry;
});

echo "Reduced value:" . PHP_EOL;
print_r($sum . PHP_EOL);
