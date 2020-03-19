<?php

namespace src\Modules\Record\Domain\Repository;


use src\Core\Domain\Entity\EntityInterface;
use src\Modules\Record\Domain\Entity\Record;

interface RecordRepositoryInterface
{
    public function findOneByIdAndTableName($id, $tableName) : ?Record;

    public function findAllByTableId($tableId) :?array;

    public function getInstance($tableName) : ?Record;

    public function save(EntityInterface $record) : bool;

    public function delete(EntityInterface $record) :bool;
}