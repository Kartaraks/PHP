<?php


namespace app\models\goods;

// Рис взят за основу
class Rice extends Goods
{
    protected $price = 1;

    public function __construct($price)
    {
        parent::__construct($price);
    }
}