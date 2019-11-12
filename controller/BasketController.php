<?php


namespace app\controller;

use app\models\Basket;
use app\models\Product;


class BasketController extends Controller
{

    public function actionBasket(){

    }

    public function actionAdd(){
        // TODO  переделать или удалить
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
        // TODO перенести этот метод
        if (isset($basket)){
            return $basket;
        } else {
            return false;
        }
    }

    public function actionAddToBasket(){
        $data= json_decode(file_get_contents('php://input'));
        $id = $data->id;
        echo json_encode(['response' => 'ok', 'id' => $id]);
    }

}
