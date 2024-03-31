<?php

declare(strict_types=1);

/**
 * Transaction class
 */
class Transaction
{
    //? Properties - Access modifiers; public, private, protected

    //? Methods - Access modifiers; public, private, protected

    // If you don't specify the access modifier, it will be public by default
    // The ? before the type means that the property can be null
    private float $amount;

    // If you don't assign a value to a property, it will be null by default
    private string $description;

    /**
     * Customer that made the transaction
     */
    public ?Customer $customer = null;

    /**
     * Constructor method
     */
    public function __construct(float $amount, string $description)
    {
        $this->amount = $amount;
        $this->description = $description;
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

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }
}
