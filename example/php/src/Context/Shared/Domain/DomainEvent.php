<?php

namespace MyProject\Context\Shared\Domain;

abstract class DomainEvent
{
    private \DateTimeImmutable $occurredOn;

    public function __construct()
    {
        $this->occurredOn = new \DateTimeImmutable();
    }

    public function occurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }
}
