<?php

namespace MyProject\Context\Shared\Domain\ValueObject;

abstract class ValueObject
{
    protected $value;

    public function __construct(mixed $value)
    {
        $this->value = $value;
        $this->ensureValueIsDefined();
    }

    final public function equals(ValueObject $valueObject): bool
    {
        return $this->value === $valueObject->value;
    }

    private function ensureValueIsDefined()
    {
        if (null === $this->value) {
            throw new \InvalidArgumentException(static::class . ' cannot be empty');
        }
    }

    abstract public function getValue();
}
