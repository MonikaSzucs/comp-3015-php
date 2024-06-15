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
		// save the user settings to the db
		// save the new image to /public/image/...

		print_r("NAME : " . $_POST['name']);
		print_r("NAME : " . basename($_FILES['profile_picture']['name']));
		
		if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
			$uploadDir = '../public/images/';
			$uploadedFile = $_FILES['profile_picture']['tmp_name'];
			$destination = $uploadDir . $_SESSION['user_id'] . ".jpg";
	
			if (move_uploaded_file($uploadedFile, $destination)) {
				// save to db and quit
				$result = (new UserRepository())->updateUser($_SESSION['user_id'], $_POST['name'], ($_SESSION['user_id'] . '.jpg'));
			} else {
				echo "Possible file upload attack!\n";
			}
		} 
		else { // not uploaded a photo
			// check if user_id photo alraedy exists in /images/
			$currentUser = (new UserRepository())->getUserById($_SESSION['user_id']);
			$currentImage = file_exists("../public/images/" . $_SESSION['user_id'] . ".jpg");

			if ($currentImage) {
				$currentImage = $_SESSION['user_id'] . ".jpg";
			} else {
				$currentImage = "default.jpg";
			}

			// check if a photo already exists or not
			$result = (new UserRepository())->updateUser($_SESSION['user_id'], $_POST['name'], $currentImage);
		}

		if (!$result) {
			echo "<script>alert(User could not be updated, please try again later.);</script>";
		}
		header("Location: /");

	}
}
