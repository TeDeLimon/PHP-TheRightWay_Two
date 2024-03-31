<?php

declare(strict_types=1);

namespace App;

/**
 * The toaster
 * 
 * ? If we use the keyword final, we can't extend this class
 */
class Toaster
{
    /**
     * The slices of the toast
     */
    protected array $slices = [];

    protected const MAX_SLICES = 2;

    public function __construct()
    {
        echo "The toaster is ready" . PHP_EOL;
    }

    /**
     * Add a slice to the toast
     */
    public function addSlice(string $slice): self
    {

        // If the number of slices is less than the maximum number of slices
        if (count($this->slices) < static::MAX_SLICES) {
            $this->slices[] = $slice;
        } else {
            echo "The toaster is full" . PHP_EOL;
        }

        return $this;
    }

    public function toast(): void
    {
        foreach ($this->slices as $i => $slice) {
            echo "Slice " . ($i + 1) . ": $slice is toasting" . PHP_EOL;
        }
    }

    /**
     * This method is final, so it cannot be overridden
     */
    final public function stopToast(): void
    {
        echo "The toaster is stopped" . PHP_EOL;
    }
}
