<?php

declare(strict_types=1);

namespace App;

use Iterator;
use ArrayIterator;
use IteratorAggregate;

class Collection  implements IteratorAggregate
{
    public function __construct(private array $items)
    {
    }

    public function getIterator(): Iterator
    {
        return new ArrayIterator($this->items);
    }
}
