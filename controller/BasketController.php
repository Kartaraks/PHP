<?php


namespace app\controller;

use app\models\Basket;
use app\models\Product;


class BasketController extends Controller
{

    public function actionBasket(){

    }

    public function actionAdd(){
        $id = $_GET['id'];
        $basket = new Basket($this->getSession(),'',$id);
        $basket->insert();
        header("Location: /basket/");
    }

    public function actionIndex(){
        $sI = $this->checkBasketSI($this->getSession());
        if ($sI != false){
            echo $this->render('basket', ['basket' => $sI]);
        } else {
            echo "Ваша корзина пуста!";
        }
    }


    private function checkBasketSI($sessionId){
        $basket = Basket::getSessionID($sessionId);

        if (isset($basket)){
            return $basket;
        } else {
            return false;
        }
    }

}
