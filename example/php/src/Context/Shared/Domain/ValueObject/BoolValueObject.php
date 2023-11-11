<?php

namespace MyProject\Context\Shared\Domain\ValueObject;

use MyProject\Context\Shared\Domain\ValueObject\ValueObject;

abstract class BoolValueObject extends ValueObject
{
    public function __construct(bool $value)
    {
        parent::__construct($value);
    }

    public function getValue(): bool
    {
        return $this->value;
    }
}
