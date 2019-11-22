<?php
/**
 * Created by PhpStorm.
 * User: kirillmikhaylov
 * Date: 2019-11-17
 * Time: 21:31
 */

namespace app\models\repositories;
use app\engine\Db;
use app\models\entities\Basket;
use app\models\Repository;

class BasketRepository extends Repository
{
    public function getTableName()
    {
        return "basket";
    }


    public function getBasket() {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price, p.nameImg FROM basket b,product p WHERE b.good_id=p.id";
        return Db::getInstance()->queryAll($sql, []);
    }

    public function processingRequestGetCount(){
        $count = $this->getCountWhere('session_id', session_id());

        if ($count == 0){
            return;
        } else {
            return $count;
        }
    }

    public function getEntityClass(){
        return Basket::class;
    }
}