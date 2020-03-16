<?php


namespace src\Modules\SysTable\Domain\Repository;


use src\Core\Domain\Entity\EntityInterface;

interface SysCategoryRepositoryInterface
{
    public function save(EntityInterface $entity) : bool;

    public function findAll() : ?array;
}