<?php

declare(strict_types=1);

namespace MyProject\Context\Shared\Domain;

abstract class DomainEvent
{
    private readonly string $eventId;
    private readonly \DateTimeImmutable $occurredOn;

    public function __construct()
    {
        $this->occurredOn = new \DateTimeImmutable();
        $this->eventId = uniqid();
    }

    public function eventId(): string
    {
        return $this->eventId;
    }

    public function occurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }
}
