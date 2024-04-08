<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\InvoiceV3;

//? Object Cloning

// To clone an object, we can use the clone keyword. This will create a new object with the same properties and values as the original object.

// The __clone() method is called when the object is cloned. We can use this method to perform any additional operations that are required when the object is cloned.

// This intance of InvoiceV3 is created using the new keyword
$invoice1 = new InvoiceV3(2000, 'Web Development Services', '1234 5678 9012 3456');

// This intance of InvoiceV3 is created using the new keyword plus full namespace
$invoice2 = new \App\InvoiceV3(2000, 'Web Development Services', '1234 5678 9012 3456');

// This intance of InvoiceV3 is created using the create method
$invoice3 = \App\InvoiceV3::create(3000, 'Data Cloud Management', '5423 2100 9012 4848');

// This will create a new object with the same properties and values as the original object, it means a shallow copy of the object
$invoice4 = $invoice3;

// This will clone the object, it means a deep copy of the object
// When we clone the constructor is not called, but the __clone() method is called
$invoice5 = clone $invoice3;

var_dump($invoice1, $invoice2, $invoice3, $invoice4, $invoice5, $invoice3 === $invoice4, $invoice3 === $invoice5);
