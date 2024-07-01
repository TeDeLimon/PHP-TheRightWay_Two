<?php

namespace App\Controllers;

use App\Classes\View;

class InvoiceController
{
    /**
     * Muestra una lista de facturas.
     */
    public function index(): View
    {
        return View::make('invoice/index');
    }

    /**
     * Muestra un formulario para crear una factura.
     */
    public function create(): View
    {
        // $_REQUEST will contain data from $_GET, $_POST, $_COOKIE, and $_FILES

        //debug($_GET, false, $_POST, $_REQUEST);

        return View::make('invoice/create');
    }

    /**
     * Almacena una factura en la base de datos.
     */
    public function store()
    {
        $amount = $_POST['amount'] ?? 0;

        // This will set the HTTP response status code to 302 and redirect the user to the specified URL
        header('Location: /');
    }
}