<?php
use app\models\{Product, Users, Basket};
use app\engine\{Render,TwigRender};


include realpath("../engine/Autoload.php");
include realpath("../config/config.php");
include realpath("../vendor/autoload.php");


spl_autoload_register([new Autoload(), 'autoloadClass']);


$url = explode("/", $_SERVER['REQUEST_URI']);

$controllerName = empty($url[1])? "product" : $url[1];

$actionName = $url[2];

$controllerClass = CONTROLLER_NAMESPACE .  ucfirst($controllerName) . "Controller";




if (class_exists($controllerClass)){
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    echo '404';
}



