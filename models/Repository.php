<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IModels;

abstract class Repository implements IModels
{

    public function getLimit($from, $to)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT :from, :to";
        return Db::getInstance()->queryLimit($sql, $from, $to);
    }

    public function getWhere($field, $value){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:value";
        return Db::getInstance()->queryObject($sql, ["value" => $value], $this->getEntityClass());
    }

    public function getOne($id){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
        return Db::getInstance()->queryObject($sql,['id' => $id], $this->getEntityClass());
    }

    public function getSessionID($session_id){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM `{$tableName}` WHERE session_id = :session_id";
        return Db::getInstance()->queryAll($sql,['session_id' => $session_id]);
    }


    public function getAll(){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";

        return Db::getInstance()->queryAll($sql);
    }

    public function getCountWhere($field, $value){

        $tableName = $this->getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:value";

        return Db::getInstance()->queryOne($sql,['value' => $value])['count'];
    }

    public function insert(Model $entity){
        $params = [];
        $columns = [];

        foreach ($entity as $key => $value){

            if (array_key_exists($key, $entity->propsDb)){
                $params[":{$key}"] = $value;
                $columns[] = "`$key`";
            }
        }

        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

        $tableName = $this->getTableName();

        $sql = "INSERT INTO `{$tableName}`({$columns}) VALUES ({$values})";

        Db::getInstance()->execute($sql,$params);

        $entity->id = Db::getInstance()->lastInsertId();


    }

    public function update(Model $entity)
    {
        $params = [];
        $set = '';
        $changedData = $entity->propsDb;

        foreach ($changedData as $key => $value) {
            if ($value) {
                $params[":{$key}"] = $entity->$key;
                $set.="`".str_replace("`","``",$key)."`". " = :$key, ";
            }
        }

        $params['id'] = $entity->id;

        $set = substr($set, 0, -2);

        $tableName = $this->getTableName();
        $sql = "UPDATE `{$tableName}` SET " . $set . " WHERE id = :id";

        Db::getInstance()->execute($sql,$params);

        $entity->id = Db::getInstance()->lastInsertId();
    }

    public function delete(Model $entity){
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $entity->id]);
    }

    public function save(Model $entity){
        if (is_null($entity->id))
            $this->insert($entity);
        else
            $this->update($entity);


    }

}