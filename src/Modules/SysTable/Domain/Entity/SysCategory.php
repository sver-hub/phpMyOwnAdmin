<?php


namespace src\Modules\SysTable\Domain\Entity;


use src\Core\Domain\Entity\EntityInterface;

class SysCategory implements EntityInterface
{
    public $id;
    public $category_name;


    public function getTableName(): string
    {
        return 'sys_category';
    }

    public function getAttributes(): array
    {
        return (array)$this;
    }
}