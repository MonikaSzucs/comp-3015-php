<?php

namespace src\Repositories;

use src\Models\User;

class UserRepository extends Repository {

	/**
	 * @param string $id
	 * @return User|false
	 */
	public function getUserById(string $id): User|false {
		// TODO
		$sqlStatement = $this->pdo->query("SELECT * FROM user");
		$rows = $sqlStatement->fetchAll();
		$users = [];
		foreach ($rows as $user) {
			if ($user->$id == $id) {
				$users[] = new User($user);
				return true;
			}
		}
		return false;
	}

	/**
	 * @param string $email
	 * @return User|false
	 */
	public function getUserByEmail(string $email): User|false {
		// TODO
		$sqlStatement = $this->pdo->query("SELECT * FROM user");
		$rows = $sqlStatement->fetchAll();
		$users = [];
		foreach ($rows as $user) {
			if($user->$email == $email) {
				$users[] = new User($user);
				return $users;
			}
		}
		return false;
	}

	/**
	 * @param string $passwordDigest
	 * @param string $email
	 * @param string $name
	 * @return User|false
	 */
	public function saveUser(string $name, string $email, string $passwordDigest): User|false {
		// TODO
		// $sqlStatement = $this->pdo->query("SELECT * from user");
		// $rows = $sqlStatement->fetchAll();
		// $users = [];
		// foreach ($rows as $user) {
		// 	if($user->$email == $email) {
		// 		$users[] = new User($user);
		// 		return $users;
		// 	}
		// };
		// return false;
		return false;
	}

	/**
	 * @param int $id
	 * @param string $name
	 * @param string|null $profilePicture
	 * @return bool
	 */
	public function updateUser(int $id, string $name, ?string $profilePicture = null): bool {
		// TODO 

		return false;
	}

}
