<?php

declare(strict_types=1);

class PaymentProfile
{
    public int $id;

    public function __construct()
    {
        $this->id = rand();
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
