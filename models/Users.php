<?php

namespace app\models;

class Users extends Model
{
    public $name;
    public $sessionId;

    protected $tableName = "users";
}