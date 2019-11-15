<?php

namespace app\controller;


use app\engine\Request;
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
    $id =  (new Request())->getArgument();
    $product = Product::getOne($id);
    echo $this->render('card', ['product' => $product]);

}

public function actionUpdate(){

    $id =  (new Request())->getArgument();
    $product = Product::getOne($id);
    $product->name = 'часы Vacheron Constantin 1';
    $product->nameImg = 'vacheron_constantin_2.jpg';
    $product->update();
    header("Location: /product/catalog/");
}

}