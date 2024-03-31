<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;

class Transaction
{
    /**
     * The status of the transaction
     */
    private ?string $status;

    // Static properties are shared among all instances of a class
    private static int $count = 0;

    public function __construct()
    {
        $this->setStatus(Status::PENDING);

        self::$count++;
    }

    /**
     * Get the status of the transaction
     * 
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Update the status of the transaction
     * 
     * @param string $status
     * 
     * @return self
     */
    public function setStatus(string $status): self
    {
        if (!isset(Status::ALL_STATUSES[$status])) {
            throw new \InvalidArgumentException('Invalid status');
        }

        $this->status = $status;

        return $this;
    }

    /**
     * Get the count of transactions
     * 
     * @return int
     */
    public static function getCount(): int
    {
        return self::$count;
    }

    public function process(): void
    {
        echo "Processing transaction... " . $this->getStatus() . PHP_EOL;

        // This methods are internal implementation details, so they should be private
        
        $this->generateReceipt();

        $this->sendEmail();
    }

    /**
     * Generate a receipt for the transaction
     */
    private function generateReceipt(): void
    {
        echo "Generating receipt..." . PHP_EOL;
    }

    /**
     * Send an email to the customer
     */
    private function sendEmail(): void
    {
        echo "Sending email..." . PHP_EOL;
    }
}
