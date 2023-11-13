<?php

declare(strict_types=1);

namespace MyProject\Context\BookStore\Book\Application\SearchAll;

class BooksResponse
{
    public array $books;

    /**
     * @param Book[] $books
     */
    public function __construct(array $books)
    {
        $this->books = array_map(function ($book) {
            return $book->toPrimitives();
        }, $books);
    }
}
