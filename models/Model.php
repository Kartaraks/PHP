<?php


namespace app\models;

use app\engine\Db;

 abstract class Model
{

    protected $id;
    public $propsDb = [];

     public function __get($name) {

         return $this->$name;

     }


     public function __set($name, $value) {

         $this->$name = $value;
         $this->propsDb[$name] = true;

     }


 }