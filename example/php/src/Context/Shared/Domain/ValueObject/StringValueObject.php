<?php

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
}
