<?php


namespace src\Modules\SysTable\Domain\Repository;


use src\Core\Domain\Entity\EntityInterface;
use src\Modules\SysTable\Domain\Entity\SysSqlCommand;

interface SysSqlCommandRepositoryInterface
{
    public function findOneById($id) : ?SysSqlCommand;

    public function findAll() : ?array;

    public function save(EntityInterface $entity) : bool;
}