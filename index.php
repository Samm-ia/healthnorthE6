<?php
session_start();

$controller = $_GET['controller'] ?? 'signin';
$action = $_GET['action'] ?? 'index';

$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = __DIR__ . '/Backend/app/Controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $instance = new $controllerName();

    if (method_exists($instance, $action)) {
        $instance->$action();
        exit;
    }
}

echo "404 - Page non trouvée";
