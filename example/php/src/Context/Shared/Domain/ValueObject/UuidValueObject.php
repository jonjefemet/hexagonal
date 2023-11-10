<?php

namespace MyProject\Context\Shared\Domain\ValueObject;

use MyProject\Context\Shared\Domain\ValueObject\ValueObject;

class UuidValueObject extends ValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->ensureValueIsUuid($value);
    }

    private function ensureValueIsUuid(string $value): void
    {
        if (!preg_match('/^[a-f\d]{8}(-[a-f\d]{4}){4}[a-f\d]{8}$/i', $value)) {
            throw new \InvalidArgumentException('Invalid UUID');
        }
    }
}
