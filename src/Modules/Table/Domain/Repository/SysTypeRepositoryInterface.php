<?php


interface SysTypeRepositoryInterface
{
    public function findOneById($id) : ?SysType;

    public function findAll() : ?array;

}