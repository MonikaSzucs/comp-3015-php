<?php

namespace src\Controllers;

use core\Request;
use PDOException;
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
	}
}
