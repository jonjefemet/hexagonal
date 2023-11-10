<?php

namespace MyProject\Context\BookStore\Book\Infrastructure;

use MyProject\Context\BookStore\Book\Domain\Book;
use MyProject\Context\BookStore\Book\Domain\BookId;
use MyProject\Context\BookStore\Book\Domain\BookRepository;

class InMemoryBookRepository implements BookRepository
{

    private array $books = [
        "47f12d35-1f92-4ecb-97cc-5ad1aaa65e29" => [
            'id' => "47f12d35-1f92-4ecb-97cc-5ad1aaa65e29",
            'name' => "The Lord of the Rings",
            'author' => "J. R. R. Tolkien",
            'price' => 10,
        ],
    ];

    public function save(Book $book): void
    {
        $this->books[$book->id->getValue()] = $book->toPrimitives();
    }

    public function search(BookId $id): ?Book
    {
        $book = $this->books[$id->getValue()] ?? null;

        if ($book === null) return null;

        return Book::fromPrimitives(
            $book['id'],
            $book['name'],
            $book['author'],
            $book['price']
        );
    }

    public function searchAll(): array
    {
        return array_map(function ($book) {
            return Book::fromPrimitives(
                $book['id'],
                $book['name'],
                $book['author'],
                $book['price']
            );
        }, $this->books);
    }
}
