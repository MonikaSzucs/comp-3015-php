<?php

class BookRepository
{
    private string $filename;

    public function __construct(string $theFilename) {
        $this->filename = $theFilename;
    }

    public function saveBook(Book $book): void {
        // TODO
        //var_dump($book->getName());
        //var_dump($book->getAuthor());
        //var_dump($book->getInternationalStandardBookNumber());
        $oneBook = $book->jsonSerialize();

        var_dump($oneBook);

        file_put_contents('book_store.json', json_encode($oneBook, JSON_PRETTY_PRINT) . PHP_EOL, FILE_APPEND);
    }
}

?>