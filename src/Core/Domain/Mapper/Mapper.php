<?php

namespace src\Core\Domain\Mapper;



class Mapper
{
    public function map(object $object, $data)
    {
        $class = get_class($object);
        $entity = new $class;
        foreach ($data as $key => $value) {
            $entity->$key = $value;
        }

        return $entity;
    }

    public function mapItems(object $object, $items)
    {
        $entities = [];

        foreach ($items as $data) {
            $class = get_class($object);
            $entity = new $class;
            foreach ($data as $key => $value) {
                $entity->$key = $value;
            }
            $entities[] = $entity;
        }

        return $entities;
    }

}