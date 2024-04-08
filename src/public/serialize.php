<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\InvoiceV3;

//? Object Serialization

// Serialization is the process of converting an object into a string representation. This string can be stored in a file or a database, or it can be sent over the network.

// The serialized string can be unserialized to create a new object with the same properties and values as the original object.

// The __serialize() method is called when the object is serialized. We can use this method to specify which properties should be serialized.

// The __unserialize() method is called when the object is unserialized. We can use this method to perform any additional operations that are required when the object is unserialized.

// When unserializing an object, the __wakeup() method is called. We can use this method to perform any additional operations that are required when the object is unserialized.

// The unserialized object created it's not the same as the original object, it's a new object with the same properties and values as the original object.

echo serialize(true) . PHP_EOL;
echo serialize(1) . PHP_EOL;
echo serialize(2.5) . PHP_EOL;
echo serialize('Hello, World!') . PHP_EOL;
echo serialize([1, 2, 3]) . PHP_EOL;
echo serialize(['name' => 'John Doe', 'age' => 30]) . PHP_EOL;

/* Output:
    b:1;
    i:1;
    d:2.5;
    s:13:"Hello, World!";
    a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}
    a:2:{s:4:"name";s:8:"John Doe";s:3:"age";i:30;}
*/

$invoice = new InvoiceV3(2000, 'Web Development Services', '1234 5678 9012 3456');

// First the object is serialized to a string using the serialize() function. 
echo ($serializedInvoice = serialize($invoice)) . PHP_EOL;

// Then the string is unserialized using the unserialize() function.
var_dump(unserialize($serializedInvoice));
