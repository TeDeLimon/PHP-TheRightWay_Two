<?php

namespace App\Router\Exceptions;

/**
 * Class RouteNotFoundException, thrown when a route is not found.
 */
class RouteNotFoundException extends \Exception
{
    protected $message = '404 - Route not found';
}