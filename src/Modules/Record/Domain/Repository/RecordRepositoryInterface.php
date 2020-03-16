<?php

namespace src\Modules\Record\Domain\Repository;

use src\Modules\Record\Domain\Entity\Record;

interface RecordRepositoryInterface
{
    public function findOneByIdAndTableName($id, $tableName) : ?Record;

    public function findAllByTableName($tableName) : ?array;
}