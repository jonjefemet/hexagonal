<?php

declare(strict_types=1);

namespace MyProject\Context\BookStore\Review\Domain;

use MyProject\Context\Shared\Domain\ValueObject\StringValueObject;

class ReviewTitle extends StringValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->ensureIsNotEmpty();
    }
}
