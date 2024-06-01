<?php

namespace src\Controllers;

use core\Request;
use src\Repositories\UserRepository;

class SettingsController extends Controller
{

	/**
	 * @param Request $request
	 * @return void
	 */
	public function index(Request $request): void
	{
		// TODO
		$this->render('settings', [
			'user' => null
		]);
	}

	/**
	 * @param Request $request
	 * @return void
	 */
	public function update(Request $request): void
	{
		// TODO
	}
}
