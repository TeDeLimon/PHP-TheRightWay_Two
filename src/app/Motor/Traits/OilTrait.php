<?php

declare(strict_types=1);

namespace App\Motor\Traits;

/**
 * Trait OilTrait
 */
trait OilTrait
{
    public function checkTemperature(): void
    {
        echo 'Temperature checked' . PHP_EOL;
    }
}
