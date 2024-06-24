<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/constants.php';

require_once ROOT_DIRECTORY . '/vendor/autoload.php';

require_once ROOT_DIRECTORY . '/funcs/helpers.php';

use App\Router\Router;
use App\Classes\Home;
use App\Classes\Invoice;


//? Files are stored in the $_FILES superglobal array. The array contains the following keys:
// $_FILES['file']['name'] - the original name of the uploaded file
// $_FILES['file']['type'] - the MIME type of the uploaded file
// $_FILES['file']['size'] - the size of the uploaded file in bytes
// $_FILES['file']['tmp_name'] - the temporary filename of the file in which the uploaded file was stored on the server
// $_FILES['file']['error'] - the error code associated with this file upload

// The error code is one of the following constants:
// UPLOAD_ERR_OK - no errors (0)
// UPLOAD_ERR_INI_SIZE - the uploaded file exceeds the upload_max_filesize directive in php.ini (1)
// UPLOAD_ERR_FORM_SIZE - the uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form (2)
// UPLOAD_ERR_PARTIAL - the uploaded file was only partially uploaded (3)
// UPLOAD_ERR_NO_FILE - no file was uploaded (4)
// UPLOAD_ERR_NO_TMP_DIR - missing a temporary folder (6)
// UPLOAD_ERR_CANT_WRITE - failed to write file to disk (7)
// UPLOAD_ERR_EXTENSION - a PHP extension stopped the file upload (8)

// File uploads are disabled by default in PHP. To enable them, you need to set the file_uploads directive to On in your php.ini file.
// Upload files could be a security risk. Always validate and sanitize the uploaded files before using them.

// upload_tmp_dir directive in php.ini specifies the temporary directory used for storing files when doing file uploads. If this directive is not set, the default directory specified in the system's temporary directory is used.

//upload_max_filesize directive in php.ini sets the maximum size of an uploaded file. This directive also affects file uploads made via the HTTP POST method. The default value is 2M (2 megabytes).

// post_max_size directive in php.ini sets the maximum size of POST data that PHP will accept. This value should be greater than upload_max_filesize.

// max_file_uploads directive in php.ini sets the maximum number of files that can be uploaded in a single request. The default value is 20.

// memory_limit directive in php.ini sets the maximum amount of memory in bytes that a script is allowed to allocate. This helps prevent poorly written scripts for eating up all available memory on a server.

// max_input_time directive in php.ini sets the maximum time in seconds a script is allowed to parse input data, such as POST and GET. If the time limit is reached, the script will be terminated.

session_start();

$router = new Router();

$router
    ->get('/', [Home::class, 'index'])
    ->post('/upload', [Home::class, 'upload'])
    ->get('/invoices', [Invoice::class, 'index'])
    ->get('/invoices/create', [Invoice::class, 'create'])
    ->post('/invoices/create', [Invoice::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

// phpinfo();

// Output buffering is turned on by default in PHP. It's a mechanism that allows you to store the output of a script in a buffer and send it to the browser all at once.

// When headers are sent to the browser, you can't set cookies or session data and no longer can send more headers or modify the existing ones.