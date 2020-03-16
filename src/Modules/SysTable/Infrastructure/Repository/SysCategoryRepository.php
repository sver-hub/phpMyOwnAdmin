<?php


namespace src\Modules\SysTable\Infrastructure\Repository;


use src\Core\Domain\Mapper\Mapper;
use src\Core\Infrastructure\Repository\AbstractRepository;
use src\Modules\SysTable\Domain\Entity\SysCategory;
use src\Modules\SysTable\Domain\Repository\SysCategoryRepositoryInterface;
use yii\db\Query;

class SysCategoryRepository extends AbstractRepository implements SysCategoryRepositoryInterface
{
    private $mapper;

    public function __construct(Mapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function findAll(): ?array
    {
        $query = (new Query())
            ->from('sys_category')
            ->all();

        if ($query) {
            return $this->mapper->mapItems(new SysCategory(), $query);
        } else {
            return null;
        }
    }
}