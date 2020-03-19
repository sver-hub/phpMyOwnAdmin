<?php


namespace src\Modules\SysTable\Infrastructure\Service;


use src\Modules\SysTable\Domain\Repository\SysTableRepositoryInterface;
use Yii;

class DropTableService
{
    private $sysTableRepository;

    public function __construct(SysTableRepositoryInterface $sysTableRepository)
    {
        $this->sysTableRepository = $sysTableRepository;
    }

    public function dropTableById($tableId)
    {
        Yii::$app->db->createCommand()->dropTable($this->sysTableRepository->findOneById($tableId)->table_name)->execute();

        Yii::$app->db->createCommand()->delete('sys_column', 'table_id = :id', [':id' => $tableId])->execute();

        Yii::$app->db->createCommand()->delete('sys_table', 'id = :id', [':id' => $tableId])->execute();

        Yii::$app->db->createCommand()->delete('sys_table_sys_category', 'sys_table_id = :id', [':id' => $tableId])->execute();
    }


}