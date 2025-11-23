<?php
session_start();
require_once 'config/Database.php';
spl_autoload_register(function ($class) {
    if (file_exists("controllers/$class.php")) require_once "controllers/$class.php";
    elseif (file_exists("models/$class.php")) require_once "models/$class.php";
});

//utilizei essa index como roteamento simples pegando o get mesmo, já que é só para demonstração
$controllerName = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'AuthController';
$action         = isset($_GET['action']) ? $_GET['action'] : 'login';
$controller = new $controllerName();
if (method_exists($controller, $action)) $controller->$action();
else echo "Ação não encontrada.";