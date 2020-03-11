<?php

namespace src\Modules\Table\Infrastructure\Repository;
use src\Core\Domain\Entity\EntityInterface;
use src\Core\Domain\Mapper\Mapper;
use src\Core\Infrastructure\Repository\AbstractRepository;
use src\Modules\Table\Domain\Repository\SysColumnRepositoryInterface;
use src\Modules\Table\Domain\Entity\SysColumn;
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
}