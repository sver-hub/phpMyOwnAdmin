<?php

namespace src\Modules\Table\Domain\Repository;

use src\Core\Domain\Entity\EntityInterface;
use src\Modules\Table\Domain\Entity\SysTable;

interface SysTableRepositoryInterface
{
    public function findOneById($id) : ?SysTable;

    public function findAll() : ?array;

    public function save(EntityInterface $entity) : bool;
}