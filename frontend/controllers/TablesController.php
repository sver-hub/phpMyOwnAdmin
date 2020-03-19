<?php


namespace frontend\controllers;


use src\Modules\Record\Domain\Repository\RecordRepositoryInterface;
use src\Modules\SysTable\Infrastructure\Service\CategoryService;
use src\Modules\SysTable\Infrastructure\Service\DropTableService;
use yii\web\Controller;

class TablesController extends Controller
{
    private $recordRepository;
    private $categoryService;
    private $dropTableService;

    public function __construct($id, $module,
                                RecordRepositoryInterface $recordRepository,
                                CategoryService $categoryService,
                                DropTableService $dropTableService,
                                $config = [])
    {
        $this->recordRepository = $recordRepository;
        $this->categoryService = $categoryService;
        $this->dropTableService = $dropTableService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex($id = null)
    {
        $content = $this->categoryService->getAllCategoriesWithContent();

        $records = $id == null ? null : $this->recordRepository->findAllByTableId($id);

        return $this->render('index', [
            'records' => $records,
            'tableId' => $id,
            'content' => $content]);
    }

    public function actionDrop($id)
    {
        $this->dropTableService->dropTableById($id);

        return $this->redirect('/tables/index');
    }
}