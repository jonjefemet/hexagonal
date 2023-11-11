<?php

namespace MyProject\Context\BookStore\Book\Application\SearchAll;

use MyProject\Context\BookStore\Book\Domain\BookRepository;

class BooksFinder
{
    public function __construct(private readonly BookRepository $bookRepository)
    {
    }

    public function find(): BooksResponse
    {

        $books = $this->bookRepository->searchAll();
        return new BooksResponse($books);
    }
}
