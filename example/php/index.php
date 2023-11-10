<?php

declare(strict_types=1);

use MyProject\Context\BookStore\Book\Application\SearchAll\BooksFinder;
use MyProject\Context\BookStore\Book\Infrastructure\InMemoryBookRepository;

require 'vendor/autoload.php';

final class App
{

    function run()
    {
        try {

            $booksFinder = new BooksFinder(
                new InMemoryBookRepository()
            );

            $books = $booksFinder->find();

            echo json_encode($books);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}

$app = new App();
$app->run();
