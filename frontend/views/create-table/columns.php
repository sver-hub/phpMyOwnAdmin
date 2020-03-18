<?php

/* @var $this yii\web\View
 * @var $numOfCols integer
 * @var $tableId integer
 * @var $types SysType[]
 * @var $tables SysTable[]
 */

use common\widgets\ColumnInput;
use src\Modules\SysTable\Domain\Entity\SysTable;
use src\Modules\SysTable\Domain\Entity\SysType;
use yii\helpers\Html;

$this->title = 'Create Table';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fillColumns-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::beginForm("/create-table/create/?tableId=$tableId",'post',
        ['autocomplete' => 'off' , 'class' => 'form-group']) ?>
    <?php for ($i = 0; $i < $numOfCols; $i++) {
        echo ColumnInput::widget(['id' => $i, 'types' => $types, 'tables' => $tables]);
    }?>
    <?= Html::submitButton('Create', ['class' => 'btn btn-primary'])?>
    <?= Html::endForm() ?>

</div>