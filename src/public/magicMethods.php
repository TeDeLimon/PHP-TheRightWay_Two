<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Invoice;
use App\InvoiceV2;

//? Magic methods are methods that are called automatically when certain conditions are met

//? Magic methods are always preceded by two underscores

//? Magic methods are always public

//? Magic methods are always non-static

//? Magic methods are always non-abstract

//? Magic methods are always non-final

//!
// The problem with magic methods is that they break encapsulation and make the code harder to understand
// The second problem is that they are not type safe, so they can lead to runtime errors

//TODO: https://www.php.net/manual/es/language.oop5.magic.php

$invoice = new Invoice(amount: 1000);

//* If the property exists, __set() is not called
//* __set() is called when we try to set a value to a property that is not accessible or does not exist
$invoice->__set('amount', 2000);
$invoice->__set('rate', 0.6);

print_r($invoice->__get('amount') . PHP_EOL);

// This will return 0.6 because the property exists, it was set in the previous line
print_r($invoice->__get('rate') . PHP_EOL);

// This will return null because the property does not exist
print_r($invoice->__get('due') . PHP_EOL);


$invoiceV2 = new InvoiceV2();

$invoiceV2->__set('amount', 2000);
$invoiceV2->__set('rate', 0.2);

print_r($invoiceV2->__get('amount') . PHP_EOL);
print_r($invoiceV2->__get('rate') . PHP_EOL);

print_r($invoiceV2->__isset('amount') . PHP_EOL);
print_r($invoiceV2->__unset('rate') . PHP_EOL);

/**
 * The __call() magic method is called when a method is called that does not exist
 */
$invoice->__call('process', ['John', 'Jane', 'Doe']);

$invoice->__call('delete', ['John', 'Jane', 'Doe', 'Smith']);


/**
 * The __callStatic() magic method is called when a static method is called that does not exist
 */
$invoice->__callStatic('process', ['John', 'Jane', 'Doe', 'Smith']);

$invoice->__callStatic('delete', ['John', 'Jane', 'Doe', 'Smith']);

/**
 * The __toString() magic method is called when an object is used in a string context
 */
echo $invoice;

/**
 * The __invoke() magic method is called when an object is used as a function
 */
$invoice();

/**
 * The __debugInfo() magic method is called when an object is used in a var_dump() function
 */
var_dump($invoice);