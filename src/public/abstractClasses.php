<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use \App\Field\Text\Text;
use \App\Field\Boolean\Radio;
use \App\Field\Boolean\Checkbox;

//? Abstract classes are classes that cannot be instantiated: are templates for other classes

//? Abstract classes leveling up the inheritance concept

//? Abstract classes can have abstract methods, which are methods that must be implemented by the child classes

$fields = [
    new Text('textField'),
    new Checkbox('checkboxField'),
    new Radio('radioField'),
];

foreach ($fields as $field) {
    echo $field->render() . PHP_EOL;
}
