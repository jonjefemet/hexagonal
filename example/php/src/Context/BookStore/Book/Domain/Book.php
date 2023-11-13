<?php

declare(strict_types=1);

namespace MyProject\Context\BookStore\Book\Domain;

use MyProject\Context\Shared\Domain\AggregateRoot;

class Book extends AggregateRoot
{
    public readonly BookId $id;

    public readonly BookName $name;

    public readonly BookAuthor $author;

    public readonly BookPrice $price;


    public function __construct(BookId $id, BookName $name, BookAuthor $author, BookPrice $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->author = $author;
        $this->price = $price;
    }


    public static function fromPrimitives(string $id, string $name, string $author, int $price): self
    {
        return new self(
            new BookId($id),
            new BookName($name),
            new BookAuthor($author),
            new BookPrice($price)
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id->getValue(),
            'name' => $this->name->getValue(),
            'author' => $this->author->getValue(),
            'price' => $this->price->getValue(),
        ];
    }
} {
}
