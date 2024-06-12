<?php

namespace src\Controllers;

class LogoutController extends Controller
{

	public function logout()
	{
		// TODO
		session_destroy(); // destroy session
		// header('Location: /login'); // this will send them to the login page
		// exit*
		// remove cookie set
		//setcookie('');
		$this->redirect('/login');
	}
}
