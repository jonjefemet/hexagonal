<?php

declare(strict_types=1);

namespace MyProject\Context\BookStore\Book\Domain;

use MyProject\Context\Shared\Domain\ValueObject\NumberValueObject;

class BookPrice extends NumberValueObject
{

    public function __construct(int $value)
    {
        parent::__construct($value);
        $this->ensureIsPositive();
    }
}
