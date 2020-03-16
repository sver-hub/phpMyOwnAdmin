<?php


namespace src\Modules\SysTable\Infrastructure\Repository;


use src\Core\Domain\Mapper\Mapper;
use src\Core\Infrastructure\Repository\AbstractRepository;
use src\Modules\SysTable\Domain\Entity\SysSqlCommand;
use src\Modules\SysTable\Domain\Repository\SysSqlCommandRepositoryInterface;
use yii\db\Query;

class SysSqlCommandRepository extends AbstractRepository implements SysSqlCommandRepositoryInterface
{
    private $mapper;

    public function __construct(Mapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function findOneById($id): ?SysSqlCommand
    {
        $query = (new Query())
            ->from('sys_sql_command')
            ->where(['id' => $id])
            ->one();
        if ($query) {
            return $this->mapper->map(new SysSqlCommand(), $query);
        } else {
            return null;
        }
    }

    public function findAll(): ?array
    {
        $query = (new Query())
            ->from('sys_sql_command')
            ->all();

        if ($query) {
            return $this->mapper->mapItems(new SysSqlCommand(), $query);
        } else {
            return null;
        }
    }
}