<?php

require_once '../routes.php';
require_once '../config/setup.php';

$requestUri = strtok($_SERVER['REQUEST_URI'], '?');
$method = $_SERVER['REQUEST_METHOD'];

if (isset($routes[$requestUri])) {
    [$controller, $action] = explode('@', $routes[$requestUri]);

    require_once __DIR__ . '/../app/Controllers/' . $controller . '.php';
    $controllerInstance = new $controller();

    if (method_exists($controllerInstance, $action)) {
        echo $controllerInstance->$action();
    } else {
        echo '404 - Página não encontrada.';
    }
}