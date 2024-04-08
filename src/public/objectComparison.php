<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\InvoiceV2;

//? Object Comparison

// To find out how to compare objects, we need to understand how PHP stores objects in memory.

$invoice1 = new InvoiceV2();
$invoice2 = new InvoiceV2();

// we are copying the reference of the object
$invoice3 = $invoice1;

// Simple comparison: verify if the two objects are the same type
echo 'invoice1 == invoice2: ' . ($invoice1 == $invoice2) . PHP_EOL;

// Strict comparison: verify if the two objects are the same instance and of the same type
// They are pointing to different memory locations
echo 'invoice1 == invoice2: ' . ($invoice1 === $invoice2) . PHP_EOL;

// They are pointing to the same memory location
echo 'invoice1 == invoice3: ' . ($invoice1 === $invoice3) . PHP_EOL;

// We are setting the number property of the invoice1 object that will reflect in the invoice3 object because they are pointing to the same memory location value of the object
$invoice1->__set('number', 'A0001');

var_dump($invoice1, $invoice3);