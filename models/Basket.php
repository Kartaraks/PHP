<?php


namespace app\models;


class Basket extends DbModels
{

    public $id;
    public $session_id;
    public $good_id;



    public function __construct($id = null, $session_id = null, $good_id = null)
    {

           $this->id = $id;
           $this->session_id = $session_id;
           $this->good_id = $good_id;

    }


    public static function getTableName()
    {
        return "basket";
    }

}