<?php


namespace src\Modules\SysTable\Infrastructure\Service;


use src\Modules\SysTable\Domain\Entity\SysColumn;
use src\Modules\SysTable\Domain\Entity\SysTable;
use src\Modules\SysTable\Domain\Repository\SysColumnRepositoryInterface;
use src\Modules\SysTable\Domain\Repository\SysTableRepositoryInterface;
use src\Modules\SysTable\Domain\Repository\SysTypeRepositoryInterface;
use Yii;

class CreateTableService
{
    private $sysTypeRepository;
    private $sysTableRepository;
    private $sysColumnRepository;
    private $categoryService;

    public function __construct(SysTypeRepositoryInterface $sysTypeRepository,
                                SysColumnRepositoryInterface $sysColumnRepository,
                                SysTableRepositoryInterface $sysTableRepository,
                                CategoryService $categoryService)
    {
        $this->sysTypeRepository = $sysTypeRepository;
        $this->sysColumnRepository = $sysColumnRepository;
        $this->sysTableRepository = $sysTableRepository;
        $this->categoryService = $categoryService;
    }

    public function getAllTables()
    {
        return $this->sysTableRepository->findAll();
    }

    public function getAllTypes()
    {
        return $this->sysTypeRepository->findAll();
    }

    public function createVirtualTable($tableName, $title)
    {
        if (!$this->isAvailable($tableName)) {
            return false;
        }

        $table = new SysTable();
        $table->table_name = $tableName;
        $table->title = $title;

        $this->sysTableRepository->save($table);

        return $this->sysTableRepository->findOneByName($tableName)->id;

    }

    public function addToCategory($tableId, $category)
    {
        if ($category > 1) {
            $this->categoryService->addTableToCategory($tableId, $category);
        }
        $this->categoryService->addTableToCategory($tableId, 1);
    }

    private function isAvailable($tableName)
    {
        $tables = $this->sysTableRepository->findAll();
        foreach ($tables as $table) {
            if ($table->table_name == $tableName) {
                return false;
            }
        }
        return true;
    }

    public function createVirtualColumns($post, $tableId)
    {
        $numOfCols = (count($post) - 1) / 3;

        for ($i = 0; $i < $numOfCols; $i++) {
            $column = new SysColumn();
            $column->column_name = $post["name$i"];
            $column->column_type_id = $post["type$i"];
            $column->reference_id = $post["reference$i"];
            $column->table_id = $tableId;
            $this->sysColumnRepository->save($column);
        }
    }

    public function createPhysicalTable($tableId)
    {
        $tableName = $this->sysTableRepository->findOneById($tableId)->table_name;

        $typesQuery = $this->sysTypeRepository->findAll();
        $types = array_map(function ($sysType) {
            return $sysType->type;
        }, $typesQuery);

        $columns = [];
        $columnsQuery = $this->sysColumnRepository->getColumnsByTableId($tableId);
        foreach ($columnsQuery as $column) {
            if ($column->column_name == 'id') {
                $columns["$column->column_name"] = 'serial primary key';
                continue;
            }
            $columns["$column->column_name"] = $types[$column->column_type_id - 1];
        }
        //$columns[] = 'PRIMARY KEY(' . $columnsQuery[0]->column_name . ")";

        Yii::$app->db->createCommand()->createTable($tableName, $columns)->execute();

        foreach ($columnsQuery as $column) {
            if ($column->reference_id != null) {
                Yii::$app->db->createCommand()->addForeignKey(
                    "fk-$tableName-$column->column_name",
                    "$tableName",
                    "$column->column_name",
                    $this->sysTableRepository->findOneById($column->reference_id)->table_name,
                    "id",
                    "CASCADE",
                    "CASCADE");
            }
        }
    }

}