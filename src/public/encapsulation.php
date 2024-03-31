<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\PaymentGateway\Paddle\Transaction;
use App\Enums\Status;

//? Encapsulation: The concept of restricting access to some parts of an object to prevent the accidental modification of data.

$transaction = new Transaction();

// The status property is public, so it can be accessed and modified from outside the class
// $transaction->status = "No sense";

// Now the status property is private, so it can't be accessed from outside the class

// To access the status property, we need to use the getStatus method
echo $transaction->getStatus();

// To update the status property, we need to use the setStatus method
$transaction->setStatus(Status::REFUNDED);

$transaction->process();

// This breaks the encapsulation principle, as the status property is being accessed directly from outside the class
// To fix this, a private property only must be declared in the constructor


// Anyway there's a way to access the private property, but it's not recommended
// Reflection API: A set of classes and interfaces that allow you to get information about the structure of a class and its properties and methods

$reflectionProperty = new ReflectionProperty(Transaction::class, 'status');

$reflectionProperty->setAccessible(true);

$reflectionProperty->setValue($transaction, 'No sense...');

//This is a trick to access the private property, but it's not recommended
echo $transaction->getStatus() . PHP_EOL;
