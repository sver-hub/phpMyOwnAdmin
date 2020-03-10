<?php


interface SysColumnRepositoryInterface
{
    public function findOneById($id) : ?SysColumn;

    public function findAll() : ?array;

}