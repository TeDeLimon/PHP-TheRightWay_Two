<?php

declare(strict_types=1);

namespace App;

class FancyOven
{
    protected array $breads = [];

    public function __construct(private ToasterPro $toaster)
    {
        echo "The oven is ready" . PHP_EOL;
    }

    public function addBread(string $bread): self
    {
        $this->breads[] = $bread;

        return $this;
    }

    public function bake(): void
    {
        foreach ($this->breads as $i => $bread) {
            echo "Bread " . ($i + 1) . ": $bread is baking" . PHP_EOL;
        }
    }

    /**
     * We are using composition here: we are delegating the toastBagel method to the ToasterPro class
     */
    public function toastBagel(): void
    {
        $this->toaster->toastBagel();
    }

    /**
     * We are using composition here: we are delegating the toast method to the ToasterPro class
     */
    public function toast(): void
    {
        $this->toaster->toast();
    }
}
