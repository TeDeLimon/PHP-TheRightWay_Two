<?php

declare(strict_types=1);

namespace App\Motor;

use App\Motor\Exceptions\LowerLevelOilException;

/**
 * Class Oil
 */
class Oil
{

    public function __construct(public string $oilType, public int $level = 100)
    {
        $this->checkLevel();
    }

    public function checkLevel(): void
    {
        if ($this->level <= 15) {
            throw new LowerLevelOilException;
        }
    }

    public function fillOil(): void
    {
        echo 'Please, oil must be filled';
    }
}
