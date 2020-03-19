<?php


namespace src\Modules\SysTable\Infrastructure\Service;

use src\Modules\Record\Domain\Entity\Record;
use src\Modules\Record\Domain\Repository\RecordRepositoryInterface;
use src\Modules\SysTable\Domain\Repository\SysColumnRepositoryInterface;
use src\Modules\SysTable\Domain\Repository\SysTableRepositoryInterface;

class EditTableService
{
    private $sysTableRepository;
    private $sysColumnRepository;
    private $recordRepository;

    public function __construct(SysTableRepositoryInterface $sysTableRepository,
                                SysColumnRepositoryInterface $sysColumnRepository,
                                RecordRepositoryInterface $recordRepository)
    {
        $this->sysTableRepository = $sysTableRepository;
        $this->sysColumnRepository = $sysColumnRepository;
        $this->recordRepository = $recordRepository;
    }

    public function save($tableId, $post)
    {
        $tableName = $this->sysTableRepository->findOneById($tableId)->table_name;

        $columns = $this->sysColumnRepository->getColumnsByTableId($tableId);

        $numOfRecords = (count($post) - 1)/ count($keys);

        for ($i = 0; $i < $numOfRecords; $i++) {
            $record = new Record($tableName);
            foreach ($columns as $column) {
                $key = $column->column_name;
                $index = $key . '_' . $i;
                $record->$key = $post[$index];
            }
            $this->recordRepository->save($record);
        }
    }

    public function addNewRecord($tableId, $post)
    {
        $record = new Record($this->sysTableRepository->findOneById($tableId)->table_name);

        $first = true;
        foreach ($post as $key => $value) {
            if ($first) {
                $first = false;
                continue;
            }
            $record->$key = $value;
        }

        $this->recordRepository->save($record);
    }
}