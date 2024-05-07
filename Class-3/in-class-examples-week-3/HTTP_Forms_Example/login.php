<?php require_once 'helpers/helpers.php'?>
<!doctype html>
<html lang="en">
<?php require_once 'layout/header.php' ?>
<body>
<div class="flex min-h-full items-center justify-center mt-20 py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Forms Example - Sign In</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Don't have an account?
                <a href="register.php" class="font-medium text-indigo-600 hover:text-indigo-500">Register Today</a>
            </p>
        </div>
        <form class="mt-8 space-y-6" action="login.php" method="POST">
            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <span class="error"><?= isset($_GET['email_error']) ? htmlspecialchars($_GET['email_error']) : '' ?></span>
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="text" autocomplete="email"
                           class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                           placeholder="Email address">
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password"
                           class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                           placeholder="Password">
                </div>
                <span class="error"><?= isset($_GET['password_error']) ? ($_GET['password_error']) : '' ?></span>
            </div>

            <div class="flex items-center justify-between">
                <div class="text-sm">
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
                </div>
            </div>

            <div>
                <button type="submit"
                        class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                      <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <!-- Heroicon name: mini/lock-closed -->
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                             xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd"
                                d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                clip-rule="evenodd"/>
                        </svg>
                      </span>
                    Sign in
                </button>
            </div>
        </form>
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
	$password = $_POST['password'];

	if (!validEmail($email)) {
		header("Location: login.php?email_error=Invalid email");
		exit();
	}
	if (!validPassword($password)) {
		header("Location: login.php?password_error=Invalid password. Passwords must be at least 8 characters in length.");
		exit();
	}

	header("Location: welcome.php?from=login&msg=greeting");
	exit();
}
