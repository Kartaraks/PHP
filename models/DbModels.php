<?php

namespace app\models;

use app\engine\Db;

abstract class DbModels extends Model
{


    public function getLimit(){
        //TODO сделать метод
    }

    public function getWhere(){
        //TODO сделать метод
    }

    public static function getOne($id){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        return Db::getInstance()->queryObject($sql,['id' => $id], static::class);
    }

    public static function getOneTwig($id){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        return Db::getInstance()->queryOne($sql,['id' => $id]);
    }


    public static function getSessionID($session_id){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE session_id = :session_id";
        return Db::getInstance()->queryAll($sql,['session_id' => $session_id]);
    }


    public static function getAll(){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return Db::getInstance()->queryAll($sql);
    }


    public static function getAllObj(){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return Db::getInstance()->queryObjectAll($sql,'',static::class);
    }


    public function insert(){
        $params = [];
        $columns = [];

        foreach ($this as $key => $value){
            if (array_key_exists($key, $this->propsDb)){
                $params[":{$key}"] = $value;
                $columns[] = "`$key`";
            }
        }

        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));
        $tableName = static::getTableName();

        $sql = "INSERT INTO `{$tableName}`({$columns}) VALUES ({$values})";

        Db::getInstance()->execute($sql,$params);

        $this->id = Db::getInstance()->lastInsertId();

        return $this;
    }

    public function update()
    {
        $params = [];
        $set = '';
        $changedData = $this->propsDb;

        foreach ($changedData as $key => $value) {
            if ($value) {
                $params[":{$key}"] = $this->$key;
                $set.="`".str_replace("`","``",$key)."`". " = :$key, ";
            }
        }

        $params['id'] = $this->id;

        $set = substr($set, 0, -2);

        $tableName = static::getTableName();
        $sql = "UPDATE `{$tableName}` SET " . $set . " WHERE id = :id";

        Db::getInstance()->execute($sql,$params);

        $this->id = Db::getInstance()->lastInsertId();

        return $this;

    }


    public function delete(){
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    public function save(){
        if (is_null($this->id))
            $this->insert();
        else
            $this->update();


    }


}