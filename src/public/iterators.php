<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Invoice;
use App\InvoiceCollection;
use App\InvoiceCollection2;

//? Iterator: An object that facilitates the traversal of a data structure. It allows you to iterate over a collection of objects without exposing the underlying representation.

//? The Iterator pattern is a design pattern in which an iterator is used to traverse a container and access the container's elements. The iterator pattern decouples algorithms from containers; in some cases, algorithms are necessarily container-specific and thus cannot be decoupled.

// This will iterate over the public properties of the Invoice class

foreach (new Invoice(25) as $key => $letter) {
    echo $key . ' = ' . $letter . PHP_EOL;
}

$invoiceCollection = new InvoiceCollection([new Invoice(25), new Invoice(50), new Invoice(75)]);

foreach ($invoiceCollection as $key => $invoice) {

    echo $invoice->id . ' = ' . $invoice->amount . PHP_EOL;
}


$invoiceCollection2 = new InvoiceCollection2([new Invoice(25), new Invoice(50), new Invoice(75)]);

foreach ($invoiceCollection2 as $key => $invoice) {

    echo $invoice->id . ' = ' . $invoice->amount . PHP_EOL;
}

// There's a new type called iterable

function foo(iterable $iterable)
{
    foreach ($iterable as $key => $value) {
        echo $key . ' = ' . $value . PHP_EOL;
    }
}

foo([1, 2, 3, 4, 5]);
foo(new ArrayIterator([1, 2, 3, 4, 5]));
foo($invoiceCollection);
