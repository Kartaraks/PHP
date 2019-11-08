<?php


class Autoload
{
    public function autoloadClass($className){

           $path = str_replace(["app", "\\"], [ROOT_DIR, DS], $className ) . ".php";
            if (file_exists($path)){
                include $path;
            }
        }
}