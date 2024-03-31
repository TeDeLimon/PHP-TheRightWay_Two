<?php

declare(strict_types=1);

namespace App\Field;

abstract class Field
{
    public function __construct(protected string $name)
    {
    }

    /**
     * Render the field. This method must be implemented by the child class.
     */
    abstract public function render(): string;
}
