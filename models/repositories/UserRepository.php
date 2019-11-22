<?php
/**
 * Created by PhpStorm.
 * User: kirillmikhaylov
 * Date: 2019-11-17
 * Time: 21:31
 */

namespace app\models\repositories;
use app\models\entities\Users;
use app\models\Repository;

class UserRepository extends Repository
{
    public function getTableName()
    {
        return "users";
    }

    public function getEntityClass(){
        return Users::class;
    }

    public function isAuth(){

        if (isset($_COOKIE['hash'])){

            return $this->checkCookieHash();
        } else {
          
            return isset($_SESSION['login']) ? true : false;
        }
    }


    public function getName(){
        return $_SESSION['login'];
    }

    public function auth($login, $password, $save){
        $user = $this->getWhere('login', $login);

        if (password_verify($password, $user->password)){

            if ($save == 'on'){

                $hash = uniqid(rand(), true);
                setcookie('hash', $hash, time()+3600, '/');
                $_SESSION['login'] = $login;
                $user->randomHash = $hash;
                $user->propsDb['randomHash'] = true;
                $this->save($user);
                return true;
            } else {

                $_SESSION['login'] = $login;
                return true;
            }
        }
        return false;
    }


    public function checkCookieHash(){
        $cookieHash = $_COOKIE['hash'];
        $user = $this->getWhere('randomHash', $cookieHash);

        if($user == false){
            return false;
        } else {
            return true;
        }

    }

}