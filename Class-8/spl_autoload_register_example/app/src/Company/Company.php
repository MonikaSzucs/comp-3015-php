<?php

namespace App\Src\Company;

class Company {

	private string $name;
	private string $logo;
	private string $onTrialUntil;

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name): void {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getLogo(): string {
		return $this->logo;
	}

	/**
	 * @param string $logo
	 */
	public function setLogo(string $logo): void {
		$this->logo = $logo;
	}

	/**
	 * @return string
	 */
	public function getOnTrialUntil(): string {
		return $this->onTrialUntil;
	}

	/**
	 * @param string $onTrialUntil
	 */
	public function setOnTrialUntil(string $onTrialUntil): void {
		$this->onTrialUntil = $onTrialUntil;
	}

}