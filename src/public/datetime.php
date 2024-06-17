<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

//? Working with dates 

// We can use 'tomorrow', 'next tuesday', 'last day of next month', 'tomorrow noon', 'last day of +2 months', '2011-03-05', '2011-03-05 00:00:00' and other formats

// The default timezone is UTC

// The second argument is the timezone, which can be a string or a DateTimeZone object (https://www.php.net/manual/en/timezones.php)

$dateTime = new DateTime('tomorrow', new DateTimeZone('Europe/Berlin'));

var_dump($dateTime);

print_r($dateTime->getTimezone()->getName() . ' - ' . $dateTime->format('Y-m-d H:i:s') . PHP_EOL);

// We can change the timezone

$dateTime->setTimezone(new DateTimeZone('America/New_York'));

// The format method returns a string representation of the date

print_r($dateTime->getTimezone()->getName() . ' - ' . $dateTime->format('Y-m-d g:i A') . PHP_EOL);

// We can change the date and time using the setDate and setTime methods

$dateTime->setDate(2021, 12, 31)->setTime(23, 59, 59);

print_r($dateTime->getTimezone()->getName() . ' - ' . $dateTime->format('Y-m-d H:i:s') . PHP_EOL);

// Create formatted dates

// In european format (day-month-year)
// In U.S. format (month-day-year)

$american_date = '18/06/2024 3:30PM';

// This will throw an error because the format is incorrect (day-month-year) expecting (month-day-year)
//$dateTime = new DateTime($date);

$date = '18-06-2024 3:30PM';
$dateTime = new DateTime($date);

// To solve this problem, we can use the createFromFormat method or use dashes instead of slashes

$dateTime = DateTime::createFromFormat('d/m/Y g:mA', $american_date);

var_dump($dateTime);


// Examples and comparisons

// Check the next documentation for more information: https://www.php.net/manual/en/dateinterval.format.php

$dateTime_1 = new DateTime('2021-12-31 23:59:59');
$dateTime_2 = new DateTime('2021-12-31 23:58:59');

var_dump($dateTime_1 > $dateTime_2); // true
var_dump($dateTime_1 < $dateTime_2); // false
var_dump($dateTime_1 == $dateTime_2); // false
var_dump($dateTime_1 != $dateTime_2); // true
var_dump($dateTime_1 <=> $dateTime_2); // 1 (greater than) spaceships operator

$dateTime_2->setDate(2021, 5, 20)->setTime(21, 02, 10);

// The diff method returns a DateInterval object that represents the difference between two dates 

var_dump($dateTime_1->diff($dateTime_2)); // DateInterval object

var_dump($dateTime_1->diff($dateTime_2)->format('%Y years %m months %d days %H hours %i minutes %s seconds')); // 7 months 11 days 1 hour 56 minutes 49 seconds

// Now let's create an interval (https://www.php.net/manual/en/dateinterval.construct.php)
// Period must starts with P and time with T
$interval = new DateInterval('P1Y2M3DT4H5M6S');

var_dump($interval);

// We can add intervals to a date

$dateTime_1->add($interval);

var_dump($dateTime_1->format('d-m-Y H:i:s')); // 2023-03-07 04:05:06

// We can also subtract intervals
$dateTime_1->sub($interval);

var_dump($dateTime_1->format('d-m-Y H:i:s')); // 2022-01-03 23:59:59

// If the interval is negative, we can use the invert method to make it positive
$interval->invert = 1;

$dateTime_1->add($interval);

var_dump($dateTime_1->format('d-m-Y H:i:s')); // 2020-10-31 04:05:06


// For example: let's add one month to the current date
// DateTimeImmutable is an immutable object, which means that it cannot be modified

$from = new DateTimeImmutable(datetime: 'now', timezone: new DateTimeZone('Europe/Berlin'));

// We can clone the object to avoid modifying the original date
// When we use immutable objects, we must assign the result to a variable because the object is not modified

// $to = (clone $from)->add(new DateInterval('P1M')); // In case DateTime is not immutable
$to = $from->add(new DateInterval('P1M'));

print_r($from->format('d-m-Y') . ' - ' . $to->format('d-m-Y') . PHP_EOL);


// We can create a period between two dates, with a specific interval

$period = new DatePeriod(
    start: new DateTime('2021-01-01'),
    interval: new DateInterval('P2M'),
    end: new DateTime('2021-12-31')
);

// This will create a period from 2021-01-01 to 2021-12-31 with a monthly interval

foreach ($period as $date) {
    print_r($date->format('d-m-Y') . PHP_EOL);
}

//TODO: To work hardly with dates, we can use the Carbon library (https://carbon.nesbot.com/)