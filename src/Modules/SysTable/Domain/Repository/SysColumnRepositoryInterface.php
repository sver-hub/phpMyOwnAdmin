<?php

namespace src\Modules\SysTable\Domain\Repository;

use src\Core\Domain\Entity\EntityInterface;
use src\Modules\SysTable\Domain\Entity\SysColumn;

interface SysColumnRepositoryInterface
{
    public function findOneById($id) : ?SysColumn;

    public function findAll() : ?array;

    public function getColumnsByTableId($id) : ?array;

    public function save(EntityInterface $entity) : bool;

}