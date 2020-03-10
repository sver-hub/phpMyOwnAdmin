<?php

namespace src\Modules\Table\Domain\Repository;

use src\Modules\Table\Domain\Entity\SysColumn;

interface SysColumnRepositoryInterface
{
    public function findOneById($id) : ?SysColumn;

    public function findAll() : ?array;

}