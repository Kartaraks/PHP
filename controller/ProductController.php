<?php

namespace app\controller;


use app\models\Product;

class ProductController extends Controller
{



public function actionIndex(){
    echo $this->render('index');
}

public function actionCatalog(){
    $catalog = Product::getAll();
    echo $this->render('catalog', ['catalog' => $catalog]);
}

public function actionCard(){
    $id =  $_GET['id'];
    $product = Product::getOne($id);
    echo $this->render('card', ['product' => $product]);
    // TODO сделать красивый вывод. Пример product/card/3
}

public function actionUpdate(){

    $id =  $_GET['id'];
    $product = Product::getOne($id);
    $product->name = 'часы Vacheron Constantin 1';
    $product->nameImg = 'vacheron_constantin_1.jpg';
    $product->update();
    header("Location: /product/catalog/");
}

}