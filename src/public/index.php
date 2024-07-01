<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/constants.php';

require_once ROOT_DIRECTORY . '/vendor/autoload.php';

require_once ROOT_DIRECTORY . '/funcs/helpers.php';

use App\Router\Router;
use App\Controllers\{HomeController, InvoiceController};

//? The HTTP headers are the parts of the request that contain information about the request itself. They include information such as the request method, the request URI, and the request body. The headers are sent by the client to the server and are used by the server to determine how to process the request.
// The are many types of headers, but the most common are:
// - Request headers: These headers are sent by the client to the server and contain information about the request itself.
// - Response headers: These headers are sent by the server to the client and contain information about the response.

//? The HTTP request methods are the verbs that are used to indicate the action that should be performed on a resource. The most common request methods are:
// - GET: This method is used to retrieve information from the server.
// - POST: This method is used to send data to the server.
// - PUT: This method is used to update an existing resource on the server.
// - DELETE: This method is used to delete a resource on the server.
// - PATCH: This method is used to update a resource on the server.
// - OPTIONS: This method is used to retrieve information about the communication options available for a resource.

// Accept header: The Accept header is used by the client to tell the server what type of content it can accept. The server then uses this information to determine what type of content to send back to the client.
// Authorization header: The Authorization header is used by the client to send credentials to the server. The server then uses these credentials to authenticate the client.
// User-Agent header: The User-Agent header is used by the client to identify itself to the server. The server can then use this information to determine what type of content to send back to the client.
// Cache-Control header: The Cache-Control header is used by the client to tell the server how to cache the response. The server then uses this information to determine how long to cache the response.
// Referer header: The Referer header is used by the client to tell the server where the request originated from. The server can then use this information to determine how to process the request.
// Cookie header: The Cookie header is used by the client to send cookies to the server. The server can then use these cookies to track the client's session.
// Content-Type header: The Content-Type header is used by the client to tell the server what type of content it is sending. The server can then use this information to determine how to process the request.
// Location header: The Location header is used by the server to tell the client where to redirect to. The client then uses this information to redirect the user to the new location.

//? HTTP Response status codes indicate whether a specific HTTP request has been successfully completed. Responses are grouped in five classes:
// - Informational responses (100–199)
// - Successful responses (200–299)
// - Redirects (300–399)
// - Client errors (400–499)
// - Server errors (500–599)

// https://www.php.net/manual/en/function.header.php
// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers

$router = new Router();

$router
    ->get('/', [HomeController::class, 'index'])
    ->get('/download', [HomeController::class, 'download'])
    ->post('/upload', [HomeController::class, 'upload'])
    ->get('/invoices', [InvoiceController::class, 'index'])
    ->get('/invoices/create', [InvoiceController::class, 'create'])
    ->post('/invoices/create', [InvoiceController::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

// phpinfo();

// Output buffering is turned on by default in PHP. It's a mechanism that allows you to store the output of a script in a buffer and send it to the browser all at once.

// When headers are sent to the browser, you can't set cookies or session data and no longer can send more headers or modify the existing ones.