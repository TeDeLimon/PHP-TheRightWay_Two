<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Toaster;
use App\ToasterPro;

$toaster = new Toaster();

$toaster->addSlice('White Bread')
    ->addSlice('Brown Bread')
    ->addSlice('Wholemeal Bread');

$toaster->toast();

$toaster->stopToast();

$toasterPro = new ToasterPro();

$toasterPro->addSlice('White Bread')
    ->addSlice('Brown Bread')
    ->addSlice('Wholemeal Bread')
    ->addSlice('Bagel');

$toasterPro->toastBagel();

