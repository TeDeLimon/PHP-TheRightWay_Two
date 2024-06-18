<?php

declare(strict_types=1);

/**
 * Debugging function for readable output.
 * 
 * @param mixed $data The data to be displayed.
 * @param bool $stopExecution Whether to stop the execution after displaying the data.
 * @param mixed ...$moreData Additional data to be displayed.
 * 
 * @return void
 */
function debug(mixed $data, bool $stopExecution = false, mixed ...$moreData): void
{
    echo '<pre>';

    var_dump($data);

    if ($moreData) {

        foreach ($moreData as $extraData) {

            var_dump($extraData);
        }
    }

    echo '</pre>';

    if ($stopExecution) {

        die();
    }
}

/**
 * Debugging function for terminal output.
 * 
 * @param mixed $data The data to be displayed.
 * @param bool $stopExecution Whether to stop the execution after displaying the data.
 * @param mixed ...$moreData Additional data to be displayed.
 * 
 * @return void
 */
function debug_terminal(mixed $data, bool $stopExecution = false, mixed ...$moreData): void
{
    echo PHP_EOL;

    error_log(print_r($data, true));

    if ($moreData) {

        foreach ($moreData as $extraData) {

            error_log(print_r($extraData, true));
        }
    }

    echo PHP_EOL;

    if ($stopExecution) {

        die();
    }
}
