<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\DB;
use App\PaymentGateway\Paddle\Transaction;
use App\Enums\Status;

// Constants must be in uppercase and separated by underscores
// This constant is public and can be accessed from outside the class
echo Status::PAID;

// This constant is private and cannot be accessed from outside the class
//* echo Transaction::STATUS_PENDING;

// This constant is public and can be accessed from outside the class
// ::class is a magic constant that returns the fully qualified class name
echo Transaction::class;

$transaction = new Transaction();
$transaction1 = new Transaction();
$transaction2 = new Transaction();

$transaction->setStatus(Status::PAID);
// $transaction->setStatus('Incorrecto');

// Static properties are shared among all instances of a class
var_dump(Transaction::getCount());

// This will throw an error because the constructor is private
//* $db = new DB(['host' => 'localhost']);

// Instead, use the getInstance method to get the instance of the DB class
$db = DB::getInstance(['host' => 'localhost']);

var_dump($db);