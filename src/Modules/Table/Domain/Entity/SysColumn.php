<?php


class SysColumn implements EntityInterface
{
    private $id;
    private $column_name;
    private $table_id;
    private $reference_id;
    private $column_type_id;

    public function getTableName(): string
    {
        return 'sys_column';
    }
}