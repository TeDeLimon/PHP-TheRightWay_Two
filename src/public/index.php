<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../funcs/helpers.php';

use App\Router\Router;
use App\Classes\Home;
use App\Classes\Invoice;

//? REQUEST can be from multiple sources

// Frontend (Javascript), Backend (PHP), Mobile (Java, Kotlin, Swift), Desktop (C++, C#), IoT (C, Python), Mobile App (React Native, Flutter), Forms...

//? When we should use GET Request? When we want to get data from the server (Fetching data from the server)

//? When we should use POST Request? When we want to send data to the server, like submitting a form

$router = new Router();

$router
    ->get('/', [Home::class, 'index'])
    ->get('/invoices', [Invoice::class, 'index'])
    ->get('/invoices/create', [Invoice::class, 'create'])
    ->post('/invoices/create', [Invoice::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
