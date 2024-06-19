<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../funcs/helpers.php';

use App\Router\Router;
use App\Classes\Home;
use App\Classes\Invoice;

//? Cookies are disabled by default in the browser, so we need to enable them.

// Cookies are stored in client's browser and are sent with every request to the server.
// Cookies are destroyed when the expiration time is reached or when the user deletes them.

//? Session is stored on the server and a session id is sent to the client's browser.
// The session id is used to identify the session data on the server.
// Session data is destroyed when the session is destroyed or when the session expires.

// This will start the session and create a session id if it doesn't exist.
session_start();

$router = new Router();

$router
    ->get('/', [Home::class, 'index'])
    ->get('/cookies', [Home::class, 'cookies'])
    ->get('/invoices', [Invoice::class, 'index'])
    ->get('/invoices/create', [Invoice::class, 'create'])
    ->post('/invoices/create', [Invoice::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

// phpinfo();

// Output buffering is turned on by default in PHP. It's a mechanism that allows you to store the output of a script in a buffer and send it to the browser all at once.

// When headers are sent to the browser, you can't set cookies or session data and no longer can send more headers or modify the existing ones.