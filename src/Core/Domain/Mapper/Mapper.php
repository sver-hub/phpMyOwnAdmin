<?php

namespace src\Core\Domain\Mapper;

class Mapper
{
    public function map($className, $data)
    {
        $entity = new $className();
        foreach ($data as $key => $value) {
            $entity->$key = $value;
        }

        return $entity;
    }

    public function mapItems($className, $items)
    {
        $entities = [];

        foreach ($items as $data) {
            $entity = new $className;
            foreach ($data as $key => $value) {
                $entity->$key = $value;
            }
            $entities[] = $entity;
        }

        return $entities;
    }

}