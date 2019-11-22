<?php


namespace app\models;



 abstract class Model
{

    public $id;
    public $propsDb = [];


     public function __get($name) {
         var_dump($name);
         return $this->$name;

     }


     public function __set($name, $value) {
        var_dump($name);
         $this->$name = $value;
         $this->propsDb[$name] = true;


     }


 }