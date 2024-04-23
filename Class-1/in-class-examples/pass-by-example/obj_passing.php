<?php

class User {
	private string $name;

	public function __construct(string $name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}

	public function setName(string $name) {
		$this->name = $name;
	}
}

function updateUser(User $user): User {
	$user->setName('Christian');
	return $user;
}

$user = new User('Chris');
$updatedUser = updateUser($user);
echo 'The $user name is: ' . $user->getName() . PHP_EOL;
echo 'The $updatedUser name is: ' . $updatedUser->getName() . PHP_EOL;

// When an object is passed to a function, a copy of the
// reference (memory address) is made, and passed by value.
// This acts like pass-by-reference since a copy of the memory address is passed.
