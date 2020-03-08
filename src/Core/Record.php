<?php


class Record implements EntityInterface
{
    private $attributes;

    public function getTableName(): string
    {
        // TODO: Implement getTableName() method.
        return false;
    }

    public function __construct($tableName, $attributes)
    {

    }

    public function __get($name)
    {
        // TODO: Implement __get() method.
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
    }
}