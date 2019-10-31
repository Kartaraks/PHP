<?php


class Autoload
{
    public function autoloadClass($className){
            $str = str_replace("app", "..", $className);
            $path = str_replace("\\", "/", $str) . ".php";
            if (file_exists($path)){
                include $path;
            }
        }
}