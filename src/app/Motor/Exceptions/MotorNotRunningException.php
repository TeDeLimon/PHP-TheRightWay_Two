<?php

namespace App\Motor\Exceptions;

class MotorNotRunningException extends \Exception
{
    protected $message = 'The motor is not running';
}
