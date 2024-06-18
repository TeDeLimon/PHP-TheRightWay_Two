<?php

namespace App\Classes;

class Invoice
{
    public function index(): string
    {
        return 'Invoices page';
    }

    public function create(): string
    {
        // $_REQUEST will contain data from $_GET, $_POST, $_COOKIE, and $_FILES

        //debug($_GET, false, $_POST, $_REQUEST);

        $form = <<<HTML
            <form action="/invoices/create" method="POST">
                <label>Amount</label>
                <input type="text" name="amount" required>
            </form>
        HTML;

        return $form;
    } 

    public function store(): string
    {
        $amount = $_POST['amount'] ?? 0;

        debug($amount, true);

        return 'Invoice created';
    }
}
