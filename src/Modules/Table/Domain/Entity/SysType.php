<?php

namespace src\Modules\Table\Domain\Entity;

use src\Core\Domain\Entity\EntityInterface;

class SysType implements EntityInterface
{
    public $id;
    public $type;

    public function getTableName(): string
    {
        return 'sys_type';
    }
}