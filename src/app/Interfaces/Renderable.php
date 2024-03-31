<?php

declare (strict_types=1);

namespace App\Interfaces;

/**
 * Interface Renderable
 */
interface Renderable
{
    public function render(): string;
}