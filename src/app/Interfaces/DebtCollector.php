<?php

namespace App\Interfaces;

/**
 * Interface DebtCollector
 * 
 * Interface for a debt collector.
 */
interface DebtCollector extends AnotherInterface, SomeOtherInterface
{

    /**
     * The name of the collection agency.
     */
    public const COLLECTION_AGENCY_NAME = 'Collection Agency';

    /**
     * The percentage of the owed amount that is guaranteed to be collected.
     */
    public const GUARANTEED_PERCENTAJE = 0.5;
    
    /**
     * Class must have a constructor.
     */
    public function __construct();
    /**
     * Class must have a collect method.
     */
    public function collect(float $owedAmount): float;
}
