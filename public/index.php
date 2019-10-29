<?php

function __autoload($className){
    (new Autoload()) -> autoloadClass($className);
}

$product = new Product();

var_dump($product);
