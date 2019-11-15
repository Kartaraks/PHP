<?php


namespace app\controller;

use app\engine\Request;
use app\models\Basket;



class BasketController extends Controller
{


    public function actionIndex(){

        $dataBasket = Basket::getBasket();
        if ($dataBasket){
            echo $this->render('basket', ['basket' => $dataBasket]);
        } else {
            echo "Ваша корзина пуста! Перейдите в каталог для выбора товара <a href='/product/catalog/'>Каталог</a>";
        }
    }



    public function actionAddToBasket(){

        $id = (new Request())->getParams()['id'];
        (new Basket(session_id(), $id))->insert();

        header('Content-Type: application/json');
        echo json_encode(['response' => session_id(), 'count' => Basket::getCountWhere('session_id', session_id())]);
    }


    public function actionDelFromBasket(){

        $id = (new Request())->getParams()['id'];

        $count = Basket::getCountWhere('session_id', session_id());
        $count -= 1;

        (new Basket(session_id(), $id))->delete($id);
        header('Content-Type: application/json');
        echo json_encode(['response' => 'ok','id' => $id, 'count' => $count]);
    }

}
