<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Coffee\{CoffeeMaker, LatteMaker, CapucchinoMaker, AllInOneCoffeeMaker};

//? Traits 

//* Traits are not contracts, they are just a way to share methods between classes.
//* Interfaces are contracts, they define the methods that a class must implement.

// A trait is a group of methods that you want to include within another class. Traits are used to declare methods that can be used in multiple classes. Traits can have methods and abstract methods that can be used in multiple classes, and the methods can have any access modifier (public, private, or protected).

// Traits are declared with the trait keyword.

// PHP only supports single inheritance: a child class can inherit
$coffeeMaker = new CoffeeMaker();
$latteMaker = new LatteMaker();
$capucchinoMaker = new CapucchinoMaker();
$allInOneCoffeeMaker = new AllInOneCoffeeMaker();

$coffeeMaker->makeCoffee();

$latteMaker->makeCoffee();
$latteMaker->makeLatte();

$capucchinoMaker->makeCoffee();
$capucchinoMaker->makeCapucchino();

$allInOneCoffeeMaker->setMilkType('Best Milk Ever!');
$allInOneCoffeeMaker->makeCoffee();
// Still using the method from the CapucchinoTrait
$allInOneCoffeeMaker->makeCapucchino();
$allInOneCoffeeMaker->makeLatte();
$allInOneCoffeeMaker->makeOriginalLatte();
$allInOneCoffeeMaker->makeEspecialLatte();
// This method is private and can only be used inside the trait.
$allInOneCoffeeMaker->addMilk();
