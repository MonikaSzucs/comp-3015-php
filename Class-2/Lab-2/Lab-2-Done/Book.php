<?php

class Book implements JsonSerializable 
{
    private string $name;
    private string $authorName;
    private string $isbn;

    public function __construct(string $theName = '', string $theAuthor = '', string $theIsbn = '') {
        $this->setName($theName);
        $this->setAuthor($theAuthor);
        $this->setInternationalStandardBookNumber($theIsbn);
    }

    public function getName(): string {
        return $this->name;
    }

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

    public function fill(array $bookData): Book {
        foreach ($bookData as $key => $value) {
            $this->{$key} = $value;
        }
        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'name' => $this->name,
            'authorName' => $this->authorName,
            'isbn' => $this->isbn
        ];
    }
}
?>