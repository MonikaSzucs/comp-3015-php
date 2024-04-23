<?php

$beverageInventory = [
    'Coffee' => 99,
    'Water' => 'Unlimited',
    'Juice' => 64,
    'Soda' => 256,
];

unset($beverageInventory['Coffee']);

$beverageInventory['Tea'] = 10;

echo $beverageInventory['Coffee'];

foreach ($beverageInventory as $drinkType => $currentInventory) {
    echo "$drinkType: $currentInventory" . PHP_EOL;
}
