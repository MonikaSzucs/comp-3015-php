<?php

namespace src\Controllers;

class LogoutController extends Controller
{

	public function logout()
	{
		// TODO
		session_destroy(); // destroy session
		$this->redirect('/login');
	}
}
