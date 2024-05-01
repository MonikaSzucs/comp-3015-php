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
$briefHistoryOfTime = new Book('A Brief History of time', 'Stephen Hawking', '9780553380163');
//$twentyThousandLeaguesUnderTheSea = new Book('20,000 Leagues Under the Sea', 'Jules Verne', '9781949460575');


// save the new books in the repository
$bookRepository->saveBook($lordOfTheRings);
$bookRepository->saveBook($briefHistoryOfTime);
//$bookRepository->saveBook($twentyThousandLeaguesUnderTheSea);
?>