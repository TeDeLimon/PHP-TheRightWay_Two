<?php

declare(strict_types=1);

namespace App;

/**
 * Class InvoiceV3
 */
class InvoiceV3
{
    protected ?string $id;

    public function __construct(
        public float $amount,
        public string $description,
        public string $creditCardNumber
    ) {
        $this->id = uniqid();
    }

    /**
     * Create a new InvoiceV3 instance
     */
    public static function create(float $amount, string $description, string $creditCardNumber): static
    {
        return new static($amount, $description, $creditCardNumber);
    }

    public function __clone()
    {
        $this->id = uniqid('invoice_');
    }

    /**
     * Serialize the object
     * 
     * The __serialize() method is called when the object is serialized. We can use this method to specify which properties should be serialized.
     * 
     * Has more control over the serialization process.
     * 
     * If __serialize is defined and __sleep is defined, __serialize will be used.
     */
    public function __serialize(): array
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'description' => $this->description,
            'creditCardNumber' => base64_encode($this->creditCardNumber),
        ];
    }

    /**
     * Unserialize the object
     * 
     * The __unserialize() method is called when the object is unserialized. We can use this method to perform any additional operations that are required when the object is unserialized.
     * 
     * @param array $serialized The properties to unserialize
     * 
     * if __unserialize is defined and __wakeup is defined, __unserialize will be used.
     */
    public function __unserialize(array $serialized): void
    {
        $this->id = $serialized['id'];
        $this->amount = $serialized['amount'];
        $this->description = $serialized['description'];
        $this->creditCardNumber = base64_decode($serialized['creditCardNumber']);
    }

    /**
     * Serialize the object
     * 
     * When an object is serialized, only the properties that are public, protected, or private are serialized.
     * 
     * The __sleep() method is called when the object is serialized. We can use this method to specify which properties should be serialized.
     * 
     * @return array The properties to serialize
     */
    public function __sleep(): array
    {
        return ['amount', 'description', 'creditCardNumber'];
    }

    /**
     * Unserialize the object
     * 
     * When an object is unserialized, the __wakeup() method is called. We can use this method to perform any additional operations that are required when the object is unserialized.
     * 
     * @return void
     */
    public function __wakeup(): void
    {
        $this->id = uniqid();
    }
}
