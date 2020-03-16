<?php


namespace frontend\controllers;


use src\Modules\Record\Domain\Repository\RecordRepositoryInterface;
use yii\web\Controller;

class TablesController extends Controller
{
    private $recordRepository;

    public function __construct($id, $module, RecordRepositoryInterface $recordRepository, $config = [])
    {
        $this->recordRepository = $recordRepository;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $query = $this->recordRepository->findAllByTableName('sys_table');
        $table = [];
        foreach ($query as $item) {
            $table[] = $item->attributes;
        }
        $tables[] = $table;
        return $this->render('index', ['tables' => $tables]);
    }

    public function actionShow($id)
    {

    }
}