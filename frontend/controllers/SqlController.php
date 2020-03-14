<?php


namespace frontend\controllers;


use src\Modules\Table\Infrastructure\Service\SqlService;
use Yii;
use yii\web\Controller;

class SqlController extends Controller
{
    private $sqlService;

    public function __construct($id, $module, SqlService $sqlService, $config = [])
    {
        $this->sqlService = $sqlService;
        parent::__construct($id, $module, $config);
    }

    public function actionSubmit()
    {
        $data = Yii::$app->request->post();
        $sql = $data['input_sql'];
        if (isset($data['run'])) {
            $this->sqlService->run($sql);
        } else if (isset($data['save'])) {
            $this->sqlService->save($sql);
        }
        return $this->redirect('/site/sqlform');

    }
}