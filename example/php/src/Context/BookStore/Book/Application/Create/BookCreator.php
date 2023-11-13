<?php

declare(strict_types=1);

namespace MyProject\Context\BookStore\Book\Application\Create;

use MyProject\Context\BookStore\Book\Domain\Book;
use MyProject\Context\BookStore\Book\Domain\BookRepository;

class BookCreator
{

    public function __construct(private readonly BookRepository $bookRepository)
    {
    }

    public function create(string $id, string $name, string $author, int $price): void
    {

        $book = Book::fromPrimitives(
            $id,
            $name,
            $author,
            $price
        );
        $this->bookRepository->save($book);
    }
}
