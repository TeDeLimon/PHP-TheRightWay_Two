<?php

namespace App;

use Iterator;
use ArrayIterator;

/**
 * Class InvoiceCollection
 * 
 * @implements Iterator<Invoice>
 * 
 * Must implement the Iterator interface to be able to iterate over the collection
 * 
 * @see https://www.php.net/manual/en/spl.iterators.php
 */
class InvoiceCollection implements Iterator
{
    private int $key;

    /**
     * Method that returns the current element
     */
    public function current(): mixed
    {
        return $this->invoices[$this->key];
    }

    /**
     * Method that returns the key of the current element
     */
    public function next(): void
    {
        echo __METHOD__ . PHP_EOL;

        ++$this->key;
    }

    /**
     * Method that returns the key of the current element
     */
    public function key(): int
    {
        echo __METHOD__ . PHP_EOL;

        return $this->key;
    }

    /**
     * Method that checks if the current position is valid
     */
    public function valid(): bool
    {
        return isset($this->invoices[$this->key]);
    }

    /**
     * Method that resets the iterator
     */
    public function rewind(): void
    {
        $this->key = 0;
    }

    /**
     * For iterate over objects we can implements IteratorAggregate interface and create a function getIterator() that returns an Iterator object
     * 
     * @return ArrayIterator<Invoice>
     * 
     * @see https://www.php.net/manual/en/class.iteratoraggregate.php
     */
    /*
        public function getIterator(): mixed
        {
            return new ArrayIterator($this->invoices);
        }
    */
}
