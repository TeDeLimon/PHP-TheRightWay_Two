<?php

declare(strict_types=1);

namespace App\Field\Text;

use App\Field\Field;

class Text extends Field
{
    public function render(): string
    {
        return <<<HTML
            <input type="text" name="{$this->name}" id="{$this->name}">
        HTML;
    }
}
