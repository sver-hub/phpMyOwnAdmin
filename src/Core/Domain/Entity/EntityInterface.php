<?php

namespace src\Core\Domain\Entity;

interface EntityInterface
{
    public function getTableName() : string;
}