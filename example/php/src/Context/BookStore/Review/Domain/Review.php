<?php

namespace MyProject\Context\BookStore\Review\Domain;

use MyProject\Context\Shared\Domain\AggregateRoot;

class Review extends AggregateRoot
{
    public function toPrimitives(): array
    {
        return [];
    }
}
