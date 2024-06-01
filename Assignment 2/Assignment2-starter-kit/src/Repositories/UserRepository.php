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
		return false;
	}

	/**
	 * @param string $email
	 * @return User|false
	 */
	public function getUserByEmail(string $email): User|false {
		// TODO
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
