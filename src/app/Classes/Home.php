<?php

namespace App\Classes;

class Home
{
    /**
     * Genera un formulario para subir un archivo.
     * 
     * @link https://www.php.net/manual/es/reserved.variables.files.php
     */
    public function index()
    {

        // The name will be the key in the $_FILES array.

        return <<<HTML

            <form action="/upload" method="POST" enctype="multipart/form-data">
                <input type="file" name="receipt[]" />
                <input type="file" name="receipt[]" />
                <button type="submit">Upload</button>
            </form>

        HTML;
    }

    /**
     * Sube un archivo al servidor. 
     * 
     * $_FILES es un array asociativo con la información de los archivos subidos al servidor.
     * 
     * @link https://www.php.net/manual/es/features.file-upload.post-method.php
     */
    public function upload()
    {
        debug($_FILES);

        // It look's weird but this is a temporary path where the file is stored.

        debug(pathinfo($_FILES['receipt']['tmp_name']));

        // The file is stored in the temporary directory on the server. 
        // It is a temporary location where files are stored until they are moved to a permanent location.

        $filePath = STORAGE_DIR . "/" . $_FILES['receipt']['name'];

        // Move the uploaded file to the storage directory.
        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        debug(pathinfo($filePath), true);
    }
}
