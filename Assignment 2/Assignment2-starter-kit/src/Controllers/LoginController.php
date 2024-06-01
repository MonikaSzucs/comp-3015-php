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
	public function index(): void
	{
		$this->render('login');
	}

	/**
	 * Process the login attempt.
	 * @param Request $request
	 * @return void
	 */
	public function login(Request $request): void
	{
		// TODO
	}
}
