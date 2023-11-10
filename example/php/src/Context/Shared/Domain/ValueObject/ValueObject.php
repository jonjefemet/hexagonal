<?php

namespace MyProject\Context\Shared\Domain\ValueObject;

abstract class ValueObject
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
        $this->ensureValueIsDefined();
    }

    public function getValue()
    {
        return $this->value;
    }

    private function ensureValueIsDefined()
    {
        if (null === $this->value) {
            throw new \InvalidArgumentException(static::class . ' cannot be empty');
        }
    }
}
