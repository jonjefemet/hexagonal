<?php

namespace MyProject\Context\Shared\Domain\ValueObject;

use MyProject\Context\Shared\Domain\ValueObject\ValueObject;

abstract class NumberValueObject extends ValueObject
{
    public function __construct(int $value)
    {
        parent::__construct($value);
    }
}
