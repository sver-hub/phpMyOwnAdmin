<?php


class SysType implements EntityInterface
{
    private $id;
    private $type;

    public function getTableName(): string
    {
        return 'sys_type';
    }
}