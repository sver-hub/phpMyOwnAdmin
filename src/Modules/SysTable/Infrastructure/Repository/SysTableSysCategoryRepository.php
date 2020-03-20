<?php


namespace src\Modules\SysTable\Infrastructure\Repository;


use src\Core\Domain\Entity\EntityInterface;
use src\Core\Domain\Mapper\Mapper;
use src\Core\Infrastructure\Repository\AbstractRepository;
use src\Modules\SysTable\Domain\Entity\SysTableSysCategory;
use src\Modules\SysTable\Domain\Repository\SysTableSysCategoryRepositoryInterface;
use Yii;
use yii\db\Query;

class SysTableSysCategoryRepository extends AbstractRepository implements SysTableSysCategoryRepositoryInterface
{
    private $mapper;

    public function __construct(Mapper $mapper)
    {
        $this->mapper = $mapper;
    }

    public function remove(EntityInterface $entity): bool
    {
        return (bool)Yii::$app->db->createCommand()
            ->delete($entity->getTableName(), 'sys_table_id = :table_id AND sys_category_id = :category_id', [
                ':table_id' => $entity->getAttributes()['sys_table_id'],
                ':category_id' => $entity->getAttributes()['sys_category_id']
            ])
            ->execute();
    }

    public function findAllCategoriesByTableId($id): ?array
    {
        $query = (new Query())
            ->from('sys_table_sys_category')
            ->where(['sys_table_id' => $id])
            ->all();

        if ($query) {
            return $this->mapper->mapItems(new SysTableSysCategory(),$query);

        } else {
            return null;
        }
    }
}