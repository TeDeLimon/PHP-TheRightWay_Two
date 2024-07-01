<?php

namespace App\Exceptions;

class ViewNotFounException extends \Exception
{
    protected $message = 'View not found';
}
