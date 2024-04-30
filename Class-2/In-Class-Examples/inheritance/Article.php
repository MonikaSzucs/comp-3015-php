<?php

class Article extends Model {

	private string $title;
	private string $url;

	/**
	 * @param string $title
	 * @param string $url
	 */
	public function __construct(string $title, string $url) {
		$this->title = $title;
		$this->url = $url;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string {
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title): void {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getUrl(): string {
		return $this->url;
	}

	/**
	 * @param string $url
	 */
	public function setUrl(string $url): void {
		$this->url = $url;
	}

}
