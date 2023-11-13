<?php

namespace MyProject\Context\Shared\Infrastructure;

use MyProject\Context\Shared\Domain\DomainEvent;
use MyProject\Context\Shared\Domain\EventSubscriber;

class EventBus
{
    private array $subscribers = [];

    public function subscribe(EventSubscriber $subscriber): void
    {
        foreach ($subscriber::subscribedTo() as $eventClass) {
            $this->subscribers[$eventClass][] = $subscriber;
        }
    }

    public function publish(DomainEvent ...$events): void
    {
        foreach ($events as $event) {
            $this->publishEvent($event);
        }
    }

    private function publishEvent(DomainEvent $event): void
    {
        $eventClass = get_class($event);

        if (!isset($this->subscribers[$eventClass])) {
            return;
        }

        foreach ($this->subscribers[$eventClass] as $subscriber) {
            $subscriber->handle($event);
        }
    }
}
