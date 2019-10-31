<?php

namespace app\models;


class Users extends Model
{
    public $name;
    public $sessionId;

    public function getTableName()
    {
        return "goods";
    }
}