<?php

namespace src\Modules\SysTable\Domain\Entity;

use src\Core\Domain\Entity\EntityInterface;

class SysColumn implements EntityInterface
{
    public $id;
    public $column_name;
    public $table_id;
    public $reference_id;
    public $column_type_id;

    public function getTableName(): string
    {
        return 'sys_column';
    }

    public function getAttributes(): array
    {
        return (array)$this;
    }
}