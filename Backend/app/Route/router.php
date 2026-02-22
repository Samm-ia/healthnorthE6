<?php

use App\Controllers\SigninController;
use App\Controllers\LoginController;
use App\Controllers\PatientsController;
use App\Controllers\PageController;
use PDO;

$controller = $_GET['controller'] ?? 'signin';
$action = $_GET['action'] ?? 'index';

$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = __DIR__ . '/../app/Controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $instance = new $controllerName();

    if (method_exists($instance, $action)) {
        $instance->$action();
        exit;
    }
}

echo "404 - Page non trouvée";
