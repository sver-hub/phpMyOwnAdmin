<?php


namespace frontend\controllers;


use src\Modules\SysTable\Infrastructure\Service\SqlService;
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

    public function actionSqlform($queries = null)
    {
        return $this->render('sqlform', ['queries' => $queries]);
    }

    public function actionSubmit()
    {
        $data = Yii::$app->request->post();
        $sql = $data['input_sql'];
        if (isset($data['run'])) {
            $result = $this->sqlService->run($sql);
            if (is_array($result)) {
                return $this->actionSqlform($result);
            }
        } else if (isset($data['save'])) {
            $this->sqlService->save($sql);
        }
        return $this->actionSqlform();

    }
}