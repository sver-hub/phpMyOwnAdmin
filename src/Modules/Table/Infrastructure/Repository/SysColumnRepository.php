<?php


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
            return $this->mapper->map('SysColumn', $query);
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
            return $this->mapper->mapItems('SysColumn', $query);
        } else {
            return null;
        }
    }
}