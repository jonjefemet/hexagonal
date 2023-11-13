<?php

declare(strict_types=1);

namespace MyProject\Context\Shared\Domain\ValueObject;

abstract class EnumValueObject
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function equals(EnumValueObject $other): bool
    {
        return $this->value === $other->getValue();
    }
}
