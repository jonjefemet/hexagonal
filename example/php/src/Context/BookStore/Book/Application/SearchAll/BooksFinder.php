<?php

namespace MyProject\Context\BookStore\Book\Application\SearchAll;

use MyProject\Context\BookStore\Book\Domain\BookRepository;

class BooksFinder
{
    public function __construct(private BookRepository $CourseRepository)
    {
    }

    public function find(): BooksResponse
    {

        $books = $this->CourseRepository->searchAll();
        return new BooksResponse($books);
    }
}
