<?php

declare(strict_types=1);

namespace App\Coffee;

use App\Coffee\Traits\{LatteTrait, CapucchinoTrait};

class AllInOneCoffeeMaker extends CoffeeMaker
{

    //* This means that the makeLatte method from CapucchinoTrait will be used instead of the one from LatteTrait.
    //* This solves the conflict between the two traits.
    use CapucchinoTrait {
        CapucchinoTrait::makeLatte insteadof LatteTrait;
    }
    //* This alias is used to rename the makeLatte method from LatteTrait to makeOriginalLatte.
    use LatteTrait {
        LatteTrait::makeLatte as makeOriginalLatte;
        // Redefine the addMilk method as public
        LatteTrait::addMilk as public;
    }

    /**
     * Make latte coffee
     * 
     * This method is a combination of the makeOriginalLatte and addMilk methods.
     */
    public function makeEspecialLatte(): void
    {
        $this->addMilk();
        static::makeOriginalLatte();
    }

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
