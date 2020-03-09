<?php


class SysType implements EntityInterface
{
    public function getTableName(): string
    {
        return 'sys_type';
    }
}