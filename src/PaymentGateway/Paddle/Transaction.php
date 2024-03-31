<?php

declare(strict_types=1);

namespace PaymentGateway\Paddle;

use DateTime;

class Transaction
{

    public function __construct()
    {
        // PHP will look for the class in the current namespace; PaymentGateway\Paddle
        //* var_dump(new CustomerProfile());

        // var_dump(new DateTime());

        // If a function is not found in the current namespace, PHP will look for it in the global namespace
        //* var_dump(\explode(',', 'Hello,World,PHP'));
        //* var_dump(explode(',', 'Hello,World,PHP'));
    }
}

/**
 * Explode a string by string
 * 
 * @example - Just like the built-in explode function
 * 
 * @param string $delimiter
 * @param string $string
 * @return array
 */
function explode(string $delimiter, string $string): array
{
    return \explode($delimiter, $string);
}