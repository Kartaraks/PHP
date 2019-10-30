<?php


namespace app\models\goods;

// priceOne - стоимость 1 ед.
abstract class Goods
{
    protected $priceOne = 5;
    protected $price;
    protected $data = [];

    public function __construct($price = null)
    {
        $this->price = $price;
    }

    public function getPrice($count){
       $sum = $this->price * $this->priceOne * $count;
       return $sum;

    }

    public function __get($name)
    {

        $this->data[$name];
        return "Вы получили {$name} <br>";

    }


    public function __set($name, $value)
    {
        $this->data[$name] = $value;
        $a = "Вы получили сет {$name} равным ";
        echo $a;

    }




}