<?php
use app\models\{Product, Users, Basket};
use app\engine\{Db};

include realpath("../engine/Autoload.php");
include realpath("../config/config.php");

spl_autoload_register([new Autoload(), 'autoloadClass']);



$url = explode("/", $_SERVER['REQUEST_URI']);

$controllerName = empty($url[1])? "product" : $url[1];

$actionName = $url[2];

$controllerClass = CONTROLLER_NAMESPACE .  ucfirst($controllerName) . "Controller";


if (class_exists($controllerClass)){
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    echo '404';
}
















/*

$product = new Product('Kolya', 'opisanieOpisane', 200);
//var_dump($product->getOne(2));
//Product::getOne(2);
$product->save();

var_dump($product);

*/
