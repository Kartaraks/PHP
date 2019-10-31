<?php


namespace app\models;


class Basket extends Model
{
    protected $id;
    protected $price;
    protected $quantity;
    protected $name_img;
    protected $name_good;
    protected $id_order;

    public function getTableName()
    {
        return "goods";
    }

}