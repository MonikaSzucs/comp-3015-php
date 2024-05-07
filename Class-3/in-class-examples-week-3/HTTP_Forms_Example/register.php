<?php require_once 'helpers/helpers.php' ?>
<!doctype html>
<html lang="en">
<?php require_once 'layout/header.php' ?>
<body>
<div class="flex min-h-full flex-col justify-center mt-16 py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Register</h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            Already have an account?
            <a href="login.php" class="font-medium text-indigo-600 hover:text-indigo-500">Login</a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" action="#" method="POST">
                <div>
                    <span class="error"><?= isset($_GET['email_error']) ? htmlspecialchars($_GET['email_error']) : '' ?></span>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="text" autocomplete="email" class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <span class="error"><?= isset($_GET['password_error']) ? htmlspecialchars($_GET['password_error']) : '' ?></span>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<style>
    span.error {
        color: red;
    }
</style>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email = $_POST['email'];
	$password = $_POST['password']; // we will shortly see how to use cryptographic password hashing functions! Never store passwords in plaintext.

	if (!validEmail($email)) {
		header("Location: register.php?email_error=Invalid email");
        exit();
	}
    if (!validPassword($password)) {
		header("Location: register.php?password_error=Invalid password. Passwords must be at least 8 characters in length.");
        exit();
	}

	header("Location: welcome.php?from=register&email=$email");
	exit();
}
