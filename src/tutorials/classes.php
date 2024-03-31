<?php

declare(strict_types=1);

require_once __DIR__ . '/classes/Transaction.php';
require_once __DIR__ . '/classes/PaymentProfile.php';
require_once __DIR__ . '/classes/Customer.php';

//? Classes 

// We are gonna follow the psr 4 autoloading standard, wich means that we are gonna use the namespace to organize our classes
// Single responsibility principle: A class should have only one reason to change
// Open/closed principle: A class should be open for extension, but closed for modification
// Single file for each class

$amount = (new Transaction(50.5, 'Food', 8))
    ->applyTax(8)
    ->applyDiscount(20)
    ->getAmount();

//? Properties - Access modifiers; public, private, protected

//? Methods - Access modifiers; public, private, protected

//If you don't specify the access modifier, it will be public by default

//If you don't assign a value to a property, it will be null by default

// To modify the properties of the object, we use the arrow operator

var_dump($amount);

//? Objects 

//To create a generic object, we use the stdClass class
$object = new stdClass();

var_dump($object);

//To cast an array to an object, we use the (object) cast
$array = ['name' => 'John', 'age' => 30];

$person = (object) $array;

var_dump($person);

// Explaining the nullsafe operator
$newTransaction = new Transaction(100, 'Tech');

// This will throw an error because the customer property is null
//* echo $transtaction->customer->paymentProfile->id;

// This will return null because the customer property is null
//*echo $newTransaction?->customer->paymentProfile->id;

// This is not perfect because it will throw an error if the customer property is an empty class

$newTransaction->customer = new Customer();

// This will throw an error because the paymentProfile property is null
//*echo $newTransaction?->customer->paymentProfile->id;

//*echo $newTransaction?->customer?->paymentProfile?->id;

// We can use null coalescing operator to set a default value
echo $newTransaction?->customer?->paymentProfile?->id ?? 'No correct data found';

//But there's a problem with the null coalescing operator, it will return the default value if the property is null or if the property is an empty class
//! This won't work because getCustomer is a method and not a property 
//* echo $newTransaction->getCustomer()->getPaymentProfile()->getId() ?? 'No correct data found';

//So in this case we can use the nullsafe operator
echo $newTransaction?->getCustomer()?->getPaymentProfile()?->getId() ?? 'This is the right way';
