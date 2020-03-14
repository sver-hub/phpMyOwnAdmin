<?php

namespace src\Core\Infrastructure\Repository;
use src\Core\Domain\Entity\EntityInterface;
use Yii;
use yii\db\Expression;

abstract class AbstractRepository
{

    public function save(EntityInterface $entity) : bool
    {
        if (!$entity->id) {
            return $this->insert($entity);
        } else {
            return $this->update($entity);
        }
    }


    public function insert(EntityInterface $entity) : bool
    {
        $values = (array) $entity;
        foreach ($values as $key => $value) {
            if (is_null($value)) {
                $values[$key] = new Expression("DEFAULT");
            }
        }
        return (bool)Yii::$app->db->createCommand()->insert($entity->getTableName(), $values)->execute();
    }


    public function update(EntityInterface $entity) : bool
    {
        $values = (array) $entity;
        return (bool)Yii::$app->db->createCommand()->update($entity->getTableName(), $values)->execute();
    }


    public function delete(EntityInterface $entity) : bool
    {
        return (bool)Yii::$app->db->createCommand()->delete($entity->getTableName(), 'id = :id', [':id' => $entity->id])->execute();
    }
}