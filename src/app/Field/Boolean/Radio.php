<?php

declare(strict_types=1);

namespace App\Field\Boolean;

class Radio extends Boolean
{
    public function render(): string
    {
        return <<<HTML
            <input type="radio" name="{$this->name}" id="{$this->name}">
        HTML;
    }
}
