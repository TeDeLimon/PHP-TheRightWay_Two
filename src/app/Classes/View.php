<?php

declare(strict_types=1);

namespace App\Classes;

use App\Exceptions\ViewNotFounException;

class View
{
    /**
     * Constructor de la clase.
     * 
     * @param string $view Nombre de la vista.
     * @param array $params Parámetros que se pasan a la vista.
     */
    public function __construct(protected string $view, protected array $params = [])
    {
    }

    /**
     * Crea una nueva instancia de la clase.
     * 
     * @param string $view Nombre de la vista.
     * @param array $params Parámetros que se pasan a la vista.
     * 
     * @return View Instancia de la clase.
     */
    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    }

    /**
     * Renderiza la vista con los datos otorgados
     * 
     * @return string|bool Contenido de la vista. If output buffering isn't active then false is returned
     */
    public function render(): string|bool
    {
        $viewPath = VIEW_DIR . '/' . $this->view . '.php';

        if (!file_exists($viewPath)) {

            throw new ViewNotFounException();
        }

        // Be very careful with extract() function. It can overwrite variables. 
        // Example: $_GET['viewPath'] = '../.env

        extract($this->params);

        ob_start();

        include $viewPath;

        return ob_get_clean();
    }

    /**
     * Converts the object to its string representation. Magic method.
     * 
     * @return string String representation of the objec or false if output buffering isn't active
     */
    public function __toString(): string
    {
        return $this->render();
    }

    /**
     * Magic method to get the value of a property.
     */
    public function __get($name)
    {
        return $this->params[$name] ?? null;
    }
}
