<?php

declare(strict_types=1);

namespace App\Binding;

class ClassA
{
    protected static string $name = 'ClassA';

    public static function getName(): string
    {
        var_dump(static::class);

        return static::$name;
    }
}
