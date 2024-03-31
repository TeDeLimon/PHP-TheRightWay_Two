<?php

declare(strict_types=1);

namespace App\Collectors;

use App\Interfaces\DebtCollector;

/**
 * Class RockyAgency
 * 
 * A collection agency that collects debts.
 * 
 * Uses the DebtCollector interface and must implement the methods declared in the interface.
 */
class RockyAgency implements DebtCollector
{
    const COLLECTION_AGENCY_NAME = 'Rocky Agency';

    private const GUARANTEED_PERCENTAJE = 0.65;

    public function __construct()
    {
    }

    /**
     * Collect the owed amount. 
     * 
     * Rocky always collects 65% of the owed amount.
     * 
     * @param float $owedAmount The amount owed.
     * 
     * @return float The amount collected.
     */
    public function collect(float $owedAmount): float
    {
        return $owedAmount * self::GUARANTEED_PERCENTAJE;
    }

    public function someMethod(): void
    {
    }

    public function anotherMethod(): void
    {
    }
}
