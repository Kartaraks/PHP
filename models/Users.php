<?php

namespace app\models;


class Users extends DbModels
{
    public $id;
    public $name;
    public $sessionId;

    public function  __construct ($name = null, $session_id = null)
    {
        $this->name = $name;
        $this->sessionId = $session_id;
    }

    public function getDataArray(){
        $dataArr = ['name' => $this->name,'session_id' => $this->sessionId];
        return $dataArr;

    }

    public static function getTableName()
    {
        return "users";
    }
}