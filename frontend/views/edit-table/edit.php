<?php

/* @var $this yii\web\View
 * @var $tableId integer
 * @var $columns SysColumn[]
 * @var $records Record[]
 */


use common\widgets\EditableRow;
use src\Modules\Record\Domain\Entity\Record;
use src\Modules\SysTable\Domain\Entity\SysColumn;
use yii\helpers\Html;

$this->title = 'Edit';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tables-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::beginForm("/edit-table/save/?id=$tableId", 'post',
        ['autocomplete' => 'off' , 'class' => 'form-group']) ?>

    <?php echo "<div class='edit-table-header'>";
            foreach ($columns as $column) {
            echo "<div class='edit-table-col'>$column->column_name</div>";
            }
            echo "</div>" ?>

    <?php
    if (!is_null($records)) {
        foreach ($records as $index => $record) {
            echo EditableRow::widget(['index' => $index, 'record' => $record]);
        }
    }?>
    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Add new record', "/edit-table/new/?id=$tableId", ['class' => 'btn btn-primary']) . '<br><br>';?>

</div>