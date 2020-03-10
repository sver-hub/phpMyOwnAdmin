<?php

namespace src\Core\Infrastructure\Repository;
use src\Core\Domain\Entity\EntityInterface;
use Yii;

abstract class AbstractRepository
{

    public function save(EntityInterface $entity)
    {
        $values = (array) $entity;
        Yii::$app->db->createCommand()->insert($entity->getTableName(), $values)->execute();
    }

    public function update(EntityInterface $entity)
    {
        $values = (array) $entity;
        Yii::$app->db->createCommand()->update($entity->getTableName(), $values)->execute();
    }

    public function delete(EntityInterface $entity)
    {
        Yii::$app->db->createCommand()->delete($entity->getTableName(), 'id = :id', [':id' => $entity->id])->execute();
    }
}