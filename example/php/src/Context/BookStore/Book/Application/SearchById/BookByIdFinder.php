<?php

declare(strict_types=1);

namespace MyProject\Context\BookStore\Book\Application\SearchById;

use MyProject\Context\BookStore\Book\Domain\BookId;
use MyProject\Context\BookStore\Book\Domain\BookRepository;

class BookByIdFinder
{
    public function __construct(private readonly BookRepository $bookRepository)
    {
    }

    public function find(string $id): BookResponse
    {
        $book = $this->bookRepository->search(new BookId($id));

        return new BookResponse($book);
    }
}
