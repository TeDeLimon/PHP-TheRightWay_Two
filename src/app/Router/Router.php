<?php

declare(strict_types=1);

namespace App\Router;

use App\Router\Exceptions\RouteNotFoundException;

class Router
{
    /**
     * The routes to be registered.
     */
    private array $routes = [];

    /**
     * Register a new route.
     * 
     * @param string $route The route to register.
     * @param callable|array $action The action to perform when the route is visited.
     * 
     * @return self
     */
    public function register(string $route, callable|array $action): self
    {
        $this->routes[$route] = $action;

        return $this;
    }

    public function resolve(string $requestUri)
    {
        $route = explode('?', $requestUri)[0];

        $action = $this->routes[$route] ?? null;

        if (!$action) {

            throw new RouteNotFoundException();
        }

        if (is_callable($action)) {

            return call_user_func($action);
        }

        if (!is_array($action)) {

            throw new RouteNotFoundException();
        }

        [$class, $method] = $action;

        if (!class_exists($class)) {

            throw new RouteNotFoundException();
        }

        if(!method_exists($class, $method)) {

            throw new RouteNotFoundException();
        }

        $class = new $class();

        return call_user_func_array(callback: [$class, $method], args: []);
    }
}
