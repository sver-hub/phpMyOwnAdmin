<?php

namespace src\Modules\Table\Infrastructure\Repository;

use src\Core\Domain\Mapper\Mapper;
use src\Core\Infrastructure\Repository\AbstractRepository;
use src\Modules\Table\Domain\Repository\SysTableRepositoryInterface;
use src\Modules\Table\Domain\Entity\SysTable;
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
}