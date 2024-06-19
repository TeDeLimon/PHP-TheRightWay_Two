<?php

namespace App\Classes;

class Home
{
    public function index()
    {
        // $_SESSION is a superglobal array that stores session data.
        // $_SESSION count doesn't exist, so we need to initialize it to 0.
        $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;

        return 'Home Page. You have visited this page ' . $_SESSION['count'] . ' times.';
    }

    public function cookies()
    {

        // Cookies must be set before any output is sent to the browser.

        setcookie(
            name: 'userName',
            value: 'Luis Villanueva',
            expires_or_options : time() + 3600
        );

        // debug($_COOKIE);

        return 'Cookies Page.';
    }
}
