<?php

namespace src\Modules\SysTable\Infrastructure\Repository;

use src\Core\Domain\Mapper\Mapper;
use src\Core\Infrastructure\Repository\AbstractRepository;
use src\Modules\SysTable\Domain\Repository\SysTypeRepositoryInterface;
use src\Modules\SysTable\Domain\Entity\SysType;
use yii\db\Query;

class SysTypeRepository extends AbstractRepository implements SysTypeRepositoryInterface
{
    private $mapper;

    public function __construct(Mapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function findOneById($id): ?SysType
    {
        $query = (new Query())
            ->from('sys_type')
            ->where(['id' => $id])
            ->one();
        if ($query) {
            return $this->mapper->map(new SysType(), $query);
        } else {
            return null;
        }
    }

    public function findAll(): ?array
    {
        $query = (new Query())
            ->from('sys_type')
            ->all();

        if ($query) {
            return $this->mapper->mapItems(new SysType(), $query);
        } else {
            return null;
        }
    }
}