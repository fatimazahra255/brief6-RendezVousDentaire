<?php

require_once dirname(__DIR__) . "/app/configs/index.php";
require_once "autoload.php";






$params = ["home"];

if (isset($_GET["url"])) {
    $url =  $_GET["url"];
    $params = explode("/", rtrim($url, "/"));
}

$controller = ucfirst($params[0]) . "Controller";
$controllerPath = dirname(__DIR__) . "/app/controllers/$controller.php";
if (file_exists($controllerPath)) {
    require_once($controllerPath);
    if (class_exists($controller)) {
        $objet = new $controller;
        if (isset($params[1])) {
            $method = $params[1];
            if (method_exists($objet, $params[1])) {
                $objet->$method($params[2] ?? null);
                return;
            }
        } else {

            $mthd = "index";
            if (method_exists($objet, $mthd)) {
                $objet->$mthd();
                return;
            }
        }
    }
}
echo "404 not found";
