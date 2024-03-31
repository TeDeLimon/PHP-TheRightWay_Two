<?php

namespace App\Enums;

class Status
{
    // Constants must be in uppercase and separated by underscores
    public const PAID = 'paid';
    public const PENDING = 'pending';
    public const DECLINED = 'declined';
    public const REFUNDED = 'refunded';

    public const ALL_STATUSES = [
        self::PAID => 'Paid',
        self::PENDING => 'Pending',
        self::DECLINED => 'Declined',
        self::REFUNDED => 'Refunded',
    ];
}
