<?php

namespace src\Core\Domain\Entity;

class Record implements EntityInterface
{
    private $tableName;
    private $attributes;

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function __construct($tableName, $attributes)
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
}