<?php

/* @var $this yii\web\View
 * @var $content array
 * @var $tables array
 */


use common\widgets\Categories;
use common\widgets\Table;
use yii\helpers\Html;

$this->title = 'Tables';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tables-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= Categories::widget(['content' => $content])?>

    <?php if (!is_null($tables)) {
        foreach ($tables as $table) {
            echo Table::widget(['table' => $table]);
        }
    } ?>
</div>