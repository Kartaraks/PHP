<?php
/**
 * Created by PhpStorm.
 * User: kirillmikhaylov
 * Date: 2019-11-06
 * Time: 11:03
 */

namespace app\treits;


trait TSingletone
{

    private static $instance = null;

    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}

    public static function getInstance(){
        if (is_null(self::$instance)){
            static::$instance = new static();
        }
        return static::$instance;
    }

}