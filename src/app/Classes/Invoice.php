<?php

namespace App\Classes;

class Invoice
{
    public function index(): string
    {
        return 'Invoice page';
    }

    public function create(): string
    {
        return 'Create invoice';
    }
}
