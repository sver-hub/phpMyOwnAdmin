<?php

/* @var $this yii\web\View
 * @var $tableId integer
 * @var $columns SysColumn[]
 */


use common\widgets\NewRecord;
use src\Modules\SysTable\Domain\Entity\SysColumn;
use yii\helpers\Html;

$this->title = 'New Record';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="new-record">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::beginForm("/edit-table/save-record/?id=$tableId", 'post',
        ['autocomplete' => 'off', 'class' => 'form-group']) ?>

    <?= NewRecord::widget(['columns' => $columns]);?>

    <?= Html::submitButton('Add', ['class' => 'btn btn-primary']) ?>

</div>