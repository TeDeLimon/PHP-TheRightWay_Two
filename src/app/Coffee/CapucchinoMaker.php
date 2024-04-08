<?php

declare(strict_types=1);

namespace App\Coffee;

/**
 * CapucchinoMaker class
 * 
 * This class use the CapucchinoTrait to make capucchino coffee.
 * 
 */
class CapucchinoMaker extends CoffeeMaker
{
    use Traits\CapucchinoTrait;

    /**
     * Make capucchino coffee
     * 
     * We override the method from the trait to make it more specific.
     */
    public static function makeCapucchino(): void
    {
        echo static::class . ' is making (UPDATED) capucchino coffee' . PHP_EOL;
    }
}
