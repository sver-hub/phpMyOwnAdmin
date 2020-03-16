<?php

namespace src\Modules\SysTable\Domain\Repository;

use src\Core\Domain\Entity\EntityInterface;
use src\Modules\SysTable\Domain\Entity\SysTable;

interface SysTableRepositoryInterface
{
    public function findOneById($id) : ?SysTable;

    public function findAll() : ?array;

    public function findAllByCategoryId($id) : ?array;

    public function save(EntityInterface $entity) : bool;
}