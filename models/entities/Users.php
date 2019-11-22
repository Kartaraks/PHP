<?php

namespace app\models\entities;
use app\models\Model;

class Users extends Model
{

    public $login;
    public $password;
    public $randomHash;


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









}