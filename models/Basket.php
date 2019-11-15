<?php


namespace app\models;
use app\engine\Db;

class Basket extends DbModels
{


    protected $session_id;
    protected $good_id;

    public $propsDb = [
        'session_id' => false,
        'good_id' => false,
    ];



    public function __construct($session_id = null, $good_id = null)
    {

           $this->session_id = $session_id;
           $this->good_id = $good_id;

    }


    public static function getTableName()
    {
        return "basket";
    }


    public static function getBasket() {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price, p.nameImg FROM basket b,product p WHERE b.good_id=p.id";
        return Db::getInstance()->queryAll($sql, []);
    }

    public static function processingRequestGetCount(){
        $count = Basket::getCountWhere('session_id', session_id());
        if ($count == 0){
            return;
        } else {
            return $count;
        }
    }
//AND session_id = :session

}