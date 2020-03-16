<?php

namespace src\Modules\SysTable\Domain\Repository;

use src\Modules\SysTable\Domain\Entity\SysType;

interface SysTypeRepositoryInterface
{
    public function findOneById($id) : ?SysType;

    public function findAll() : ?array;

}