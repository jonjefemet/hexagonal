<?php

declare(strict_types=1);

namespace MyProject\Context\Shared\Domain;

abstract class AggregateRoot
{
    private array $domainEvents = [];

    protected function recordEvent(DomainEvent $event): void
    {
        $this->domainEvents[] = $event;
    }

    public function pullDomainEvents(): array
    {
        $events = $this->domainEvents;
        $this->domainEvents = [];

        return $events;
    }

    abstract public function toPrimitives(): array;
}
