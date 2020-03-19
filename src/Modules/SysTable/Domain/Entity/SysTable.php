<?php

namespace src\Modules\SysTable\Domain\Entity;

use src\Core\Domain\Entity\EntityInterface;

class SysTable implements EntityInterface
{
    public $id;
    public $table_name;
    public $title;
    public $parent_id;

    public function getTableName(): string
    {
        return 'sys_table';
    }

    public function getAttributes(): array
    {
        return (array)$this;
    }
}