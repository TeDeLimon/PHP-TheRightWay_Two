<?php

declare(strict_types=1);

namespace App\Coffee;

/**
 * CoffeeMaker class
 * 
 * This class is a simple representation of a coffee maker.
 */
class CoffeeMaker
{
    public const SUCCESS_MESSAGE = 'Coffee is ready!';
    public const WAIT_MESSAGE = 'while taking a break from coding!';

    public static function makeCoffee(): void
    {
        echo static::class . ' is making coffee... ' . self::WAIT_MESSAGE . PHP_EOL;
    }
}
