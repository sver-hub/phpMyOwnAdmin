<?php

/* @var $this yii\web\View
 * @var $content array
 * @var $tableId integer
 * @var $records Record[]
 */


use common\widgets\Categories;
use common\widgets\Table;
use src\Modules\Record\Domain\Entity\Record;
use yii\helpers\Html;

$this->title = 'Tables';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tables-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= Categories::widget(['content' => $content])?>
    <?php
    if ($tableId != null) {
        if (!is_null($records)) {
            echo Table::widget(['records' => $records]);
        } else {
            echo "<div class='empty-table'>Table is empty</div>";
        }
        echo Html::a('Edit Table', "/edit-table/edit/?id=$tableId", ['class' => 'btn btn-primary']);
        echo Html::a('Drop Table', "/tables/drop/?id=$tableId", ['class' => 'btn btn-danger']);
    }
    ?>
</div>