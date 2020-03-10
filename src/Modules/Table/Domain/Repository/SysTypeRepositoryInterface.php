<?php

namespace src\Modules\Table\Domain\Repository;

use src\Modules\Table\Domain\Entity\SysType;

interface SysTypeRepositoryInterface
{
    public function findOneById($id) : ?SysType;

    public function findAll() : ?array;

}