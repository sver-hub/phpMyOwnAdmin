<?php


namespace src\Modules\SysTable\Domain\Repository;


use src\Core\Domain\Entity\EntityInterface;

interface SysTableSysCategoryRepositoryInterface
{
    public function insert(EntityInterface $entity) : bool;

    public function remove(EntityInterface $entity) : bool;

    public function findAllCategoriesByTableId($id) : ?array;
}