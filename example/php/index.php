<?php

declare(strict_types=1);

require 'vendor/autoload.php';

final class App
{

    function run()
    {
        try {
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}

$app = new App();
$app->run();
