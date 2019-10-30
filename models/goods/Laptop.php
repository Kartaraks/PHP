<?php



namespace app\models\goods;

//Ноутбук стоит 200 ед. риса
class Laptop extends Goods
{
    protected $price = 200;

    public function __construct($price)
    {
        parent::__construct($price);
    }
}