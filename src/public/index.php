<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/constants.php';

require_once ROOT_DIRECTORY . '/vendor/autoload.php';

require_once ROOT_DIRECTORY . '/funcs/helpers.php';

use App\Router\Router;
use App\Controllers\{HomeController, InvoiceController};

//? MVC Pattern (Model-View-Controller)
// It separates the application into three main components: Model, View, and Controller. Each component has its own role and responsibility. 
// The Model represents the data. 
// The View represents the output. 
// The Controller acts as an intermediary between the Model and View and has the logic to handle the request and response.

$router = new Router();

$router
    ->get('/', [HomeController::class, 'index'])
    ->post('/upload', [HomeController::class, 'upload'])
    ->get('/invoices', [InvoiceController::class, 'index'])
    ->get('/invoices/create', [InvoiceController::class, 'create'])
    ->post('/invoices/create', [InvoiceController::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

// phpinfo();

// Output buffering is turned on by default in PHP. It's a mechanism that allows you to store the output of a script in a buffer and send it to the browser all at once.

// When headers are sent to the browser, you can't set cookies or session data and no longer can send more headers or modify the existing ones.