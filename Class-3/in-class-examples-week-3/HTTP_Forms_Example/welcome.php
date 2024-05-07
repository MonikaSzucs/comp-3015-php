<?php
$from = null;
$welcomeMessage = null;
if (isset($_GET['from'])) {
	$from = $_GET['from'];
	if ($from === 'login') {
		$welcomeMessage = 'Good to see you again!';
	} else if ($from === 'register') {
		if (isset($_GET['email'])) {
			$email = $_GET['email'];
			$welcomeMessage = "Welcome $email! Thanks for registering.";
		}
	} else {
		// error case
	}
}
?>

<!doctype html>
<html lang="en">
<?php require_once 'layout/header.php' ?>
<body>
<?php require_once 'layout/navigation.php' ?>
<div class="container mx-auto mt-20 pl-20">
	<?= htmlspecialchars($welcomeMessage) ?>
</div>
</body>
</html>
