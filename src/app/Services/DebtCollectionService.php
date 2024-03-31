<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\DebtCollector;

/**
 * Class DebtCollectionService
 */
class DebtCollectionService
{
    /**
     * Collect the debt from the debtor using the collection agency.
     * 
     * @param DebtCollector $collector The collection agency, which is an object that implements the DebtCollector interface. 
     * 
     * This is a type hint that ensures that the $collector parameter is an object that implements the DebtCollector interface.
     * 
     * This is polymorphism in action. The DebtCollectionService class can accept any object that implements the DebtCollector interface.
     */
    public function collectDebt(DebtCollector $collector)
    {
        // Generate a random amount owed.
        $owedAmount = mt_rand(100, 1000);

        // Collect the amount owed using the collection agency.
        $collectedAmount = $collector->collect($owedAmount);

        // Output the amount collected and the amount owed.
        printf("%s has collected $%d out of $%d\n", $collector::COLLECTION_AGENCY_NAME, $collectedAmount, $owedAmount);
    }
}
