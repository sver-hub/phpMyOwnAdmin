<?php

namespace src\Modules\SysTable\Infrastructure\Repository;

use src\Core\Domain\Mapper\Mapper;
use src\Core\Infrastructure\Repository\AbstractRepository;
use src\Modules\SysTable\Domain\Repository\SysTableRepositoryInterface;
use src\Modules\SysTable\Domain\Entity\SysTable;
use yii\db\Query;

class SysTableRepository extends AbstractRepository implements SysTableRepositoryInterface
{
    private $mapper;

    public function __construct(Mapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function findOneById($id): ?SysTable
    {
        $query = (new Query())
            ->from('sys_table')
            ->where(['id' => $id])
            ->one();
        if ($query) {
            return $this->mapper->map(new SysTable(), $query);
        } else {
            return null;
        }
    }

    public function findAll(): ?array
    {
        $query = (new Query())
            ->from('sys_table')
            ->all();

        if ($query) {
            return $this->mapper->mapItems(new SysTable(), $query);
        } else {
            return null;
        }
    }

    public function findAllByCategoryId($id): ?array
    {
        $junction = (new Query())
            ->select('sys_table_id')
            ->from('sys_table_sys_category')
            ->where(['sys_category_id' => $id])
            ->all();

        $ids = [];
        foreach ($junction as $item) {
            $ids[] = $item['sys_table_id'];
        }

        if ($junction) {
            $query = (new Query())
                ->from('sys_table')
                ->where(['id' => $ids])
                ->all();

            if ($query) {
                return $this->mapper->mapItems(new SysTable(), $query);
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function findOneByName($tableName): ?SysTable
    {
        $query = (new Query())
            ->from('sys_table')
            ->where(['table_name' => $tableName])
            ->one();

        if ($query) {
            return $this->mapper->map(new SysTable(), $query);
        } else {
            return null;
        }
    }
}