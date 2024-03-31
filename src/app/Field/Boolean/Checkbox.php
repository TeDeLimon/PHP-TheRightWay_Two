<?php

declare(strict_types=1);

namespace App\Field\Boolean;

class Checkbox extends Boolean
{
    public function render(): string
    {
        return <<<HTML
            <input type="checkbox" name="{$this->name}" id="{$this->name}">
        HTML;
    }
}
