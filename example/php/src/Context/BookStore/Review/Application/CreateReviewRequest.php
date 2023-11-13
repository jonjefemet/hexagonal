<?php

declare(strict_types=1);

namespace MyProject\Context\BookStore\Review\Application;

class CreateReviewRequest
{
    public readonly string $id;
    public readonly string $bookId;
    public readonly string $title;
    public readonly string $comment;
    public readonly int $rating;
    public readonly string $author;

    public function __construct(string $id, string $bookId, string $title, string $comment, int $rating, string $author)
    {
        $this->id = $id;
        $this->bookId = $bookId;
        $this->title = $title;
        $this->comment = $comment;
        $this->rating = $rating;
        $this->author = $author;
    }
}
