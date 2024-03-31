<?php

declare(strict_types=1);

namespace App\Binding;

class ClassA
{
    protected static string $name = 'ClassA';

    public static function getName(): string
    {
        //Static keyword refers to the class that is being called at runtime (en tiempo de ejecución)
        var_dump(static::class);

        return static::$name;
    }

    /**
     * Create a new instance of the class based on the called class.
     * 
     * @return static
     */
    public static function make(): static
    {
        return new static();
    }
}