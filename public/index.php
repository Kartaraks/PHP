<?php

session_start();

use app\engine\{Render, Request};


include realpath("../engine/Autoload.php");
include realpath("../config/config.php");
//include realpath("../vendor/autoload.php");


spl_autoload_register([new Autoload(), 'autoloadClass']);

$request = new Request();

$controllerName = $request->getControllerName() ? : 'product';

$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE .  ucfirst($controllerName) . "Controller";




if (class_exists($controllerClass)){
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    echo '404';
}



