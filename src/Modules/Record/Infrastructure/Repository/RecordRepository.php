<?php

namespace src\Modules\Record\Infrastructure\Repository;

use src\Core\Infrastructure\Repository\AbstractRepository;
use src\Modules\Record\Domain\Entity\Record;
use src\Modules\Record\Domain\Repository\RecordRepositoryInterface;
use src\Modules\SysTable\Domain\Repository\SysTableRepositoryInterface;
use yii\db\Query;

class RecordRepository extends AbstractRepository implements RecordRepositoryInterface
{
    private $sysTableRepository;

    public function __construct(SysTableRepositoryInterface $sysTableRepository)
    {
        $this->sysTableRepository = $sysTableRepository;
    }

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

    public function findAllByTableId($tableId): ?array
    {
        $tableName = $this->sysTableRepository->findOneById($tableId)->table_name;

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

    public function getInstance($tableName): ?Record
    {
        $query = (new Query())
            ->from($tableName)
            ->one();

        if ($query) {
            return new Record($tableName, $query);
        } else {
            return null;
        }
    }
}