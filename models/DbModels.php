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



    public static function getAll(){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return Db::getInstance()->queryAll($sql);
    }



    public function insert(){
        $params = [];
        $columns = [];
        foreach ($this as $key => $value){
            // TODO подумать над улучшением итератора if (организовать массив с нужными значениями)
            if ($key == 'id') continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";

        }
        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));
        $tableName = static::getTableName();

        $sql = "INSERT INTO `{$tableName}`({$columns}) VALUES ({$values})";

        Db::getInstance()->execute($sql,$params);

        $this->id = Db::getInstance()->lastInsertId();

        return $this;
    }

    public function update($changedData){
        $params = [];
        $set = '';
        foreach ($changedData as $key => $value){
            if ($key == 'props') continue;
            $params[":{$key}"] = $value;
            // TODO подумать над улучшением итератора if (организовать массив с нужными значениями)
            if ($key == 'id') continue;
            $set.="`".str_replace("`","``",$key)."`". " = :$key, ";
        }
        $set = substr($set, 0, -2);
        $tableName = static::getTableName();
        $sql = "UPDATE `{$tableName}` SET ".$set." WHERE id = :id";
        Db::getInstance()->execute($sql,$params);


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