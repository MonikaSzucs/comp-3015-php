<?php

namespace src\Controllers;

use core\Request;
use src\Repositories\UserRepository;

class LoginController extends Controller
{

	/**
	 * Show the login page.
	 * @return void
	 */
	public function index(): void // render a view file
	{
		$this->render('login'); // takes string of login where it will look at views directory then find the login.view.php
	}

	/**
	 * Process the login attempt.
	 * @param Request $request
	 * @return void
	 */
	public function login(Request $request): void
	{
		// TODO
		echo "LOGIN WAS CALLED!" . PHP_EOL;
		$email = $_POST['email'];
		$password = $_POST['password'];

		$errors = false;
		
		//echo "LOGIN WAS CALLED!" . PHP_EOL;
		print_r($email);
		print_r($password);

		$userRepository = new UserRepository();
		$user = $userRepository->getUserByEmail($email);

		//print_r("The user: " . $user . " and new password digest is " . $password_digest);
		
		if ($user == false) { // no user found
			$_SESSION["email_error"] = "User not found, please register\n";
			$errors = true;
		} else if(password_verify($password, $user->password_digest)) { // if user does exist then do this
			// set a global variable saying we're logged in
			$_SESSION['user_id'] = $user->id; // keeps user logged in
			$this->render('index', ['user_id' => $user->id]);
			header('Location: /');
			exit();
		} else {	// if user supplied the wrong password
			$_SESSION["email_error"] = "Incorrect password\n";
			$errors = true;
		}

		if ($errors) {
			header('Location: /login');
			exit();
		}
	}
}
