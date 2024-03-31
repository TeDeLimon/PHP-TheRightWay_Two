<?php

declare(strict_types=1);

namespace App\Collectors;

use App\Interfaces\DebtCollector;

/**
 * Class CollectionAgency
 * 
 * A collection agency that collects debts.
 * 
 * Uses the DebtCollector interface and must implement the methods declared in the interface.
 */
class CollectionAgency implements DebtCollector
{

    /**
     * The name of the collection agency.
     */
    public const COLLECTION_AGENCY_NAME = 'Collection Agency';

    /**
     * Constructor.
     */
    public function __construct()
    {
    }

    /**
     * Collect the owed amount.
     * 
     * @param float $owedAmount The amount owed.
     */
    public function collect(float $owedAmount): float
    {
        // A collection agency will collect 50% of the owed amount.
        $guarenteedAmount = $owedAmount * self::GUARANTEED_PERCENTAJE;

        return mt_rand((int) $guarenteedAmount, (int) $owedAmount);
    }

    /**
     * A method that must be implemented from the SomeOtherInterface.
     */
    public function someMethod(): void
    {
    }

    /**
     * A method that must be implemented from the AnotherInterface.
     */
    public function anotherMethod(): void
    {
    }
}
