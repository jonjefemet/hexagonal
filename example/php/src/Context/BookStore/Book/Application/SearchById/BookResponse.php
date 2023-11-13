<?php

declare(strict_types=1);

namespace MyProject\Context\BookStore\Book\Application\SearchById;

use MyProject\Context\BookStore\Book\Domain\Book;

class BookResponse
{
    public $book;

    public function __construct(Book $book)
    {
        $this->book = $book->toPrimitives();
    }
}
