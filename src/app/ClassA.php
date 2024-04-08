<?php

namespace App;

class ClassA
{
    public function __construct(public int $x, public int $y)
    {
    }

    public function foo(): string
    {
        return 'foo';
    }

    /**
     * This method will return an anonymous class that extends ClassA
     * 
     * The main purpose for anonymous classes is testing
     */
    public function bar(): object
    {
        // This will return an anonymous class that extends ClassA
        return new class($this->x, $this->y) extends ClassA
        {
            // This will call the parent constructor and the foo method from the parent class
            public function __construct(public int $x, public int $y)
            {
                parent::__construct($x, $y);

                $this->foo();
            }
        };
    }
}
