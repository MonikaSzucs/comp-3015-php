<?php

namespace src\Controllers;

use core\Request;
use PDOException;
use src\Models\User;
use src\Repositories\UserRepository;

class RegistrationController extends Controller
{

	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->render('register');
	}

	public function register(Request $request): void
	{
		// TODO
		$name = $_POST['name'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		$errors = false;
		$passwordGranted = false;
		$nameGranted = false;

		if (!validatePassword($password)) {
			$_SESSION['password_error'] = 'Invalid Password: Password must be at least 9 characters long and have one symbol';
			$errors = true;
		} else {
			$passwordGranted = true;
		}

		if (empty($name)) {
			$_SESSION["name_error"] = 'Invalid Name: Must be at least one character';
			$errors = true;
		} else {
			$nameGranted = true;
		}

		if ($errors) {
			$_SESSION['password'] = $_POST['password'];
			header('Location: /register');
			exit();
		}

		if ($nameGranted && $passwordGranted) {
			// save user
			$passwordHashed = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12,]);
			$userRepository = new UserRepository();
			// string $name, string $email, string $passwordDigest
			$result = $userRepository->saveUser($name, $email, $passwordHashed);
			if (!$result) {
				print_r("Could not create new user in the Database.\n");
				header('Location: /register');
			} else {
				$_SESSION['access_granted'] = true;
				$_SESSION['email'] = $_POST['email'];
				header('Location: /login');
			}
			exit();
		}
	}
}
