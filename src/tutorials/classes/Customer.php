<?php

declare(strict_types=1);

class Customer
{
    public ?PaymentProfile $paymentProfile = null;

    /**
     * Get the value of paymentProfile
     *
     * @return ?PaymentProfile
     */
    public function getPaymentProfile(): ?PaymentProfile
    {
        return $this->paymentProfile;
    }
}
