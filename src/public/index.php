<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../funcs/helpers.php';

use App\Router\Router;
use App\Classes\Home;
use App\Classes\Invoice;

//? $_SERVER is a superglobal array that holds information about headers, paths, and script locations.

// Superglobals are built-in variables in PHP that are always accessible, regardless of scope.

// $_SERVER is an array containing information such as headers, paths, and script locations. The entries in this array are created by the web server.

// $_SERVER, $_GET, $_POST, $_FILES, $_COOKIE, $_SESSION, $_REQUEST, $_ENV

// Link: https://www.php.net/manual/en/reserved.variables.server.php
// Link: https://www.php.net/manual/en/language.variables.superglobals.php

//debug($_SERVER, true, $_GET, $_POST, $_FILES, $_COOKIE, $_SESSION, $_REQUEST, $_ENV);

$router = new Router();

$router
    ->register('/', [Home::class, 'index'])
    ->register('/invoices', [Invoice::class, 'index'])
    ->register('/invoices/create', [Invoice::class, 'create']);

echo $router->resolve($_SERVER['REQUEST_URI']);
