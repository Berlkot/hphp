<?php

namespace src\Models;
use src\Services\db;

abstract class ActiveRecordEntity{

    protected $id;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function __set($key,$value){
        $property = $this->formatToCamelcase($key);
        $this->$property = $value;
    }

    private function formatToCamelcase($key){
        return lcfirst(str_replace('_','', ucwords($key,"_")));
    }

    private function formatToDb($key){
        return strtolower(preg_replace('/([A-Z])/', '_$1',$key));
    }

    public static function findAll(){
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `'.static::getTableName().'`';
        return $db->query($sql,[],static::class);
    }
    
    private function getPropertyToDb(): array{
        $nameAndValue = [];
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();  
        foreach ( $properties as $property){
            $nameCamelCase = $property->getName();
            $nameToDb = $this->formatToDb($nameCamelCase);
            $nameAndValue[$nameToDb] = $this->$nameCamelCase;
        }      
        return $nameAndValue;
    }

    public static function getById(int $id) : ?self{
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `'.static::getTableName().'` WHERE `id`='.$id;
        $res = $db->query($sql,[],static::class);
        return $res ? $res[0] : null;
    }

    public function save(){
        if ($this->getId()) $this->update();
        else  $this->insert();
    }

    private function insert(){
        $db = Db::getInstance();
        $nameField = [];
        $params = [];
        $paramsToValue = [];
        $filedAndValue = array_filter($this->getPropertyToDb());


        foreach($filedAndValue as $field=>$value){
            $nameField[] = '`'.$field.'`';
            $param = ':'.$field;
            $params[] = $param;
            $paramsToValue[$param] = $value; 
        }
        $sql = 'INSERT INTO `'.static::getTableName().'`
        ('.implode(',',$nameField).')
        VALUES ('.implode(',',$params).')';

        $db->query($sql,$paramsToValue, static::class);
    }

    private function update(){
        $db = Db::getInstance();
        $data = $this->getPropertyToDb();
        $params = [];
        $paramsAndValue = [];
        foreach($data as $property=>$value){
            $param = ':'.$property;
            $params [] = '`'.$property.'`='.$param;
            $paramsAndValue[$param] = $value;
        }
        $sql = 'UPDATE `'.static::getTableName().'` SET '.implode(', ',$params).' WHERE `id`=:id';
        $db->query($sql,$paramsAndValue, static::class);
    }

    public function  delete() {
        $db = Db::getInstance();
        $sql = 'DELETE FROM `'.static::getTableName().'` WHERE `id`=:id';
        $db->query($sql,[':id' => $this->id], static::class);
    }

    abstract protected static function getTableName();
}