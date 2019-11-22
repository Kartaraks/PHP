<?php


namespace app\controller;

use app\engine\Request;
use app\models\entities\Basket;
use app\models\repositories\BasketRepository;


class BasketController extends Controller
{


    public function actionIndex(){

        $dataBasket = (new BasketRepository()) -> getBasket();
        if ($dataBasket){
            echo $this->render('basket', ['basket' => $dataBasket]);
        } else {
            echo "Ваша корзина пуста! Перейдите в каталог для выбора товара <a href='/product/catalog/'>Каталог</a>";
        }
    }



    public function actionAddToBasket(){

        $id = (new Request())->getParams()['id'];

        (new BasketRepository())->save(new Basket(session_id(), $id));

        header('Content-Type: application/json');
        echo json_encode(['response' => 'ok', 'count' => (new BasketRepository())->getCountWhere('session_id', session_id())]);
    }


    public function actionDelFromBasket(){

        $id = (new Request())->getParams()['id'];

        $count = (new BasketRepository())->getCountWhere('session_id', session_id());
        $count -= 1;
        $basket = new Basket();
        $basket->id = $id;
        // TODO переделать после 8 урока, не должно быть прямого назначения свойств
        (new BasketRepository()) -> delete($basket);

        header('Content-Type: application/json');
        echo json_encode(['response' => 'ok','id' => $id, 'count' => $count]);
    }

}
