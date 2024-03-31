<?php

declare(strict_types=1);

namespace App;

use App\Toaster;

/**
 * The toaster pro
 * 
 * Extends the toaster class
 * 
 * Adds the ability to toast bagels
 */
class ToasterPro extends Toaster
{
    /**
     * The maximum number of slices in the toaster pro
     */
    protected const MAX_SLICES = 4;

    /**
     * Construct the toaster pro
     */
    public function __construct()
    {
        parent::__construct();

        echo "Activating extra options" . PHP_EOL;
    }

    public function toastBagel(): void
    {
        foreach ($this->slices as $i => $slice) {
            echo "Slice " . ($i + 1) . ": $slice is toasting with bagel option" . PHP_EOL;
        }
    }

    /**
     * Now, we are overriding the addSlice method from the parent class
     * 
     * Type of the parameter is string, it can't be anything else
     * Same happends with the return type
     */
    public function addSlice(string $slice): self
    {
        parent::addSlice($slice);

        return $this;
    }
}
