<?php
use app\models\{Product, Users};
use app\models\goods\{Rice, Laptop,Game_A};

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'autoloadClass']);

$goodsLaptop = new Laptop(200);
$goodsRice = new Rice(1);
$goodsGame = new Game_A(50);

echo $goodsLaptop->getPrice(1) . " стоимость ноутбука <br>";
echo $goodsRice->getPrice(1) . " стоимость риса<br>";
echo $goodsGame->getPrice(1) . " стоимость игры <br>";
echo $goodsGame->x = 2;
