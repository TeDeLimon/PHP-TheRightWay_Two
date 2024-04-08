<?php

namespace App;

/**
 * Class DockBlock
 * 
 * @property-read int $x The x value
 * @property-write int $y The y value
 */
class DockBlock
{
    /** @var string $path The path of the file */
    private string $path;

    /** @var string $info The information of the DockBlock */
    private string $info;

    /**
     * Generate a dock block
     *
     * @param string $path The path of the file
     * @param string $info The information of the file
     * 
     * @throws Exception The exceptions that are expected to be thrown
     * @throws \RuntimeException The exceptions that are expected to be thrown
     * 
     * @return string
     */
    public function generateDockBlock(string $path, string $info): string
    {
        return <<<DOCBLOCK
        
        DOCBLOCK;
    }

    /**
     * @param Customer[] $arr
     */
    public function foo(array $arr)
    {
        foreach ($arr as $obj) {
            $obj->name;
        }
    }

    /**
     * @param string $key The key to get
     * 
     * @return ?mixed The value of the key
     */
    public function __get(string $key): mixed
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }

        return null;
    }

    public function __set(string $key, mixed $value): void
    {
        $this->data[$key] = $value;
    }
}
