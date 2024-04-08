<?php

declare(strict_types=1);

namespace App\Motor;

use App\Motor\Oil;
use App\Motor\Traits\OilTrait;
use App\Motor\Exceptions\MotorNotRunningException;

/**
 * Class Motor
 */
class Motor
{
    use OilTrait;

    private bool $isRunning = false;

    public function __construct(public Oil $oil)
    {
        $this->distributeOil();
        $this->checkTemperature();
    }

    private function distributeOil(): void
    {
        echo $this->oil->oilType . ' oil has been distributed' . PHP_EOL;
    }

    /**
     * Start the motor.
     */
    public function start(): void
    {
        $this->isRunning = true;

        echo 'Motor started'  . PHP_EOL;
    }

    /**
     * Shutdown the motor.
     */
    public function shutdown(): void
    {
        if (!$this->isRunning) {

            throw new MotorNotRunningException;
        }

        echo 'Motor shutdown' . PHP_EOL;
    }
}
