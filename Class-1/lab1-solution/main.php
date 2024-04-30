<?php

// Lab 1, part 1

/**
 * Remove invalid shows from the assoc. array that is passed as a parameter, 
 * and return an array which contains only valid entries.
 * 
 * Hint: look into https://www.php.net/manual/en/function.unset.php
 * 
 * @param array $shows: an associative array of shows in a format following: 
 *              ['name' => '<date string>', ...]
 * @return array: an associative array containing shows that don't have 
 *                empty strings or null values for their names and dates
 */
function filterInvalidShows(array $shows): array {
	foreach ($shows as $showName => $dates) {
		if (empty($showName) || empty($dates)) {
			unset($shows[$showName]);
		}
	}
	return $shows;
}

/**
 * Prints the show data in a "name: <aired dates>" format.
 * 
 * @param array $shows: the shows to print
 * @return void
 */
function displayShowInfo(array $shows): void {
	foreach ($shows as $showName => $dates) {
		echo nl2br("$showName: $dates" . PHP_EOL);
	}
}

// An associative array of show names and associated dates when the shows aired
$shows = [
	'Curb Your Enthusiasm' => 'October 15th, 2000 - Current',
	'Futurama' => 'March 1999 - Current (with a few breaks)',
	'Invalid data1' => '',
	'Invalid data2' => null,
	null => 'December 17, 1999 - Current',
	'' => 'December 30, 1999 - Current',
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lab 1, Part 1</title>
</head>

<body>

	<?php displayShowInfo(filterInvalidShows($shows)); ?>

</body>

</html>
