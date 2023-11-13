<?php

declare(strict_types=1);

namespace MyProject\Context\BookStore\Review\Application;

use MyProject\Context\BookStore\Review\Domain\Review;
use MyProject\Context\BookStore\Review\Domain\ReviewAuthor;
use MyProject\Context\BookStore\Review\Domain\ReviewBookId;
use MyProject\Context\BookStore\Review\Domain\ReviewComment;
use MyProject\Context\BookStore\Review\Domain\ReviewId;
use MyProject\Context\BookStore\Review\Domain\ReviewRating;
use MyProject\Context\BookStore\Review\Domain\ReviewTitle;
use MyProject\Context\Shared\Infrastructure\EventBus;
use MyProject\Context\Shared\Infrastructure\Mailer\Mailer;

class CreateReviewService
{
    private EventBus $eventBus;
    private Mailer $mailer;

    public function __construct(EventBus $eventBus, Mailer $mailer)
    {
        $this->eventBus = $eventBus;
        $this->mailer = $mailer;
    }

    public function execute(CreateReviewRequest $request): void
    {
        // Crear una instancia de ReviewCreatedEventHandler y suscribirlo al EventBus
        $eventHandler = new ReviewCreatedEventHandler($this->mailer);

        $this->eventBus->subscribe($eventHandler);

        // Crear una revisión y publicar los eventos de dominio
        $review = Review::create(
            new ReviewId($request->id),
            new ReviewBookId($request->bookId),
            new ReviewTitle($request->title),
            new ReviewComment($request->comment),
            new ReviewRating($request->rating),
            new ReviewAuthor($request->author)
        );

        $events = $review->pullDomainEvents();

        $this->eventBus->publish(...$events);
    }
}
