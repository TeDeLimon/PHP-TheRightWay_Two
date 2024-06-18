<?php

declare(strict_types=1);

namespace App;

use Iterator;
use ArrayIterator;
use IteratorAggregate;

/**
 * Class Collection, that implements the IteratorAggregate interface
 */
class Collection implements IteratorAggregate
{
    public function __construct(private array $items)
    {
    }

    /**
     * Method that returns the iterator, which is an instance of ArrayIterator
     */
    public function getIterator(): Iterator
    {
        return new ArrayIterator($this->items);
    }
}
