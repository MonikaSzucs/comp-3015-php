<?php

require_once 'Book.php';
require_once 'BookRepository.php';

function printBook(Book $book) {
    printf("\t- %s (with ISBN: %s) written by %s" . PHP_EOL,
        $book->getName(),
        $book->getInternationalStandardBookNumber(),
        $book->getAuthor()
    );
};

// createa  new BookRepository
$bookRepository = new BookRepository('book_store.json');

// create some books
$lordOfTheRings = new Book('Lord of the rings', 'j.r.. tol', '9780358653035');
$briefHistoryOfTime = new Book('A Brief History of time', "Stephen Hawking", '9780553380163');
$twentyThousandLeaguesUnderTheSea = new Book('20,000 Leagues Under the Sea', 'Jules Verne', '9781949460575');

// save the new books in the repository
$bookRepository->saveBook($lordOfTheRings);
$bookRepository->saveBook($briefHistoryOfTime);
$bookRepository->saveBook($twentyThousandLeaguesUnderTheSea);

// Get them and loop over them
$books = $bookRepository->getAllBooks();
printf(PHP_EOL . "There are %d books saved to the store:" . PHP_EOL, count($books));
foreach ($books as $book) {
	printBook($book);
}

// Carry out some operations on the books in the repository
printf(PHP_EOL . "We will now carry out some update and delete operations on the store." . PHP_EOL . PHP_EOL);
echo 'Updating book with ISBN "9780358653035" (Lord of the Rings), to have the correct author and title.' . PHP_EOL;
$bookRepository->updateBook("9780358653035", new Book("The Lord of the Rings", "J.R.R. Tolkien", "9780358653035"));
$bookRepository->updateBook("9780553380163", new Book("A Brief History of Time", "Stephen Hawking", "9780553380163"));
$bookRepository->deleteBookByISBN("9780553380163");


?>