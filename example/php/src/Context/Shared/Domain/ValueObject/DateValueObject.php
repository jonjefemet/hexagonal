<?php

declare(strict_types=1);

namespace MyProject\Context\Shared\Domain\ValueObject;

use MyProject\Context\Shared\Domain\ValueObject\ValueObject;

abstract class DateValueObject extends ValueObject
{

    public function __construct(\DateTime $value)
    {
        parent::__construct($value);
    }

    public function getValue(): \DateTime
    {
        return $this->value;
    }
}
