<?php

namespace app\models;


class Users extends DbModels
{

    protected $name;
    protected $sessionId;

    public $propsDb = [
        'name' => false,
        'sessionId' => false,
    ];

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