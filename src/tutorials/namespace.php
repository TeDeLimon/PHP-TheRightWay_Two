<?php

declare(strict_types=1);

//@see https://www.php.net/manual/en/language.namespaces.php

//? Autoloading: Autoloading is a way to automatically load classes without having to require them manually.

// Still using require_once to load the classes
require_once __DIR__ . './../PaymentGateway/Paddle/Transaction.php';
require_once __DIR__ . './../PaymentGateway/Paddle/CustomerProfile.php';
require_once __DIR__ . './../PaymentGateway/Stripe/Transaction.php';

//? Namespaces: Namespaces are a way to organize your code and prevent naming conflicts.
// Aliasing/Importing: You can use the use keyword to import classes from other namespaces.
// If we don't give an alias to the class, PHP don't know which class to use because the class name is ambiguous.
use PaymentGateway\Paddle\Transaction as PaddleTransaction;
use PaymentGateway\Stripe\Transaction as StripeTransaction;

// If we want to use multiple classes from the same namespace, we can use a comma to separate them.
//* use PaymentGateway\Paddle\Transaction, PaymentGateway\Paddle\CustomerProfile;
//* use PaymentGateway\Paddle\{ Transaction, CustomerProfile };

//* use PaymentGateway\Paddle;
//* use PaymentGateway\Stripe;

// This will throw an error because the Transaction class is ambiguous
//var_dump(new Transaction());

// This will create a new instance of the Transaction class from the Stripe namespace using the fully qualified name
//* var_dump(new \PaymentGateway\Stripe\Transaction());
//* var_dump(new \PaymentGateway\Paddle\Transaction());

var_dump(new PaddleTransaction());
var_dump(new StripeTransaction());
