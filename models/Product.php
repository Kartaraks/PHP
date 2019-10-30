<?php

namespace app\models;

use app\engine\Db;
class Product extends Model
{
public $id;
public $name;
public $description;
public $price;

protected $tableName = "goods";
}