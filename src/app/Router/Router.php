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
     * @param string $requestMethod The request method to register.
     * @param string $route The route to register.
     * @param callable|array $action The action to perform when the route is visited.
     * 
     * @return self
     */
    public function register(string $requestMethod, string $route, callable|array $action): self
    {
        $this->routes[$requestMethod][$route] = $action;

        return $this;
    }

    /**
     * Register a new GET route.
     * 
     * @param string $route The route to register.
     * @param callable|array $action The action to perform when the route is visited.
     * 
     * @return self
     */
    public function get(string $route, callable|array $action): self
    {
        return $this->register('GET', $route, $action);
    }

    /**
     * Register a new POST route.
     * 
     * @param string $route The route to register.
     * @param callable|array $action The action to perform when the route is visited.
     * 
     * @return self
     */
    public function post(string $route, callable|array $action): self
    {
        return $this->register('POST', $route, $action);
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * Resolve the route.
     * 
     * @param string $requestUri The request URI to resolve.
     * @param string $requestMethod The request method to resolve.
     * 
     * @return mixed
     */
    public function resolve(string $requestUri, string $requestMethod): mixed
    {
        $route = explode('?', $requestUri)[0];

        $action = $this->routes[$requestMethod][$route] ?? null;

        if (!$action) {

            // header('HTTP/1.0 404 Not Found');
            http_response_code(404);

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

        if (!method_exists($class, $method)) {

            throw new RouteNotFoundException();
        }

        $class = new $class();

        return call_user_func_array(callback: [$class, $method], args: []);
    }
}
