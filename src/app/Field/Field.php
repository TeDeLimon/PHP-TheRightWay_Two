<?php

declare(strict_types=1);

namespace App\Field;

use App\Interfaces\Renderable;

abstract class Field implements Renderable
{
    public function __construct(protected string $name)
    {
    }

    /**
     * Render the field. This method must be implemented by the child class.
     */
    abstract public function render(): string;
}
