<?php

const BOOKS_FILE = "books.txt";

/**
 * @param string $bookName
 */
function addBook(string $bookName): void
{
	file_put_contents(BOOKS_FILE, $bookName . PHP_EOL, FILE_APPEND);	
}

/**
 * @param string $currentName the name of the book to change (from)
 * @param string $newName the new name of the book (to)
 */
function updateBook(string $currentName, string $newName): void
{
	// TODO
}

/**
 * @param string $bookName the name of the book to be deleted
 */
function deleteBook(string $bookName): void
{
	$fileContent = file_get_contents(BOOKS_FILE);
	$bookNames = explode(PHP_EOL, $fileContent);
	for ($i = 0; $i < count($bookNames); $i++) {
		if ($bookNames[$i] === $bookName) {
			unset($bookNames[$i]);
		}
	}
	$bookNames = implode(PHP_EOL, $bookNames);
	file_put_contents(BOOKS_FILE, $bookNames);
}

addBook("20,000 Leagues Under the Sea");
addBook("Alice's Adventures in Wonderland");
addBook("Through the Looking-glass");
addBook("A Brief History of Time");
updateBook("Through the Looking-glass", "Through the Looking-glass and what Alice Found There");
deleteBook("20,000 Leagues Under the Sea");
