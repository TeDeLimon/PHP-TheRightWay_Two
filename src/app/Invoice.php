<?php

declare(strict_types=1);

namespace App;

/**
 * Class Invoice
 */
class Invoice
{
    public ?int $id;

    private ?string $accountNumber;

    public ?string $description;

    protected ?string $category;

    public function __construct(public float $amount)
    {
        $this->id = random_int(10000, 99999);
    }

    /**
     * Method that use the magic method __get to get the value of a property
     * 
     * @param string $property The property to get
     * 
     * @return mixed The value of the property
     */
    public function  __get(string $property): mixed
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }

        return null;
    }

    /**
     * Method that use the magic method __set to set the value of a property
     * 
     * @param string $property The property to set
     * 
     * @param mixed $value The value to set
     */
    public function __set(string $property, mixed $value): void
    {
        if (!property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    /**
     * Method that use the magic method __call to call a method that does not exist
     * 
     * @param string $method The method to call
     * 
     * @param array $arguments The arguments of the method
     * 
     * @return mixed The result of the method
     */
    public function __call(string $method, array $arguments): mixed
    {
        if (method_exists($this, $method)) {
            // This is the same as $this->$method(...$arguments), but it is more verbose
            call_user_func([$this, $method], $arguments);
            //return $this->$method(...$arguments);
        }

        print_r("Method $method does not exist\n");

        return null;
    }

    /**
     * Method that use the magic method __callStatic to call a static method that does not exist
     * 
     * Verify if the method exists and if it is static using ReflectionMethod
     * 
     * @param string $staticMethod The name of the method
     * 
     * @param array $arguments The arguments of the method
     * 
     * @return mixed The result of the method
     */
    public static function __callStatic($staticMethod, $arguments)
    {

        if (method_exists(self::class, $staticMethod) && (new \ReflectionMethod(self::class, $staticMethod))->isStatic()) {
            // This is the same as self::$staticMethod(...$arguments), but it is more verbose
            return self::$staticMethod(...$arguments);
        }

        print_r("Static Method $staticMethod does not exist\n");

        return null;
    }

    /**
     * Method that process the invoice
     */
    public function process(...$clients): void
    {
        foreach ($clients as $client) {
            print_r("Processing invoice for $client\n");
        }
    }

    /**
     * Method that use the magic method __toString to return a string representation of the object
     */
    public function __toString(): string
    {
        return json_encode($this) . PHP_EOL;
    }

    /**
     * Method that use the magic method __invoke to call the object as a function
     * 
     * This method is very useful to implement single method classes
     */
    public function __invoke()
    {
        echo ('invoking the object... ' . json_encode($this));
    }

    /**
     * Method that use the magic method __debugInfo to return the debug information of the object
     */
    public function __debugInfo()
    {
        //Get all the properties of the object that are public or protected using ReflectionClass
        
        $reflectionClass = new \ReflectionClass($this);

        var_dump($reflectionClass->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED));
    }
}
