<?php

namespace src\Modules\Record\Infrastructure\Repository;

use src\Core\Infrastructure\Repository\AbstractRepository;
use src\Modules\Record\Domain\Entity\Record;
use src\Modules\Record\Domain\Repository\RecordRepositoryInterface;
use yii\db\Query;

class RecordRepository extends AbstractRepository implements RecordRepositoryInterface
{
    public function findOneByIdAndTableName($id, $tableName): ?Record
    {
        $query = (new Query())
            ->from("$tableName")
            ->where(['id' => $id])
            ->one();

        if ($query) {
            return new Record($tableName, $query);
        } else {
            return null;
        }
    }

    public function findAllByTableName($tableName): ?array
    {
        $query = (new Query())
            ->from("$tableName")
            ->all();

        if ($query) {
            $records = [];
            foreach ($query as $entry) {
                $records[] = new Record($tableName, $entry);
            }

            return $records;
        } else {
            return null;
        }
    }
}