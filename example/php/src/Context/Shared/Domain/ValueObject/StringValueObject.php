<?php

declare(strict_types=1);

namespace MyProject\Context\Shared\Domain\ValueObject;

use MyProject\Context\Shared\Domain\ValueObject\ValueObject;

abstract class StringValueObject extends ValueObject
{

    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    protected function ensureIsNotEmpty()
    {
        if (empty($this->value)) {
            throw new \InvalidArgumentException(static::class . ' cannot be empty');
        }
    }
}
