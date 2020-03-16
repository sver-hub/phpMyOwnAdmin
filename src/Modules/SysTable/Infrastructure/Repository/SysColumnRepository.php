<?php

namespace src\Modules\SysTable\Infrastructure\Repository;

use src\Core\Domain\Mapper\Mapper;
use src\Core\Infrastructure\Repository\AbstractRepository;
use src\Modules\SysTable\Domain\Repository\SysColumnRepositoryInterface;
use src\Modules\SysTable\Domain\Entity\SysColumn;
use yii\db\Query;

class SysColumnRepository extends AbstractRepository implements SysColumnRepositoryInterface
{
    private $mapper;

    public function __construct(Mapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function findOneById($id): ?SysColumn
    {
        $query = (new Query())
            ->from('sys_column')
            ->where(['id' => $id])
            ->one();
        if ($query) {
            return $this->mapper->map(new SysColumn(), $query);
        } else {
            return null;
        }
    }

    public function findAll(): ?array
    {
        $query = (new Query())
            ->from('sys_column')
            ->all();

        if ($query) {
            return $this->mapper->mapItems(new SysColumn(), $query);
        } else {
            return null;
        }
    }

    public function getColumnsByTableId($id) :?array
    {
        $query = (new Query())
            ->select("column_name, column_type_id, reference_id")
            ->from('sys_column')
            ->where(['table_id' => $id])
            ->all();

        if ($query) {
            return $query;
        } else {
            return null;
        }
    }
}