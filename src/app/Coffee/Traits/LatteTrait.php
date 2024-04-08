<?php

declare(strict_types=1);

namespace App\Coffee\Traits;

/**
 * LatteTrait trait
 * 
 * This trait has a method to make latte coffee.
 */
trait LatteTrait
{
    public const WAIT_MESSAGE = 'while taking a break from coding!';

    private string $milk = 'Latte Milk from Mercadona';

    public static function makeLatte(): void
    {
        echo static::class . ' is making latte coffee (Latte Trait)... ' . self::WAIT_MESSAGE . PHP_EOL;
    }

    /**
     * Add milk
     * 
     * This method is private and can only be used inside the trait.
     */
    private function addMilk(): void
    {
        echo static::class . ' is adding magic milk... ' . $this->getMilkType() . PHP_EOL;
    }

    /**
     * Get milk
     * 
     * This method is private and can only be used inside the trait.
     */
    private function getMilk(): string
    {

        if (property_exists($this, 'milk')) {
            return $this->milk;
        }

        return 'no milk found...';
    }

    /**
     * Get milk type
     * 
     * Making this method abstract will force the class that uses this trait to implement it.
     * 
     * This is a solution to the problem of the milk property not being defined in the trait.
     * 
     * But it will also force the class to implement the method, which is not ideal.
     */
    abstract public function getMilkType(): string;


    /**
     * Set milk type
     * 
     * This method is used to set the milk type.
     * 
     * By default the milk type is 'Latte Milk from Mercadona'.
     * 
     * Just in case the class has to use a different milk type.
     * 
     * @param string $milkType
     * 
     * @return static $this
     */
    public function setMilkType(string $milkType): static
    {
        $this->milk = $milkType;

        return $this;
    }
}
