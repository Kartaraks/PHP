<?php
/**
 * Created by PhpStorm.
 * User: kirillmikhaylov
 * Date: 2019-11-17
 * Time: 21:32
 */

namespace app\models\repositories;
use app\models\entities\Product;
use app\models\Repository;

class ProductRepository extends Repository
{
    public function getTableName()
    {
        return "product";
    }

    public function getEntityClass(){
        return Product::class;
    }
}