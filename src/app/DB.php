<?php

namespace App;

/**
 * Database class
 * 
 * This class is a singleton, which means that only one instance of the class can be created
 */
class DB
{

    public static ?DB $instance  = null;

    /**
     * Private constructor to prevent the creation of a new instance of the DB class directly
     */
    private function __construct(public array $config)
    {
    }

    /**
     * Get the instance of the DB class
     * 
     * If the instance does not exist, create a new one
     * 
     * @param array $config
     * 
     * @return DB
     */
    public static function getInstance(array $config): DB
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }
}
