<?php

declare(strict_types=1);

namespace App\Binding;

use App\Binding\ClassA;

class ClassB extends ClassA
{
    protected static string $name = 'ClassB';
}