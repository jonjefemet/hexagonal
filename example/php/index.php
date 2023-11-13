<?php

declare(strict_types=1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use MyProject\Context\BookStore\Book\Application\Create\BookCreator;
use MyProject\Context\BookStore\Book\Application\SearchAll\BooksFinder;
use MyProject\Context\BookStore\Book\Application\SearchById\BookByIdFinder;
use MyProject\Context\BookStore\Book\Infrastructure\InMemoryBookRepository;
use MyProject\Context\BookStore\Review\Application\CreateReviewRequest;
use MyProject\Context\BookStore\Review\Application\CreateReviewService;
use MyProject\Context\Shared\Infrastructure\EventBus;
use MyProject\Context\Shared\Infrastructure\Mailer\GmailMailer;
use MyProject\Utilities\UuidGenerator;

require 'vendor/autoload.php';

final class App
{

    function run()
    {
        try {

            $bookRepository = new InMemoryBookRepository();

            $booksFinder = new BooksFinder(
                $bookRepository
            );

            $books = $booksFinder->find();

            echo "\n";
            echo json_encode($books);

            $bookCreator = new BookCreator(
                $bookRepository
            );

            $id = UuidGenerator::generate();
            $bookCreator->create(
                $id,
                'Clean Code',
                'Robert C. Martin',
                25
            );

            $bookFinder = new BookByIdFinder(
                $bookRepository
            );

            $book = $bookFinder->find($id);

            echo "\n";
            echo json_encode($book);

            $books = $booksFinder->find();
            echo "\n";
            echo json_encode($books);

            $eventBus = new EventBus();
            $gmialMailer = new GmailMailer();
            $request = new CreateReviewRequest(
                UuidGenerator::generate(),
                UuidGenerator::generate(),
                'Clean Code',
                'This is a comment',
                2,
                'John Doe'
            );
            echo "\n";
            echo json_encode($request);

            $review = new CreateReviewService(
                $eventBus,
                $gmialMailer
            );

            echo "\n";
            $review->execute($request);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}

$app = new App();
$app->run();
