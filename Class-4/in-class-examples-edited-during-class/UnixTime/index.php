<?php

// Helpful:
// https://www.epochconverter.com/
// https://en.wikipedia.org/wiki/Unix_time
// Possibly of interest: https://en.wikipedia.org/wiki/Year_2038_problem

date_default_timezone_set('America/Vancouver'); // set to Pacific Daylight Time

echo "Now:" . PHP_EOL;
$secondsElapsedSinceUnixEpoch = time();
$formattedDate = date('D, d M Y H:i:s T', $secondsElapsedSinceUnixEpoch);
echo "$secondsElapsedSinceUnixEpoch  -> $formattedDate" . PHP_EOL;


echo "Last year this time:" . PHP_EOL;
$secondsElapsedSinceUnixEpoch = time() - (60 * 60 * 24 * 365); // 60 sec/min * 60 min/hr * 24hr/day * 365 days/year
$formattedDate = date('D, d M Y H:i:s T', $secondsElapsedSinceUnixEpoch);
echo "$secondsElapsedSinceUnixEpoch  -> $formattedDate" . PHP_EOL;

echo "In 100 years:" . PHP_EOL;
$secondsElapsedSinceUnixEpoch = time() + (60 * 60 * 24 * 365 * 100);
$formattedDate = date('D, d M Y H:i:s T', $secondsElapsedSinceUnixEpoch);
echo "$secondsElapsedSinceUnixEpoch  -> $formattedDate" . PHP_EOL;
