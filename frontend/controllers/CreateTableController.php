<?php


namespace frontend\controllers;


use src\Modules\SysTable\Domain\Repository\SysCategoryRepositoryInterface;
use src\Modules\SysTable\Infrastructure\Service\CreateTableService;
use Yii;
use yii\web\Controller;

class CreateTableController extends Controller
{

    private $createTableService;
    private $sysCategoryRepository;

    public function __construct($id, $module,
                                CreateTableService $createTableService,
                                SysCategoryRepositoryInterface $sysCategoryRepository,
                                $config = [])
    {
        $this->createTableService = $createTableService;
        $this->sysCategoryRepository = $sysCategoryRepository;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex($available = true)
    {

        return $this->render('index', [
            'available' => $available,
            'categories' => $this->sysCategoryRepository->findAll(),
        ]);
    }

    public function actionColumns()
    {
        $post = Yii::$app->request->post();

        $newTableId = $this->createTableService->createVirtualTable($post['table_name'], $post['title']);

        if ($newTableId === false) {
            Yii::$app->session->addFlash('warning','This name is already taken');
            return $this->actionIndex(false);
        }

        $this->createTableService->addToCategory($newTableId, $post['category']);

        return $this->render('columns', [
            'numOfCols' => $post['num_of_cols'],
            'tableId' => $newTableId,
            'types' => $this->createTableService->getAllTypes(),
            'tables' => $this->createTableService->getAllTables(),
        ]);
    }

    public function actionCreate($tableId)
    {
        $post = Yii::$app->request->post();

        $this->createTableService->createVirtualColumns($post, $tableId);

        $this->createTableService->createPhysicalTable($tableId);

        $this->redirect('/tables/index');
    }
}