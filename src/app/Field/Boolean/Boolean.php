<?php

declare(strict_types=1);

namespace App\Field\Boolean;

use App\Field\Field;

abstract class Boolean extends Field
{
    abstract public function render(): string;
}