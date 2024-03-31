<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\PaymentGateway\Paddle\Transaction;
use App\Enums\Status;

//? Abstraction: The concept of hiding the complex implementation details and showing only the necessary features of an object.

//? To mantein the abstraction principle, methods that are not necessary to be public must be declared as private or protected

$transaction = new Transaction();

$transaction->process();