<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Collectors\RockyAgency;
use App\Collectors\CollectionAgency;
use App\Services\DebtCollectionService;

//? Interfaces are contracts that classes can implement to ensure that they have certain methods

//? Interfaces are a way to define a contract that classes must follow

//? Interfaces are defined using the interface keyword

//? Interfaces can extend other interfaces

//? Interfaces can have constants

//? Interfaces can have methods

//? Interfaces can have abstract methods

$collector = new CollectionAgency(); 

echo ($collector->collect(100). PHP_EOL); // int(100)

$rockyCollector = new RockyAgency();

echo ($rockyCollector->collect(100). PHP_EOL); // int(65)


// The problem is that the DebtCollectionService class is expecting an object of type CollectionAgency, but it can also accept an object of type RockyAgency.
$collectorService = new DebtCollectionService();

$collectorService->collectDebt($collector);
$collectorService->collectDebt($rockyCollector);

