<?php

function autoload($class)
{
    $paths = [
        "models"
    ];

    foreach ($paths as $path) {
        $location = dirname(__DIR__) . "/app/$path/$class.php";
        if (file_exists($location)) {
            require_once $location;
            break;
        }
    }
}


spl_autoload_register("autoload");