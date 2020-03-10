<?php


class SysTable implements EntityInterface
{
    private $id;
    private $table_name;
    private $title;
    private $parent;

    public function getTableName(): string
    {
        return 'sys_table';
    }

    public function __construct($id, $table_name, $title, $parent)
    {
        $this->id = $id;
        $this->table_name = $table_name;
        $this->title = $title;
        $this->parent = $parent;
    }

}