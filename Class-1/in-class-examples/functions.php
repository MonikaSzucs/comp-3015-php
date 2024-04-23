<?php

// no generics in php 

/**
 * @param array<integer> $values
 * @return int
 */
function sumValues(array $values): int
{
    $sum = 0;
    foreach ($values as $value) {
        $sum += $value;
    }
    return $sum;
}

function sumValues2(array $values): int
{
    $sum = 0;
    for($i = 0; $i < count($values); $i++) {
        $sum += $values[$i];
    }
    return $sum;
}

$numbers = [-10, 10, 20, 100];
$sum = sumValues($numbers);
echo "$sum" . PHP_EOL;
