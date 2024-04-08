<?php

namespace App\Motor\Exceptions;

class LowerLevelOilException extends \Exception
{
    protected $message = 'Oil level is too low';
}
