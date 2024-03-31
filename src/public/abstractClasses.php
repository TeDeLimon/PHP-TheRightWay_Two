<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

//? Abstract classes are classes that cannot be instantiated: are templates for other classes

//? Abstract classes leveling up the inheritance concept

//? Abstract classes can have abstract methods, which are methods that must be implemented by the child classes

$fields = [
    new \App\Field\Text\Text('textField'),
    new \App\Field\Boolean\Checkbox('checkboxField'),
    new \App\Field\Boolean\Radio('radioField'),
];

foreach ($fields as $field) {
    echo $field->render() . PHP_EOL;
}
