<?php

require_once '../routes.php';

// Verifica a URL atual
$requestUri = strtok($_SERVER['REQUEST_URI'], '?'); // Remove parâmetros
$method = $_SERVER['REQUEST_METHOD']; // Método HTTP usado (GET ou POST)

// Busca a rota correspondente
if (isset($routes[$requestUri])) {
    [$controller, $action] = explode('@', $routes[$requestUri]);

    require_once __DIR__ . '/../app/Controllers/' . $controller . '.php';
    $controllerInstance = new $controller();

    // Chama o método correto
    if (method_exists($controllerInstance, $action)) {
        echo $controllerInstance->$action();
    } else {
        echo "Método {$action} não encontrado no controlador {$controller}.";
    }
} else {
    echo '404 - Página não encontrada.';
}
