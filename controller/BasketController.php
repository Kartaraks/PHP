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
//TODO настроить метод save чтобы выбирал между insert и update
        $id = (new Request())->getParams()['id'];
        (new Basket(session_id(), $id))->insert();

        header('Content-Type: application/json');
        echo json_encode(['response' => session_id(), 'count' => Basket::getCountWhere('session_id', session_id())]);
    }


    public function actionDelFromBasket(){

        $id = (new Request())->getParams()['id'];
//TODO Как то так надо, причем еще и сравнить сессию надо было, чтобы не удалить товар в чужой корзине, а у вас можно.
        $count = Basket::getCountWhere('session_id', session_id());
        $count -= 1;
// TODO переделать метод, не создавать новый клас корзины чтобы делать удаление, брать уже имеющийся класс Basket::getOne($id)->delete();
        (new Basket(session_id(), $id))->delete($id);
        header('Content-Type: application/json');
        echo json_encode(['response' => 'ok','id' => $id, 'count' => $count]);
    }

}
