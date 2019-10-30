<?php


namespace app\models\goods;

// Игра стоит 20 ед. риса
class Game_A extends Goods
{
    protected $price;




    public function __construct($price)
    {
       parent::__construct($price);
    }


}