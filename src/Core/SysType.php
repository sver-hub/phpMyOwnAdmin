<?php


class SysType implements EntityInterface
{
    private $type;

    public function getTableName(): string
    {
        return 'sys_type';
    }
}