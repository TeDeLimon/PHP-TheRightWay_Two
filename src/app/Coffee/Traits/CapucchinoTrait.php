<?php

declare(strict_types=1);

namespace App\Coffee\Traits;

/**
 * CapucchinoTrait trait
 * 
 * This trait has a method to make capucchino coffee.
 */
trait CapucchinoTrait
{

    public const WAIT_MESSAGE = 'while taking a break from coding!';

    public static function makeCapucchino(): void
    {
        echo static::class . ' is making capucchino coffee... ' . self::WAIT_MESSAGE . PHP_EOL;
    }

    /**
     * Make coffee
     * 
     * This method has higher priority than the one in the CoffeeMaker class, so it will be used instead.
     */
    public static function makeCoffee(): void
    {
        echo static::class . ' is making (UPDATED normal) coffee... ' . PHP_EOL;
    }

    /**
     * Make latte coffee
     * 
     * This method has conflicting name with the one in the LatteTrait, so it will be used instead.
     * 
     * !PHP Fatal error:  Trait method makeLatte has not been applied, because there are collisions with other trait methods on App\Coffee\CapucchinoMaker in /app/Coffee/Traits/CapucchinoTrait.php
     */
    public function makeLatte(): void
    {
        echo static::class . ' is making latte coffee (Capucchino trait)... ' . PHP_EOL;
    }
}
