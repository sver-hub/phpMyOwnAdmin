<?php


class SysColumn implements EntityInterface
{
    public function getTableName(): string
    {
        return 'sys_column';
    }
}