<?php

/* @var $this yii\web\View
 * @var $queries array|null
 */


use common\widgets\Table;
use yii\helpers\Html;

$this->title = 'SQL Form';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sql-sqlform">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= HTml::beginForm('/sql/submit') ?>
    <?= Html::textarea('input_sql', null, ['rows' => 10, 'cols' => 150, 'autofocus' => true]) ?>
    <br>
    <?= Html::submitButton('Run', ['name' => 'run', 'class' => 'btn btn-primary']); ?>
    <?= Html::submitButton('Save', ['name' => 'save', 'class' => 'btn btn-primary']); ?>
    <?= Html::endForm() ?>
    <br>
    <br>
    <?php if (!is_null($queries)) {
        foreach ($queries as $query) {
            echo Table::widget(['table' => $query]);
        }
    } ?>

</div>