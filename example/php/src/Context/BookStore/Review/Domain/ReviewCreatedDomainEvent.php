<?php

declare(strict_types=1);

namespace MyProject\Context\BookStore\Review\Domain;

use MyProject\Context\Shared\Domain\DomainEvent;

class ReviewCreatedDomainEvent extends DomainEvent
{
    public readonly ReviewId $reviewId;
    public readonly ReviewBookId $bookId;
    public readonly ReviewTitle $title;
    public readonly ReviewComment $comment;

    public function __construct(ReviewId $reviewId, ReviewBookId $bookId, ReviewTitle $title, ReviewComment $comment)
    {
        parent::__construct();

        $this->reviewId = $reviewId;
        $this->bookId = $bookId;
        $this->title = $title;
        $this->comment = $comment;
    }
}
