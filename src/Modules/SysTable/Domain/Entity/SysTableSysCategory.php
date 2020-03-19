<?php


namespace src\Modules\SysTable\Domain\Entity;


use src\Core\Domain\Entity\EntityInterface;

class SysTableSysCategory implements EntityInterface
{
    public $sys_table_id;
    public $sys_category_id;

    public function getTableName(): string
    {
        return "sys_table_sys_category";
    }

    public function getAttributes(): array
    {
        return (array)$this;
    }
}