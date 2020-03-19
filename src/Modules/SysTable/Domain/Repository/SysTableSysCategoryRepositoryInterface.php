<?php


namespace src\Modules\SysTable\Domain\Repository;


use src\Core\Domain\Entity\EntityInterface;

interface SysTableSysCategoryRepositoryInterface
{
    public function insert(EntityInterface $entity) : bool;
}