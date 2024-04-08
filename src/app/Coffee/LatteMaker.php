<?php

declare(strict_types=1);

namespace App\Coffee;

/**
 * LatteMaker class
 * 
 * This class use the LatteTrait to make latte coffee.
 * 
 */
class LatteMaker extends CoffeeMaker
{
    use Traits\LatteTrait;

    /**
     * Get milk type
     * 
     * This method is required by the LatteTrait.
     */
    public function getMilkType(): string
    {
        return $this->milk;
    }
}
