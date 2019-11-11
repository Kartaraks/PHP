<?php


namespace app\models;


class Basket extends DbModels
{


    protected $session_id;
    protected $good_id;

    public $propsDb = [
        'session_id' => false,
        'good_id' => false,
    ];



    public function __construct($session_id = null, $good_id = null)
    {

           $this->session_id = $session_id;
           $this->good_id = $good_id;

    }


    public static function getTableName()
    {
        return "basket";
    }



}