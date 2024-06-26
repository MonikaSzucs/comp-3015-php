<?php

require_once 'Book.php';

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
        $books = $this->getAllBooks(); // use $this->getAllBooks() for the real lab instead of assigning an empty array here
        $books[] = $book; // add new book to the array

        file_put_contents('book_store.json', json_encode($books, JSON_PRETTY_PRINT));
    }

	/**
	  * Retrieves the book with the given ISBN, or null if no book with the specified ISBN is found.
	  * Note: for the purposes of this lab you may return the first occurrence if there are multiple books with the same ISBN in the file.
	  *
	  * @param string $isbn
	  * @return Book|null
	  */
	public function getBookByISBN(string $isbn): Book|null {
		// TODO
		// for the function getBookByISBN are we grabbing the book from the file 'book_stre.json' or somwhere else?
		$books = $this->getAllBooks();
		
		foreach ($books as $book) {
			if($books['isbn'] === $isbn) {
				return $book;
			}
		}
		return null;
	}

	/**
	* Retrieves the book with the given title, or null if no book of that title is found.
	* Note: for the purposes of this lab you may return the first occurrence if there are multiple books of the same title.
	*
	* @param string $title
	* @return Book|null
	*/
	public function getBookByTitle(string $title): Book|null {
	   	// TODO
		$books = $this->getAllBooks();
		
		foreach ($books as $book) {
			var_dump($book);
			if($book->getName() === $title) {
				return $book;
			}
		}
		return null;
	}


    /**
	 * Updates the book in the file with the given $isbn (the contents of that book is replaced by $newBook in the file)
	 * Hint: are you seeing the file have indexes added to the JSON? Look into https://www.php.net/manual/en/function.array-values.php
	 * @param string $isbn
	 * @param Book $newBook
	 */
	public function updateBook(string $isbn, Book $newBook): void {
		// TODO
        $fileContent = file_get_contents('book_store.json');

		$books = json_decode($fileContent, true);

		foreach ($books as &$book) {
			if ($book['isbn'] === $isbn) {	// now we know which book we're talking about	
				$book["name"] = $newBook->getName();
				$book["authorName"] = $newBook->getAuthor();
				$book["isbn"] = $newBook->getInternationalStandardBookNumber();
				break;
			}
		}
		unset($book);

        $books = json_encode($books, JSON_PRETTY_PRINT);
        file_put_contents('book_store.json', $books);
	}

	/**
	 * Deletes the book in the file with the given $isbn.
	 * Seeing indexes be added to the JSON? Look into https://www.php.net/manual/en/function.array-values.php
	 * @param string $isbn
	 */
	public function deleteBookByISBN(string $isbn): void {
		// TODO
		$books = $this->getAllBooks();

		// print all books inside $books using the index
		foreach ($books as $index => $book) {
			if ($books[$index]->getInternationalStandardBookNumber() == $isbn) {
				// we found our book
				unset($books[$index]); // gets rid of that object
				$books = array_values($books);
				break;
			}
		}

		file_put_contents('book_store.json', "");	// empties the file
		file_put_contents('book_store.json', json_encode($books, JSON_PRETTY_PRINT));
	}
}

?>