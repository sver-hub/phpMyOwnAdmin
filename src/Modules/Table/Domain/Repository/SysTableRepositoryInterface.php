<?php


interface SysTableRepositoryInterface
{
    public function findOneById($id) : ?SysTable;

    public function findAll() : ?array;

}