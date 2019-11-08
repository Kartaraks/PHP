<?php

namespace app\models;


class Product extends DbModels
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $nameImg;

    public $props = [];

    public function  __construct ($name = null, $description = null, $price = null, $nameImg = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->nameImg = $nameImg;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
        $this->props['id'] = $this->id;
        $this->props[$name] = $value;
    }

    public static function getTableName()
    {
        return "product";
    }
}