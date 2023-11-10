<?php

namespace MyProject\Context\Shared\Domain\ValueObject;

use MyProject\Context\Shared\Domain\ValueObject\ValueObject;

abstract class DateValueObject extends ValueObject
{
    public function __construct(\DateTime $value)
    {
        parent::__construct($value);
    }
}