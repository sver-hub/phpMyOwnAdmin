<?php

namespace src\Modules\Record\Domain\Entity;

use src\Core\Domain\Entity\EntityInterface;

class Record implements EntityInterface
{
    public $tableName;
    private $attributes;

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function __construct($tableName, $attributes = [])
    {
        $this->tableName = $tableName;
        foreach ($attributes as $name => $value) {
            $this->attributes[$name] = $value;
        }
    }

    public function __get($name)
    {
        return $this->attributes[$name];
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function getKeys()
    {
        $keys = [];
        foreach ($this->attributes as $key => $value) {
            $keys[] = $key;
        }

        return $keys;
    }

    public function getAttributes() :array
    {
        return $this->attributes;
    }
}