<?php


namespace src\Modules\Table\Domain\Repository;


use src\Core\Domain\Entity\EntityInterface;
use src\Modules\Table\Domain\Entity\SysSqlCommand;

interface SysSqlCommandRepositoryInterface
{
    public function findOneById($id) : ?SysSqlCommand;

    public function findAll() : ?array;

    public function save(EntityInterface $entity) : bool;
}