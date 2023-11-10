<?php

namespace MyProject\Context\BookStore\Book\Domain;

interface BookRepository
{
    public function save(Book $book): void;

    public function search(BookId $id): ?Book;
}
