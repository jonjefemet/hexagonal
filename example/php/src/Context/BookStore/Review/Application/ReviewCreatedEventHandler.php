<?php

declare(strict_types=1);

namespace MyProject\Context\BookStore\Review\Application;

use MyProject\Context\BookStore\Review\Domain\ReviewCreatedDomainEvent;
use MyProject\Context\Shared\Domain\EventSubscriber;
use MyProject\Context\Shared\Infrastructure\Mailer\Mailer;

class ReviewCreatedEventHandler implements EventSubscriber
{
    private Mailer $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public static function subscribedTo(): array
    {
        return [ReviewCreatedDomainEvent::class];
    }

    public function handle(ReviewCreatedDomainEvent $event): void
    {
        $message = "ID: {$event->eventId()} \n Book ID: {$event->bookId->getValue()} \n Title: {$event->title->getValue()} \n Comment: {$event->comment->getValue()}";
        $this->mailer->send('email@example.com', 'Nueva revisión creada', $message);
    }
}
