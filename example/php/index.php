<?php

declare(strict_types=1);

use MyProject\Context\BookStore\Book\Application\Create\BookCreator;
use MyProject\Context\BookStore\Book\Application\SearchAll\BooksFinder;
use MyProject\Context\BookStore\Book\Application\SearchById\BookByIdFinder;
use MyProject\Context\BookStore\Book\Infrastructure\InMemoryBookRepository;
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
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}

$app = new App();
$app->run();
