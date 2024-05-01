<?php

class BookRepository
{
    private string $filename;

    public function __construct(string $theFilename) {
        $this->filename = $theFilename;
    }

    /**
	 * @return array of Book objects
	 */
	public function getAllBooks(): array {
		// If the file doesn't exist, we have no books to read!
		if (!file_exists($this->filename)) {
			return [];
		}

		// If we get a falsy value back from file_get_contents, we won't have anything to parse to JSON
		$fileContents = file_get_contents($this->filename);
		if (!$fileContents) {
			return [];
		}

		// The string happens to be in JSON format, so pass it to json_decode
		// The 2nd parameter requests an associative array return value
		$decodedBooks = json_decode($fileContents, true);
		if (json_last_error() !== JSON_ERROR_NONE) {
			return []; // A JSON error occurred in our parsing attempt -- return empty to the caller
		}

		// Create an empty list and fill the Book objects with the JSON
		$books = [];
		foreach ($decodedBooks as $bookData) {
			$books[] = (new Book())->fill($bookData);
		}

		// Return the array of Books back to the caller
		return $books;
	}

    public function saveBook(Book $book): void {
        // TODO
        //var_dump($book->getName());
        //var_dump($book->getAuthor());
        //var_dump($book->getInternationalStandardBookNumber());

        //$all[] = getAllBooks();
        $oneBook[] = $book;
        // $oneBook = $book->jsonSerialize();

        // foreach ($book as $b) {
        //     echo $b . PHP_EOL;
        // }

        //var_dump($oneBook);

        file_put_contents('book_store.json', json_encode($oneBook, JSON_PRETTY_PRINT) . PHP_EOL, FILE_APPEND);
    }
}

?>