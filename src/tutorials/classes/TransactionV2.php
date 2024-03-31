<?php

declare(strict_types=1);

/**
 * Transaction class
 */
class Transaction
{
    /**
     * Constructor method
     * 
     * We are using the shorthand to declare the properties in the constructor
     * 
     * Promotion of the properties to the class level
     * 
     * @param float $amount The amount of the transaction
     * @param string $description The description of the transaction
     */
    public function __construct(private float $amount, private string $description)
    {
    }

    public function applyTax(float $tax): self
    {
        $this->amount += $this->amount * $tax / 100;

        return $this;
    }

    public function applyDiscount($rate): self
    {
        $this->amount -= $this->amount * $rate / 100;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Destructor method is called when the object is destroyed or the script is finished
     */
    public function __destruct()
    {
        //echo 'Transaction finished';
    }
}
