<?php

namespace app\models;


class Users extends DbModels
{

    protected $login;
    protected $password;
    protected $randomHash;


    public $propsDb = [
        'login' => false,
        'password' => false,
        'random_hash' => false
    ];

    public function  __construct ($login = null, $password = null, $randomHash = null)
    {
        $this->login = $login;
        $this->password = $password;
        $this->randomHash = $randomHash;
    }


    public static function getTableName()
    {
        return "users";
    }

    public static function isAuth(){

        if (isset($_COOKIE['hash'])){
            return static::checkCookieHash();
        } else {
            return isset($_SESSION['login']) ? true : false;
        }
    }


    public static function getName(){
        return $_SESSION['login'];
    }

    public static function auth($login, $password,$save){
        $user = static::getWhere('login', $login);

        if (password_verify($password, $user->password)){
           if ($save == 'on'){
               $hash = uniqid(rand(), true);
               setcookie('hash', $hash, time()+3600, '/');
               $_SESSION['login'] = $login;
               $user->randomHash = $hash;
               $user->propsDb['randomHash'] = true;
               $user->update();
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
        $user = static::getWhere('randomHash', $cookieHash);

        if($user == ''){
            return false;
        } else {
           return true;
        }

    }







}