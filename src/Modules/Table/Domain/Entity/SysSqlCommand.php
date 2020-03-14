<?php


namespace src\Modules\Table\Domain\Entity;


use src\Core\Domain\Entity\EntityInterface;

class SysSqlCommand implements EntityInterface
{
    public $id;
    public $command;

    public function getTableName(): string
    {
        return 'sys_sql_command';
    }
}