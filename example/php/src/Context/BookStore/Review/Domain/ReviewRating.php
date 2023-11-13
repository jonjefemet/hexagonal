<?php

declare(strict_types=1);

namespace MyProject\Context\BookStore\Review\Domain;

use MyProject\Context\Shared\Domain\ValueObject\NumberValueObject;
use MyProject\Context\Shared\Domain\ValueObject\UuidValueObject;

class ReviewRating extends NumberValueObject
{

    public function __construct(int $value)
    {
        parent::__construct($value);
        $this->ensureIsPositive();
        $this->ensureValidRange();
    }

    private function ensureValidRange(): void
    {
        if ($this->getValue() < 0 || $this->getValue() > 5) {
            throw new \InvalidArgumentException(
                sprintf('<%s> Not is a valid rating  <%s>.', static::class, $this->getValue())
            );
        }
    }
}
