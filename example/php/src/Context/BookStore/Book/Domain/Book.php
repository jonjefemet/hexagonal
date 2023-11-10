<?php

namespace MyProject\Context\BookStore\Book\Domain;

use MyProject\Context\Shared\Domain\AggregateRoot;

class Book extends AggregateRoot
{
    public BookId $id;

    public BookName $name;

    public function __construct(string $id, string $name)
    {
        $this->id = new BookId($id);
        $this->name = new BookName($name);
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id->getValue(),
            'name' => $this->name->getValue(),
        ];
    }
} {
}
