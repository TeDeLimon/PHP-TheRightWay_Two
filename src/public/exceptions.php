<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Motor\Oil;
use App\Motor\Motor;

//? Exceptions 

//? PHP 8.0 introduces a new feature called "throw expressions" that allows us to throw exceptions in a more concise way.

// This will throw an exception if the oil level is 0
//* $motor = new Motor(oil: new Oil('Synthetic', 0));

//This will throw an exception if the oil level is 15 or less
//* $motor = new Motor(oil: new Oil('Synthetic', 15));

$motor = new Motor(oil: new Oil('Synthetic'));

$motor->start();

try {

    $motor = new Motor(oil: new Oil('Synthetic'));

    $motor->shutdown();
} catch (\Exception $e) {

    // In this case, the exception is motor not running
    // If the oil level is 0 or 15 or less, the exception will be oil level is too low

    echo $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . PHP_EOL;
}
