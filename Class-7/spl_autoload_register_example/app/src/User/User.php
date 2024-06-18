<?php

namespace App\Src\User;

class User {

	private string $email;
	private string $lastName;
	private string $firstName;
	private string $passwordDigest;

	/**
	 * @return string
	 */
	public function getEmail(): string {
		return $this->email;
	}

	/**
	 * @param string $email
	 */
	public function setEmail(string $email): void {
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getLastName(): string {
		return $this->lastName;
	}

	/**
	 * @param string $lastName
	 */
	public function setLastName(string $lastName): void {
		$this->lastName = $lastName;
	}

	/**
	 * @return string
	 */
	public function getFirstName(): string {
		return $this->firstName;
	}

	/**
	 * @param string $firstName
	 */
	public function setFirstName(string $firstName): void {
		$this->firstName = $firstName;
	}

	/**
	 * @return string
	 */
	public function getPasswordDigest(): string {
		return $this->passwordDigest;
	}

	/**
	 * @param string $passwordDigest
	 */
	public function setPasswordDigest(string $passwordDigest): void {
		$this->passwordDigest = $passwordDigest;
	}

}
