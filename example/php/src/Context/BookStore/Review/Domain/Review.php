<?php

declare(strict_types=1);

namespace MyProject\Context\BookStore\Review\Domain;

use MyProject\Context\Shared\Domain\AggregateRoot;

class Review extends AggregateRoot
{

    public readonly ReviewId $id;

    public readonly ReviewBookId $bookId;

    public readonly ReviewTitle $title;

    public readonly ReviewComment $comment;

    public readonly ReviewRating $rating;

    public readonly ReviewAuthor $author;


    public function __construct(ReviewId $id, ReviewBookId $bookId, ReviewTitle $title, ReviewComment $comment, ReviewRating $rating, ReviewAuthor $author)
    {
        $this->id = $id;
        $this->bookId = $bookId;
        $this->title = $title;
        $this->comment = $comment;
        $this->rating = $rating;
        $this->author = $author;
    }

    static public function create(ReviewId $id, ReviewBookId $bookId, ReviewTitle $title, ReviewComment $comment, ReviewRating $rating, ReviewAuthor $author): Review
    {
        $review = new Review($id, $bookId, $title, $comment, $rating, $author);
        $ensureIsValidCommentForReview = $rating->getValue() < 3 && strlen($comment->getValue()) > 5;

        if ($ensureIsValidCommentForReview) {
            $review->recordEvent(new ReviewCreatedDomainEvent($id, $bookId, $title, $comment, $rating, $author));
        }

        return $review;
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id->getValue(),
            'bookId' => $this->bookId->getValue(),
            'title' => $this->title->getValue(),
            'comment' => $this->comment->getValue(),
            'rating' => $this->rating->getValue(),
            'author' => $this->author->getValue(),
        ];
    }
}
