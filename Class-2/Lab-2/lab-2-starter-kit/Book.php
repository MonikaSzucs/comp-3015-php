<?php

class Book implements JsonSerializable{

	private string $name;
	private string $authorName;
	private string $isbn;

	public function __construct(string $theName = '', string $theAuthor = '', string $theIsbn = '') {
		$this->setName($theName);
		$this->setAuthor($theAuthor);
		$this->setInternationalStandardBookNumber($theIsbn);
	}

	/**
	 * @return string the name of the book author
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
	public function getAuthor(): string {
		return $this->authorName;
	}

	/**
	 * @param string $authorName
	 */
	public function setAuthor(string $authorName): void {
		$this->authorName = $authorName;
	}

	/**
	 * @return string
	 */
	public function getInternationalStandardBookNumber(): string {
		return $this->isbn;
	}

	/**
	 * @param string $isbn
	 */
	public function setInternationalStandardBookNumber(string $isbn): void {
		$this->isbn = $isbn;
	}

	/**
	 * @param $bookData
	 *  an associative array of book data e.g.
	 * // convert this array:
	 *      [
	 *          'name' => 'Lord of the Rings',
	 *          'author' => 'J.R.R Tolkien',
	 *          'isbn' => '9780358653035'
	 *      ]
	 * // into  User $user // $user->name
	 * // we want that comes out is a Book object
	 */
	public function fill(array $bookData): Book {
		foreach ($bookData as $key => $value) {
			$this->{$key} = $value; // dynamically add properties to the Book object
		}
		return $this;
	}

	// we want to conver associative arrays to objects
	// $user = (new User)->fill($userData)

	public function jsonSerialize(): mixed
    {
        // this will write the names in the users.json if you 
        // delete the key value paids in between the {}
        // return [
        //     'name' => $this->getName(),
        //     //'age' => $this->age()
        // ];

		
    }

}
