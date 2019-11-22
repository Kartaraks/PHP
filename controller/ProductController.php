<?php

namespace app\controller;


use app\engine\Request;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{



public function actionIndex(){
    echo $this->render('index');
}

public function actionCatalog(){
    $catalog = (new ProductRepository()) -> getAll();

    echo $this->render('catalog', ['catalog' => $catalog]);
}

public function actionCard(){
    $id =  (new Request())->getArgument();
    $product = (new ProductRepository())->getOne($id);
    echo $this->render('card', ['product' => $product]);

}

public function actionUpdate(){

    $id =  (new Request())->getArgument();
    $product = (new ProductRepository())->getOne($id);
    $product->name = 'часы Vacheron Constantin 1';
    $product->nameImg = 'vacheron_constantin_2.jpg';
    (new ProductRepository())->update($product);
    header("Location: /product/catalog/");
}

}