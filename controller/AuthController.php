<?php


namespace app\controller;


use app\engine\Request;
use app\models\repositories\UserRepository;


class AuthController extends Controller
{

//     Если не вводить пароль и логин или вводить неправильные то попадаю на /auth/login/ пустой(то есть не срабатывает блок if else), не понимаю в чем проблема :)
    public function actionLogin(){
        $data = (new Request())->getParams();

        $login = $data['login'];
        $password = $data['password'];
        $save = $data['save'];

        if (!(new UserRepository())->auth($login, $password, $save)){
            die("Неверный парsdоль");
        } else {
            header("Location: /");
        }
        exit();

    }

//
//    public function actionLogin(){
//        $data = (new Request())->getParams();
//        var_dump($data);
//        $login = $data['login'];
//        $password = $data['password'];
//        $save = $data['check'];
//
//
//        if (!Users::auth($login, $password,$save)){
//            die("Неверный пароль");
//        } else {
//            header("Location: /");
//        }
//        exit();
//    }








    public function actionLogout(){
        session_destroy();
        setcookie('hash', '', time()-10000, '/');
        header("Location: /");
        exit();
    }
}