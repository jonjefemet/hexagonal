<?php

declare(strict_types=1);

namespace MyProject\Context\Shared\Domain\ValueObject;

use MyProject\Context\Shared\Domain\ValueObject\ValueObject;

abstract class NumberValueObject extends ValueObject
{

    public function __construct(int $value)
    {
        parent::__construct($value);
    }

    protected function ensureIsPositive(): void
    {
        if ($this->value < 0) {
            throw new \InvalidArgumentException(
                sprintf('<%s> Not is a positive number  <%s>.', static::class, $this->value)
            );
        }
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
