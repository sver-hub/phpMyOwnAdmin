<?php


namespace src\Modules\SysTable\Domain\Entity;


use src\Core\Domain\Entity\EntityInterface;

class SysSqlCommand implements EntityInterface
{
    public $id;
    public $command;

    public function getTableName(): string
    {
        return 'sys_sql_command';
    }

    public function getAttributes(): array
    {
        return (array)$this;
    }
}