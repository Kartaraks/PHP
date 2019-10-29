<?php


class Autoload
{
    public function autoloadClass($className){
        include "../models/{$className}.php" ;
    }
}