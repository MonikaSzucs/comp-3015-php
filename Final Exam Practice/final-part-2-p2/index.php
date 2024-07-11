<?php

$file = "bcit.txt";
$contents = file_get_contents($file);
$lines = explode('\n', $contents);

$letters = array();
$count = 0;

foreach($lines as $word) {
    $chars = str_split($word);

    foreach ($chars as $char) {
        // only alphabetical characters
        if (ctype_alpha($char)) {
            if (isset($letters[$char])) {
                $letters[$char]++;
            } else {
                $letters[$char] = 1;
            }
        }
    }
}

// Prepare data in the desired format for JSON encoding
$formattedData = [];
foreach ($letters as $letter => $count) {
    $formattedData["$letter"] = $count;
}

// Convert the formatted data to JSON format
$jsonData = json_encode($formattedData, JSON_PRETTY_PRINT);

// Save the JSON data to a .json file
$outputFile = "letter_counts.json";
file_put_contents($outputFile, $jsonData);

echo "Letter counts saved to $outputFile successfully.";