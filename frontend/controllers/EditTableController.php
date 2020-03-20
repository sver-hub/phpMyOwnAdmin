<?php


namespace frontend\controllers;


use src\Modules\Record\Domain\Repository\RecordRepositoryInterface;
use src\Modules\SysTable\Domain\Repository\SysColumnRepositoryInterface;
use src\Modules\SysTable\Infrastructure\Service\CategoryService;
use src\Modules\SysTable\Infrastructure\Service\EditTableService;
use Yii;
use yii\web\Controller;

class EditTableController extends Controller
{
    private $recordRepository;
    private $sysColumnRepository;
    private $editTableService;
    private $categoryService;

    public function __construct($id, $module,
                                RecordRepositoryInterface $recordRepository,
                                EditTableService $editTableService,
                                SysColumnRepositoryInterface $sysColumnRepository,
                                CategoryService $categoryService,
                                $config = [])
    {
        $this->recordRepository = $recordRepository;
        $this->editTableService = $editTableService;
        $this->sysColumnRepository = $sysColumnRepository;
        $this->categoryService = $categoryService;
        parent::__construct($id, $module, $config);
    }

    public function actionEdit($id)
    {
        return $this->render('edit', [
            'tableId' => $id,
            'records' => $this->recordRepository->findAllByTableId($id),
            'columns' => $this->sysColumnRepository->getColumnsByTableId($id),
        ]);
    }

    public function actionSave($id)
    {
        $post = Yii::$app->request->post();

        $this->editTableService->save($id, $post);

        $this->redirect('/tables/index');
    }

    public function actionDelete($id, $tableName)
    {
        $record = $this->recordRepository->findOneByIdAndTableName($id, $tableName);
        $this->recordRepository->delete($record);

        $this->redirect(Yii::$app->request->referrer);
    }

    public function actionNew($id)
    {
        return $this->render('new-record', [
            'tableId' => $id,
            'columns' => $this->sysColumnRepository->getColumnsByTableId($id)
        ]);
    }

    public function actionSaveRecord($id)
    {
        $post = Yii::$app->request->post();

        $this->editTableService->addNewRecord($id, $post);

        $this->redirect("/edit-table/edit/?id=$id");
    }

    public function actionManageCategories($id)
    {
        $categories = $this->categoryService->getCategories($id);

        return $this->render('manage-categories', [
            'tableId' => $id,
            'thisCategories' => $categories['thisCategories'],
            'availableCategories' => $categories['availableCategories'],
        ]);
    }

    public function actionRemoveCategory($id, $category)
    {
        $this->categoryService->removeTableFromCategory($id, $category);

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionAddCategory($id)
    {
        $category = Yii::$app->request->post()['add-category'];
        $this->categoryService->addTableToCategory($id, $category);

        return $this->redirect(Yii::$app->request->referrer);
    }
}