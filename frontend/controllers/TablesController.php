<?php


namespace frontend\controllers;


use src\Modules\Record\Domain\Repository\RecordRepositoryInterface;
use src\Modules\SysTable\Domain\Repository\SysTableRepositoryInterface;
use src\Modules\SysTable\Infrastructure\Service\CategoryService;
use yii\db\Query;
use yii\web\Controller;

class TablesController extends Controller
{
    private $recordRepository;
    private $sysTableRepository;
    private $categoryService;

    public function __construct($id, $module,
                                RecordRepositoryInterface $recordRepository,
                                SysTableRepositoryInterface $sysTableRepository,
                                CategoryService $categoryService,
                                $config = [])
    {
        $this->sysTableRepository = $sysTableRepository;
        $this->recordRepository = $recordRepository;
        $this->categoryService = $categoryService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex($id = 0)
    {
        $content = $this->categoryService->getAllCategoriesWithContent();
        if ($id == 0) {
            $table = null;
        } else {
            $tableName = ($this->sysTableRepository->findOneById($id))->table_name;
            $table = $this->recordRepository->findAllByTableName($tableName);
        }
        return $this->render('index', [
            'table' => $table,
            'content' => $content]);
    }

    public function actionShow($id)
    {

    }
}