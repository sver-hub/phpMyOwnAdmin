<?php


class SysTable implements EntityInterface
{
    private $table_name;
    private $title;

    public function getTableName(): string
    {
        return 'sys_table';
    }

    public function __construct($table_name, $title)
    {
        $this->table_name = $table_name;
        $this->title = $title;
    }
}