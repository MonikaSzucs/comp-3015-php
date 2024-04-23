<?php

$drinks = ['Coffee', 'Water', 'Juice', 'Soda'];

for ($i = 0; $i < count($drinks); $i++) {
   	echo $drinks[$i] . PHP_EOL;
}

// $drinks = [
// 	0 => 'Coffee',
// 	1 => 'Water',
// 	2 => 'Juice',
// 	3 => 'Soda'
// ];

foreach ($drinks as $index => $drink) {
    echo "index: " . $index . " drink: ". $drink . PHP_EOL;
}

// $drinks[] = 'Pop';
// unset($drinks[3]);
// print_r($drinks);


// $index = 0;
// while ($index < count($drinks)) {
//     echo $drinks[$index] . PHP_EOL;
//     $index++;
// }
