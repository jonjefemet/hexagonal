<?php

use MyProject\Context\BookStore\Book\Domain\Book;
use MyProject\Utilities\UuidGenerator;

require 'vendor/autoload.php';

final class App
{

    function run()
    {
        try {
            $uuid = UuidGenerator::generate();
            $book = new Book($uuid, 'Clean Code');
            echo json_encode($book->toPrimitives());
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}

$app = new App();
$app->run();
