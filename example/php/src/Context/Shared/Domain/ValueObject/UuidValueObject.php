<?php

declare(strict_types=1);

namespace MyProject\Context\Shared\Domain\ValueObject;


class UuidValueObject extends StringValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->ensureValueIsUuid($value);
    }

    private function ensureValueIsUuid(string $value): void
    {
        if (!preg_match('/^[a-f\d]{8}(-[a-f\d]{4}){4}[a-f\d]{8}$/i', $value)) {
            throw new \InvalidArgumentException(
                sprintf('<%s> Invalid UUID <%s>.', static::class, $this->value)
            );
        }
    }
}
