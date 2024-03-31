<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Binding\ClassA;
use App\Binding\ClassB;

//? Late Static Binding (LSB) is a feature in PHP that allows you to reference the called class in a context of static inheritance.

//? LSB is used when you want to reference the called class in a context of static inheritance. This means that if you have a class that extends another class, and you want to reference the class that was called, you can use LSB.

//? Early binding is when the method is not overridden in the child class and you want to reference the parent class in the parent class.

//? Late binding is when the method is overridden in the child class and you want to reference the child class in the parent class.

$classA = new ClassA();
$classB = new ClassB();

//* echo $classA->getName() . PHP_EOL; // Output: ClassA
//* echo $classB->getName() . PHP_EOL; // Output: ClassB

echo $classA::getName() . PHP_EOL; // Output: ClassA
echo $classB::getName() . PHP_EOL; // Output: ClassB

var_dump($classA::make()); // Output: object(App\Binding\ClassA)#2 (0) { }
var_dump($classB::make()); // Output: object(App\Binding\ClassB)#2 (0) { }