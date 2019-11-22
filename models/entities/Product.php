<?php

namespace app\models\entities;
use app\models\Model;

class Product extends Model
{

    protected $name;
    protected $description;
    protected $price;
    protected $nameImg;

    public $propsDb = [
        'name' => false,
        'description' => false,
        'price' => false,
        'nameImg' => false
        ];


    public function  __construct ($name = null, $description = null, $price = null, $nameImg = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->nameImg = $nameImg;
    }





}