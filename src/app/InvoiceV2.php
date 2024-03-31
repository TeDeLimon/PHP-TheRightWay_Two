<?php

declare(strict_types=1);

namespace App;

/**
 * Class Invoice
 */
class InvoiceV2
{
    /**
     * The protected data of the invoice
     */
    protected array $data;

    /**
     * Method that use the magic method __get to get the value of a property
     * 
     * @param string $property The property to get
     * 
     * @return mixed The value of the property
     */
    public function  __get(string $key): mixed
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }

        return null;
    }

    public function __set(string $key, mixed $value): void
    {
        $this->data[$key] = $value;
    }

    /**
     * Method that use the magic method __isset to check if a key is set in the data array
     */
    public function __isset($key)
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * Method that use the magic method __unset to destroy a key in the data array
     */
    public function __unset($key)
    {
        unset($this->data[$key]);
    }
}
